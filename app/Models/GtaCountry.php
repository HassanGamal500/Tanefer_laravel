<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GtaCountry extends Model
{
    protected $table = 'gta_countries';
    protected $fillable = [
        'name',
        'code',
        'Jpd_code',
        'area_type'
    ];
}
