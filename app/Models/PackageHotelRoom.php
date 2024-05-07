<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageHotelRoom extends Model
{
    const roomOccupancy = ['Single','Double','Triple'] ;
    const cruiseRoomOccupancy =  ['Single','Double','Solo','Triple','SGL','DBL'];
    protected $guarded =[];
    // protected $with = ['packageHotelRoomSeason'];

    public function packageHotel()
    {
        return $this->morphTo();
    }


    public function packageHotelRoomSeason()
    {
        return $this->hasMany(PackageHotelRoomSeason::class,'package_hotel_room_id','id');
    }

    public function getInclusionsAttribute()
    {
        return json_decode($this->attributes['inclusions']);
    }

    public function getAmenitiesAttribute()
    {
        return json_decode($this->attributes['amenities']);
    }

    public function getCategoriesAttribute()
    {
        return json_decode($this->attributes['categories']);
    }

}
