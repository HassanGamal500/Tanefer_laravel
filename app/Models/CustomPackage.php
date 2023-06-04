<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomPackage extends Model
{
    protected $fillable = [
        'custom_package_id',
        'package'
    ];
}
