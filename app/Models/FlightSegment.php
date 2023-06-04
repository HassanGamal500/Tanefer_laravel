<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlightSegment extends Model
{
    protected $fillable = [
        'flight_number','airline','departure_location',
        'departure_date','departure_time',
        'arrival_location','arrival_date',
        'arrival_time','flight_duration','pnr_id'
    ];

    public function pnr()
    {
        return $this->belongsTo(Pnr::class);
    }
}
