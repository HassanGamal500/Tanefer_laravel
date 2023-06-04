<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingCompleteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "bookingDetails"              => "required|array|min:1",
            "passengerDetails"            => "required|array|min:1",
            "bookingDetails.contact_email" => 'required|email'
//            'creditCardInfo.card_number' => 'required_without_all:redeem|between:13,19',
//            'creditCardInfo.holder_name' => 'required',
//            'creditCardInfo.card_expiry_date' => 'required_without_all:redeem|date|date_format:Y-m',
//            'creditCardInfo.card_code' => 'required_without_all:redeem|between:3,5',
//            'creditCardInfo.zipCode' => 'required',
//            'creditCardInfo.address' => 'required'
        ];
    }
}
