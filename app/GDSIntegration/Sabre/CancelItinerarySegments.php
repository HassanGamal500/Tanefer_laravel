<?php


namespace App\GDSIntegration\Sabre;


use App\GDSIntegration\HttpClient\HttpClient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CancelItinerarySegments extends Sabre
{
    public function __construct($client = null)
    {
        parent::__construct($client);
    }

    public function cancelSegments($session)
    {

        $http_client = new HttpClient();

        //log CancelItinerarySegments requests
        Storage::put('sabreRequests/'.$this->nowDate.'/CancelItinerarySegments/'.$this->nowTime.'cancelSegmentsRQ.xml',$this->cancelSegmentsXml($session));

        $result = $http_client->executeSoapCall($this->cancelSegmentsXml($session),
            $this->soap_url,$this->soapContentType,$this->timeout);

        //log CancelItinerarySegments Responses
        Storage::put('sabreRequests/'.$this->nowDate.'/CancelItinerarySegments/'.$this->nowTime.'cancelSegmentsRS.xml',$result['xmlResponse']);

        //dd($result['arrayResponse']);
        return $result;
    }

    public function cancelSegmentsXml($session)
    {
        $xml = '<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
                    <SOAP-ENV:Header>
                        <m:MessageHeader xmlns:m="http://www.ebxml.org/namespaces/messageHeader">
                            <m:From>
                                <m:PartyId type="urn:x12.org:IO5:01">adamtravel.com</m:PartyId>
                            </m:From>
                            <m:To>
                                <m:PartyId type="urn:x12.org:IO5:01">webservices.sabre.com</m:PartyId>
                            </m:To>
                            <m:CPAId>'.$this->pcc.'</m:CPAId>
                            <m:ConversationId>1234</m:ConversationId>
                            <m:Service m:type="OTA">OTA_CancelLLSRQ</m:Service>
                            <m:Action>OTA_CancelLLSRQ</m:Action>
                            <m:MessageData>
                                <m:MessageId>1315103467381090610</m:MessageId>
                                <m:Timestamp>'.date("Y-m-d\TH:i:s\Z").'</m:Timestamp>
                                <m:TimeToLive>'.date("Y-m-d\TH:i:s\Z").'</m:TimeToLive>
                            </m:MessageData>
                            <m:DuplicateElimination/>
                            <m:Description>OTA_CancelLLSRQ</m:Description>
                        </m:MessageHeader>
                        <wsse:Security xmlns:wsse="http://schemas.xmlsoap.org/ws/2002/12/secext">
                            <wsse:BinarySecurityToken valueType="String" EncodingType="wsse:Base64Binary">' . $session . '</wsse:BinarySecurityToken>
                        </wsse:Security>
                    </SOAP-ENV:Header>
                    <SOAP-ENV:Body>
                        <OTA_CancelRQ ReturnHostCommand="true" Version="2.0.2" xmlns="http://webservices.sabre.com/sabreXML/2011/10">
                            <Segment Type="entire"/>
                        </OTA_CancelRQ>
                    </SOAP-ENV:Body>
                    </SOAP-ENV:Envelope>';

        return $xml;
    }

}
