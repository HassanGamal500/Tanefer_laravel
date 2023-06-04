<?php


namespace App\GDSIntegration\Sabre\Cars;


use App\GDSIntegration\HttpClient\HttpClient;
use App\GDSIntegration\Sabre\Sabre;
use Illuminate\Support\Facades\Storage;
use Propaganistas\LaravelPhone\PhoneNumber;

class PassengerDetails extends Sabre
{
    public function passengerDetails($request,$session)
    {
        $xml = $this->passengerDetailsXml($request,$session);

        Storage::put('sabreRequests/'.$this->nowDate.'/cars/passengerDetails/'.$this->nowTime.
            'passengerDetailsRQ.xml',$xml);
        $httpClient = new HttpClient();

        $response = $httpClient->executeSoapCall($xml,$this->soap_url,$this->soapContentType,$this->timeout);

        Storage::put('sabreRequests/'.$this->nowDate.'/cars/passengerDetails/'.$this->nowTime.
            'passengerDetailsRS.xml',$response['xmlResponse']);


    }

    public function passengerDetailsXml($request,$session)
    {
        $phone = auth()->guard('api')->check() ? auth()->guard('api')->user()->phone :
            PhoneNumber::make($request->contact_phone)->ofCountry($request->countryIsoCode)->formatInternational();

        $phone = str_replace('+','00',$phone);

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
                            <m:Service m:type="OTA">Car Shopping Service</m:Service>
                            <m:Action>PassengerDetailsRQ</m:Action>
                            <m:MessageData>
                                <m:MessageId>1315103467381090610</m:MessageId>
                                <m:Timestamp>'.date("Y-m-d\TH:i:s\Z").'</m:Timestamp>
                                <m:TimeToLive>'.date("Y-m-d\TH:i:s\Z").'</m:TimeToLive>
                            </m:MessageData>
                            <m:DuplicateElimination/>
                            <m:Description>PassengerDetailsRQ</m:Description>
                        </m:MessageHeader>
                        <wsse:Security xmlns:wsse="http://schemas.xmlsoap.org/ws/2002/12/secext">
                            <wsse:BinarySecurityToken valueType="String" EncodingType="wsse:Base64Binary">' . $session . '</wsse:BinarySecurityToken>
                        </wsse:Security>
                    </SOAP-ENV:Header>
                    <SOAP-ENV:Body>
                        <PassengerDetailsRQ xmlns="http://services.sabre.com/sp/pd/v3_4" version="3.4.0" ignoreOnError="false" haltOnError="false">

                            <TravelItineraryAddInfoRQ>
                                <AgencyInfo>
                                    <Address>
                                        <AddressLine>SABRE TRAVEL</AddressLine>
                                        <CityName>SOUTHLAKE</CityName>
                                        <CountryCode>US</CountryCode>
                                        <PostalCode>76092</PostalCode>
                                        <StateCountyProv StateCode="TX"/>
                                        <StreetNmbr>3150 SABRE DRIVE</StreetNmbr>
                                    </Address>
                                </AgencyInfo>

                               <CustomerInfo>
                                <ContactNumbers>
                                    <ContactNumber NameNumber="1.1" Phone="'.$phone.'" PhoneUseType="H"/>
                                </ContactNumbers>
                                <PersonName Infant="false" NameNumber="1.1" PassengerType="ADT">
                                    <GivenName>'.$request->driverFirstName.' '.$request->driverTitle.'</GivenName>
                                    <Surname>'.$request->driverLastName.'</Surname>
                                </PersonName>
                             </CustomerInfo>

                            </TravelItineraryAddInfoRQ>
                        </PassengerDetailsRQ>
                    </SOAP-ENV:Body>
                    </SOAP-ENV:Envelope>';

        return $xml;
    }


//    public function advancePassengerDetails($passengerDetails)
//    {
//        $advancePassenger = '';
//        $i = 1;
//        foreach ($passengerDetails as $passengerDetail){
//            $advancePassenger .= '<AdvancePassenger>
//                                        <Document ExpirationDate="'.$passengerDetail['passport_expire_date'].'" Number="'.$passengerDetail['passport_number'].'" Type="P">
//                                            <IssueCountry>'.$passengerDetail['passport_issue_country'].'</IssueCountry>
//                                            <NationalityCountry>'.$passengerDetail['passport_issue_country'].'</NationalityCountry>
//                                        </Document>
//                                        <PersonName DateOfBirth="'.$passengerDetail['date_of_birth'].'" Gender="'.$passengerDetail['gender'].'" NameNumber="'.$i.'.1">
//                                            <GivenName>'.$passengerDetail['passengerFirstName'].'</GivenName>
//                                            <Surname>'.$passengerDetail['passengerLastName'].'</Surname>
//                                        </PersonName>
//                                    </AdvancePassenger>';
//
//            $i++;
//        }
//
//        return $advancePassenger;
//    }
}
