<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageAvailability extends Model
{
    protected $table = 'package_availabilities';
    protected $fillable = [
        'from_date',
        'to_date',
        'days',
        'package_id'
    ];

    public function package(){
        return $this->belongsTo(Package::class,'package_id','id');
    }


}
