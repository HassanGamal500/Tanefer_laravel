<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Cruise extends Model
{
    protected $fillable = [
        'name', 'cruise_line', 'ship_name','facilities','description','policies','excludes',
        'includes','stars','master_image','number_of_nights','start_days','seo_title','seo_description','slug','featured_image', 'sort'
    ];

    public function rooms()
    {
        return $this->morphMany(PackageHotelRoom::class,'model');
    }

    public function images()
    {
        return $this->hasMany(CruiseImage::class)->orderBy('sort', 'ASC');
    }

    public function cruiseChildrenPackage(){
        return $this->hasMany(CruiseChildrenPackage::class,'package_hotel_room_id');
    }
    public function packageHotelRoom(){
        return $this->hasMany(PackageHotelRoom::class,'model_id');
    }

    public function cities()
    {
        return $this->belongsToMany(
           TourCity::class,
            'cruise_tour_city',
           'cruise_id',
           'tour_city_id'
        )->withPivot('is_start');
    }

    public function packageHotelChildren()
    {
        return $this->morphMany(PackageHotelChildren::class,'model');
    }

    public function getMasterImageAttribute($value)
    {
        return URL::to('storage/' . $this->attributes['master_image']);
    }

    public function getFacilitiesAttribute($value)
    {
        return is_null($value) ? [] :  explode(',',$value);
    }

    public function getPoliciesAttribute($value)
    {
        return is_null($value) ? [] :  explode(',',$value);
    }

    public function getExcludesAttribute($value)
    {
        return is_null($value) ? [] :  explode(',',$value);
    }

    public function getIncludesAttribute($value)
    {
        return is_null($value) ? [] :  explode(',',$value);
    }

    public function getStartDaysAttribute($value)
    {
        return is_null($value) ? [] :  explode(',',$value);
    }

}
