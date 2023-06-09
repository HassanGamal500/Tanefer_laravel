<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingTiersTour extends Model
{
    protected $table = 'pricing_tiers_tours';
    protected $fillable = [
        'name',
        'min',
        'max',
        'adult_price',
        'child_percentage',
        'availabilities_tour_id',
        'package_activity_id',
    ];

    public function availabilities_tour(){
        return $this->belongsTo('App\Models\AvailabilitiesTour','availabilities_tour_id','id');
    }
    public function package_activity(){
        return $this->belongsTo('App\Models\PackageActivity','package_activity_id','id');
    }
}
