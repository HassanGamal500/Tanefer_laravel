<?php

namespace App\Http\Controllers\ApiV2\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\PackageHotelResource;
use App\Http\Resources\Admin\PackageHotelResource as PackageHotelDetailsResource;
use App\Models\Booking;
use App\Models\PackageHotel;
use App\Models\GtaHotelPortfolio;
use App\Services\Packages\SearchService;
use App\Services\Packages\CalculateFullPriceService;
use Illuminate\Http\Request;

class PackageHotelController extends Controller
{
    public function index (Request $request)
    {
        $childrenages = explode(',',$request->childrenages);
        if (sizeof($childrenages) > $request->child_number){
            while (sizeof($childrenages) != $request->child_number){
                array_pop($childrenages);
            }
        }
        $rowPerPage = $request->row_per_page ?? 10;
        $packageHotelQuery =  SearchService::hotelSearch ($request->city_id);

        $packageHotel = $packageHotelQuery->paginate($rowPerPage);

        return responseJson($request,[
            'hotelTotal'=> $packageHotel->total(),
            'hotelList'=> PackageHotelResource::collection( $packageHotel ),
        ],'success');
    }


    public function details(PackageHotel $packageHotel,Request $request)
    {
        $childrenages = explode(',',$request->Childrenages);
        if (sizeof($childrenages) > $request->child_number){
            while (sizeof($childrenages) != $request->child_number){
                array_pop($childrenages);
            }
        }
        $packageHotel->load('tourCity','packageHotelImages','packageHotelRooms');
//        $packageHotel->load(['packageHotelRooms'=> function ($query) use ($request) {
//            $query->where('max_num_children', '>=', $request->child_number)->where('max_num_adult','>=',$request->adult_number);
//        }]);

        $packageHotelResource = new PackageHotelDetailsResource( $packageHotel );

        if ($request->child_number > 0){
            $FinalPackage = CalculateFullPriceService::calculate($packageHotelResource, $request->adult_number, $request->child_number, $childrenages);

           return  responseJson($request,$FinalPackage,'success');
        }
        else{
            return responseJson($request,$packageHotelResource,'success');
        }

    }
    
    public function save(Request $request) 
    {
        // return response()->json($request->passengerDetails['passengerType']);
        // if(! is_null($request->start_date)){
        //     $startDay = ucfirst(strtolower(Carbon::parse($request->start_date)->format('l')));
        //     $package = Package::find($request->package_id);
        //     $days = $package->packageAbilities->pluck('days');
        //     if(!str_contains($days,$startDay) && ! empty($days)){
        //         abort(422,'this tour not start in '.$startDay);
        //     }
        // }

        // if(Cache::has($request->sessionId)){
        //     $cachedTotalPrice = Cache::get($request->sessionId);
        //     if($cachedTotalPrice['totalPrice'] != $request->total_price){
        //         $cachedTotalPrice = json_encode($cachedTotalPrice);
        //         return responseJson($request,new \stdClass(),
        //             'Package Total Price not valid, Valid price is '.$cachedTotalPrice,422);
        //     }
        // }else{
        //     return responseJson($request,new \stdClass(),'Something wrong in total price',422);
        // }
        
        // $validated = $request->validated();
        
        // DB::transaction(function () use ( $validated ) {
        //     $booking = BookingService::storeBookingMainData($validated);
        // });
        
        // $booking = Booking::orderBy('id', 'DESC')->first();
        // BookingService::storeAdventure($request->activities,$booking->id,$request->package_id);
        // BookingService::storeHotel($request->accommodation,$booking->id);
        // $bookingdata = Booking::find($booking->id);
        
        // DB::transaction(function () use ($bookingdata, $validated ) {
        //     BookingService::storeBookingTravelerData( $bookingdata , $validated['passengerDetails']);
        //     BookingService::storeBookingTData( $bookingdata , $validated['bookingDetails']);
        // });

        //   return  responseJson($request,['booking_id'=>$booking->id], 'operation done successfully');
        
        $hotel = GtaHotelPortfolio::where('Jpd_code', $request->hotelJPCode)->first();
        
        $booking = Booking::create([
            'start_date' => $request->hotelStartDate,
            'end_date' => $request->hotelEndDate,
            'adults' => $request->adults,
            'children' => $request->children,
            'total_price' => $request->total_price,
            'model_id' => $hotel->id,
            'model_type' => get_class($hotel),
            'hotel_jpcode' => $request->hotelJPCode,
            'hotel_int_code' => $request->hotelIntCode,
            'hotel_locator' => $request->hotelLocator,
            'hotel_object_form_id' => $request->finalBookHotelFormData
        ]);
        
        $booking->bookingData()->create([
            'zipCode'       => isset($request->bookingDetails['zip_code']) ? $request->bookingDetails['zip_code'] : null,
            'contact_name'  => $request->bookingDetails['contact_name'],
            'contact_phone' => $request->bookingDetails['contact_phone'],
            'contact_email' => $request->bookingDetails['contact_email'],
            'address'       => isset($request->bookingDetails['address']) ? $request->bookingDetails['address'] : null
        ]);
        
        $booking->bookingTraveler()->create([
            'passengerTitle'        => $request->passengerDetails['passengerTitle'],
            'passengerGender'       => isset($request->passengerDetails['passengerGender']) && $request->passengerDetails['passengerGender'] ? $request->passengerDetails['passengerGender'] : null,
            'passengerFirstName'    => $request->passengerDetails['passengerFirstName'],
            'passengerLastName'     => $request->passengerDetails['passengerLastName'],
            'date_of_birth'         => $request->passengerDetails['date_of_birth'],
            'passport_number'       => $request->passengerDetails['passport_number'],
            'passport_expire_date'  => $request->passengerDetails['passport_expire_date'],
            'passengerType'         => $request->passengerDetails['passengerType'],
            'passport_issue_country'    => $request->passengerDetails['passport_issue_country']
        ]);
       
        return  responseJson($request,['booking_id'=>$booking->id, 'type' => 'hotel'], 'operation done successfully');
    }
}
