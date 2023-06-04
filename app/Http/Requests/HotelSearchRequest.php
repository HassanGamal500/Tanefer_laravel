<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class HotelSearchRequest extends FormRequest
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
            'checkIn' => 'required|date|after:now',
            'checkOut'=> 'required|date',
            'numberOfRooms' => 'required|numeric',
            'name' => 'required|string',
            'code'      => 'required',
            'isHotel' => 'required|boolean',
            'guestNationality' => 'required',
            'starRating' => 'required',
            'roomGuests'    => 'required|array',
            'roomGuests.*.adults' => 'required|numeric|min:1',
            'roomGuests.*.children' => 'numeric|required_with:roomGuests.*.childAge',
            'roomGuests.*.childAge' => 'array|required_with:roomGuests.*.children',
            'roomGuests.*.childAge.*' => 'numeric|min:1|max:12'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(apiResponse([],implode(',',$validator->errors()->all()),false));
    }
}
