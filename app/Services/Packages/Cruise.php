<?php

namespace App\Services\Packages;

use App\Models\Booking;
use App\Models\Cruise as ModelCruise;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class Cruise
{
    public static function search($request)
    {
        $cityID = $request->city_id;
        $adultNumber = $request->adults;
        $childNumber = $request->children;
        $startDate = $request->start_date;
        $duration = $request->duration;

        $cruiseQuery = ModelCruise::query();

        if( $cityID ) {
            $cruiseQuery->whereHas('cities', function ($q) use ($cityID) {
                $q->where('tour_cities.id', $cityID)->where('cruise_tour_city.is_start',1);
            });
        }

        if( $adultNumber && !$childNumber){
            $cruiseQuery->whereHas('rooms',function ($query) use($adultNumber){
                $query->where('max_num_adult','>=',$adultNumber );
            });
        }
        if( $childNumber && !$adultNumber ){
            $cruiseQuery->whereHas('rooms',function ($query) use($childNumber){
                $query->where('max_num_children','>=',$childNumber );
            });
        }
        if($adultNumber && $childNumber ){
            $cruiseQuery->whereHas('rooms',function ($query) use($adultNumber ,$childNumber){
                $query->where('max_num_adult','>=',$adultNumber )->where('max_num_children','>=',$childNumber );
            });
        }

        if( $startDate && !$duration){
            $cruiseQuery->whereHas('packageHotelSeasons',function ($query) use($startDate){
                $query->where('start_date','<=',$startDate);
            });
        }

        if($startDate && $duration){
            $endDate = Carbon::parse($startDate)->addDays($duration)->format('Y-m-d');
            $cruiseQuery->whereHas('packageHotelSeasons',function ($query) use($startDate,$endDate){
                $query->where('start_date','<=',$startDate )->where('end_date','>=',$endDate );
            });
        }

        return  $cruiseQuery->orderByDesc('id');
    }

    public static function bookingCruise($validatedData,$cruise,$cachedData)
    {
        return Booking::create(self::collectBookingMainData($validatedData,$cruise,$cachedData));
    }

    public static function bookingData($validatedData,$booking)
    {
        return $booking->bookingData()->create(self::collectionBookingData($validatedData));
    }

    public static function BookingTravellers($validatedData,$booking)
    {
        // dd($validatedData['passengerDetails']);
        // foreach ($validatedData['passengerDetails'] as $passengerDetail){
        //     $booking->bookingTraveler()->create(self::travellerData($passengerDetail));
        // }
        $booking->bookingTraveler()->create(self::travellerData($validatedData['passengerDetails']));
    }

    public static function storeBookingRooms($cachedData,$booking)
    {
        foreach ($cachedData['rooms'] as $room){
            $booking->bookingRooms()->create(self::collectionBookingRoomData($room));
        }
    }

    private static function collectBookingMainData($validatedData,$cruise,$cachedData)
    {
        $adults = 0;
        $children = 0;
        foreach ($validatedData['roomGuests'] as $roomGuest){
            $adults += $roomGuest['adults'];
            $children += array_key_exists('children',$roomGuest) ? $roomGuest['children'] : 0;
        }

        return [
            'start_date' => $validatedData['start_date'],
            'adults' => $adults,
            'children' => $children,
            'total_price' => $cachedData['totalPrice'],
            'model_id' => $cruise->id,
            'model_type' => get_class($cruise)
        ];
    }

    private static function collectionBookingData($validatedData)
    {
        return [
            'zipCode' => array_key_exists('zip_code',$validatedData) ? $validatedData['zip_code'] : null,
            'contact_name'  => $validatedData['contact_name'],
            'contact_phone' => $validatedData['contact_phone'],
            'contact_email' => $validatedData['contact_email'],
            'address'       => array_key_exists('address',$validatedData) ? $validatedData['address'] : null,
            // 'contact_name'  => array_key_exists('contact_person_name',$validatedData) ? $validatedData['contact_person_name'] : null
        ];
    }

    private static function travellerData($passengerDetail)
    {
        $gender = [
            'M' => 'male',
            'F' => 'female',
        ];
        return [
            'passengerTitle' => $passengerDetail['passengerTitle'],
            // 'passengerGender' => array_key_exists('passengerGender',$passengerDetail) ? $gender[$passengerDetail['passengerGender']] : null,
            'passengerGender' => isset($passengerDetail['passengerGender']) && $passengerDetail['passengerGender'] ? $passengerDetail['passengerGender'] : null,
            'passengerFirstName' => $passengerDetail['passengerFirstName'],
            'passengerLastName'  => $passengerDetail['passengerLastName'],
            'date_of_birth' => $passengerDetail['date_of_birth'],
            'passport_number' => $passengerDetail['passport_number'],
            'passport_expire_date' => $passengerDetail['passport_expire_date'],
            'passengerType' => $passengerDetail['passengerType'],
            'passport_issue_country' => $passengerDetail['passport_issue_country']
        ];
    }

    private static function collectionBookingRoomData($room)
    {
        return [
            'room_id' => $room['id'],
            'price_per_day' => $room['price_per_day'],
            'total_price' => $room['total_price']
        ];
    }
}
