<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ParentRequest;

class PackageHotelSeasonRequest extends ParentRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'start_date'   => 'required|date|after_or_equal:today' ,
            'end_date'     => 'required|date|after:start_date' ,
        ];
    }
}
