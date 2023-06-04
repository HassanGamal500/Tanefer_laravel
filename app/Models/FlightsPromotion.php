<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlightsPromotion extends Model
{
    protected $fillable = [
      'origin_code', 'destination_code','week_number','origin_img','destination_img','departure_date','return_date',
      'lowest_fare','discount_amount','client_id'
    ];


    public function origin()
    {
        return $this->belongsTo(Airport::class,'origin_code','code');
    }

    public function destination()
    {
        return $this->belongsTo(Airport::class,'destination_code','code');
    }

    public function getOriginImageUrlAttribute()
    {
        return is_null($this->origin_img)?null:asset('images/flightsCities/'.$this->origin_img);
    }

    public function getDestinationImageUrlAttribute()
    {
        return is_null($this->destination_img)?null:asset('images/flightsCities/'.$this->destination_img);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
