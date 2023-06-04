<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TourCity extends Model
{
    protected $fillable = [
        'name','airport_code','description','image','image_alt','image_caption'
    ];

    protected $hidden = [
        'created_at', 'updated_at','code','countryCode','countryName'
    ];

    public function tours()
    {
        return $this->belongsToMany('App\Models\Tour', 'tour_cities_tours', 'tour_city_id', 'tour_id');
    }

    public function airport()
    {
        return $this->belongsTo(Airport::class,'airport_code','code');
    }

    public function getImageAttribute($value)
    {
        return is_null($value) ? null : Storage::url($value);
    }
}
