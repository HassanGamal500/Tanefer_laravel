<?php
namespace App\Http\Controllers\ApiV2\Front;

use App\Http\Controllers\Controller;
use App\Mail\BookingConfirmation;
use App\Mail\SendCustomPackage;
use App\Models\CustomPackage;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BookingCompleteRequest;
use App\Http\Requests\BookingSaveRequest;
use App\Models\Booking;
use App\Services\Packages\BookingService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;


class BookingController extends Controller
{
    public function  save(BookingSaveRequest $request )
    {
        if(! is_null($request->start_date)){
            $startDay = strtolower(Carbon::parse($request->start_date)->format('l'));
            $package = Package::find($request->package_id);
            if(! str_contains($package->start_days,$startDay) && ! empty($package->start_days)){
                abort(422,'this tour not start in '.$startDay);
            }
        }
        if(count($package->seasons) > 0 && !is_null($request->start_date)){
            $season = $package->seasons()->where('from','<=',$request->start_date)
                ->where('to','>',$request->start_date)->first();
            if(is_null($season)){
                abort(422,'You cannot book package in this day');
            }
        }

        if(Cache::has($request->sessionId)){
            $cachedTotalPrice = Cache::get($request->sessionId);
            if($cachedTotalPrice['totalPrice'] != $request->total_price['total']){
                return responseJson($request,new \stdClass(),
                    'Package Total Price not valid, Valid price is '.$cachedTotalPrice,422);
            }
        }else{
            return responseJson($request,new \stdClass(),'Something wrong in total price',422);
        }

        foreach ($request->booking_cities as $booking_city){

            for ($i = 0; $i < count($booking_city['hotelRooms']); $i++){
                if(count($booking_city['hotelRooms']) != count($request->roomGuests)){
                    return responseJson($request,new \stdClass(),'Select rooms not equal number of rooms entered',422);
                }

                $hotelRoom = $booking_city['hotelRooms'][$i];
                $maxRoomAdult = $hotelRoom['roomMaxNumberOfAdult'];
                $maxRoomChildren = $hotelRoom['roomMaxNumberOfChildren'];

                if($request->roomGuests[$i]['adults'] > $maxRoomAdult || $request->roomGuests[$i]['children'] > $maxRoomChildren){
                    return responseJson($request,new \stdClass(),
                        'Your occupancy exceeds the hotel rooms occupancy selected',422);
                }
            }
        }

        $validated = $request->validated();
        DB::transaction(function () use ( $validated ) {
            $booking = BookingService::storeBookingMainData($validated);

            foreach ( $validated['booking_cities'] as $key => $booking_city ){
                BookingService::storeBookingCityData($booking,$booking_city);
            }
        });
        $booking = Booking::orderBy('id', 'DESC')->first();

       return  responseJson($request,['booking_id'=>$booking->id],'operation done successfully');
    }





    public function  complete($id, BookingCompleteRequest $request)
    {
        $validated = $request->validated();
        $booking = Booking::find($id);

        DB::transaction(function () use ($booking, $validated ) {

            foreach ($validated['passengerDetails'] as $traveller){
                BookingService::storeBookingTravelerData( $booking , $traveller);
            }
            BookingService::storeBookingTData( $booking , $validated['bookingDetails']);
        });

        return responseJson($request,[],'operation done successfully');
    }





    public function saveToEmail()
    {
        $validator = Validator::make(request()->all(),[
            'url' => 'required|url',
            'email' => 'required|email',
            'package' => 'required'
        ]);
        if($validator->fails()){
            throw new ValidationException($validator);
        }

        $customPackageId = Str::uuid();

        CustomPackage::create([
            'custom_package_id' => $customPackageId,
            'package' => json_encode(request()->all()),
        ]);

        $url = request()->url.'?custom_package='.$customPackageId->toString();
        Mail::to(request()->email)->send(new SendCustomPackage(request()->email,$url));

       return responseJson(request(),[],'Email send to you with custom package link');
    }




    public function confirmBooking()
    {
        if(request()->merchant_extra){
            $booking = Booking::find(request()->merchant_extra);
            if(request()->url){
                $url = request()->url . '/'.$booking->id;
            }else{
                $url = 'https://tanefer.com/trip-booking/'.$booking->id;
            }
            if(request()->response_message == 'Success'){
                $booking->update([
                    'status' => 'Confirm Payment',
                    'transaction_id' => request()->fort_id,
                    'authorization_code' => request()->authorization_code
                ]);
            }
            Mail::to($booking->bookingData->contact_email)
                ->send(new BookingConfirmation($url,$booking->total_price,$booking->bookingData->contact_name));
            $booking->update(['send_confirm_email' => 1]);

            $message = 'Your booking confirmed';
            return responseJson(request(),[],$message);
        }

        $message = 'Your booking under processing, We will email you soon with booking status';

        return responseJson(request(),[],$message);
    }





    public function displayCustomPackage()
    {
        $customPackage = CustomPackage::where('custom_package_id',request()->custom_package)->first();
        if(is_null($customPackage)){
            return response()->json(['message' => 'This custom package not found'],404);
        }

       return responseJson(request(),json_decode($customPackage->package),'success');
    }





    public function bookingDetails($id)
    {
        $booking = Booking::with([
            'bookingCity','bookingPayment','bookingTraveler','bookingData',
            'startCity','endCity','package'
        ])->where('id',$id)->first();
        if(is_null($booking)){
            return responseJson(request(),[],'this booking not found',404);
        }

        return responseJson(request(),['bookingDetails' => $booking],'success');
    }
    public function testmail()
    {
        $url = 'data';
        Mail::to(request()->email)->send(new SendCustomPackage(request()->email,$url));
        $message = 'Your booking under processing, We will email you soon with booking status';

        return response()->json(['message' =>'operation done successfully', 'status' => 200]);


    }

}
