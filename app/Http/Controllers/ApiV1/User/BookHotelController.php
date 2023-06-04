<?php

namespace App\Http\Controllers\ApiV1\User;

use App\GDSIntegration\Tbo\HotelBookingDetails\HotelBookingDetail;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookHotelRequest;
use App\Models\EmailSetting;
use App\Services\Hotels\HotelBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Propaganistas\LaravelPhone\PhoneNumber;

class BookHotelController extends Controller
{
    public function book(BookHotelRequest $request)
    {
        $client = resolve('client');
        $mainClient = $client->parentClient ?? $client;

        if(Cache::has($request->sessionId)){
            $hotelBookDetails = Cache::get($request->sessionId);
        }else{
            return apiResponse(new \stdClass(),'Session Expired',false);
        }

        $this->sendBookingDetailsToAgent($request,$hotelBookDetails,$mainClient);
        return apiResponse(new \stdClass(),'Your booking details sent to our agent and we will contact with you very soon',true);

        $hotelBooking = new HotelBooking();
        $create = $hotelBooking->create($request);
        if($create!== null){
            $status = $create['status'] == 200 ? true : false;
            return apiResponse($create['data'],$create['message'],$status);
        }
    }


    public function bookingDetails(Request $request)
    {
        $bookingDetails = new HotelBookingDetail();
        $details = $bookingDetails->hotelBookingResponse($request->clientNumber);
        return $details;
    }

    private function sendBookingDetailsToAgent($request, $hotelBookDetails,$client)
    {
        $totalAmountT = 0;
        foreach ($hotelBookDetails['HotelRooms'] as $room){
            $totalAmountT += $room->rateSummary->totalFare;
        }
        $contactPersonName = $request->guests[0]['firstName']. ' '.$request->guests[0]['lastName'];
        $totalAmount = round($totalAmountT,2);

        if(auth()->guard('api')->check()){
            $contactPhone = auth()->guard('api')->user()->phone;
            $contactEmail = auth()->guard('api')->user()->email;
        }else{
            $contactPhone = PhoneNumber::make($request->phoneNumber)
                ->ofCountry($request->countryIsoCode)->formatInternational();
            $contactEmail = $request->email;
        }

        Mail::send('email_templates.send_hotel_booking_details_to_agent',[
            'request' => $request,
            'rooms' => $request->rooms,
            'guests' => $request->guests,
            'contactPhone' => $contactPhone,
            'contactEmail' => $contactEmail,
            'contactPersonName' => $contactPersonName,
            'totalAmount' => $totalAmount,
            'hotelBookDetails' => $hotelBookDetails,
            'appUrl' => $client->url,
            'appName' => $client->name,
        ],function ($message) use ($client){
            $message->subject('New Request to book hotel');
            $message->from($client->email,$client->name);
            $message->to('online@tanefer.com');
        });
    }

}
