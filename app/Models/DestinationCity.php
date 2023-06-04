<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestinationCity extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'code';
    protected $fillable = [
        'code','cityName','countryName','countryCode','hotel_name','hotel_address','hotel_latitude','hotel_longitude',
        'hotel_star_rating','city_code'
    ];
}
