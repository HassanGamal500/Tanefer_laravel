<?php

namespace App\Http\Controllers\ApiV2\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class PackageHotelGtaController extends Controller
{

    public function sendSoapRequest()
    {

        $client = new Client();

        $soapRequest = '
            <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns="http://www.juniper.es/webservice/2007/">
                <soapenv:Header/>
                <soapenv:Body>
                    <HotelPortfolio>
                        <HotelPortfolioRQ Version="1.1" Language="en" Page="1" RecordsPerPage="500">
                            <Login Password="U3dIp8i*eyAC8N7" Email="Xml_TestXMLTaNefer"/>
                        </HotelPortfolioRQ>
                    </HotelPortfolio>
                </soapenv:Body>
            </soapenv:Envelope>
        ';

        $response = $client->post('https://xml-uat.bookingengine.es/WebService/jp/operations/staticdatatransactions.asmx', [
            'headers' => [
                'Content-Type' => 'text/xml;charset=UTF-8',
                'Accept-Encoding' => 'gzip, deflate',
                'SOAPAction' => 'http://www.juniper.es/webservice/2007/HotelPortfolio', // Specify the SOAP action if required by the service
            ],
            'body' => $soapRequest,
        ]);

        $responseJson = $response->getBody()->getContents();

        return $responseJson;
    }
    public function roomList()
    {

        $client = new Client();

        $soapRequest = '
                <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns="http://www.juniper.es/webservice/2007/">
                    <soapenv:Header/>
                    <soapenv:Body>
                        <RoomList>
                            <!--Optional:-->
                            <RoomListRQ Version="1" Language="en">
                            <Login Password="U3dIp8i*eyAC8N7" Email="Xml_TestXMLTaNefer"/>
                            </RoomListRQ>
                        </RoomList>
                    </soapenv:Body>
                </soapenv:Envelope>
        ';
        $response = $client->post('https://xml-uat.bookingengine.es/WebService/jp/operations/staticdatatransactions.asmx', [
            'headers' => [
                'Content-Type' => 'text/xml;charset=UTF-8',
                'Accept-Encoding' => 'gzip, deflate',
                'SOAPAction' => 'http://www.juniper.es/webservice/2007/RoomList', // Specify the SOAP action if required by the service
            ],
            'body' => $soapRequest,
        ]);

        $responseJson = $response->getBody()->getContents();

        return $responseJson;
    }

    public function content(Request $request)
    {
        $hotelCode = $request->hotelCode;
        $client = new Client();

        $soapRequest = '
                <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns="http://www.juniper.es/webservice/2007/">
                    <soapenv:Header/>
                    <soapenv:Body>
                        <HotelContent>
                            <HotelContentRQ Version="1" Language="en">
                            <Login Password="U3dIp8i*eyAC8N7" Email="Xml_TestXMLTaNefer"/>
                                <HotelContentList>
                                    <Hotel Code="'. $hotelCode.'"/>
                                </HotelContentList>
                            </HotelContentRQ>
                        </HotelContent>
                    </soapenv:Body>
                </soapenv:Envelope>
        ';

        $response = $client->post('https://xml-uat.bookingengine.es/WebService/jp/operations/staticdatatransactions.asmx', [
            'headers' => [
                'Content-Type' => 'text/xml;charset=UTF-8',
                'Accept-Encoding' => 'gzip, deflate',
                'SOAPAction' => 'http://www.juniper.es/webservice/2007/HotelContent', // Specify the SOAP action if required by the service
            ],
            'body' => $soapRequest,
        ]);

        $responseJson = $response->getBody()->getContents();

        return $responseJson;
    }

    public function availability(Request $request)
    {
        $client = new Client();

        $soapRequest = '
            <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
                <soapenv:Header/>
                <soapenv:Body>
                    <HotelAvail xmlns="http://www.juniper.es/webservice/2007/">
                        <HotelAvailRQ Version="1.1" Language="{{Language}}">
                            <Login Password="U3dIp8i*eyAC8N7" Email="Xml_TestXMLTaNefer"/>
                            <Paxes>
                                <Pax IdPax="1">
                                    <Age>30</Age>
                                </Pax>
                                <Pax IdPax="2">
                                    <Age>30</Age>
                                </Pax>
                            </Paxes>
                            <HotelRequest>
                                <SearchSegmentsHotels>
                                    <SearchSegmentHotels Start="{{StartDate}}" End="{{EndDate}}"/>
                                    <CountryOfResidence>ES</CountryOfResidence>
                                    <HotelCodes>
                                        <HotelCode>JP046300</HotelCode>
                                        <HotelCode>JP046391</HotelCode>
                                        <HotelCode>JP150074</HotelCode>
                                    </HotelCodes>
                                </SearchSegmentsHotels>
                                <RelPaxesDist>
                                    <RelPaxDist>
                                        <RelPaxes>
                                            <RelPax IdPax="1"/>
                                            <RelPax IdPax="2"/>
                                        </RelPaxes>
                                    </RelPaxDist>
                                </RelPaxesDist>
                            </HotelRequest>
                            <AdvancedOptions>
                                <ShowHotelInfo>false</ShowHotelInfo>
                                <ShowOnlyBestPriceCombination>true</ShowOnlyBestPriceCombination>
                                <TimeOut>8000</TimeOut>
                            </AdvancedOptions>
                        </HotelAvailRQ>
                    </HotelAvail>
                </soapenv:Body>
            </soapenv:Envelope>
        ';

        $response = $client->post('https://xml-uat.bookingengine.es/WebService/jp/operations/availtransactions.asmx', [
            'headers' => [
                'Content-Type' => 'text/xml;charset=UTF-8',
                'Accept-Encoding' => 'gzip, deflate',
                'SOAPAction' => 'http://www.juniper.es/webservice/2007/HotelAvail',
            ],
            'body' => $soapRequest,
        ]);

        $responseJson = $response->getBody()->getContents();

        return $responseJson;
    }

    public function checkAvailability(Request $request)
    {
        $RatePlanCode = $request->RatePlanCode;
        $StartDate = $request->StartDate;
        $EndDate = $request->EndDate;
        $HotelCode = $request->HotelCode;
        $client = new Client();

        $soapRequest = '
            <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns="http://www.juniper.es/webservice/2007/">
                <soapenv:Header/>
                <soapenv:Body>
                    <HotelCheckAvail>
                        <HotelCheckAvailRQ Version="1.1" Language="{{Language}}">
                            <Login Password="U3dIp8i*eyAC8N7" Email="Xml_TestXMLTaNefer"/>
                            <HotelCheckAvailRequest>
                                <HotelOption RatePlanCode="'.$RatePlanCode.'"/>
                                <SearchSegmentsHotels>
                                    <SearchSegmentHotels Start="'.$StartDate.'" End="'.$EndDate.'"/>
                                    <HotelCodes>
                                        <HotelCode>'.$HotelCode.'</HotelCode>
                                    </HotelCodes>
                                </SearchSegmentsHotels>
                            </HotelCheckAvailRequest>
                            <AdvancedOptions>
                                <ShowBreakdownPrice>true</ShowBreakdownPrice>
                            </AdvancedOptions>
                        </HotelCheckAvailRQ>
                    </HotelCheckAvail>
                </soapenv:Body>
            </soapenv:Envelope>
        ';

        $response = $client->post('https://xml-uat.bookingengine.es/WebService/jp/operations/checktransactions.asmx', [
            'headers' => [
                'Content-Type' => 'text/xml;charset=UTF-8',
                'Accept-Encoding' => 'gzip, deflate',
                'SOAPAction' => 'http://www.juniper.es/webservice/2007/HotelCheckAvail',
            ],
            'body' => $soapRequest,
        ]);

        $responseJson = $response->getBody()->getContents();

        return $responseJson;
    }


    public function BookingRules(Request $request)
    {
        $RatePlanCode = $request->RatePlanCode;
        $StartDate = $request->StartDate;
        $EndDate = $request->EndDate;
        $HotelCode = $request->HotelCode;
        $client = new Client();

        $soapRequest = '
            <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns="http://www.juniper.es/webservice/2007/">
                <soapenv:Header/>
                <soapenv:Body>
                    <HotelBookingRules>
                        <HotelBookingRulesRQ Version="1.1" Language="{{Language}}">
                        <Login Password="U3dIp8i*eyAC8N7" Email="Xml_TestXMLTaNefer"/>
                            <HotelBookingRulesRequest>
                                <HotelOption RatePlanCode="'.$RatePlanCode.'"/>
                                <SearchSegmentsHotels>
                                    <SearchSegmentHotels Start="'.$StartDate.'" End="'.$EndDate.'"/>
                                    <HotelCodes>
                                        <HotelCode>'.$HotelCode.'</HotelCode>
                                    </HotelCodes>
                                </SearchSegmentsHotels>
                            </HotelBookingRulesRequest>
                            <AdvancedOptions>
                                <ShowBreakdownPrice>true</ShowBreakdownPrice>
                            </AdvancedOptions>
                        </HotelBookingRulesRQ>
                    </HotelBookingRules>
                </soapenv:Body>
            </soapenv:Envelope>
        ';

        $response = $client->post('https://xml-uat.bookingengine.es/WebService/jp/operations/checktransactions.asmx', [
            'headers' => [
                'Content-Type' => 'text/xml;charset=UTF-8',
                'Accept-Encoding' => 'gzip, deflate',
                'SOAPAction' => 'http://www.juniper.es/webservice/2007/HotelCheckAvail',
            ],
            'body' => $soapRequest,
        ]);

        $responseJson = $response->getBody()->getContents();

        return $responseJson;
    }

    public function Booking()
    {
        $client = new Client();

        $soapRequest = '
            <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns="http://www.juniper.es/webservice/2007/">
                <soapenv:Header/>
                <soapenv:Body>
                <HotelBooking xmlns="http://www.juniper.es/webservice/2007/">
                    <HotelBookingRQ Version="1.1" Language="{{Language}}">
                        <Login Password="U3dIp8i*eyAC8N7" Email="Xml_TestXMLTaNefer"/>
                        <Paxes>
                            <Pax IdPax="1">
                            <Name>Holder Name A</Name>
                            <Surname>Holder Surname A</Surname>
                            <Age>30</Age>
                            </Pax>
                            <Pax IdPax="2">
                            <Name>Pax Name B</Name>
                            <Surname>Pax Surname B</Surname>
                            <Age>30</Age>
                            </Pax>
                        </Paxes>
                        <Holder>
                            <RelPax IdPax="1"/>
                        </Holder>
                        <ExternalBookingReference>{{$guid}}</ExternalBookingReference>
                        <Comments>
                            <Comment Type="RES">Booking comment</Comment>
                        </Comments>
                        <Elements>
                            <HotelElement>
                            <BookingCode>{{BookingCode}}</BookingCode>
                            <RelPaxesDist>
                                <RelPaxDist>
                                    <RelPaxes>
                                        <RelPax IdPax="1"/>
                                        <RelPax IdPax="2"/>
                                    </RelPaxes>
                                </RelPaxDist>
                            </RelPaxesDist>
                            <Comments>
                                <Comment Type="ELE">Booking line comment</Comment>
                            </Comments>
                            <HotelBookingInfo Start="{{StartDate}}" End="{{EndDate}}">
                                <Price>
                                    <PriceRange Minimum="{{PriceRange.Minimum}}" Maximum="{{PriceRange.Maximum}}" Currency="{{PriceRange.Currency}}"/>
                                </Price>
                                <HotelCode>JP046300</HotelCode>
                            </HotelBookingInfo>
                            </HotelElement>
                        </Elements>
                        <AdvancedOptions>
                            <ShowBreakdownPrice>true</ShowBreakdownPrice>
                        </AdvancedOptions>
                    </HotelBookingRQ>
                </HotelBooking>
                </soapenv:Body>
            </soapenv:Envelope>
        ';

        $response = $client->post('https://xml-uat.bookingengine.es/WebService/jp/operations/BookTransactions.asmx', [
            'headers' => [
                'Content-Type' => 'text/xml;charset=UTF-8',
                'Accept-Encoding' => 'gzip, deflate',
                'SOAPAction' => 'http://www.juniper.es/webservice/2007/HotelBooking',
            ],
            'body' => $soapRequest,
        ]);

        $responseJson = $response->getBody()->getContents();

        return $responseJson;
    }

    public function cancelBooking(Request $request)
    {
        $client = new Client();

        $soapRequest = '
            <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns="http://www.juniper.es/webservice/2007/">
                <soapenv:Header/>
                <soapenv:Body>
                <CancelBooking>
                    <CancelRQ Version="1.1" Language="{{Language}}">
                        <Login Password="U3dIp8i*eyAC8N7" Email="Xml_TestXMLTaNefer"/>
                        <CancelRequest ReservationLocator="{{BookingLoc}}"/>
                        <AdvancedOptions>
                            <ShowBreakdownPrice>true</ShowBreakdownPrice>
                        </AdvancedOptions>
                    </CancelRQ>
                </CancelBooking>
                </soapenv:Body>
            </soapenv:Envelope>
        ';

        $response = $client->post('https://xml-uat.bookingengine.es/WebService/jp/operations/BookTransactions.asmx', [
            'headers' => [
                'Content-Type' => 'text/xml;charset=UTF-8',
                'Accept-Encoding' => 'gzip, deflate',
                'SOAPAction' => 'http://www.juniper.es/webservice/2007/CancelBooking',
            ],
            'body' => $soapRequest,
        ]);

        $responseJson = $response->getBody()->getContents();

        return $responseJson;
    }
}