<?php


namespace App\GDSIntegration\Tbo;

use App\GDSIntegration\HttpClient\HttpClient;
use App\GDSIntegration\Tbo\DestinationCityList\DestinationCityListRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class DestinationCityList extends TBOIntegration
{
    public function __construct($client = null)
    {
        $actionHeader = new \SoapHeader('http://www.w3.org/2005/08/addressing',
            'Action','http://TekTravel/HotelBookingApi/DestinationCityList');

        parent::__construct($actionHeader,$client);
    }

    public function getCities($countryCode)
    {
        $destinationCityRequest = new DestinationCityListRequest($countryCode,"true");

        try {
            $response = $this->DestinationCityList($destinationCityRequest);
            $xmlRequest = $this->__getLastRequest();
            $xmlResponse = $this->__getLastResponse();
            Storage::put('tboRequests/'.$this->nowDate.'/cities/'.$this->nowTime.'citiesRQ.xml',$xmlRequest);
            Storage::put('tboRequests/'.$this->nowDate.'/cities/'.$this->nowTime.'citiesRS.xml',$xmlResponse);
        }catch (\Exception $exception) {
            if (app()->environment('local')) {
                throw $exception;
            }
            sendErrorToMail($exception);
            return 0;
        }

        return $response;
    }
}
