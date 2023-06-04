<?php

namespace App\Rules;

use App\Models\PackageHotel;
use Illuminate\Contracts\Validation\Rule;

class AvailableRoomInHotelPackage implements Rule
{
    protected $roomGuests;
    protected $hotelName;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($roomGuests)
    {
        $this->roomGuests = $roomGuests;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $hotel = PackageHotel::find($value);

        if(is_null($hotel)){
            return  true;
        }
        $this->hotelName = $hotel->name;
        foreach ($this->roomGuests as $roomGuest) {
            $rooms = $hotel->packageHotelRooms()->where('max_num_adult', '>=', $roomGuest['adults'])
                ->where('max_num_children', '>=', $roomGuest['children'])
                ->get();
            if(count($rooms) == 0){
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Hotel '.$this->hotelName.' has not rooms with selected occupancy';
    }
}
