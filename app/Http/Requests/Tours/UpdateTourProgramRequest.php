<?php

namespace App\Http\Requests\Tours;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateTourProgramRequest extends FormRequest
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
            'tour_id' => 'exists:tours,id',
            'title' => 'string|min:3',
            'schedule' => 'string|min:5',
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
