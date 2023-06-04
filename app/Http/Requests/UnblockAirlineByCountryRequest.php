<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnblockAirlineByCountryRequest extends FormRequest
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
        ];
    }
}
