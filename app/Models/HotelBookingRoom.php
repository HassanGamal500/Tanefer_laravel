<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelBookingRoom extends Model
{
    protected $fillable = [
        'room_type','room_code','base_fare','tax','total_fare','currency','hotel_booking_id'
    ];
}
