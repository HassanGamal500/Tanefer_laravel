<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMailToBookRequest extends FormRequest
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
            'search_id' => 'required',
            'flight_id' => 'required',
            'name' => 'required|string|min:3|max:191',
            'email' => 'required|email',
            'phone' => 'required|numeric|phone:countryIsoCode',
            'countryIsoCode' => 'required',
        ];
    }

    public function validationData()
    {
        return $this->post();
    }

    public function messages()
    {
        return [
            'phone' => 'The :attribute field contains an invalid number.'
        ];
    }
}
