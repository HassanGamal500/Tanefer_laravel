<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pnr extends Model
{
    protected $fillable = [
        'pnr_id','contact_person','contact_email','contact_phone','status_id','user_id','price','currency','type','client_id',
        'paid_price','price_change_factor','payment_type','booked_from_id','ticket_number','lastDateToPurchase'
    ];

    protected $with = ['flightSegments','passengerDetails','status'];


    public function flightSegments()
    {
        return $this->hasMany(FlightSegment::class);
    }

    public function passengerDetails()
    {
        return $this->hasMany(PassengerDetail::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function carBookingDetails()
    {
        return $this->hasMany(CarBookingDetails::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function bookedFrom()
    {
        return $this->belongsTo(Client::class,'booked_from_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
