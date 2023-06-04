<?php


namespace App\GDSIntegration\Tbo;
use App\GDSIntegration\HttpClient\HttpClient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CountryList extends TBOIntegration
{
    public function __construct($client = null)
    {
        $actionHeader = new \SoapHeader('http://www.w3.org/2005/08/addressing',
            'Action','http://TekTravel/HotelBookingApi/CountryList');

        parent::__construct($actionHeader,$client);
    }

    public function countries()
    {
        try{
            $response = $this->CountryList();
            $xmlRequest = $this->__getLastRequest();
            $xmlResponse = $this->__getLastResponse();
            Storage::put('tboRequests/'.$this->nowDate.'/countries/'.$this->nowTime.'countriesRQ.xml',$xmlRequest);
            Storage::put('tboRequests/'.$this->nowDate.'/countries/'.$this->nowTime.'countriesRS.xml',$xmlResponse);

        }catch (\Exception $exception){
            if(app()->environment('local')){
                throw $exception;
            }
            sendErrorToMail($exception);
            return 0;
        }

        return $response;
    }

}
