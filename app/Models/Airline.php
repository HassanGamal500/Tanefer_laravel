<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    protected $fillable = [
        'airline_name','airline_code','blacklisted','baggage_url'
    ];


    public function scopeAirline($query, $code)
    {
        return $query->where('airline_code',$code);
    }
}
