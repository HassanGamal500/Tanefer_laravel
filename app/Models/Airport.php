<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'code';
    protected $fillable = [
        'name','code','city','countryName','country','availability','blacklisted','location_type','city_code'
    ];



    public function scopeAirport($query,$code)
    {
        return $query->where('code',$code);
    }

    public function airports()
    {
        return $this->hasMany(Airport::class,'city_code','code');
    }
}
