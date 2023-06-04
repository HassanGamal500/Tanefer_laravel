<?php


namespace App\GDSIntegration\Sabre;


use App\GDSIntegration\HttpClient\HttpClient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class GetReservation extends Sabre
{
    public function __construct($client = null)
    {
        parent::__construct($client);
    }

    public function travelItineraryRead($pnr,$session,$subjectArea = 'FULL')
    {
        //log travelItineraryRead request
        Storage::put('sabreRequests/'.$this->nowDate.'/getReservation/'.$this->nowTime.'travelItineraryRQ.xml',
            $this->request($pnr,$session,$subjectArea));

        $http_client = new HttpClient();
        $startTime = microtime(true);
        $response = $http_client
            ->executeSoapCall($this->request($pnr,$session,$subjectArea),
                $this->soap_url,$this->soapContentType,$this->timeout);
        $endTime = microtime(true);

        $logSabreRequestTime = $endTime - $startTime;

        //log travelItineraryRead response
        Storage::put('sabreRequests/'.$this->nowDate.'/getReservation/'.$this->nowTime.'travelItineraryRS.xml',$response['xmlResponse']);
        Storage::append('/sabreRequests/'.$this->nowDate.'/getReservation/travelItineraryCallTime.txt',
            $this->nowTime."\t".'Request Time: '.$logSabreRequestTime."\n");

        //dd($response['arrayResponse']);
        return $response;
    }

    public function request($pnr,$session,$subjectArea)
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
                            <m:Service m:type="OTA">Air Shopping Service</m:Service>
                            <m:Action>GetReservationRQ</m:Action>
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
                        <GetReservationRQ Version="1.19.0" xmlns="http://webservices.sabre.com/pnrbuilder/v1_19">
                            <Locator>'.$pnr.'</Locator>
                            <RequestType>Stateful</RequestType>
                            <ReturnOptions PriceQuoteServiceVersion="3.2.0">
                                <SubjectAreas>
                                    <SubjectArea>TICKETING</SubjectArea>
                                    <SubjectArea>ITINERARY</SubjectArea>
                                    <SubjectArea>GFAX</SubjectArea>
                                    <SubjectArea>ACCOUNTING_LINE</SubjectArea>
                                    <SubjectArea>Remarks</SubjectArea>
                                    <SubjectArea>AFAX</SubjectArea>
                                    <SubjectArea>PRICE_QUOTE</SubjectArea>
                                </SubjectAreas>
                                <ViewName>Simple</ViewName>
                                <ResponseFormat>STL</ResponseFormat>
                            </ReturnOptions>
                        </GetReservationRQ>
                    </SOAP-ENV:Body>
                    </SOAP-ENV:Envelope>';

        return $xml;
    }

    /*
        <SubjectArea>AIR_CABIN</SubjectArea>
        <SubjectArea>FARETYPE</SubjectArea>
        <SubjectArea>RECEIVED</SubjectArea>
        <SubjectArea>ITINERARY</SubjectArea>
        <SubjectArea>DSS</SubjectArea>
        <SubjectArea>NAME</SubjectArea>
        <SubjectArea>PASSENGERDETAILS</SubjectArea>
        <SubjectArea>PRICE_QUOTE</SubjectArea>
        <SubjectArea>PRICING_INFORMATION</SubjectArea>

     * */
}
