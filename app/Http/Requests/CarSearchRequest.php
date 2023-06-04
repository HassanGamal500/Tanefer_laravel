<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CarSearchRequest extends FormRequest
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
            'pickUpDate' => 'required|date|date_format:Y-m-d|after:now',
            'pickUpTime' => 'required|date_format:H:i',
            'returnDate' => 'required|date|date_format:Y-m-d|after:pickUpDate',
            'returnTime' => 'required|date_format:H:i',
            'pickUpLocation' => 'required',
            'sortOrder'  => 'required|in:DESC,ASC',
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(apiResponse([],implode(',',$validator->errors()->all()),false));
    }
}
