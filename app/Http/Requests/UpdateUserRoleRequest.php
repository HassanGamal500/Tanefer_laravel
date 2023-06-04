<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateUserRoleRequest extends FormRequest
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
            'action' => 'required|in:delete,add',
            'role'   => 'required|exists:roles,name'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(apiResponse(new \stdClass(),implode(',',$validator->errors()->all()),false));
    }
}
