<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourPrice extends Model
{
    protected $fillable = ['tour_id','numberOfPassenger','adult_price','child_price','start_date','end_date','repeat','room_type'];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
    
    public function tour()
    {
        return $this->belongsTo('App\Models\Tour');
    }

    public function scopeOfPax($query,$number)
    {
        return $query->where('numberOfPassenger', $number);
    }
    public function scopeOfType($query,$type)
    {
        return $query->where('room_type', $type);
    }
}
