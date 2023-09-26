<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GtaZone extends Model
{
    protected $table = 'gta_zones';
    protected $fillable = [
        'name',
        'code',
        'Jpd_code',
        'parent_Jpd_code',
        'parent_code',
        'area_type'
    ];
}
