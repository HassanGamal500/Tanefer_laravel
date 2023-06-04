<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourBooking extends Model
{
    protected $fillable = ['tour_id','date','numberOfAdults','numberOfChildren','room_type','total_price','fullName','Nationality','email','phone'];
    
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function tour()
    {
        return $this->belongsTo('App\Models\Tour');
    }
}
