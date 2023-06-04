<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model
{
    protected $fillable = [
        'booking_number','trip_id','contact_name_person','contact_phone','contact_email',
        'payment_auth_code','payment_transaction_id','total_amount','hotel_name','hotel_code','booking_status','payment_status',
        'client_reference','user_id','tbo_booking_status','last_cancellation_deadline','client_id','paid_price','price_change_factor',
        'hotel_booking_status_id','payment_status_id','payment_type','booked_from_id'
    ];


    public function hotelRooms()
    {
        return $this->hasMany(HotelBookingRoom::class);
    }

    public function hotelGuests()
    {
        return $this->hasMany(HotelBookingGuest::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function bookedFrom()
    {
        return $this->belongsTo(Client::class,'booked_from_id');
    }

    public function hotelBookingStatus()
    {
        return $this->belongsTo(HotelBookingStatus::class);
    }

    public function paymentStatus()
    {
        return $this->belongsTo(PaymentStatus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
