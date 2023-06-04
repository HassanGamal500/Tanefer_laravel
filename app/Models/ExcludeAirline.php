<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExcludeAirline extends Model
{
    protected $fillable = ['country_code','airline_code','exclude_for_net'];
}
