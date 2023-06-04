<?php


namespace App\Http\Requests;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ParentRequest extends FormRequest
{
    public function failedValidation(Validator $validator)
    {
        $errors = array_values($validator->errors()->all());
        throw new HttpResponseException(
            response()->json(['message'=> 'The given data was invalid.','errors' => $errors] ,422)
        );
    }
}
