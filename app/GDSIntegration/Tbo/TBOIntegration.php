<?php


namespace App\GDSIntegration\Tbo;


use App\Models\ThirdPartyAccount;
use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Parent_;
use SoapClient;

class TBOIntegration extends SoapClient
{
    public $url;
    public $username;
    public $password;
    public $contentType = 'application/soap+xml; charset=UTF-8';
    public $nowDate;
    public $nowTime;
    public $session_time;
    public $timeout;


    public function __construct($actionHeader,$client = null, $timeout = 100)
    {
        parent::__construct('https://api.tbotechnology.in/HotelAPI_V7/HotelService.svc?wsdl',
            [
                'soap_version' => SOAP_1_2,
                'connection_timeout'=> $timeout,
                'trace' => true,
                'exception'=> true
            ]);

        try{
            $requestClient = resolve('client');
        }catch (\Exception $e){
            $requestClient = $client;
        }
        $mainClient = $requestClient->parentClient ?? $requestClient;

        $tbo = $mainClient->thirdPartyAccounts()->tbo()->first();

        $this->nowDate = Carbon::now()->format('Y-m-d');
        $this->nowTime = Carbon::now()->format('H:i:s');
        $this->url = $tbo->soap_url ?? 'https://api.tbotechnology.in/hotelapi_v7/hotelservice.svc';
        $this->username = $tbo->username;
        $this->password = decrypt($tbo->password);
        $this->session_time = config('tbo.session_time');

        $authHeadersBody = ['UserName' => $this->username , 'Password' => $this->password];
        $authHeaders = new \SoapHeader('http://TekTravel/HotelBookingApi','Credentials',$authHeadersBody);

        $toHeader = new \SoapHeader('http://www.w3.org/2005/08/addressing','To',$this->url);

        $this->__setLocation($this->url);
        $this->__setSoapHeaders([$authHeaders , $actionHeader, $toHeader]);
    }

    public function convertHotelStarsToInt($starString)
    {
        switch ($starString){
            case 'OneStar':
                $star = 1;
                break;
            case 'TwoStar':
                $star = 2;
                break;
            case 'ThreeStar':
                $star = 3;
                break;
            case 'FourStar':
                $star = 4;
                break;
            case 'FiveStar':
                $star = 5;
                break;
            case 'All':
                $star = 5;
                break;
        }
        return $star;
    }
}
