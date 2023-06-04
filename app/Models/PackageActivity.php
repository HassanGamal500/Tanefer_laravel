<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class PackageActivity extends Model
{
    const activityType = ['sightseeing','camping','cruise'];
    const activityDurationType = ['hour','day','week'];

    protected $guarded = [] ;

    public function tourCity(){
        return $this->belongsTo(TourCity::class , 'tour_city_id');
    }

    public function packageActivitySideActivity(){
        return $this->hasMany(PackageActivitySideActivity::class,'package_activity_id','id');
    }

    public function getImageAttribute()
    {
        if(is_null($this->attributes['image'])){
            return null;
        }else{
            return    URL::to('storage/' . $this->attributes['image']);
        }
    }

    public function packageActivityImages()
    {
        return $this->hasMany(PackageActivityImage::class);
    }

    public function seasons()
    {
        return $this->morphMany(Season::class,'model');
    }
}
