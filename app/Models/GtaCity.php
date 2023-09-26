<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GtaCity extends Model
{
    protected $table = 'gta_cities';
    protected $fillable = [
        'name',
        'code',
        'Jpd_code',
        'parent_Jpd_code',
        'parent_code',
        'area_type'
    ];
}
