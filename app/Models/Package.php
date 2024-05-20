<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Package extends Model
{
    protected $guarded =[];

    public function packageCity(){
        return $this->hasMany(PackageCity::class,'package_id');
    }

    public function gtaHotel(){
        return $this->hasMany(PackageGtaHotel::class,'package_id');
    }

    public function packageAbilities(){
        return $this->hasMany(PackageAvailability::class,'package_id');
    }
    public function packageAdventuredays(){
        return $this->hasMany(PackageBookingDays::class,'package_id');
    }
    public function packageAdventure(){
        return $this->hasMany(PackageBookingadventrue::class,'package_id');
    }
    public function packageTransportations(){
        return $this->hasMany(PackageCityTransportation::class,'package_id');
    }

    public function packageCities()
    {
        return $this->belongsToMany(TourCity::class,'package_cities'
            ,'tour_city_id',  'package_id');
    }

    public function packageChildrenPolicies(){
        return $this->hasOne(ChildrenPackagePolicy::class,'package_id');
    }

    public function packageHotel(){
        return $this->hasManyThrough(PackageCityHotel::class,PackageCity::class,'package_id','package_city_id','id','id');
    }
    public function packageActivity(){
        return $this->hasManyThrough(PackageCityActivity::class,PackageCity::class,'package_id','package_city_id');
    }
    public function packageTrasportation(){
        return $this->hasManyThrough(PackageCityTransportation::class,PackageCity::class,'package_id','package_city_id');
    }

    public function seasons()
    {
        return $this->morphMany(Season::class,'model');
    }

    public function startCity(){
        return $this->packageCity()->where('start',1);
    }
    public function getImageAttribute(){
        return    URL::to('storage/' . $this->attributes['image']);
    }

    public function packageImages()
    {
        return $this->hasMany(PackageImage::class)->orderBy('sort', 'ASC');
    }

    public function slugHistories()
    {
        return $this->hasMany(PackageSlugHistory::class);
    }

    public function cruise()
    {
        return $this->belongsTo(Cruise::class);
    }
}
