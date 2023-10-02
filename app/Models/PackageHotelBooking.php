<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageHotelBooking extends Model
{
    protected $table = 'package_hotel_bookings';
    protected $fillable = [
        'hotel_id',
        'booking_id',
        'city_id',
    ];
}
