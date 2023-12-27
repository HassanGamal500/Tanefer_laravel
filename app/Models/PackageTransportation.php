<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageTransportation extends Model
{
   protected $table = 'package_transportations';
    protected $fillable = [
        'package_id',
        'package_city_id',
        'name',
        'min',
        'max',
        'price',
    ];

    public function package(){
        return $this->belongsTo(Package::class,'package_id','id');
    }
    public function package_city(){
        return $this->belongsTo(PackageCity::class,'package_city_id','id');
    }

}
