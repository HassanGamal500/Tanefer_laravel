<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:191',
            'urlOrSecret'  => $this->UrlValidation(),
            'email'        => 'required|string|email|min:3|max:191',
            'emailTo'      => 'required|string|email|min:3|max:191',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(apiResponse([],implode(',',$validator->errors()->all()),false));
    }

    protected function UrlValidation()
    {
        if($this->method == 'post'){
            $validation = 'required|string|min:3|max:191|unique:clients,url';
        }else{
            $id = (int)$this->route()->parameter('client');
            $validation = ['required','string','min:3','max:191',Rule::unique('clients','url')->ignore($id)];
        }

        return $validation;
    }
}
