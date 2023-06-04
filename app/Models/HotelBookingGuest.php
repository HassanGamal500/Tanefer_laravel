<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelBookingGuest extends Model
{
    protected $fillable = [
        'isLead','title','first_name','last_name','hotel_booking_id'
    ];
}
;
