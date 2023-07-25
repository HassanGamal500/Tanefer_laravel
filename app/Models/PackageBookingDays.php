<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageBookingDays extends Model
{
    protected $table = 'package_booking_days';
    protected $fillable = [
        'package_id',
        // 'package_activity_id',
        'package_city_id',
        'start',
        'day_number',
    ];

    public function package(){
        return $this->belongsTo(Package::class,'package_id','id');
    }
    // public function package_activity(){
    //     return $this->belongsTo(PackageActivity::class,'package_activity_id','id');
    // }
    public function package_city(){
        return $this->belongsTo(PackageCity::class,'package_city_id','id');
    }
}
