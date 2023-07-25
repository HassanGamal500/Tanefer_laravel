<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageBookingadventrue extends Model
{
    protected $table = 'package_bookingadventrues';
    protected $fillable = [
        'package_id',
        'package_day_id',
        'package_city_id',
        'adventrue_id',
    ];

    public function package(){
        return $this->belongsTo(Package::class,'package_id','id');
    }
    public function package_city(){
        return $this->belongsTo(PackageCity::class,'package_city_id','id');
    }
}
