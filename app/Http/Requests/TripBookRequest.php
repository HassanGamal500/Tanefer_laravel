<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripBookRequest extends FormRequest
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
        if(auth()->guard('api')->check()){
           $userDetailsValidation = [];
        }else{
            $userDetailsValidation = [
                'name' => 'required|string|min:3|max:191',
                'email' => 'required|email',
                'phone' => 'required|numeric|phone:countryIsoCode',
                'countryIsoCode' => 'required',
            ];
        }
        return array_merge($userDetailsValidation,[
            'tripTitle' => 'required|string|min:3|max:191',
            'countryName' => 'required|string|min:3|max:191',
            'adults' => 'required|integer',
            'children' => 'integer',
            'message' => 'string|min:3|max:191'
        ]);
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
