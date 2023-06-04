<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageCityActivity extends Model
{
    protected $guarded =[];

    public function packageCity(){
        return $this->belongsTo(PackageCity::class,'package_city_id');
    }

    public function packageActivity(){
        return $this->belongsTo(PackageActivity::class,'package_activity_id');
    }
}
