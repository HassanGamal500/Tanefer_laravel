<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'email' => $this->uniqueEmail(),
            'client_id' => 'required|exists:clients,id',
            'role'   => 'required|string|exists:roles,name'
        ];
    }

    private function uniqueEmail()
    {
        $client = resolve('client');

        if($this->method == 'post'){
            $validation = 'required|email|min:3|max:191|unique:users,email,NULL,id,client_id,'.$client->id;
        }else{
            $id = (int)$this->route()->parameter('user');
            $validation = ['required','email','string','min:3','max:191',Rule::unique('users','email')->ignore($id)
            ->where(function ($query) use ($client){
                return $query->where('client_id',$client->id);
            })];
        }

        return $validation;
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(apiResponse(new \stdClass(),implode(',',$validator->errors()->all()),false));
    }


}
