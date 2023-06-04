<?php


namespace App\GDSIntegration\Sabre;


use App\GDSIntegration\HttpClient\HttpClient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class EndTransaction extends Sabre
{
    public function __construct($client = null)
    {
        parent::__construct($client);
    }

    public function endTransaction($session)
    {

        $http_client = new HttpClient();

        //log endTransaction requests
        Storage::put('sabreRequests/'.$this->nowDate.'/endTransaction/'.$this->nowTime.'endTransactionRQ.xml',$this->endTransactionXml($session));

        $response = $http_client->executeSoapCall($this->endTransactionXml($session),
            $this->soap_url,$this->soapContentType,$this->timeout);


        //log endTransaction Responses
        Storage::put('sabreRequests/'.$this->nowDate.'/endTransaction/'.$this->nowTime.'endTransactionRS.xml',$response['xmlResponse']);

        $status = $response['arrayResponse']['soap-env:Envelope']['soap-env:Body']['EndTransactionRS']['stl:ApplicationResults']['attr']['status'];

        return $response['arrayResponse'];

    }

    public function endTransactionXml($session)
    {
        $receivedFrom = auth()->guard('api')->check() ? auth()->guard('api')->user()->name : 'API';

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
                            <m:Service m:type="OTA">Air Shopping Service</m:Service>
                            <m:Action>EndTransactionLLSRQ</m:Action>
                            <m:MessageData>
                                <m:MessageId>1315103467381090610</m:MessageId>
                                <m:Timestamp>'.date("Y-m-d\TH:i:s\Z").'</m:Timestamp>
                                <m:TimeToLive>'.date("Y-m-d\TH:i:s\Z").'</m:TimeToLive>
                            </m:MessageData>
                            <m:DuplicateElimination/>
                            <m:Description>GetReservationRQ</m:Description>
                        </m:MessageHeader>
                        <wsse:Security xmlns:wsse="http://schemas.xmlsoap.org/ws/2002/12/secext">
                            <wsse:BinarySecurityToken valueType="String" EncodingType="wsse:Base64Binary">' . $session . '</wsse:BinarySecurityToken>
                        </wsse:Security>
                    </SOAP-ENV:Header>
                    <SOAP-ENV:Body>
                        <EndTransactionRQ ReturnHostCommand="true" Version="2.0.9" xmlns="http://webservices.sabre.com/sabreXML/2011/10">
                            <EndTransaction Ind="true"/>
                            <Source ReceivedFrom="'.$receivedFrom.'"/>
                        </EndTransactionRQ>
                    </SOAP-ENV:Body>
                    </SOAP-ENV:Envelope>';

        return $xml;
    }
}
