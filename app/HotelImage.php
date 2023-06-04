<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelImage extends Model
{
    protected $fillable = [
        'image_url','hotel_id'
    ];
}
