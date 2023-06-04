<?php

namespace App\Http\Requests;

use App\Models\Client;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
        $client = resolve('client');
        $mainClient = $client->parentClient ?? $client;

        return [
            'name'     => 'required|string|max:191',
            'email'    => app()->environment('production')
             ? 'required|string|max:191|unique:users,email,NULL,id,client_id,'.$mainClient->id:
              'required|string|max:191|unique:users',
            'password' => 'required|string|min:8|max:100',
            'phone' => 'required|numeric|phone:countryIsoCode',
            'countryIsoCode' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'phone' => 'The :attribute field contains an invalid number.'
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
