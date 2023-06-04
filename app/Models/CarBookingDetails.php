<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarBookingDetails extends Model
{
    protected $fillable = [
        'vendor','car_type','pickup_location','return_location','pickup_date','pickup_time',
        'return_date','return_time','extra_day_charge','extra_hour_charge','pnr_id'
    ];
}
