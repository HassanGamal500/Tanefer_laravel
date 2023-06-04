<?php


namespace App\GDSIntegration\Tbo\HotelBookingDetails;


use App\GDSIntegration\HttpClient\HttpClient;
use App\GDSIntegration\Tbo\TBOIntegration;
use Illuminate\Support\Facades\Storage;

class HotelBookingDetail extends TBOIntegration
{
    public function __construct()
    {
        $actionHeader = new \SoapHeader('http://www.w3.org/2005/08/addressing',
            'Action','http://TekTravel/HotelBookingApi/HotelBookingDetail');

        parent::__construct($actionHeader);
    }

    public function hotelBookingResponse($clientNumber)
    {
        $xml = $this->hotelBookingDetailsXml($clientNumber);
        Storage::put('tboRequests/'.$this->nowDate.'/bookingDetails/'.$this->nowTime.'bookingDetailsRQ.xml',$xml);

        $http_client = new HttpClient();
        $response = $http_client->executeSoapCall($xml,$this->url,$this->contentType,$this->timeout);
        Storage::put('tboRequests/'.$this->nowDate.'/bookingDetails/'.$this->nowTime.'bookingDetailsRS.xml',$response['xmlResponse']);

        return $response['arrayResponse'];
    }


    public function hotelBookingDetailsXml($clientNumber)
    {
        $xml = '<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:hot="http://TekTravel/HotelBookingApi">
                    <soap:Header xmlns:wsa="http://www.w3.org/2005/08/addressing">
                        <hot:Credentials UserName="'.$this->username.'" Password="'.$this->password.'"></hot:Credentials>
                        <wsa:Action>http://TekTravel/HotelBookingApi/HotelBookingDetail</wsa:Action>
                        <wsa:To>https://api.tbotechnology.in/hotelapi_v7/hotelservice.svc</wsa:To>
                    </soap:Header>
                    <soap:Body>
                        <hot:HotelBookingDetailRequest>
                        <hot:ClientReferenceNumber>'.$clientNumber.'</hot:ClientReferenceNumber>
                        </hot:HotelBookingDetailRequest>
                    </soap:Body>
                </soap:Envelope>';
        return $xml;
    }
}
