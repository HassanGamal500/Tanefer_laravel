<?php

namespace App\Http\Controllers\ApiV2\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class PackageHotelGtaController extends Controller
{

    public function sendSoapRequest(Request $request)
    {
        // $client = new Client();

        // $soapRequest = '
        //     <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns="http://www.juniper.es/webservice/2007/">
        //         <soapenv:Header/>
        //         <soapenv:Body>
        //             <HotelPortfolio>
        //                 <HotelPortfolioRQ Version="1.1" Language="en" Page="1" RecordsPerPage="10" >
        //                     <Login Password="U3dIp8i*eyAC8N7" Email="Xml_TestXMLTaNefer"/>
        //                 </HotelPortfolioRQ>
        //             </HotelPortfolio>
        //         </soapenv:Body>
        //     </soapenv:Envelope>
        // ';

        // $response = $client->post('https://xml-uat.bookingengine.es/WebService/jp/operations/staticdatatransactions.asmx', [
        //     'headers' => [
        //         'Content-Type' => 'text/xml;charset=UTF-8',
        //         'Accept-Encoding' => 'gzip, deflate',
        //         'SOAPAction' => 'http://www.juniper.es/webservice/2007/HotelPortfolio', // Specify the SOAP action if required by the service
        //     ],
        //     'body' => $soapRequest,
        // ]);

        // $responseJson = $response->getBody()->getContents();

        // return $responseJson;

        // $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/JP/WebServiceJP.asmx?WSDL", array(
        //     'soap_version' => 'SOAP_1_2',
        //     'encoding' => 'UTF-8',
        //     'exceptions' => true,
        //     'stream_context' => stream_context_create(array(
        //         'http' => array(
        //             'header' => array(
        //                 'Content-Type: text/xml; charset=UTF-8',
        //                 'Accept-Encoding: gzip, deflate'
        //             )
        //         ),
        //         'ssl' => array(
        //             'verify_peer' => false,
        //             'verify_peer_name' => false
        //         )
        //     )),
        //     'trace' => true,
        //     'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
        // ));

        // $client->__setLocation("https://xml-uat.bookingengine.es/WebService/jp/operations/staticdatatransactions.asmx");

        // $response = $client->HotelPortfolio([
        //     "HotelPortfolioRQ" =>[
        //         "Version" => "1.1",
        //         "Language" => "en",
        //         "Page" => "1",
        //         "RecordsPerPage" => "10",
        //         "Login" => [
        //             "Email" => 'Xml_TestXMLTaNefer',
        //             "Password" => 'U3dIp8i*eyAC8N7'
        //         ]
        //     ],
        // ]);

        // return response()->json($response);




        $options = array(
            'soap_version' => SOAP_1_2,
            'encoding' => 'UTF-8',
            'exceptions' => true,
            'trace' => true,
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
        );

        $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/JP/WebServiceJP.asmx?WSDL", $options);

        $requestData = array(
            'HotelPortfolioRQ' => array(
                'Version' => '1.1',
                'Language' => 'en',
                'Page' => $request->get('page'),
                'RecordsPerPage' => '500',
                'Login' => array(
                    'Password' => 'U3dIp8i*eyAC8N7',
                    'Email' => 'Xml_TestXMLTaNefer'
                )
            )
        );

        try {
            $response = $client->__soapCall('HotelPortfolio', array('parameters' => $requestData));
            return response()->json($response);
        } catch (SoapFault $fault) {
            echo "Error: " . $fault->getMessage();
        }
    }

    public function roomList()
    {

        // $client = new Client();

        // $soapRequest = '
        //         <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns="http://www.juniper.es/webservice/2007/">
        //             <soapenv:Header/>
        //             <soapenv:Body>
        //                 <RoomList>
        //                     <!--Optional:-->
        //                     <RoomListRQ Version="1" Language="en">
        //                     <Login Password="U3dIp8i*eyAC8N7" Email="Xml_TestXMLTaNefer"/>
        //                     </RoomListRQ>
        //                 </RoomList>
        //             </soapenv:Body>
        //         </soapenv:Envelope>
        // ';
        // $response = $client->post('https://xml-uat.bookingengine.es/WebService/jp/operations/staticdatatransactions.asmx', [
        //     'headers' => [
        //         'Content-Type' => 'text/xml;charset=UTF-8',
        //         'Accept-Encoding' => 'gzip, deflate',
        //         'SOAPAction' => 'http://www.juniper.es/webservice/2007/RoomList', // Specify the SOAP action if required by the service
        //     ],
        //     'body' => $soapRequest,
        // ]);

        // $responseJson = $response->getBody()->getContents();

        // return $responseJson;

        // $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/JP/WebServiceJP.asmx?WSDL", array(
        //     'soap_version' => 'SOAP_1_2',
        //     'encoding' => 'UTF-8',
        //     'exceptions' => true,
        //     'stream_context' => stream_context_create(array(
        //         'http' => array(
        //             'header' => array(
        //                 'Content-Type: text/xml; charset=UTF-8',
        //                 'Accept-Encoding: gzip, deflate'
        //             )
        //         ),
        //         'ssl' => array(
        //             'verify_peer' => false,
        //             'verify_peer_name' => false
        //         )
        //     )),
        //     'trace' => true,
        //     'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
        // ));

        // $client->__setLocation("https://xml-uat.bookingengine.es/WebService/jp/operations/staticdatatransactions.asmx");

        // $response = $client->RoomList([
        //     "RoomListRQ" =>[
        //         "Version" => "1",
        //         "Language" => "en",
        //         "RecordsPerPage" => "10",
        //         "Login" => [
        //             "Email" => 'Xml_TestXMLTaNefer',
        //             "Password" => 'U3dIp8i*eyAC8N7'
        //         ]
        //     ],
        // ]);

        // return response()->json($response);





        $options = array(
            'soap_version' => SOAP_1_2,
            'encoding' => 'UTF-8',
            'exceptions' => true,
            'trace' => true,
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
        );

        $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/JP/WebServiceJP.asmx?WSDL", $options);

        $requestData = array(
            'RoomListRQ' => array(
                'Version' => '1.1',
                'Language' => 'en',
                'RecordsPerPage' => '10',
                'Login' => array(
                    'Password' => 'U3dIp8i*eyAC8N7',
                    'Email' => 'Xml_TestXMLTaNefer'
                )
            )
        );

        try {
            $response = $client->__soapCall('RoomList', array('parameters' => $requestData));
            return response()->json($response);
        } catch (SoapFault $fault) {
            echo "Error: " . $fault->getMessage();
        }
    }

    public function content(Request $request)
    {
        $hotelCode = $request->hotelCode;
        // $client = new Client();

        // $soapRequest = '
        //         <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns="http://www.juniper.es/webservice/2007/">
        //             <soapenv:Header/>
        //             <soapenv:Body>
        //                 <HotelContent>
        //                     <HotelContentRQ Version="1" Language="en">
        //                     <Login Password="U3dIp8i*eyAC8N7" Email="Xml_TestXMLTaNefer"/>
        //                         <HotelContentList>
        //                             <Hotel Code="'. $hotelCode.'"/>
        //                         </HotelContentList>
        //                     </HotelContentRQ>
        //                 </HotelContent>
        //             </soapenv:Body>
        //         </soapenv:Envelope>
        // ';

        // $response = $client->post('https://xml-uat.bookingengine.es/WebService/jp/operations/staticdatatransactions.asmx', [
        //     'headers' => [
        //         'Content-Type' => 'text/xml;charset=UTF-8',
        //         'Accept-Encoding' => 'gzip, deflate',
        //         'SOAPAction' => 'http://www.juniper.es/webservice/2007/HotelContent', // Specify the SOAP action if required by the service
        //     ],
        //     'body' => $soapRequest,
        // ]);

        // $responseJson = $response->getBody()->getContents();

        // return $responseJson;

        // $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/JP/WebServiceJP.asmx?WSDL", array(
        //     'soap_version' => 'SOAP_1_2',
        //     'encoding' => 'UTF-8',
        //     'exceptions' => true,
        //     'stream_context' => stream_context_create(array(
        //         'http' => array(
        //             'header' => array(
        //                 'Content-Type: text/xml; charset=UTF-8',
        //                 'Accept-Encoding: gzip, deflate'
        //             )
        //         ),
        //         'ssl' => array(
        //             'verify_peer' => false,
        //             'verify_peer_name' => false
        //         )
        //     )),
        //     'trace' => true,
        //     'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
        // ));

        // $client->__setLocation("https://xml-uat.bookingengine.es/WebService/jp/operations/staticdatatransactions.asmx");

        // $response = $client->HotelContentList([
        //     "HotelContentRQ" => [
        //         "Version" => "1",
        //         "Language" => "en",
        //         "Login" => [
        //             "Email" => 'Xml_TestXMLTaNefer',
        //             "Password" => 'U3dIp8i*eyAC8N7'
        //         ],
        //         "HotelContentList" => [
        //             "Hotel" => [
        //                 "Code" => $hotelCode
        //             ]
        //         ]
        //     ],
        // ]);

        // return response()->json($response);



        $options = array(
            'soap_version' => SOAP_1_2,
            'encoding' => 'UTF-8',
            'exceptions' => true,
            'trace' => true,
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
        );

        $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/JP/WebServiceJP.asmx?WSDL", $options);

        // $hotelCode = 'YOUR_HOTEL_CODE'; // Replace with the actual hotel code

        $requestData = array(
            'HotelContentRQ' => array(
                'Version' => '1.1',
                'Language' => 'en',
                'Login' => array(
                    'Password' => 'U3dIp8i*eyAC8N7',
                    'Email' => 'Xml_TestXMLTaNefer'
                ),
                'HotelContentList' => array(
                    'Hotel' => array(
                        'Code' => $hotelCode
                    )
                )
            )
        );

        try {
            $response = $client->__soapCall('HotelContent', array('parameters' => $requestData));
            return response()->json($response);
        } catch (SoapFault $fault) {
            echo "Error: " . $fault->getMessage();
        }
    }

    public function availability(Request $request)
    {
        // $client = new Client();

        // $soapRequest = '
        //     <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
        //         <soapenv:Header/>
        //         <soapenv:Body>
        //             <HotelAvail xmlns="http://www.juniper.es/webservice/2007/">
        //                 <HotelAvailRQ Version="1.1" Language="en">
        //                     <Login Password="U3dIp8i*eyAC8N7" Email="Xml_TestXMLTaNefer"/>
        //                     <Paxes>
        //                         <Pax IdPax="1"/>
        //                     </Paxes>
        //                     <HotelRequest>
        //                         <SearchSegmentsHotels>
        //                             <SearchSegmentHotels Start="2023-09-01" End="2023-09-30"/>
        //                             <CountryOfResidence>ES</CountryOfResidence>
        //                             <HotelCodes>
        //                                 <HotelCode>JP060489</HotelCode>
        //                                 <HotelCode>JP046105</HotelCode>
        //                                 <HotelCode>JP046183</HotelCode>
        //                             </HotelCodes>
        //                         </SearchSegmentsHotels>
        //                         <RelPaxesDist>
        //                             <RelPaxDist>
        //                                 <RelPaxes>
        //                                     <RelPax IdPax="1"/>
        //                                 </RelPaxes>
        //                             </RelPaxDist>
        //                         </RelPaxesDist>
        //                     </HotelRequest>
        //                     <AdvancedOptions>
        //                         <ShowHotelInfo>true</ShowHotelInfo>
        //                         <ShowOnlyBestPriceCombination>true</ShowOnlyBestPriceCombination>
        //                         <TimeOut>8000</TimeOut>
        //                     </AdvancedOptions>
        //                 </HotelAvailRQ>
        //             </HotelAvail>
        //         </soapenv:Body>
        //     </soapenv:Envelope>
        // ';

        // $response = $client->post('https://xml-uat.bookingengine.es/WebService/jp/operations/availtransactions.asmx', [
        //     'headers' => [
        //         'Content-Type' => 'text/xml;charset=UTF-8',
        //         'Accept-Encoding' => 'gzip, deflate',
        //         'SOAPAction' => 'http://www.juniper.es/webservice/2007/HotelAvail',
        //     ],
        //     'body' => $soapRequest,
        // ]);

        // $responseJson = $response->getBody()->getContents();

        // return $responseJson;



        $options = array(
            'soap_version' => SOAP_1_2,
            'encoding' => 'UTF-8',
            'exceptions' => true,
            'trace' => true,
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
        );

        $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/JP/WebServiceJP.asmx?WSDL", $options);

        // $requestData = array(
        //     'HotelAvailRQ' => array(
        //         'Version' => '1.1',
        //         'Language' => 'en',
        //         'Login' => array(
        //             'Password' => 'U3dIp8i*eyAC8N7',
        //             'Email' => 'Xml_TestXMLTaNefer'
        //         ),
        //         'Paxes' => array(
        //             'Pax' => array(
        //                 'IdPax' => '1'
        //             )
        //         ),
        //         'HotelRequest' => array(
        //             'SearchSegmentsHotels' => array(
        //                 'SearchSegmentHotels' => array(
        //                     'Start' => '2023-09-01',
        //                     'End' => '2023-09-30'
        //                 ),
        //                 'CountryOfResidence' => 'ES',
        //                 'HotelCodes' => array(
        //                     'HotelCode' => array(
        //                         'JP060489',
        //                         'JP046105',
        //                         'JP046183'
        //                     )
        //                 )
        //             ),
        //             'RelPaxesDist' => array(
        //                 'RelPaxDist' => array(
        //                     'RelPaxes' => array(
        //                         'RelPax' => array(
        //                             'IdPax' => '1'
        //                         )
        //                     )
        //                 )
        //             )
        //         ),
        //         'AdvancedOptions' => array(
        //             'ShowHotelInfo' => true,
        //             'ShowOnlyBestPriceCombination' => true,
        //             'TimeOut' => '8000'
        //         )
        //     )
        // );

        $requestData = array(
            'HotelAvailRQ' => array(
                'Version' => '1.1',
                'Language' => 'en',
                'Login' => array(
                    'Email' => 'Xml_TestXMLTaNefer',
                    'Password' => 'U3dIp8i*eyAC8N7'
                ),
                'Paxes' => array(
                    'Pax' => array(
                        array('IdPax' => '1', 'Age' => '35'),
                        array('IdPax' => '2', 'Age' => '30'),
                        array('IdPax' => '3', 'Age' => '40')
                    )
                ),
                'HotelRequest' => array(
                    'SearchSegmentsHotels' => array(
                        'SearchSegmentHotels' => array(
                            'Start' => '2023-09-01',
                            'End' => '2023-09-30',
                            'DestinationZone' => '221'
                        ),
                        'CountryOfResidence' => 'EG'
                    ),
                    'RelPaxesDist' => array(
                        'RelPaxDist' => array(
                            'RelPaxes' => array(
                                array('IdPax' => '1'),
                                array('IdPax' => '2'),
                                array('IdPax' => '3')
                            )
                        )
                    )
                ),
                'AdvancedOptions' => array(
                    'ShowHotelInfo' => false,
                    'ShowOnlyBestPriceCombination' => true,
                    'TimeOut' => '8000'
                )
            )
        );

        try {
            $response = $client->__soapCall('HotelAvail', array('parameters' => $requestData));
            return response()->json($response);
        } catch (SoapFault $fault) {
            echo "Error: " . $fault->getMessage();
        }
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

    public function genericDataCatalogue()
    {
        // $client = new Client();

        // $soapRequest = '
        //     <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns="http://www.juniper.es/webservice/2007/">
        //         <soapenv:Header/>
        //         <soapenv:Body>
        //             <GenericDataCatalogue>
        //                 <GenericDataCatalogueRQ Version="1.1" Language="en">
        //                     <Login Password="U3dIp8i*eyAC8N7" Email="Xml_TestXMLTaNefer"/>
        //                     <GenericDataCatalogueRequest Type="COUNTRIES"/>
        //                 </GenericDataCatalogueRQ>
        //             </GenericDataCatalogue>
        //         </soapenv:Body>
        //     </soapenv:Envelope>
        // ';

        // $response = $client->post('https://xml-uat.bookingengine.es/WebService/jp/operations/staticdatatransactions.asmx', [
        //     'headers' => [
        //         'Content-Type' => 'text/xml;charset=UTF-8',
        //         'Accept-Encoding' => 'gzip, deflate',
        //         'SOAPAction' => 'http://www.juniper.es/webservice/2007/GenericDataCatalogue', // Specify the SOAP action if required by the service
        //     ],
        //     'body' => $soapRequest,
        // ]);

        // $responseJson = $response->getBody()->getContents();

        // return $responseJson;




        // $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/JP/WebServiceJP.asmx?WSDL", array(
        //     'soap_version' => 'SOAP_1_2',
        //     'encoding' => 'UTF-8',
        //     'exceptions' => true,
        //     'stream_context' => stream_context_create(array(
        //         'http' => array(
        //             'header' => array(
        //                 'Content-Type: text/xml; charset=UTF-8',
        //                 'Accept-Encoding: gzip, deflate'
        //             )
        //         ),
        //         'ssl' => array(
        //             'verify_peer' => false,
        //             'verify_peer_name' => false
        //         )
        //     )),
        //     'trace' => true,
        //     'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
        // ));

        // $client->__setLocation("https://xml-uat.bookingengine.es/WebService/jp/operations/staticdatatransactions.asmx");

        // $response = $client->GenericDataCatalogue([
        //     "GenericDataCatalogueRQ " => [
        //         "Version" => "1.1",
        //         "Language" => "en",
        //         "Login" => [
        //             "Email" => 'Xml_TestXMLTaNefer',
        //             "Password" => 'U3dIp8i*eyAC8N7'
        //         ],
        //         "GenericDataCatalogueRequest" => [
        //             "Type" => "COUNTRIES"
        //         ]
        //     ],
        // ]);

        // return response()->json($response);


        $options = array(
            'soap_version' => SOAP_1_2,
            'encoding' => 'UTF-8',
            'exceptions' => true,
            'trace' => true,
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
        );

        $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/JP/WebServiceJP.asmx?WSDL", $options);

        $requestData = array(
            'GenericDataCatalogueRQ' => array(
                'Version' => '1.1',
                'Language' => 'en',
                'Login' => array(
                    'Password' => 'U3dIp8i*eyAC8N7',
                    'Email' => 'Xml_TestXMLTaNefer'
                ),
                'GenericDataCatalogueRequest' => array(
                    'Type' => 'COUNTRIES'
                )
            )
        );

        try {
            $response = $client->__soapCall('GenericDataCatalogue', array('parameters' => $requestData));
            // var_dump($response);
            return response()->json($response);
        } catch (SoapFault $fault) {
            echo "Error: " . $fault->getMessage();
        }
    }

    public function zoneList()
    {
        // $client = new Client();

        // $soapRequest = '
        //     <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns="http://www.juniper.es/webservice/2007/">
        //         <soapenv:Header/>
        //         <soapenv:Body>
        //             <ZoneList>
        //                 <ZoneListRQ Version="1.1" Language="en">
        //                     <Login Password="U3dIp8i*eyAC8N7" Email="Xml_TestXMLTaNefer"/>
        //                     <ZoneListRequest ProductType="HOT"/>
        //                 </ZoneListRQ>
        //             </ZoneList>
        //         </soapenv:Body>
        //     </soapenv:Envelope>
        // ';

        // $response = $client->post('https://xml-uat.bookingengine.es/WebService/jp/operations/staticdatatransactions.asmx', [
        //     'headers' => [
        //         'Content-Type' => 'text/xml;charset=UTF-8',
        //         'Accept-Encoding' => 'gzip, deflate',
        //         'SOAPAction' => 'http://www.juniper.es/webservice/2007/ZoneList', // Specify the SOAP action if required by the service
        //     ],
        //     'body' => $soapRequest,
        // ]);

        // $responseJson = $response->getBody()->getContents();

        // return $responseJson;




        ini_set('memory_limit', '-1');

        $options = array(
            'soap_version' => SOAP_1_2,
            'encoding' => 'UTF-8',
            'exceptions' => true,
            'trace' => true,
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
        );

        $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/JP/WebServiceJP.asmx?WSDL", $options);

        $requestData = array(
            'ZoneListRQ' => array(
                'Version' => '1.1',
                'Language' => 'en',
                'Login' => array(
                    'Password' => 'U3dIp8i*eyAC8N7',
                    'Email' => 'Xml_TestXMLTaNefer'
                ),
                'ZoneListRequest' => array(
                    'ProductType' => 'HOT'
                )
            )
        );

        try {
            $response = $client->__soapCall('ZoneList', array('parameters' => $requestData));
            return response()->json($response);
        } catch (SoapFault $fault) {
            echo "Error: " . $fault->getMessage();
        }
    }

    public function cityList()
    {
        ini_set('memory_limit', '-1');

        $options = array(
            'soap_version' => SOAP_1_2,
            'encoding' => 'UTF-8',
            'exceptions' => true,
            'trace' => true,
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
        );

        $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/JP/WebServiceJP.asmx?WSDL", $options);

        $requestData = array(
            'CityListRQ' => array(
                'Version' => '1.1',
                'Language' => 'en',
                'Login' => array(
                    'Password' => 'U3dIp8i*eyAC8N7',
                    'Email' => 'Xml_TestXMLTaNefer'
                )
            )
        );

        try {
            $response = $client->__soapCall('CityList', array('parameters' => $requestData));
            return response()->json($response);
        } catch (SoapFault $fault) {
            echo "Error: " . $fault->getMessage();
        }
    }

    public function hotelList()
    {
        // $options = array(
        //     'location' => 'https://xml-uat.bookingengine.es/WebService/jp/operations/staticdatatransactions.asmx',
        //     'soap_version' => SOAP_1_2,  // Use SOAP 1.2
        //     'cache_wsdl' => WSDL_CACHE_NONE,  // Don't cache the WSDL
        //     'encoding' => 'UTF-8',
        //     'uri' => 'http://www.juniper.es/webservice/2007/',
        //     'stream_context' => stream_context_create(array(
        //         'http' => array(
        //             'header' => array(
        //                 'Content-Type: text/xml; charset=UTF-8',
        //                 'Accept-Encoding: gzip, deflate',
        //                 // 'SOAPAction' => 'http://www.juniper.es/webservice/2007/HotelPortfolio'
        //             )
        //         ),
        //         'ssl' => array(
        //             'verify_peer' => false,
        //             'verify_peer_name' => false
        //         )
        //     )),
        //     'trace' => true,
        //     'exceptions' => true,
        //     'connection_timeout' => 180,
        //     'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
        //     'login' => 'Xml_TestXMLTaNefer',
        //     'password' => 'U3dIp8i*eyAC8N7',
        //     // 'SOAPAction' => 'http://www.juniper.es/webservice/2007/HotelPortfolio'
        // );

        // $client = new \SoapClient(null, $options);

        // $params = array(
        //     'Version' => '1.1',
        //     'Language' => 'en',
        //     'Page' => 1,
        //     'RecordsPerPage' => 500
        // );

        // $login = new \stdClass();
        // $login->Login = $params;

        // $portfolioRequest = new \stdClass();
        // $portfolioRequest->HotelPortfolioRQ = $login;

        // // Create a SoapHeader with the SOAPAction
        // $headers = new \SoapHeader('http://www.w3.org/2005/08/addressing', 'Action', 'http://www.juniper.es/webservice/2007/HotelPortfolio', false);
        // $client->__setSoapHeaders($headers);

        // try {
        //     $response = $client->__soapCall('HotelPortfolio', array($portfolioRequest));
        //     return $response;
        // } catch (SoapFault $fault) {
        //     echo "Error: " . $fault->getMessage();
        // }







        // $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/JP/WebServiceJP.asmx?WSDL", array(
        //     'soap_version' => 'SOAP_1_2',
        //     'encoding' => 'UTF-8',
        //     'exceptions' => true,
        //     'stream_context' => stream_context_create(array(
        //         'http' => array(
        //             'header' => array(
        //                 'Content-Type: text/xml; charset=UTF-8',
        //                 'Accept-Encoding: gzip, deflate'
        //             )
        //         ),
        //         'ssl' => array(
        //             'verify_peer' => false,
        //             'verify_peer_name' => false
        //         )
        //     )),
        //     'trace' => true,
        //     'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
        // ));

        // $client->__setLocation("https://xml-uat.bookingengine.es/WebService/jp/operations/staticdatatransactions.asmx");

        // $response = $client->HotelPortfolio([
        //     "HotelPortfolioRQ" =>[
        //         "Version" => "1.1",
        //         "Language" => "en",
        //         "Page" => "1",
        //         "RecordsPerPage" => "10",
        //         "Login" => [
        //             "Email" => 'Xml_TestXMLTaNefer',
        //             "Password" => 'U3dIp8i*eyAC8N7'
        //         ]
        //     ],
        // ]);

        // // dd($response);
        // return response()->json($response);
        // // $responseJson = $response->getBody()->getContents();
        // // return $responseJson;





        // $client = new Client();

        // $soapRequest = '
        //     <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns="http://www.juniper.es/webservice/2007/">
        //         <soapenv:Header/>
        //         <soapenv:Body>
        //             <HotelList>
        //                 <HotelListRQ Version="1.1" Language="en">
        //                     <Login Password="U3dIp8i*eyAC8N7" Email="Xml_TestXMLTaNefer"/>
        //                     <HotelListRequest ZoneCode="2" ShowBasicInfo="true"/>
        //                 </HotelListRQ>
        //             </HotelList>
        //         </soapenv:Body>
        //     </soapenv:Envelope>
        // ';

        // $response = $client->post('https://xml-uat.bookingengine.es/WebService/jp/operations/staticdatatransactions.asmx', [
        //     'headers' => [
        //         'Content-Type' => 'text/xml;charset=UTF-8',
        //         'Accept-Encoding' => 'gzip, deflate',
        //         'SOAPAction' => 'http://www.juniper.es/webservice/2007/HotelList', // Specify the SOAP action if required by the service
        //     ],
        //     'body' => $soapRequest,
        // ]);

        // $responseJson = $response->getBody()->getContents();

        // return $responseJson;



        // $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/JP/WebServiceJP.asmx?WSDL", array(
        //     'soap_version' => 'SOAP_1_2',
        //     'encoding' => 'UTF-8',
        //     'exceptions' => true,
        //     'stream_context' => stream_context_create(array(
        //         'http' => array(
        //             'header' => array(
        //                 'Content-Type: text/xml; charset=UTF-8',
        //                 'Accept-Encoding: gzip, deflate'
        //             )
        //         ),
        //         'ssl' => array(
        //             'verify_peer' => false,
        //             'verify_peer_name' => false
        //         )
        //     )),
        //     'trace' => true,
        //     'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
        // ));

        // $client->__setLocation("https://xml-uat.bookingengine.es/WebService/jp/operations/staticdatatransactions.asmx");

        // $response = $client->HotelListRequest([
        //     "ZoneCode" => "2",
        //     "ShowBasicInfo" => "true",
        //     "HotelListRQ" =>[
        //         "Version" => "1.1",
        //         "Language" => "en",
        //         "Login" => [
        //             "Email" => 'Xml_TestXMLTaNefer',
        //             "Password" => 'U3dIp8i*eyAC8N7'
        //         ]
        //     ],
        // ]);

        // return response()->json($response);




        $options = array(
            'soap_version' => SOAP_1_2,
            'encoding' => 'UTF-8',
            'exceptions' => true,
            'trace' => true,
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
        );

        $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/JP/WebServiceJP.asmx?WSDL", $options);

        $requestData = array(
            'HotelListRQ' => array(
                'Version' => '1.1',
                'Language' => 'en',
                'Login' => array(
                    'Password' => 'U3dIp8i*eyAC8N7',
                    'Email' => 'Xml_TestXMLTaNefer'
                ),
                'ZoneCode' => '41',
                'ShowBasicInfo' => 'true',
            )
        );

        try {
            $response = $client->__soapCall('HotelList', array('parameters' => $requestData));
            // var_dump($response);
            return response()->json($response);
        } catch (SoapFault $fault) {
            echo "Error: " . $fault->getMessage();
        }
    }

    public function hotelCatalogueData() {
        $options = array(
            'soap_version' => SOAP_1_2,
            'encoding' => 'UTF-8',
            'exceptions' => true,
            'trace' => true,
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
        );

        $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/JP/WebServiceJP.asmx?WSDL", $options);

        $requestData = array(
            'HotelCatalogueDataRQ' => array(
                'Version' => '1.1',
                'Language' => 'en',
                'Login' => array(
                    'Password' => 'U3dIp8i*eyAC8N7',
                    'Email' => 'Xml_TestXMLTaNefer'
                )
            )
        );

        try {
            $response = $client->__soapCall('HotelCatalogueData', array('parameters' => $requestData));
            // var_dump($response);
            return response()->json($response);
        } catch (SoapFault $fault) {
            echo "Error: " . $fault->getMessage();
        }
    }
}
