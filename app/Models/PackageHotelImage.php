<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class PackageHotelImage extends Model
{
    protected $guarded =[];

    public function packageHotle(){
        return $this->belongsTo(PackageHotel::class,'package_hotel_id');
    }

    public function getImageAttribute(){
        return    URL::to('storage/' . $this->attributes['image']);
    }
}
