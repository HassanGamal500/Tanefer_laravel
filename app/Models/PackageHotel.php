<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class PackageHotel extends Model
{
    protected $guarded = [];
    protected $appends = ['lowest_price'];

    public function tourCity()
    {
        return $this->belongsTo(TourCity::class , 'tour_city_id');
    }

    public function packageHotelChildren()
    {
        return $this->morphMany(PackageHotelChildren::class,'model');
    }

    public function packageHotelRooms()
    {
        return $this->morphMany(PackageHotelRoom::class,'model');
    }

    public function packageHotelImages()
    {
        return $this->hasMany(PackageHotelImage::class,'package_hotel_id');
    }

    public function packageHotelSeasons()
    {
        return $this->hasManyThrough(PackageHotelRoomSeason::class,PackageHotelRoom::class,'package_hotel_id','package_hotel_room_id','id','id');
    }

    public function getImageAttribute()
    {
        return  URL::to('storage/' . $this->attributes['image']);
    }

    public function getLowestPriceAttribute()
    {
        return $this->packageHotelSeasons()->min('price_per_day');
    }
}
