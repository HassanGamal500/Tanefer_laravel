<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SingleTravllerNumber implements Rule
{
    protected $roomGuests;
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
        if(is_null($value)){
            return true;
        }

        $adults = 0;
        foreach ($this->roomGuests as $roomGuest){
            $adults += $roomGuest['adults'];
        }

        return $value < $adults;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Single Supplement travellers number must be less than number of adults';
    }
}
