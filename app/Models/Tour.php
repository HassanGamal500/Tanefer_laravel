<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = ['name','duration','rating','image','client_id','meals','description'];
    
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function cities()
    {
        return $this->belongsToMany('App\Models\TourCity', 'tour_cities_tours', 'tour_id', 'tour_city_id');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
    public function tourChildrenPolicies()
    {
        return $this->hasMany('App\Models\TourChildrenPolicy');
    }
    public function tourExtraActivities()
    {
        return $this->hasMany('App\Models\TourExtraActivity');
    }
    public function tourImages()
    {
        return $this->hasMany('App\Models\TourImage');
    }
    public function tourPlaces()
    {
        return $this->hasMany('App\Models\TourPlace');
    }
    
    
    public function tourPrices()
    {
        return $this->hasMany('App\Models\TourPrice');
    }
    public function tourPrograms()
    {
        return $this->hasMany('App\Models\TourProgram');
    }
    public function tourServices()
    {
        return $this->hasMany('App\Models\TourService');
    }
    public function tourExclusions()
    {
        return $this->hasMany('App\Models\TourExclusion');
    }
    public function tourInclusions()
    {
        return $this->hasMany('App\Models\TourInclusion');
    }

    public function tourBookings()
    {
        return $this->hasMany('App\Models\TourBooking');
    }
}
