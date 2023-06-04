<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingCitiesHotelRoom extends Model
{
    protected $fillable = [
        'room_id', 'room_type','room_occupancy','room_inclusions','room_amenities',
        'room_categories','room_max_number_of_adult','room_max_number_of_children',
        'room_season_price_per_day','total_price','duration', 'season_start_date',
        'season_end_date','booking_city_id','number_of_rooms'
    ];

    public function getRoomInclusionsAttribute($value)
    {
        return explode(',',$value);
    }

    public function setRoomInclusionsAttribute($value)
    {
        $this->attributes['room_inclusions'] = implode(',',$value);
    }

    public function getRoomAmenitiesAttribute($value)
    {
        return explode(',',$value);
    }

    public function setRoomAmenitiesAttribute($value)
    {
        $this->attributes['room_amenities'] = implode(',',$value);
    }

    public function getRoomCategoriesAttribute($value)
    {
        return explode(',',$value);
    }

    public function setRoomCategoriesAttribute($value)
    {
        $this->attributes['room_categories'] = implode(',',$value);
    }
}
