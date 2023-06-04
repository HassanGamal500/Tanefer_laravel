<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageCityHotel extends Model
{
    protected $guarded =[];

    public function packageCity(){
        return $this->belongsTo(PackageCity::class,'package_city_id');
    }

    public function packageHotel(){
        return $this->belongsTo(PackageHotel::class,'package_hotel_id');
    }
    public function packageHotelRoom(){
        return $this->belongsTo(PackageHotelRoom::class,'package_hotel_rooms_id');
    }
}
