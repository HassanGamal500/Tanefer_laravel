<?php

namespace App\Http\Requests\Tours;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreTourRequest extends FormRequest
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
            'name'  => 'required|string|min:3|max:100',
            'duration' => 'required|string|min:3|max:50',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:1024',
            'meals' => 'nullable|string|min:2|max:50',
            'description' => 'nullable|string|min:10',
            'city_ids' => 'required|array',
            'city_ids.*' => 'exists:tour_cities,id',
        ];
    }

    public function failedValidation(Validator $validator)
    { 
        $errors = array_values($validator->errors()->all());
        throw new HttpResponseException(
            response()->json(['message'=> 'The given data was invalid.','errors' => $errors] ,422)
        ); 
    }
}
