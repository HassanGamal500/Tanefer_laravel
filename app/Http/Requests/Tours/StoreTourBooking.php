<?php

namespace App\Http\Requests\Tours;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreTourBooking extends FormRequest
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
            'tour_id' => 'required|exists:tours,id',
            'date' => 'required|date',
            'numberOfAdults' => 'required|numeric',
            'numberOfChildren' => 'nullable|numeric',
            'room_type' => [
                'required',
                Rule::in(['Single', 'Double','Triple']),
            ],
            'total_price' => 'required|numeric',
            'fullName' => 'required|string|min:3|max:50',
            'Nationality' => 'nullable|string|min:3|max:50',
            'email' => 'required|email',
            'phone' => 'required',
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
