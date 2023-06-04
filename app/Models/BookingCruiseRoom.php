<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingCruiseRoom extends Model
{
    protected $fillable = [
        'room_id','price_per_day','total_price','booking_id'
    ];

    public function room()
    {
        return $this->belongsTo(PackageHotelRoom::class,'room_id','id');
    }
}
