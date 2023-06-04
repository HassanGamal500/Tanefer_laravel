<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageHotelRoomSeason extends Model
{
    protected $guarded =[];

    public function packageHotelRoom(){
        return $this->belongsTo(PackageHotelRoom::class,'package_hotel_room_id');
    }

    public function packageHotelSeason()
    {
        return $this->belongsTo(PackageHotelSeason::class,'package_hotel_season_id');
    }
}
