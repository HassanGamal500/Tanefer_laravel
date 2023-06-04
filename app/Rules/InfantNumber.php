<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class InfantNumber implements Rule
{
    public $adults;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($adults)
    {
        $this->adults = $adults;
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
        if($this->adults < $value){
            return false;
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
        return 'Number of Adults must be greater than or equal number of infants';
    }
}
