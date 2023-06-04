<?php


namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GetOneFlightRequest extends FormRequest
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
            'flight_id' => 'required',
            'search_id' => 'required'
        ];

    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(apiResponse(new \stdClass(),implode(',',$validator->errors()->all()),false));
    }



}
