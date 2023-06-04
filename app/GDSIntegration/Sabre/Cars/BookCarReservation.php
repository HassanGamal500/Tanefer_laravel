<?php


namespace App\GDSIntegration\Sabre\Cars;


use App\GDSIntegration\HttpClient\HttpClient;
use App\GDSIntegration\Sabre\Sabre;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class BookCarReservation extends Sabre
{
    public function carReservation($request,$car,$session)
    {
        $xml = $this->carReservationXml($request,$car,$session);

        Storage::put('sabreRequests/'.$this->nowDate.'/cars/reservation/'.$this->nowTime.
            'reservationRQ.xml',$xml);

        $httpClient = new HttpClient();
        $response = $httpClient->executeSoapCall($xml,$this->soap_url,$this->soapContentType,$this->timeout);

        Storage::put('sabreRequests/'.$this->nowDate.'/cars/reservation/'.$this->nowTime.
            'reservationRS.xml',$response['xmlResponse']);

        try{
            $responseStatus =  $response['arrayResponse']['soap-env:Envelope']['soap-env:Body']['OTA_VehResRS']['stl:ApplicationResults']['attr']['status'];
            if($responseStatus == 'NotProcessed'){
                $responseMessage = $response['arrayResponse']['soap-env:Envelope']['soap-env:Body']['OTA_VehResRS']['stl:ApplicationResults']['stl:Error']
                    ['stl:SystemSpecificResults']['stl:Message']['value'];
                if($responseMessage == 'CHECK CREDIT CARD NUMBER  -  INVALID NUMBER'){
                    return 'Invalidate credit card type or number';
                }
            }
        }catch (\Exception $exception){
            sendErrorToMail($exception);
        }
    }

    public function carReservationXml($request,$car,$session)
    {
        $pickupDateTime = Carbon::parse($request->pickupDate.' '.$request->pickupTime)->format('Y-m-d\TH:i:s');
        $returnDateTime = Carbon::parse($request->returnDate.' '.$request->returnTime)->format('Y-m-d\TH:i:s');

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
                            <m:Service m:type="OTA">Vehicle Shopping Service</m:Service>
                            <m:Action>OTA_VehResLLSRQ</m:Action>
                            <m:MessageData>
                                <m:MessageId>1315103467381090610</m:MessageId>
                                <m:Timestamp>'.date("Y-m-d\TH:i:s\Z").'</m:Timestamp>
                                <m:TimeToLive>'.date("Y-m-d\TH:i:s\Z").'</m:TimeToLive>
                            </m:MessageData>
                            <m:DuplicateElimination/>
                            <m:Description>OTA_VehResLLSRQ</m:Description>
                        </m:MessageHeader>
                        <wsse:Security xmlns:wsse="http://schemas.xmlsoap.org/ws/2002/12/secext">
                            <wsse:BinarySecurityToken valueType="String" EncodingType="wsse:Base64Binary">' . $session . '</wsse:BinarySecurityToken>
                        </wsse:Security>
                    </SOAP-ENV:Header>
                    <SOAP-ENV:Body>
                        <OTA_VehResRQ Version="2.2.0" xmlns="http://webservices.sabre.com/sabreXML/2011/10" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                            <VehResRQCore>
                            '.$this->redeemedCreditOrRemark($request).'
                                <VehPrefs>
                                    <VehPref>
                                        <VehType>'.$car['carInfo']['carTypeCode'].'</VehType>
                                    </VehPref>
                                </VehPrefs>
                                <VehRentalCore PickUpDateTime="'.$pickupDateTime.'" Quantity="1" ReturnDateTime="'.$returnDateTime.'">
                                    <PickUpLocation LocationCode="'.$car['pickUpLocationCode'].'"/>
                                </VehRentalCore>
                                <VendorPrefs>
                                    <VendorPref Code="'.$car['vendorCode'].'"/>
                                </VendorPrefs>
                            </VehResRQCore>
                        </OTA_VehResRQ>
                    </SOAP-ENV:Body>
                    </SOAP-ENV:Envelope>';

        return $xml;
    }

    public function redeemedCreditOrRemark($request)
    {
        if(isset($request->redeem)){
            $xml = '<SpecialPrefs>
                        <InvoiceRemarks>
                            <Text>This Car book is free for loyalty program</Text>
                        </InvoiceRemarks>
                    </SpecialPrefs>';
        }elseif(isset($request->cash)){
            $xml = '<SpecialPrefs>
                        <InvoiceRemarks>
                            <Text>This Booking From SubAgent</Text>
                        </InvoiceRemarks>
                    </SpecialPrefs>';
        }
        else{
            $xml = '<RentalPaymentPref>
                        <Guarantee Code="G">
                            <PaymentCard Code="'.$request->creditCardType.'" ExpireDate="'.$request->creditCardExpireDate.'" Number="'.$request->creditCardNumber.'">
                                <PersonName>
                                    <Surname>'.$request->cardHolderName.'</Surname>
                                </PersonName>
                            </PaymentCard>
                        </Guarantee>
                    </RentalPaymentPref>';
        }

        return $xml;
    }
}
