<?php


namespace App\GDSIntegration\Sabre;


use App\GDSIntegration\HttpClient\HttpClient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class VerifyItineraryAddressSoap extends Sabre
{
    private $http_client;


    public function validateCreditCard($request,$airlineCode)
    {

        $http_client = new HttpClient();

        $session = $this->getSoapSession();
        //log validate credit card request
        if(app()->environment('local') || app()->environment('development')){
            Storage::put('sabreRequests/'.$this->nowDate.'/validateCreditCard/'.$this->nowTime.'validateCreditCardRQ.xml',$this->VerifyItineraryAddressRQ($request,$airlineCode,$session));
        }

        $response = $http_client->executeSoapCall($this->VerifyItineraryAddressRQ($request,$airlineCode,$session),$this->soap_url,$this->soapContentType,$this->timeout);

        $this->closeSoapSession($session);

        //log validate credit card response
        Storage::put('sabreRequests/'.$this->nowDate.'/validateCreditCard/'.$this->nowTime.'validateCreditCardRS.xml',$response['xmlResponse']);

        $arrayResponse = $response['arrayResponse'];

        return $arrayResponse['soap-env:Envelope']['soap-env:Body']['AddressVerificationRS']['stl:ApplicationResults']['attr']['status'];
    }

    private function VerifyItineraryAddressRQ($request,$airlineCode,$session)
    {

        $xml = '<?xml version="1.0" encoding="UTF-8"?>
                                <SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:eb="http://www.ebxml.org/namespaces/messageHeader" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:xsd="http://www.w3.org/1999/XMLSchema">
                                     <SOAP-ENV:Header>
                                        <eb:MessageHeader xmlns:eb="http://www.ebxml.org/namespaces/messageHeader" eb:version="1.0" SOAP-ENV:mustUnderstand="1">
                                            <eb:From>
                                                <eb:PartyId eb:type="URI">adamtravel.com</eb:PartyId>
                                            </eb:From>
                                            <eb:To>
                                                <eb:PartyId eb:type="URI">webservices.sabre.com</eb:PartyId>
                                            </eb:To>
                                            <eb:CPAId>'.$this->pcc.'</eb:CPAId>
                                            <eb:ConversationId>1234</eb:ConversationId>
                                            <eb:Service eb:type="sabreXML">info@adamtravel.com</eb:Service>
                                            <eb:Action>AddressVerificationLLSRQ</eb:Action>
                                            <eb:MessageData><eb:MessageId>1315103467381090610</eb:MessageId>
                                                <eb:Timestamp>'.date("Y-m-d\TH:i:s\Z").'</eb:Timestamp>
                                                <eb:RefToMessageId>1234</eb:RefToMessageId>
                                            </eb:MessageData></eb:MessageHeader>
                                        <wsse:Security xmlns:wsse="http://schemas.xmlsoap.org/ws/2002/12/secext">
                                            <wsse:BinarySecurityToken valueType="String" EncodingType="wsse:Base64Binary">
                                                '.$session.'
                                            </wsse:BinarySecurityToken>
                                        </wsse:Security>
                                  </SOAP-ENV:Header>
                                  <SOAP-ENV:Body>
                                  <AddressVerificationRQ xmlns="http://webservices.sabre.com/sabreXML/2011/10" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" Version="2.0.1">
                                    <Address>
                                        <PostalCode>'.$request->zipCode.'</PostalCode>
                                        <StreetNmbr>'.$request->streetLine.' '.$request->address.'</StreetNmbr>
                                    </Address>
                                    <CC_Info>
                                        <PaymentCard Code="'.$request->creditCardType.'" ExpireDate="'.$request->creditCardExpireDate.'" Number="'.$request->creditCardNumber.'"/>
                                    </CC_Info>
                                    <VendorPrefs>
                                        <Airline Code="'.$airlineCode.'"/>
                                    </VendorPrefs>
                                  </AddressVerificationRQ>
                                  </SOAP-ENV:Body>
                                </SOAP-ENV:Envelope>';

        return $xml;
    }
}
