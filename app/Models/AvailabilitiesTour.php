<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvailabilitiesTour extends Model
{
    protected $table = 'availabilities_tours';
    protected $fillable = [
        'from_date',
        'to_date',
        'package_activity_id'
    ];

    public function package_activity(){
        return $this->belongsTo('App\Models\PackageActivity','package_activity_id');
    }

    public function packageActivityPricingTiers()
    {
        return $this->hasMany(PricingTiersTour::class,'availabilities_tour_id','id');

    }

}
