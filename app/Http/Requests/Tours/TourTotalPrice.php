<?php

namespace App\Http\Requests\Tours;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class TourTotalPrice extends FormRequest
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
            'adults' => 'required|numeric',
            'children' => 'nullable|numeric',
            'ExtraPrices' => 'nullable|array',
            'type' => [
                'required',
                Rule::in(['Single', 'Double','Triple']),
            ]
            //'ExtraPrices.*' => 'numeric'
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
