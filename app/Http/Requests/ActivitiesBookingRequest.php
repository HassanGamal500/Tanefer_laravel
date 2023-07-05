<?php

namespace App\Http\Requests;

use App\Rules\ActivitiesTotalPrice;
use Illuminate\Foundation\Http\FormRequest;

class ActivitiesBookingRequest extends ParentRequest
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
            'contact_name'                => 'required',
            'contact_phone'               => 'required',
            'contact_email'               => 'required|email',
            'total_price'                 => ['required','numeric'],
            "passengerDetails"            => "required",
            'passengerDetails.passengerTitle'         => 'required|string',
            'passengerDetails.passengerFirstName'     => 'required|min:2',
            'passengerDetails.passengerLastName'      => 'required|min:2',
            'passengerDetails.passengerType'          => 'required|string',
            'passengerDetails.passengerGender'        => 'required|string',
            'passengerDetails.date_of_birth'          => 'required|date|date_format:Y-m-d',
            'passengerDetails.passport_number'        => 'required|numeric',
            'passengerDetails.passport_expire_date'   => 'required|date|date_format:Y-m-d',
            'passengerDetails.passport_issue_country' => 'required|string',
            'activities'                   => 'required|array',
            'activities.*.activity_id'     => 'required|exists:App\Models\PackageActivity,id',
            'activities.*.date'                   => 'required|date|date_format:Y-m-d',
            'adults'                              => 'required|numeric',
            'children'                            => 'nullable|numeric',
        ];
    }
}
