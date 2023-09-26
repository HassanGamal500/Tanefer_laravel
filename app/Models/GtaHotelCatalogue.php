<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GtaHotelCatalogue extends Model
{
    protected $table = 'gta_hotel_catalogues';
    protected $fillable = [
        'name',
        'type',
        'catalogue_type',
    ];
}
