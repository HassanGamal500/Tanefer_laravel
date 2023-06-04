<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingTraveller extends Model
{
    protected $guarded =[];

    public function booking(){
        return $this->belongsTo(Booking::class,'booking_id');
    }
}
