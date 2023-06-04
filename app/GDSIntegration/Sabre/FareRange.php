<?php


namespace App\GDSIntegration\Sabre;


use App\GDSIntegration\HttpClient\HttpClient;
use Illuminate\Support\Facades\Storage;

class FareRange extends Sabre
{
    public function fareRangResponse()
    {
        $request = $this->fareRangRequest();
        Storage::put('sabreRequests/'.$this->nowDate.'/fareRange/'.$this->nowTime.'fareRangeRQ.json',json_encode($request));

        $response = $this->httpClient
            ->executeGetCall($this->rest_url,'/v1/historical/flights/fares',$request,$this->getAccessToken());

        Storage::put('sabreRequests/'.$this->nowDate.'/fareRange/'.$this->nowTime.'fareRangeRS.json',json_encode($response));

        return $response;
    }


    public function fareRangRequest()
    {
        $request = [
            'origin' => 'JFK',
            'destination' => 'CAI',
            'earliestdeparturedate' => '2020-07-11',
            'latestdeparturedate'   => '2020-07-19',
            'lengthofstay'          => 1
        ];

        return $request;
    }
}
