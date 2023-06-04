<?php

namespace App\Models;

use App\BookingCitiesHotelRoom;
use Illuminate\Database\Eloquent\Model;

class BookingCity extends Model
{
    protected $guarded =[];

    protected $with = ['city'];

    public function booking(){
        return $this->belongsTo(Booking::class,'booking_id');
    }

    public function city()
    {
        return $this->belongsTo(TourCity::class,'city_id');
    }

    public function bookingCityActivity(){
        return $this->hasMany(BookingCityActivity::class,'booking_city_id')->with('packageActivity');
    }

    public function packageHotel()
    {
        return $this->belongsTo(PackageHotel::class,'package_hotel_id');
    }

    public function packageHotelRooms()
    {
        return $this->hasMany(BookingCitiesHotelRoom::class);
    }
}
