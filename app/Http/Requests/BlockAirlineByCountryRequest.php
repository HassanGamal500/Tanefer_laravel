<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BlockAirlineByCountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->isJson();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'country_code' => 'required|exists:airports,country',
            'airlines_codes' => 'required|array',
            'airlines_codes.*' => ['required','unique:exclude_airlines,airline_code,NULL,id,country_code,'.$this->country_code]
        ];
    }

    public function validationData()
    {
        return $this->post();
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(apiResponse([],implode(',',$validator->errors()->all()),false));
    }
}
