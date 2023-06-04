<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingCityActivity extends Model
{
    protected $guarded =[];

    public function bookingCity(){
        return $this->belongsTo(BookingCity::class,'booking_city_id');

    }

    public function packageActivity()
    {
        return $this->belongsTo(PackageActivity::class);
    }
}
