<?php

namespace App\GDSIntegration\Tbo\GenerateInvoice;

use App\GDSIntegration\HttpClient\HttpClient;
use App\GDSIntegration\Tbo\HotelBook\HotelBookRequest\PaymentInfo;
use App\GDSIntegration\Tbo\TBOIntegration;
use Illuminate\Support\Facades\Storage;

class GenerateInvoice extends TBOIntegration
{
    public function __construct($client = null)
    {
        $actionHeader = new \SoapHeader('http://www.w3.org/2005/08/addressing',
            'Action','http://TekTravel/HotelBookingApi/GenerateInvoice');
        parent::__construct($actionHeader,$client);
    }

    public function generateInvoiceRequest($bookingNumber)
    {

        $paymentInfo = new PaymentInfo(true);
        $generateInvoiceRequest = new GenerateInvoiceRequest($bookingNumber,$paymentInfo);

        try{
            $response = $this->GenerateInvoice($generateInvoiceRequest);
            $xmlRequest = $this->__getLastRequest();
            $xmlResponse = $this->__getLastResponse();
            Storage::put('tboRequests/'.
                $this->nowDate.'/GenerateInvoice/'.$this->nowTime.'generateInvoiceRQ.xml',$xmlRequest);
            Storage::put('tboRequests/'.
                $this->nowDate.'/GenerateInvoice/'.$this->nowTime.'generateInvoiceRS.xml',$xmlResponse);
        }catch (\Exception $e){
            if(app()->environment('local')){
                throw $e;
            }
            sendErrorToMail($e);
            return 0;
        }

        return $response;
    }
}
