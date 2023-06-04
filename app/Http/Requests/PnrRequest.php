<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PnrRequest extends FormRequest
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
        //custom validation of passport expiration date
        if(file_exists(storage_path('app/public/searchResults/'.$this->search_id.'.json'))){
            $flights = json_decode(Storage::get('searchResults/'.$this->search_id.'.json'),true);

            if(key_exists($this->flight_id,$flights)){
                $flight = $flights[$this->flight_id];
                $lastSegment = end(end($flight['flightSegments'])['Segments']);
                $arrivalDate =  $lastSegment['ArrivalDate'];
                $after_months = now()->parse($arrivalDate)->addMonths(6);
            }
            else
            {
                $after_months  = 0;
            }
        }else{
            $after_months  = 0;
        }


        return [
            'search_id'                                 => 'required',
            'flight_id'                                 =>  'required',
            'contact_person_name'                       =>
                auth()->guard('api')->check() && ! auth()->guard('api')->user()->hasRole(['admin','subAgent'])?'':'required|min:2',
            'contact_email'                             =>
                auth()->guard('api')->check() && ! auth()->guard('api')->user()->hasRole(['admin','subAgent']) ?'':'required|email',
            'contact_phone'                             =>
                auth()->guard('api')->check() && ! auth()->guard('api')->user()->hasRole(['admin','subAgent']) ?'':
                    'required|numeric|phone:countryIsoCode',
            'countryIsoCode' => 'required_with:contact_phone',
            'creditCardNumber'                          => 'required_without_all:redeem,cash|between:13,19',
            'creditCardExpireDate'                      => 'required_without_all:redeem,cash|date_format:Y-m',
            'creditCardType'                            => 'required_without_all:redeem,cash',
            'passengerDetails'                          => 'required|array',
            'passengerDetails.0.passengerType'          => 'in:ADT',
            'passengerDetails.*.passengerType'          => 'required|in:ADT,CNN,INF,CHD',
            'passengerDetails.*.passengerGender'        => 'in:M,F',
            'passengerDetails.*.passengerTitle'         => 'required|string',
            'passengerDetails.*.passengerFirstName'     => 'required|min:2',
            'passengerDetails.*.passengerLastName'      => 'required|min:2',
            'passengerDetails.*.passport_number'        => ['required',
            'string','max:15','min:5','alpha_num'],
            'passengerDetails.*.passport_expire_date'   => 'required_if:passengerDetails.*.passengerType,ADT,CHD,CNN|date|date_format:Y-m-d|after:'. $after_months,
            'passengerDetails.*.passport_issue_country' => 'required_if:passengerDetails.*.passengerType,ADT,CHD,CNN',
            'passengerDetails.*.date_of_birth'          => 'required|date|date_format:Y-m-d',
            'redeem'                                    => auth()->guard('api')->check() ? 'required_without_all:creditCardNumber,cash' : '',
            'zipCode'                                   => 'required_without_all:redeem,cash',
            'address'                                   => 'required_without_all:redeem,cash|string|max:50',
        ];
    }

    public function messages()
    {
        return [
            'passengerDetails.*.passport_expire_date.after'     => 'Passport Expire Date must be after 6 months of arrival date',
            'passengerDetails.0.passengerType.in'               => 'First Passenger Type must be adult',
            'passengerDetails.*.passengerType.in'               => 'Passenger Type must be adult or child or infant',
            'flight_id.required'                                => 'Must Enter flight details',
            'contact_phone.phone'                                             => 'The :attribute field contains an invalid number.'
        ];
    }

    public function validationData()
    {
        return $this->post();
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(apiResponse(new \stdClass(),implode(',',$validator->errors()->all()),false));
    }
}
