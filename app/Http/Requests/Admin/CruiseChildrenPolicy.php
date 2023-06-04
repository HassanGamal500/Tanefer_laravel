<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ParentRequest;

class CruiseChildrenPolicy extends ParentRequest
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
            'cruise_id'              => 'required|exists:cruises,id',
            'occupancy'              => 'required',
            'first_child'           => 'required',
            'second_child'          => 'required',
        ];
    }
}
