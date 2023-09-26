<?php


namespace App\Services\Packages;


use App\Models\AvailabilitiesTour;
use App\Models\PackageActivity;
use App\Models\PackageHotel;

class SearchService
{
    public static function activitySearch( $cityID = null, $duration = null, $startTime = null,$for_package = 0,$type = null, $date = null){
        $packageActivityQuery = PackageActivity::query();
        $packageAvaliQuery = AvailabilitiesTour::query();

        if($cityID )
            $packageActivityQuery->where('tour_city_id',$cityID);

        if($duration )
            $packageActivityQuery->where('duration_digits',$duration);

        if($startTime )
            $packageActivityQuery->where('start_time',$startTime);

        if(! $for_package){
            $packageActivityQuery->where('is_published',1);
        }

        if(isset($date) && !empty($date) && $date != null && $date != 'null' && $date != '' && $date != 'undefined' && $date){
            $packageActivityQuery->whereHas('availabilityTour', function($q) use ($date) {
                $q->where('from_date', '<=', $date)->where('to_date', '>=', $date);
            });
        }

        if($type){
            $packageActivityQuery->where('activity_type',$type);
        }else{
            $packageActivityQuery->where('activity_type','!=','cruise');
        }

        return $packageActivityQuery;
    }
    public static function activityFilterSearch( $Title = null, $price = null, $cityID = null, $duration = null,$duration_type = null, $type = null){
        $packageActivityQuery = PackageActivity::query();
        $packageActivityQuery->where('is_published',1);

        if($cityID )
            $packageActivityQuery->where('tour_city_id',$cityID);

        if($Title)
            $packageActivityQuery->where('title', 'like', '%' . $Title . '%');

        if($duration )
            $packageActivityQuery->where('duration_digits',$duration);

        if($duration_type )
            $packageActivityQuery->where('duration_type',$duration_type);

        if($type)
            $packageActivityQuery->where('activity_type',$type);

        if($price )
            $packageActivityQuery->whereHas('packageActivityPricingTiers', function($q) use ($price) {
                $q->where('adult_price', $price);
            });


        return $packageActivityQuery;
    }


    public static function hotelSearch( $cityID = null, $checkInDate = null,$checkoutDate = null, $adultNumber = null,$childNumber = null)
    {
        $packageHotelQuery = PackageHotel::query();

        if( $cityID ) {
            $packageHotelQuery->where('tour_city_id', $cityID);
        }

        if( $adultNumber && !$childNumber){
            $packageHotelQuery->whereHas('packageHotelRooms',function ($query) use($adultNumber){
                $query->where('max_num_adult','>=',$adultNumber );
            });
        }
        if( $childNumber && !$adultNumber ){
            $packageHotelQuery->whereHas('packageHotelRooms',function ($query) use($childNumber){
                $query->where('max_num_children','>=',$childNumber );
            });
        }
        if($adultNumber && $childNumber ){
            $packageHotelQuery->whereHas('packageHotelRooms',function ($query) use($adultNumber ,$childNumber){
                $query->where('max_num_adult','>=',$adultNumber )->where('max_num_children','>=',$childNumber );
            });
        }

        if( $checkInDate && !$checkoutDate){
            $packageHotelQuery->whereHas('packageHotelSeasons',function ($query) use($checkInDate){
                $query->where('start_date','<=',$checkInDate);
            });
        }
        if( $checkoutDate && !$checkInDate ){
            $packageHotelQuery->whereHas('packageHotelSeasons',function ($query) use($checkoutDate){
                $query->where('end_date','>=',$checkoutDate );
            });
        }
        if($checkoutDate && $checkInDate){
            $packageHotelQuery->whereHas('packageHotelSeasons',function ($query) use($checkInDate,$checkoutDate){
                $query->where('start_date','<=',$checkInDate )->where('end_date','>=',$checkoutDate );
            });
        }


       return  $packageHotelQuery->orderByDesc('id');
    }



//    public static function calculatecost($packageHotels, $adult_number, $child_number, $childrenages){
//        foreach ($packageHotels as $packageHotel){
//            $packageHotel->hotel_price =
//        }
//    }
}
