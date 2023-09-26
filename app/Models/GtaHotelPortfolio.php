<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GtaHotelPortfolio extends Model
{
    protected $table = 'gta_hotel_portfolios';
    protected $fillable = [
        'name',
        'Jpd_code',
        'has_synonyms',
        'address',
        'zip_code',
        'latitude',
        'longitude',
        'zone_id',
        'hotel_category_id',
        'city_id',
    ];

    public function zone()
    {
        return $this->belongsTo(GtaZone::class,'zone_id','id');
    }

    public function hotel_category()
    {
        return $this->belongsTo(GtaHotelCatalogue::class,'hotel_category_id','id');
    }

    public function city()
    {
        return $this->belongsTo(GtaCity::class,'city_id','id');
    }


}
