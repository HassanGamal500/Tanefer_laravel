<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourExtraActivity extends Model
{
    protected $fillable = ['tour_id', 'title','price','image','duration'];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
    
    public function tour()
    {
        return $this->belongsTo('App\Models\Tour');
    }
}
