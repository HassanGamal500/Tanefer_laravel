<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GtaRegion extends Model
{
    protected $table = 'gta_regions';
    protected $fillable = [
        'name',
        'code',
        'Jpd_code',
        'parent_Jpd_code',
        'parent_code',
        'area_type'
    ];
}
