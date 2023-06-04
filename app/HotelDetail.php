<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelDetail extends Model
{
    protected $fillable = [
        'code','name','star','address','near_by_places','description','country','city',
        'phone','fax','pinCode','map_latitude','map_longitude','facilities','tripAdivsorRating',''
    ];

    public function images()
    {
        return $this->hasMany(HotelImage::class,'hotel_id','id');
    }
}
