<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageCityTransportation extends Model
{
    const transportationType = ['limousine','sleeping-train','flight','bus','hi-aca','coaster'];
    protected $guarded =[];

    public function packageCity(){
        return $this->belongsTo(PackageCity::class,'package_city_id');
    }

    public function destinationCity(){
        return $this->belongsTo(TourCity::class,'destination_city_id','id');

    }
}
