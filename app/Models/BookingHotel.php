<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingHotel extends Model
{
    protected $guarded =[];

    public function booking(){
        return $this->belongsTo(Booking::class, 'booking_id');
    }
    
    public function hotel()
    {
        return $this->belongsTo(GtaHotelPortfolio::class, 'hotel_id', 'id');
    }
}
