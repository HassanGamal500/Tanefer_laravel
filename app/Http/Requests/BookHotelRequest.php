<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BookHotelRequest extends FormRequest
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
            'guestNationality' => 'required',
            'sessionId'        => 'required',
            'numberOfRooms'    => 'required|numeric',
            'hotelIndex'       => 'required',
            'hotelName'        => 'required',
            'hotelCode'        => 'required',
            'guests'           => 'array',
            'guests.*.isLead'  => 'required|boolean',
            'guests.*.title'   => 'required|in:Mr,Mrs,Miss,Ms',
            'guests.*.guestType'=> 'required|in:Adult,Child',
            'guests.*.InRoom'   => 'required|integer',
            'guests.*.childAge' => 'required_if:guests.*.guestType,Child',
            'guests.*.firstName' => 'required|string|min:2|max:20|alpha_num',
            'guests.*.lastName'  => 'required|string|min:2|max:20|alpha_num',
            'rooms'              => 'array',
            'rooms.*.roomIndex'  => 'required|numeric',
            'rooms.*.roomType'   => 'required',
            'rooms.*.roomCode'   => 'required',
            'rooms.*.ratePlanCode' => 'required',
            'rooms.*.roomFare'     => 'required|numeric',
            'rooms.*.currency'     => 'required',
            'rooms.*.roomTax'      => 'required|numeric',
            'rooms.*.totalFare'    => 'required|numeric',
//            'creditCardInfo.card_number' => 'required_without_all:redeem|between:13,19',
//            'creditCardInfo.card_expiry_date' => 'required_without_all:redeem|date|date_format:Y-m',
//            'creditCardInfo.card_code' => 'required_without_all:redeem|between:3,5',
            'phoneNumber'           =>
                auth()->guard('api')->check() && ! auth()->guard('api')->user()->hasRole(['admin','subAgent'])?'':'required',
            'email'                 =>
                auth()->guard('api')->check() && ! auth()->guard('api')->user()->hasRole(['admin','subAgent'])?'':'required|email',
            //'redeem'                => 'required_without_all:creditCardInfo.card_number'
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
