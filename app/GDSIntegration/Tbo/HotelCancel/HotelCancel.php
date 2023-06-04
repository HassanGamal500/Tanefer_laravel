<?php


namespace App\GDSIntegration\Tbo\HotelCancel;


use App\GDSIntegration\Tbo\TBOIntegration;
use Illuminate\Support\Facades\Storage;

class HotelCancel extends TBOIntegration
{
    public function __construct()
    {
        $actionHeader = new \SoapHeader('http://www.w3.org/2005/08/addressing','Action'
        ,'http://TekTravel/HotelBookingApi/HotelCancel');
        parent::__construct($actionHeader);
    }

    public function hotelCancelResponse($confirmation_number,$clientReference,$remark)
    {
        $hotelCancelRequest = new HotelCancelRequest('',CancelRequestType::HotelCancel,
            $remark,$confirmation_number,
        $clientReference,RefundOption::Source);

        try {
            $response = $this->HotelCancel($hotelCancelRequest);
            $xmlRequest = $this->__getLastRequest();
            $xmlResponse = $this->__getLastResponse();
            Storage::put('tboRequests/'.$this->nowDate.'/HotelCancel/'.$this->nowTime.'hotelCancelRQ.xml',$xmlRequest);
            Storage::put('tboRequests/'.$this->nowDate.'/HotelCancel/'.$this->nowTime.'hotelCancelRS.json',json_encode($response));
            Storage::put('tboRequests/'.$this->nowDate.'/HotelCancel/'.$this->nowTime.'hotelCancelRS.xml',$xmlResponse);
        }catch (\Exception $e){
            if(app()->environment('local')){
                dd($e);
            }
            sendErrorToMail($e);
            return 'You cannot complete this cancellation';
        }

        if($response->Status->StatusCode != 1){
            $descArray = explode(':',$response->Status->Description);
            unset($descArray[0]);

            return implode(' ',$descArray);
        }

        return $response;
    }

}
