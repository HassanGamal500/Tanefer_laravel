<?php

namespace App\Http\Requests\Tours;

use App\Http\Requests\ParentRequest;

class StoreCityRequest extends ParentRequest
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
            'name' => 'required|string|min:3|max:32|unique:tour_cities,name',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            // 'airportCode' => 'nullable|exists:airports,code'
        ];
    }
}
