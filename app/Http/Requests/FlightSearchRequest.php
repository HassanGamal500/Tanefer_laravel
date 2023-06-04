<?php

namespace App\Http\Requests;

use App\Rules\InfantNumber;
use App\Rules\PassengerSum;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class FlightSearchRequest extends FormRequest
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
        $year = Carbon::now()->addDays(333)->format('Y-m-d');
        if($this->tripType == 'multi'){
            $validationRules = [
                'tripType'=> 'required|in:multi',
                'origin'   => 'required|array|max:3',
                'originType' => 'required|array|max:3',
                'destination'=> 'required|array|max:3',
                'destinationType' => 'required|array|max:3',
                'departureDate' => 'required|array|max:3',
                'origin.*'   => 'required|string|max:3',
                'originType.*' => 'required|string|in:A,C',
                'destination.*' => 'required|string|max:3',
                'destinationType.*' => 'required|string|in:A,C',
                'departureDate.*' => 'required|date|date_format:Y-m-d|after:now|before:'.$year,
            ];
        }else{
            $validationRules = [
                'tripType'=> 'required|in:one,round',
                'origin'   => 'required|string|max:3',
                'originType' => 'required|string|in:A,C',
                'destination' => 'required|string|max:3',
                'destinationType' => 'required|string|in:A,C',
                'departureDate' => 'required|date|date_format:Y-m-d|after:now|before:'.$year,
                'arrivalDate'   => 'required_if:tripType,round|date|date_format:Y-m-d|after_or_equal:departureDate|before:'.$year
            ];
        }

        return array_merge($validationRules,[
            'adults' => 'required|numeric',
            'children'  => ['numeric',new PassengerSum($this->adults)],
            'infants'   => ['numeric',new InfantNumber($this->adults)],
            'classType'=> 'required|in:Y,C,F,P',
            'withFares' => 'required_with: search_id'
        ]);
    }

    protected function failedValidation(Validator $validator)
    {
        if($this->method() == 'GET'){
            throw new HttpResponseException(apiResponse([],implode(',',$validator->errors()->all()),false));
        }else{
            throw new ValidationException($validator);
        }
    }
}
