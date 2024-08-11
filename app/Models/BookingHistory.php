<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
    public function scopeSearch(Builder $query, $request)
    {
        if ($request->has('type')) {
            $query->where('type', $request->input('type'));
        }

        if ($request->has('date')) {
            $query->where('date', $request->input('date'));
        }


        return $query;
    }
}
