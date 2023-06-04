<?php


namespace App\GDSIntegration\Sabre;


use Illuminate\Support\Facades\Storage;

class FlightsTo extends Sabre
{
    public function __construct($client = null)
    {
        parent::__construct($client);
    }

    public function flightsToResponse($destination)
    {
        $response = $this->httpClient
            ->executeGetCall($this->rest_url,$this->rest_url."/v1/shop/flights/cheapest/fares/{$destination}",
                '',$this->getAccessToken());

        Storage::put('sabreRequests/'.$this->nowDate.'/flightsTo/'.$this->nowTime.'flightsToRS.json',$response);

        try{
            $fares = json_decode($response,true)['FareInfo'];
            return $fares;
        }catch (\Exception $exception){
            // sendErrorToMail($exception);
            return [];
        }
    }
}
