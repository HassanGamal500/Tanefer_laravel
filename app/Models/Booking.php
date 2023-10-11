<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = [];

    public function bookingCity(){
        return $this->hasMany(BookingCity::class,'booking_id')
            ->with(['bookingCityActivity','packageHotel','packageHotelRooms']);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function adventure()
    {
        $packageActivity = PackageBookingadventrue::where('package_id', $this->package_id)->pluck('adventrue_id');
        $adventure = PackageActivity::whereIn('id', $packageActivity)->get();

        return $adventure;
    }

    public function bookingActivity(){
        return $this
            ->hasManyThrough(BookingCityActivity::class,
                BookingCity::class,'booking_id','booking_city_id');
    }

    public function startCity()
    {
        return $this->belongsTo(TourCity::class,'city_start_id','id');
    }

    public function endCity()
    {
        return $this->belongsTo(TourCity::class,'city_end_id','id');
    }



    public function bookingPayment(){
        return $this->hasOne(BookingPayment::class,'booking_id');
    }

    public function bookingTraveler(){
        return $this->hasMany(BookingTraveller::class,'booking_id');
    }
    public function bookingData(){
        return $this->hasOne(BookingData::class,'booking_id');
    }

    public function bookingRooms()
    {
        return $this->hasMany(BookingCruiseRoom::class,'booking_id','id');
    }
}
