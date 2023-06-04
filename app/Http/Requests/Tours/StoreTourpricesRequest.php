<?php

namespace App\Http\Requests\Tours;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreTourpricesRequest extends FormRequest
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
            'prices' => 'required|array',
            'prices.*.numberOfPassenger' => 'required|numeric',
            'prices.*.adult_price' => 'required|numeric',
            'prices.*.child_price' => 'required|numeric',
            'prices.*.start_date' => 'nullable|date',
            'prices.*.end_date' => 'nullable|date',
            'prices.*.room_type' => [
                'required',
                Rule::in(['Single', 'Double','Triple']),
            ]
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
