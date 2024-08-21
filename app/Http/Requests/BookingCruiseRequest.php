<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingCruiseRequest extends FormRequest
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
    // rules for contact_phone changed temporary
    public function rules()
    {
        return [
            'roomGuests'    => 'required|array',
            'roomGuests.*.adults' => 'required|integer',
            'roomGuests.*.children' => 'required|integer',
            'session_id' => 'required',
            'contact_person_name' => 'nullable',
            'contact_name'  => 'required',
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable',
            'address'       => 'nullable',
            'zip_code'      => 'nullable',
            'passengerDetails' => 'required|array',
            // 'passengerDetails.*.passengerType' => 'required|in:ADT,CNN,CHD,INF',
            // 'passengerDetails.*.passengerTitle' => 'required',
            // 'passengerDetails.*.passengerGender' => 'required|in:M,F',
            // 'passengerDetails.*.passengerFirstName' => 'required',
            // 'passengerDetails.*.passengerLastName'  => 'required',
            // 'passengerDetails.*.date_of_birth'      => 'required|date|date_format:Y-m-d',
            // 'passengerDetails.*.passport_number'    => 'required',
            // 'passengerDetails.*.passport_expire_date' => 'required|date|date_format:Y-m-d',
            // 'passengerDetails.*.passport_issue_country' => 'required',
            'start_date' => 'required|date|date_format:Y-m-d',
        ];
    }
}
