<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ParentRequest;
use Illuminate\Validation\Rule;

class PackageHotelChildrenRequest extends ParentRequest
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
         $rules = [
            'hotel_id'              => 'required',
            'occupancy'              => 'required',
            'first_child'           => 'required',
            'second_child'          => 'required',

        ];
        return  $rules;
    }

}

