<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageGtaHotel extends Model
{
    protected $table = 'package_gta_hotels';
    protected $fillable = [
        'city_id',
        'hotel_id',
        'package_id',
        'package_city_id',
        'type',
    ];

    public function city()
    {
        return $this->belongsTo(GtaCity::class,'city_id','id');
    }
    public function hotel()
    {
        return $this->belongsTo(GtaHotelPortfolio::class,'hotel_id','id');
    }

}
