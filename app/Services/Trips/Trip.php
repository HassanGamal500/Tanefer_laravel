<?php


namespace App\Services\Trips;


use App\Jobs\RequestToBookEmailAgent;
use App\Jobs\RequestToBookEmailCustomer;
use libphonenumber\PhoneNumberFormat;
use Propaganistas\LaravelPhone\PhoneNumber;

class Trip
{
    public function requestToBook($request)
    {
        $client = resolve('client');
        $requestData = $request->all();

        if(auth()->guard('api')->check()){
            $authUser = auth()->guard('api')->user()->toArray();
            $phoneNumber = 0;
        }else{
            $authUser = [];
            $phoneNumber = PhoneNumber::make($request->phone)->ofCountry($request->countryIsoCode)
                ->formatInternational();
        }

        dispatch(new RequestToBookEmailCustomer($requestData,$client,$authUser,$phoneNumber))->delay(5);
        dispatch(new RequestToBookEmailAgent($requestData,$client,$authUser,$phoneNumber))->delay(10);

        return [
            'data'    => new \stdClass(),
            'message' => 'Your Request to Book The trip send successfully, Our Agents will contact you soon',
            'status'  => 200
        ];
    }
}
