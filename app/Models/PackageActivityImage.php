<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class PackageActivityImage extends Model
{
    protected $fillable = ['image','package_activity_id'];

    public function getImageAttribute($value)
    {
        return is_null($value) ? null :  asset('storage/' . $value);
    }
}
