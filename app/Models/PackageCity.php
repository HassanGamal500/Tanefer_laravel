<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageCity extends Model
{
    protected $guarded =[];

    public function package(){
        return $this->belongsTo(Package::class,'package_id');
    }

    public function tourCity(){
        return $this->belongsTo(TourCity::class,'tour_city_id');
    }

    public function packageCityHotel(){
        return $this->hasMany(PackageCityHotel::class,'package_city_id');
    }
    public function packageCityActivity(){
        return $this->hasMany(PackageCityActivity::class,'package_city_id');
    }
    public function packageCityTrasportation(){
        return $this->hasMany(PackageCityTransportation::class,'package_city_id');
    }

    public function activities()
    {
        return $this->belongsToMany(PackageActivity::class,'package_city_activities'
        ,'package_city_id','package_activity_id')->withPivot('day_number');
    }

    public function cruise()
    {
        return $this->belongsTo(Cruise::class);
    }
}
