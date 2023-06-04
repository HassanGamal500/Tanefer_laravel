<?php


namespace App\GDSIntegration\Tbo\HotelCodeList;


use App\GDSIntegration\Tbo\TBOIntegration;
use Illuminate\Support\Facades\Storage;

class TBOHotelCodeList extends TBOIntegration
{

    public function __construct($client = null)
    {
        $actionHeader = new \SoapHeader('http://www.w3.org/2005/08/addressing',
            'Action','http://TekTravel/HotelBookingApi/TBOHotelCodes');
        parent::__construct($actionHeader,$client);
    }

    public function hotelCodes($cityCode)
    {
        $tboHotelCodeRequest = new TBOHotelCodesRequest($cityCode,"false");

        try{
            $response = $this->TBOHotelCodeList($tboHotelCodeRequest);
            $xmlRequest = $this->__getLastRequest();
            $xmlResponse = $this->__getLastResponse();

            Storage::put('tboRequests/'.
                $this->nowDate.'/TBOHotelCodeList/'.$this->nowTime.'TBOHotelCodeListRQ.xml',$xmlRequest);
            Storage::put('tboRequests/'.
                $this->nowDate.'/TBOHotelCodeList/'.$this->nowTime.'TBOHotelCodeListRS.xml',$xmlResponse);

        }catch (\SoapFault $exception){
            if(app()->environment('local')){
                throw $exception;
            }
            sendErrorToMail($exception);
            return 0;
        }

        return $response;
    }
}
