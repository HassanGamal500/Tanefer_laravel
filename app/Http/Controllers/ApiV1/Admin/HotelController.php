<?php

namespace App\Http\Controllers\ApiV1\Admin;

use App\GDSIntegration\Tbo\HotelCancel\HotelCancel;
use App\Http\Requests\AdminHotelBookingListController;
use App\Http\Requests\CancelHotelBookingRequest;
use App\Http\Resources\HotelBookingResource;
use App\Http\Resources\PaginatedCollection;
use App\Models\HotelBooking;
use App\Models\HotelBookingStatus;
use App\Models\PaymentStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HotelController extends AdminController
{
    public function index(AdminHotelBookingListController $request)
    {
        if($request->has('last_day')){
            $date = Carbon::now()->subDays(1);
        }
        elseif($request->has('last_week')){
            $date = Carbon::now()->subDays(7);
        }elseif ($request->has('last_month')){
            $date = Carbon::now()->subDays(30);
        }else{
            $date = Carbon::now()->subDays(7);
        }

        $hotelBookings = HotelBooking::where('created_at' , '>=' , $date);

        if($request->has('custom_date')){
            $hotelBookings = HotelBooking::whereBetween('created_at' , [
                Carbon::parse($request->start_date),
                Carbon::parse($request->end_date.' 23:59:59')
            ]);
        }

        if($request->has('client_id') && ! is_null($request->client_id) && count($request->client_id) > 0){
            $hotelBookings->whereIn('client_id', $request->client_id);
        }

        if($request->has('hotel_booking_status_id') && ! is_null($request->hotel_booking_status_id) && count($request->hotel_booking_status_id) > 0){
            $hotelBookings = $hotelBookings->whereIn('hotel_booking_status_id' , $request->hotel_booking_status_id);
        }
        if($request->has('payment_status_id') && ! is_null($request->payment_status_id) && count($request->payment_status_id) > 0){
            $hotelBookings = $hotelBookings->whereIn('payment_status_id' , $request->payment_status_id);
        }

        $hotelBookings = $hotelBookings->where('booking_number','!=',null)->orderBy('created_at','DESC');

        if(count($hotelBookings->get()) == 0){
            return apiResponse([],'No Bookings Found',false);
        }

        $perPage = is_null($request->per_page)? 15 : $request->per_page;

        return apiResponse(new PaginatedCollection($hotelBookings->paginate($perPage),
            HotelBookingResource::class),'List Hotel Bookings',true);
    }

    public function show($id)
    {
        $hotelBooking = HotelBooking::with(['hotelBookingStatus','paymentStatus','hotelRooms','hotelGuests','user','client'])
                        ->where('id',$id)->first();
        if(is_null($hotelBooking)){
            return apiResponse(new \stdClass(),'No Booking Found',false);
        }

        return apiResponse($hotelBooking,'Show Hotel Booking Data',true);
    }

    public function updateStatus(Request $request, $id)
    {
        $hotelBooking = HotelBooking::find($id);
        if(is_null($hotelBooking)){
            return apiResponse(new \stdClass(),'This Booking Not Found',false);
        }
        if($hotelBooking->hotel_booking_status_id == \App\Enum\HotelBookingStatus::Cancelled){
            return apiResponse(new \stdClass(), 'Cannot update cancelled booking',false);
        }

        $hotelBooking->update(['hotel_booking_status_id' => $request->hotel_booking_status_id]);

        $updatedHotelBooking  = HotelBooking::with(['hotelBookingStatus','paymentStatus','hotelRooms','hotelGuests','user','client'])->find($id);
        return apiResponse($updatedHotelBooking,'Hotel Booking Updated',true);
    }

    public function statuses()
    {
        $statuses = HotelBookingStatus::select('id','name')->get();

        return apiResponse($statuses,'List Hotel Booking Statuses',true);
    }

    public function paymentStatuses()
    {
        $statuses = PaymentStatus::select('id','name')->get();

        return apiResponse($statuses,'List Payment Statuses',true);
    }

    public function cancelBooking(CancelHotelBookingRequest $request)
    {
        $hotelCancel = new HotelCancel();
        $response = $hotelCancel->hotelCancelResponse($request->booking_number,$request->client_reference,$request->remark);

        if(is_string($response)){
            return apiResponse(new \stdClass(),$response,false);
        }

        return response()->json($response);
    }
}
