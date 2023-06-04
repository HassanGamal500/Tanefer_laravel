<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CarBookRequest extends FormRequest
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
            'contact_phone'   =>
                auth()->guard('api')->check() && ! auth()->guard('api')->user()->hasRole(['admin','subAgent'])?'':'required|min:5',
            'contact_email'   =>
                auth()->guard('api')->check() && ! auth()->guard('api')->user()->hasRole(['admin','subAgent']) ? 'email':'required|email',
            'driverTitle'     => 'required|in:Mr,Mrs,Miss,Ms',
            'driverFirstName' => 'required|min:2|alpha',
            'driverLastName'  => 'required|min:2|alpha',
            'zipCode'         => 'required_without_all:redeem,cash',
            'address'         => 'required_without_all:redeem,cash|string|max:50',
            'creditCardExpireDate' => 'required_without_all:redeem,cash|date_format:Y-m',
            'creditCardNumber' => 'required_without_all:redeem,cash|between:13,19',
            'cardHolderName'   => 'required_without_all:redeem,cash',
            'creditCardType'   => 'required_without_all:redeem,cash',
            'pickupDate' => 'required|date|date_format:Y-m-d|after:now',
            'pickupTime' => 'required|date_format:H:i',
            'returnDate' => 'required|date|date_format:Y-m-d|after:pickUpDate',
            'returnTime' => 'required|date_format:H:i',
            'search_id'  => 'required',
            'car_id'     => 'required',
            'redeem'     => 'required_without_all:creditCardNumber,cash'

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
