<?php

namespace App\Services\Packages;

use App\Http\Resources\Admin\PackageHotelResource;

class CalculateFullPriceService
{
    public static function calculate(PackageHotelResource $packageHotel, $adult_number, $child_number, $childages){
//        return $packageHotel->packageHotelRooms;
        foreach ($packageHotel->packageHotelRooms as $hotelRoom){
            $policies = $packageHotel->packageHotelChildren->where('occupancy',$hotelRoom->occupancy)->first();
//            return $policies;
            if ($policies != null){
                foreach ($childages as $key => $age){
                    if ($key == 0)
                    {
                        $valuetobeadded =$policies->{'first_child_' . $age};
                    }
                    else{
                        $valuetobeadded =$policies->{'second_child_' . $age};
                    }
                }


            $hotelRoom->packageHotelRoomSeason->price_per_day = ($hotelRoom->packageHotelRoomSeason->price_per_day * $adult_number) + (($valuetobeadded/100) * $hotelRoom->packageHotelRoomSeason->price_per_day * $child_number);
            }
        }
//        dd($packageHotel);
        return $packageHotel;
    }

}
