<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageBookingData extends Model
{
    protected $table = 'package_booking_data';
    protected $fillable = [
        'booking_id',
        'package_id',
        'cruise_id',
        'package_city_id',
        'adventrue_id',
        'day_number',
        'type',
    ];

    public function package(){
        return $this->belongsTo(Package::class,'package_id','id');
    }
    public function booking(){
        return $this->belongsTo(Booking::class,'booking_id','id');
    }
    public function package_city_id(){
        return $this->belongsTo(TourCity::class,'package_city_id','id');
    }
    public function adventrue_id(){
        return $this->belongsTo(PackageActivity::class,'adventrue_id','id');
    }

}
