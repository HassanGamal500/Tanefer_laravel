<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingHistory extends Model
{
    protected $guarded =[];

    public function booking(){
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
