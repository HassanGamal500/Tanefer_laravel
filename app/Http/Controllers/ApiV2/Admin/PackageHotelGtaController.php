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
        $options = array(
            'soap_version' => SOAP_1_2,
            'encoding' => 'UTF-8',
            'exceptions' => true,
            'trace' => true,
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
        );

        $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/JP/WebServiceJP.asmx?WSDL", $options);

        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $hotels = $request->hotels;
        $adults = $request->adults;
        $children = $request->children;
        $ages = $request->ages;

        $paxes = array();
        $relPaxes = array();

        for ($x = 1; $x <= $adults; $x++) {
            $paxNumber = (string)$x;
            $paxes[] = array('IdPax' => $paxNumber);
        }

        if(isset($children) && $children > 0) {
            for ($y = 0; $y < $children; $y++) {
                $paxNumber = (string)($y + $adults + 1);
                $paxes[] = array('IdPax' => $paxNumber, 'Age' => $ages[$y]);
            }
        }

        for ($x = 1; $x <= $adults; $x++) {
            $paxNumber = (string)$x;
            $relPaxes[] = array('IdPax' => $paxNumber);
        }

        if(isset($children) && $children > 0) {
            for ($y = 0; $y < $children; $y++) {
                $paxNumber = (string)($y + $adults + 1);
                $relPaxes[] = array('IdPax' => $paxNumber);
            }
        }

        $hotelCodes = array(
            'HotelCode' => $hotels
        );

        $requestData = array(
            'HotelAvailRQ' => array(
                'Version' => '1.1',
                'Language' => 'en',
                'Login' => array(
                    'Email' => 'Xml_TestXMLTaNefer',
                    'Password' => 'U3dIp8i*eyAC8N7'
                ),
                'Paxes' => array(
                    'Pax' => $paxes
                ),
                'HotelRequest' => array(
                    'SearchSegmentsHotels' => array(
                        'SearchSegmentHotels' => array(
                            'Start' => $startDate,
                            'End' => $endDate
                        ),
                        'CountryOfResidence' => 'ES',
                        'HotelCodes' => $hotelCodes
                    ),
                    'RelPaxesDist' => array(
                        'RelPaxDist' => array(
                            'RelPaxes' => $relPaxes
                        )
                    )
                ),
                'AdvancedOptions' => array(
                    'ShowHotelInfo' => false,
                    'ShowCancellationPolicies' => true,
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
        // $client = new Client();

        // $soapRequest = '
        //     <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns="http://www.juniper.es/webservice/2007/">
        //         <soapenv:Header/>
        //         <soapenv:Body>
        //             <HotelBookingRules>
        //                 <HotelBookingRulesRQ Version="1.1" Language="{{Language}}">
        //                 <Login Password="U3dIp8i*eyAC8N7" Email="Xml_TestXMLTaNefer"/>
        //                     <HotelBookingRulesRequest>
        //                         <HotelOption RatePlanCode="'.$RatePlanCode.'"/>
        //                         <SearchSegmentsHotels>
        //                             <SearchSegmentHotels Start="'.$StartDate.'" End="'.$EndDate.'"/>
        //                             <HotelCodes>
        //                                 <HotelCode>'.$HotelCode.'</HotelCode>
        //                             </HotelCodes>
        //                         </SearchSegmentsHotels>
        //                     </HotelBookingRulesRequest>
        //                     <AdvancedOptions>
        //                         <ShowBreakdownPrice>true</ShowBreakdownPrice>
        //                     </AdvancedOptions>
        //                 </HotelBookingRulesRQ>
        //             </HotelBookingRules>
        //         </soapenv:Body>
        //     </soapenv:Envelope>
        // ';

        // $response = $client->post('https://xml-uat.bookingengine.es/WebService/jp/operations/checktransactions.asmx', [
        //     'headers' => [
        //         'Content-Type' => 'text/xml;charset=UTF-8',
        //         'Accept-Encoding' => 'gzip, deflate',
        //         'SOAPAction' => 'http://www.juniper.es/webservice/2007/HotelCheckAvail',
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
        // $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/jp/operations/checktransactions.asmx?WSDL", $options);

        $requestData = array(
            'HotelBookingRulesRQ' => array(
                'Version' => '1.1',
                'Language' => 'en',
                'Login' => array(
                    'Email' => 'Xml_TestXMLTaNefer',
                    'Password' => 'U3dIp8i*eyAC8N7'
                ),
                'HotelBookingRulesRequest' => array(
                    'HotelOption' => array(
                        'RatePlanCode' => $RatePlanCode
                    ),
                    'SearchSegmentsHotels' => array(
                        'SearchSegmentHotels' => array(
                            'Start' => $StartDate,
                            'End' => $EndDate
                        ),
                        'HotelCodes' => array(
                            'HotelCode' => $HotelCode
                        )
                    )
                ),
                'AdvancedOptions' => array(
                    'ShowBreakdownPrice' => 'true'
                )
            )
        );

        try {
            $response = $client->__soapCall('HotelBookingRules', array('parameters' => $requestData));
            return response()->json($response);
            // var_dump($response);
        } catch (SoapFault $fault) {
            echo "Error: " . $fault->getMessage();
        }
    }

    public function Booking(Request $request)
    {
        $language = "en"; // Replace with the actual language
        $guid = "ExternalFakeRef"; // Replace with the actual GUID
        $bookingCode = $request->bookingCode; // Replace with the actual booking code
        $startDate = $request->startDate; // Replace with the actual start date
        $endDate = $request->endDate; // Replace with the actual end date
        $HotelCode = $request->HotelCode;
        $priceRange = array(
            'Minimum' => $request->minimumPrice, // Replace with the actual minimum price
            'Maximum' => $request->maximumPrice, // Replace with the actual maximum price
            'Currency' => $request->currency // Replace with the actual currency
        );

        $phoneNumber = $request->phone_number;
        $title = $request->title;
        $name = $request->name;
        $surname = $request->surname;
        $age = $request->age;
        $email = $request->email;
        $nationality = $request->nationality;
        $names = $request->names;
        $surnames = $request->surnames;
        $ages = $request->ages;

        $paxes = array();
        $paxes[] = array(
            'IdPax' => "1",
            'PhoneNumbers' => array(
                'PhoneNumber' => $phoneNumber
            ),
            'Title' => $title,
            'Name' => $name,
            'Surname' => $surname,
            'Age' => $age,
            'Email' => $email,
            'Nationality' => $nationality
        );

        if(isset($names) && count($names) > 0) {
           for ($x = 0; $x < count($names); $x++) {
                $paxNumber = (string) ($x + 2);
                $paxes[] = array(
                    'IdPax'     => $paxNumber,
                    'Name'      => $names[$x],
                    'Surname'   => $surnames[$x],
                    'Age'       => $ages[$x]
                );
            }
        }

        $relPaxes = array();
        $relPaxes[] = array('IdPax' => "1");

        if(isset($names) && count($names) > 0) {
            for ($y = 0; $y < count($names); $y++) {
                $paxNumber = (string)($y + 2);
                $relPaxes[] = array('IdPax' => $paxNumber);
            }
        }

        $options = array(
            'soap_version' => SOAP_1_2,
            'encoding' => 'UTF-8',
            'exceptions' => true,
            'trace' => true,
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
        );

        $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/JP/WebServiceJP.asmx?WSDL", $options);

        $requestData = array(
            'HotelBookingRQ' => array(
                'Version' => '1.1',
                'Language' => $language,
                'Login' => array(
                    'Email' => 'Xml_TestXMLTaNefer',
                    'Password' => 'U3dIp8i*eyAC8N7'
                ),
                'Paxes' => array(
                    'Pax' => $paxes
                ),
                'Holder' => array(
                    'RelPax' => array('IdPax' => "1")
                ),
                'ExternalBookingReference' => $guid,
                'Elements' => array(
                    'HotelElement' => array(
                        'BookingCode' => $bookingCode,
                        'RelPaxesDist' => array(
                            'RelPaxDist' => array(
                                'RelPaxes' => $relPaxes
                            )
                        ),
                        'HotelBookingInfo' => array(
                            'Start' => $startDate,
                            'End' => $endDate,
                            'Price' => array(
                                'PriceRange' => array(
                                    'Minimum' => $priceRange['Minimum'],
                                    'Maximum' => $priceRange['Maximum'],
                                    'Currency' => $priceRange['Currency']
                                )
                            ),
                            'HotelCode' => $HotelCode
                        )
                    )
                )
            )
        );

        try {
            $response = $client->__soapCall('HotelBooking', array('parameters' => $requestData));
            return response()->json($response);
        } catch (SoapFault $fault) {
            echo "Error: " . $fault->getMessage();
        }
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

    public function hotelCatalogueData()
    {
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

    public function availabilityRS(Request $request)
    {
        $options = array(
            'soap_version' => SOAP_1_2,
            'encoding' => 'UTF-8',
            'exceptions' => true,
            'trace' => true,
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
        );

        $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/JP/WebServiceJP.asmx?WSDL", $options);

        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $hotels = $request->hotels;
        $adults = $request->adults;
        $children = $request->children;

        $paxes = array();
        $relPaxes = array();

        for ($x = 1; $x <= $adults; $x++) {
            $paxNumber = (string)$x;
            $paxes[] = array('IdPax' => $paxNumber);
        }

        for ($x = 1; $x <= $adults; $x++) {
            $paxNumber = (string)$x;
            $relPaxes[] = array('IdPax' => $paxNumber);
        }

        $hotelCodes = array(
            'HotelCode' => $hotels
        );

        $requestData = array(
            'HotelAvailRQ' => array(
                'Version' => '1.1',
                'Language' => 'en',
                'Login' => array(
                    'Email' => 'Xml_TestXMLTaNefer',
                    'Password' => 'U3dIp8i*eyAC8N7'
                ),
                'Paxes' => array(
                    'Pax' => $paxes
                ),
                'HotelRequest' => array(
                    'SearchSegmentsHotels' => array(
                        'SearchSegmentHotels' => array(
                            'Start' => $startDate,
                            'End' => $endDate,
                            // 'DestinationZone' => '15011'
                        ),
                        'CountryOfResidence' => 'ES',
                        'HotelCodes' => array(
                            'HotelCode' => array(
                                'JP046300'
                            )
                        )
                    ),
                    'RelPaxesDist' => array(
                        'RelPaxDist' => array(
                            'RelPaxes' => $relPaxes
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
        // dd($requestData);
        // return response()->json($requestData);

        try {
            $response = $client->__soapCall('HotelAvail', array('parameters' => $requestData));
            return response()->json($response);
        } catch (SoapFault $fault) {
            echo "Error: " . $fault->getMessage();
        }
    }

    public function testResponseHotelAvail()
    {
        $data = array(
            'AvailabilityRS' =>
            array(
                'Results' =>
                array(
                    'HotelResult' =>
                    array(
                        0 =>
                        array(
                            'HotelOptions' =>
                            array(
                                'HotelOption' =>
                                array(
                                    0 =>
                                    array(
                                        'Board' =>
                                        array(
                                            '@value' => 'BED AND BREAKFAST',
                                            '@attributes' =>
                                            array(
                                                'Type' => 'AD',
                                            ),
                                        ),
                                        'Prices' =>
                                        array(
                                            'Price' =>
                                            array(
                                                'TotalFixAmounts' =>
                                                array(
                                                    'Service' =>
                                                    array(
                                                        '@value' => '',
                                                        '@attributes' =>
                                                        array(
                                                            'Amount' => '218.64',
                                                        ),
                                                    ),
                                                    '@attributes' =>
                                                    array(
                                                        'Gross' => '218.64',
                                                        'Nett' => '218.64',
                                                    ),
                                                ),
                                                '@attributes' =>
                                                array(
                                                    'Type' => 'S',
                                                    'Currency' => 'EUR',
                                                ),
                                            ),
                                        ),
                                        'HotelRooms' =>
                                        array(
                                            'HotelRoom' =>
                                            array(
                                                0 =>
                                                array(
                                                    'Name' => 'DOUBLE SINGLE USE STANDARD',
                                                    'RoomCategory' =>
                                                    array(
                                                        '@value' => '',
                                                        '@attributes' =>
                                                        array(
                                                            'Type' => 'DUS.ST',
                                                        ),
                                                    ),
                                                    '@attributes' =>
                                                    array(
                                                        'Units' => '1',
                                                        'Source' => '1',
                                                    ),
                                                ),
                                                1 =>
                                                array(
                                                    'Name' => 'Double or Twin STANDARD',
                                                    'RoomCategory' =>
                                                    array(
                                                        '@value' => '',
                                                        '@attributes' =>
                                                        array(
                                                            'Type' => 'DBT.ST',
                                                        ),
                                                    ),
                                                    '@attributes' =>
                                                    array(
                                                        'Units' => '1',
                                                        'Source' => '2',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'AdditionalElements' =>
                                        array(
                                            'HotelOffers' =>
                                            array(
                                                'HotelOffer' =>
                                                array(
                                                    'Name' => 'Special Offer',
                                                    'Description' => 'Special offer - Special offer',
                                                    '@attributes' =>
                                                    array(
                                                        'Begin' => '2019-11-20',
                                                        'End' => '2019-11-22',
                                                        'RoomCategory' => 'DUS.ST',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        '@attributes' =>
                                        array(
                                            'RatePlanCode' => 'bseM9QAwf0kqHpQVCRbxJ+QmgH4snflsSkx3RWyY+aDPNrKniKsx6TJDOPbgpZCq15cR1LBHAHoWhYpd1dTyjBv6H1YKq7Yo1nlMwmP20c0VLH.....',
                                            'Status' => 'OK',
                                            'NonRefundable' => 'false',
                                            'PackageContract' => 'false',
                                        ),
                                    ),
                                    1 =>
                                    array(
                                        'Board' =>
                                        array(
                                            '@value' => 'HALF BOARD',
                                            '@attributes' =>
                                            array(
                                                'Type' => 'MP',
                                            ),
                                        ),
                                        'Prices' =>
                                        array(
                                            'Price' =>
                                            array(
                                                'TotalFixAmounts' =>
                                                array(
                                                    'Service' =>
                                                    array(
                                                        '@value' => '',
                                                        '@attributes' =>
                                                        array(
                                                            'Amount' => '237.5',
                                                        ),
                                                    ),
                                                    '@attributes' =>
                                                    array(
                                                        'Gross' => '237.5',
                                                        'Nett' => '237.5',
                                                    ),
                                                ),
                                                '@attributes' =>
                                                array(
                                                    'Type' => 'S',
                                                    'Currency' => 'EUR',
                                                ),
                                            ),
                                        ),
                                        'HotelRooms' =>
                                        array(
                                            'HotelRoom' =>
                                            array(
                                                0 =>
                                                array(
                                                    'Name' => 'DOUBLE SINGLE USE STANDARD',
                                                    'RoomCategory' =>
                                                    array(
                                                        '@value' => '',
                                                        '@attributes' =>
                                                        array(
                                                            'Type' => 'DUS.ST',
                                                        ),
                                                    ),
                                                    '@attributes' =>
                                                    array(
                                                        'Units' => '1',
                                                        'Source' => '1',
                                                    ),
                                                ),
                                                1 =>
                                                array(
                                                    'Name' => 'Double or Twin STANDARD',
                                                    'RoomCategory' =>
                                                    array(
                                                        '@value' => '',
                                                        '@attributes' =>
                                                        array(
                                                            'Type' => 'DBT.ST',
                                                        ),
                                                    ),
                                                    '@attributes' =>
                                                    array(
                                                        'Units' => '1',
                                                        'Source' => '2',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'AdditionalElements' =>
                                        array(
                                            'HotelOffers' =>
                                            array(
                                                'HotelOffer' =>
                                                array(
                                                    'Name' => 'Special Offer',
                                                    'Description' => 'Special offer. Special offer',
                                                    '@attributes' =>
                                                    array(
                                                        'Begin' => '2019-11-20',
                                                        'End' => '2019-11-22',
                                                        'RoomCategory' => 'DUS.ST',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        '@attributes' =>
                                        array(
                                            'RatePlanCode' => 'bseM9QAwf0kqHpQVCRbxJ+QmgH4snflsSkx3RWyY+aAkwFCoaVOcE2JyDqqO2slDqZ4xlFV0G5rAUxS7yPIx7WRT5aHDWukvZwtRpCm.....',
                                            'Status' => 'OK',
                                            'NonRefundable' => 'false',
                                            'PackageContract' => 'false',
                                        ),
                                    ),
                                ),
                            ),
                            '@attributes' =>
                            array(
                                'Code' => 'JP150074',
                                'JPCode' => 'JP150074',
                                'JPDCode' => 'JPD086188',
                                'BestDeal' => 'false',
                                'DestinationZone' => '48782',
                            ),
                        ),
                        1 =>
                        array(
                            'HotelOptions' =>
                            array(
                                'HotelOption' =>
                                array(
                                    'Board' =>
                                    array(
                                        '@value' => 'ROOM ONLY',
                                        '@attributes' =>
                                        array(
                                            'Type' => 'SA',
                                        ),
                                    ),
                                    'Prices' =>
                                    array(
                                        'Price' =>
                                        array(
                                            'TotalFixAmounts' =>
                                            array(
                                                'Service' =>
                                                array(
                                                    '@value' => '',
                                                    '@attributes' =>
                                                    array(
                                                        'Amount' => '249.8',
                                                    ),
                                                ),
                                                '@attributes' =>
                                                array(
                                                    'Gross' => '249.8',
                                                    'Nett' => '249.8',
                                                ),
                                            ),
                                            '@attributes' =>
                                            array(
                                                'Type' => 'S',
                                                'Currency' => 'EUR',
                                            ),
                                        ),
                                    ),
                                    'HotelRooms' =>
                                    array(
                                        'HotelRoom' =>
                                        array(
                                            0 =>
                                            array(
                                                'Name' => 'DOUBLE SINGLE USE STANDARD',
                                                'RoomCategory' =>
                                                array(
                                                    '@value' => '',
                                                    '@attributes' =>
                                                    array(
                                                        'Type' => 'DUS.ST',
                                                    ),
                                                ),
                                                '@attributes' =>
                                                array(
                                                    'Units' => '1',
                                                    'Source' => '1',
                                                ),
                                            ),
                                            1 =>
                                            array(
                                                'Name' => 'Double or Twin STANDARD',
                                                'RoomCategory' =>
                                                array(
                                                    '@value' => '',
                                                    '@attributes' =>
                                                    array(
                                                        'Type' => 'DBT.ST',
                                                    ),
                                                ),
                                                '@attributes' =>
                                                array(
                                                    'Units' => '1',
                                                    'Source' => '2',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'AdditionalElements' =>
                                    array(
                                        'HotelOffers' =>
                                        array(
                                            'HotelOffer' =>
                                            array(
                                                'Name' => 'Non-refundable rate. No amendments permitted',
                                                'Description' => 'Non-refundable rate. No amendments permitted',
                                                '@attributes' =>
                                                array(
                                                    'Begin' => '2019-11-20',
                                                    'End' => '2019-11-22',
                                                    'RoomCategory' => 'DUS.ST',
                                                ),
                                            ),
                                        ),
                                    ),
                                    '@attributes' =>
                                    array(
                                        'RatePlanCode' => 'c98OjjwLn7d5JZZLls8jXfugjnkj+Fw/gQB8GgU4C2cCQgyWG50bpVdAw0Yk8V6RCNF45xgKKBxe791BH1FgsijwG4/2OBdJvmM+b4r.....',
                                        'Status' => 'OK',
                                        'NonRefundable' => 'true',
                                        'PackageContract' => 'false',
                                    ),
                                ),
                            ),
                            '@attributes' =>
                            array(
                                'Code' => 'JP046391',
                                'JPCode' => 'JP046391',
                                'JPDCode' => 'JPD079092',
                                'BestDeal' => 'false',
                                'DestinationZone' => '42455',
                            ),
                        ),
                        2 =>
                        array(
                            'HotelOptions' =>
                            array(
                                'HotelOption' =>
                                array(
                                    0 =>
                                    array(
                                        'Board' =>
                                        array(
                                            '@value' => 'Room Only',
                                            '@attributes' =>
                                            array(
                                                'Type' => 'SA',
                                            ),
                                        ),
                                        'Prices' =>
                                        array(
                                            'Price' =>
                                            array(
                                                'TotalFixAmounts' =>
                                                array(
                                                    'Service' =>
                                                    array(
                                                        '@value' => '',
                                                        '@attributes' =>
                                                        array(
                                                            'Amount' => '406.48',
                                                        ),
                                                    ),
                                                    'ServiceTaxes' =>
                                                    array(
                                                        '@value' => '',
                                                        '@attributes' =>
                                                        array(
                                                            'Included' => 'false',
                                                            'Amount' => '40.65',
                                                        ),
                                                    ),
                                                    '@attributes' =>
                                                    array(
                                                        'Gross' => '447.13',
                                                        'Nett' => '447.13',
                                                    ),
                                                ),
                                                '@attributes' =>
                                                array(
                                                    'Type' => 'S',
                                                    'Currency' => 'EUR',
                                                ),
                                            ),
                                        ),
                                        'HotelRooms' =>
                                        array(
                                            'HotelRoom' =>
                                            array(
                                                0 =>
                                                array(
                                                    'Name' => 'Non refundable room',
                                                    'RoomCategory' =>
                                                    array(
                                                        '@value' => 'Category 2',
                                                        '@attributes' =>
                                                        array(
                                                            'Type' => '2',
                                                        ),
                                                    ),
                                                    'RoomOccupancy' =>
                                                    array(
                                                        '@value' => '',
                                                        '@attributes' =>
                                                        array(
                                                            'Occupancy' => '1',
                                                            'Adults' => '1',
                                                            'Children' => '0',
                                                        ),
                                                    ),
                                                    '@attributes' =>
                                                    array(
                                                        'Units' => '1',
                                                        'Source' => '1',
                                                        'AvailRooms' => '100',
                                                    ),
                                                ),
                                                1 =>
                                                array(
                                                    'Name' => 'Non refundable room',
                                                    'RoomCategory' =>
                                                    array(
                                                        '@value' => 'Category 2',
                                                        '@attributes' =>
                                                        array(
                                                            'Type' => '2',
                                                        ),
                                                    ),
                                                    'RoomOccupancy' =>
                                                    array(
                                                        '@value' => '',
                                                        '@attributes' =>
                                                        array(
                                                            'Occupancy' => '2',
                                                            'Adults' => '1',
                                                            'Children' => '1',
                                                        ),
                                                    ),
                                                    '@attributes' =>
                                                    array(
                                                        'Units' => '1',
                                                        'Source' => '2',
                                                        'AvailRooms' => '99',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'AdditionalElements' =>
                                        array(
                                            'HotelOffers' =>
                                            array(
                                                'HotelOffer' =>
                                                array(
                                                    'Name' => '[2019] 5% discount',
                                                    'Description' => 'Offer description',
                                                    '@attributes' =>
                                                    array(
                                                        'Code' => '843',
                                                        'Category' => 'GEN',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        '@attributes' =>
                                        array(
                                            'RatePlanCode' => 'ya79dM4dS6R6EywV4XhfEvwItLN5sfa4xcKoRWYtG4YXaAFcoYl/FpRuCFCh+uxEwbrmOsEggbZmAGCui7pl+tgMj/w39NVt.....',
                                            'Status' => 'OK',
                                            'NonRefundable' => 'true',
                                            'PackageContract' => 'false',
                                        ),
                                    ),
                                    1 =>
                                    array(
                                        'Board' =>
                                        array(
                                            '@value' => 'Room Only',
                                            '@attributes' =>
                                            array(
                                                'Type' => 'SA',
                                            ),
                                        ),
                                        'Prices' =>
                                        array(
                                            'Price' =>
                                            array(
                                                'TotalFixAmounts' =>
                                                array(
                                                    'Service' =>
                                                    array(
                                                        '@value' => '',
                                                        '@attributes' =>
                                                        array(
                                                            'Amount' => '406.48',
                                                        ),
                                                    ),
                                                    'ServiceTaxes' =>
                                                    array(
                                                        '@value' => '',
                                                        '@attributes' =>
                                                        array(
                                                            'Included' => 'false',
                                                            'Amount' => '40.65',
                                                        ),
                                                    ),
                                                    '@attributes' =>
                                                    array(
                                                        'Gross' => '447.13',
                                                        'Nett' => '447.13',
                                                    ),
                                                ),
                                                '@attributes' =>
                                                array(
                                                    'Type' => 'S',
                                                    'Currency' => 'EUR',
                                                ),
                                            ),
                                        ),
                                        'HotelRooms' =>
                                        array(
                                            'HotelRoom' =>
                                            array(
                                                0 =>
                                                array(
                                                    'Name' => 'Single',
                                                    'RoomCategory' =>
                                                    array(
                                                        '@value' => 'Category 1',
                                                        '@attributes' =>
                                                        array(
                                                            'Type' => '1',
                                                        ),
                                                    ),
                                                    'RoomOccupancy' =>
                                                    array(
                                                        '@value' => '',
                                                        '@attributes' =>
                                                        array(
                                                            'Occupancy' => '1',
                                                            'Adults' => '1',
                                                            'Children' => '0',
                                                        ),
                                                    ),
                                                    '@attributes' =>
                                                    array(
                                                        'Units' => '1',
                                                        'Source' => '1',
                                                        'AvailRooms' => '800',
                                                    ),
                                                ),
                                                1 =>
                                                array(
                                                    'Name' => 'Non refundable room',
                                                    'RoomCategory' =>
                                                    array(
                                                        '@value' => 'Category 2',
                                                        '@attributes' =>
                                                        array(
                                                            'Type' => '2',
                                                        ),
                                                    ),
                                                    'RoomOccupancy' =>
                                                    array(
                                                        '@value' => '',
                                                        '@attributes' =>
                                                        array(
                                                            'Occupancy' => '2',
                                                            'Adults' => '1',
                                                            'Children' => '1',
                                                        ),
                                                    ),
                                                    '@attributes' =>
                                                    array(
                                                        'Units' => '1',
                                                        'Source' => '2',
                                                        'AvailRooms' => '100',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'AdditionalElements' =>
                                        array(
                                            'HotelOffers' =>
                                            array(
                                                'HotelOffer' =>
                                                array(
                                                    'Name' => '[2019] 5% discount',
                                                    'Description' => 'Offer description',
                                                    '@attributes' =>
                                                    array(
                                                        'Code' => '843',
                                                        'Category' => 'GEN',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        '@attributes' =>
                                        array(
                                            'RatePlanCode' => 'ya79dM4dS6R6EywV4XhfEvwItLN5sfa4xcKoRWYtG4YXaAFcoYl/FpRuCFCh+uxEwbrmOsEggbZmAGCui7pl+tgMj/w39N.....',
                                            'Status' => 'OK',
                                            'NonRefundable' => 'true',
                                            'PackageContract' => 'false',
                                        ),
                                    ),
                                ),
                            ),
                            '@attributes' =>
                            array(
                                'Code' => 'JP046300',
                                'JPCode' => 'JP046300',
                                'JPDCode' => 'JPD086855',
                                'BestDeal' => 'false',
                                'DestinationZone' => '49435',
                            ),
                        ),
                    ),
                ),
                '@attributes' =>
                array(
                    'Url' => 'http://xml-uat.bookingengine.es',
                    'TimeStamp' => '2019-10-02T16:59:02.6731054+02:00',
                    'IntCode' => 'lfCSSOSzATn9XmWSToAWAXrPcfJUutKhnLRF3+UIf70=',
                ),
            ),
        );
        return response()->json($data);
    }

    public function BookingRulesTest()
    {
        $data = array(
            'HotelBookingRulesResponse' =>
            array(
                'BookingRulesRS' =>
                array(
                    'Results' =>
                    array(
                        'HotelResult' =>
                        array(
                            'HotelOptions' =>
                            array(
                                'HotelOption' =>
                                array(
                                    'BookingCode' =>
                                    array(
                                        '@value' => 'ya79dM4dS6R6EywV4XhfEvwItLN5sfa4xcKoRWYtG4b/utM1C8FoU7wtvxeqXKhz2utopk4+5bpJX0EGM8YWSGAwgLA0lkvt/PLN1rsHUrCU.....',
                                        '@attributes' =>
                                        array(
                                            'ExpirationDate' => '2019-10-03T09:46:30.0740353+02:00',
                                        ),
                                    ),
                                    'HotelRequiredFields' =>
                                    array(
                                        'HotelBooking' =>
                                        array(
                                            'Paxes' =>
                                            array(
                                                'Pax' =>
                                                array(
                                                    0 =>
                                                    array(
                                                        'Name' => 'Holder Name',
                                                        'Surname' => 'Holder Surname',
                                                        'PhoneNumbers' =>
                                                        array(
                                                            'PhoneNumber' => '000000000',
                                                        ),
                                                        'Address' => 'Address',
                                                        'City' => 'City',
                                                        'Country' => 'Country',
                                                        'PostalCode' => '00000',
                                                        'Age' => '30',
                                                        '@attributes' =>
                                                        array(
                                                            'IdPax' => '1',
                                                        ),
                                                    ),
                                                    1 =>
                                                    array(
                                                        'Age' => '30',
                                                        '@attributes' =>
                                                        array(
                                                            'IdPax' => '2',
                                                        ),
                                                    ),
                                                    2 =>
                                                    array(
                                                        'Age' => '8',
                                                        '@attributes' =>
                                                        array(
                                                            'IdPax' => '3',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'Holder' =>
                                            array(
                                                'RelPax' =>
                                                array(
                                                    '@value' => '',
                                                    '@attributes' =>
                                                    array(
                                                        'IdPax' => '1',
                                                    ),
                                                ),
                                            ),
                                            'Elements' =>
                                            array(
                                                'HotelElement' =>
                                                array(
                                                    'BookingCode' => 'ya79dM4dS6R6EywV4XhfEvwItLN5sfa4xcKoRWYtG4b/utM1C8FoU7wtvxeqXKhz2utopk4+5bpJX0EGM8YWSGAwgLA0lkvt/PLN1rsHUrCU.....',
                                                    'RelPaxesDist' =>
                                                    array(
                                                        'RelPaxDist' =>
                                                        array(
                                                            0 =>
                                                            array(
                                                                'RelPaxes' =>
                                                                array(
                                                                    'RelPax' =>
                                                                    array(
                                                                        '@value' => '',
                                                                        '@attributes' =>
                                                                        array(
                                                                            'IdPax' => '1',
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                            1 =>
                                                            array(
                                                                'RelPaxes' =>
                                                                array(
                                                                    'RelPax' =>
                                                                    array(
                                                                        0 =>
                                                                        array(
                                                                            '@value' => '',
                                                                            '@attributes' =>
                                                                            array(
                                                                                'IdPax' => '2',
                                                                            ),
                                                                        ),
                                                                        1 =>
                                                                        array(
                                                                            '@value' => '',
                                                                            '@attributes' =>
                                                                            array(
                                                                                'IdPax' => '3',
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                    'HotelBookingInfo' =>
                                                    array(
                                                        'Price' =>
                                                        array(
                                                            'PriceRange' =>
                                                            array(
                                                                '@value' => '',
                                                                '@attributes' =>
                                                                array(
                                                                    'Minimum' => '953.39',
                                                                    'Maximum' => '1053.75',
                                                                    'Currency' => 'EUR',
                                                                ),
                                                            ),
                                                        ),
                                                        'HotelCode' => 'JP046300',
                                                        '@attributes' =>
                                                        array(
                                                            'Start' => '2019-11-20',
                                                            'End' => '2019-11-22',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'CancellationPolicy' =>
                                    array(
                                        'FirstDayCostCancellation' =>
                                        array(
                                            '@value' => '2019-11-13',
                                            '@attributes' =>
                                            array(
                                                'Hour' => '00:00',
                                            ),
                                        ),
                                        'Description' => '* Cancelling from 17/11/2019 at 00:00:00 to 21/11/2019 at 00:00:00: 100.00 % of expenses * Cancelling from 13/11/2019 at 00:00:00 to 17/11/2019 at 00:00:00: 25.00 % of expenses * Cancelling from 03/10/2019 at 00:00:00 to 13/11/2019 at 00:00:00: 0 &euro;',
                                        'PolicyRules' =>
                                        array(
                                            'Rule' =>
                                            array(
                                                0 =>
                                                array(
                                                    '@value' => '',
                                                    '@attributes' =>
                                                    array(
                                                        'From' => '0',
                                                        'To' => '3',
                                                        'DateFrom' => '2019-11-17',
                                                        'DateFromHour' => '00:00',
                                                        'DateTo' => '2019-11-21',
                                                        'DateToHour' => '00:00',
                                                        'Type' => 'V',
                                                        'FixedPrice' => '0',
                                                        'PercentPrice' => '100',
                                                        'Nights' => '0',
                                                        'ApplicationTypeNights' => 'Average',
                                                    ),
                                                ),
                                                1 =>
                                                array(
                                                    '@value' => '',
                                                    '@attributes' =>
                                                    array(
                                                        'From' => '4',
                                                        'To' => '7',
                                                        'DateFrom' => '2019-11-13',
                                                        'DateFromHour' => '00:00',
                                                        'DateTo' => '2019-11-17',
                                                        'DateToHour' => '00:00',
                                                        'Type' => 'V',
                                                        'FixedPrice' => '0',
                                                        'PercentPrice' => '25',
                                                        'Nights' => '0',
                                                        'ApplicationTypeNights' => 'Average',
                                                    ),
                                                ),
                                                2 =>
                                                array(
                                                    '@value' => '',
                                                    '@attributes' =>
                                                    array(
                                                        'From' => '8',
                                                        'DateFrom' => '2019-10-03',
                                                        'DateFromHour' => '00:00',
                                                        'DateTo' => '2019-11-13',
                                                        'DateToHour' => '00:00',
                                                        'Type' => 'V',
                                                        'FixedPrice' => '0',
                                                        'PercentPrice' => '0',
                                                        'Nights' => '0',
                                                        'ApplicationTypeNights' => 'Average',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        '@attributes' =>
                                        array(
                                            'CurrencyCode' => 'EUR',
                                        ),
                                    ),
                                    'PriceInformation' =>
                                    array(
                                        'Board' =>
                                        array(
                                            '@value' => 'Bed & Breakfast',
                                            '@attributes' =>
                                            array(
                                                'Type' => 'AD',
                                            ),
                                        ),
                                        'HotelRooms' =>
                                        array(
                                            'HotelRoom' =>
                                            array(
                                                0 =>
                                                array(
                                                    'Name' => 'Single',
                                                    'RoomCategory' =>
                                                    array(
                                                        '@value' => 'Category 1',
                                                        '@attributes' =>
                                                        array(
                                                            'Type' => '1',
                                                        ),
                                                    ),
                                                    'RoomOccupancy' =>
                                                    array(
                                                        '@value' => '',
                                                        '@attributes' =>
                                                        array(
                                                            'Occupancy' => '1',
                                                            'Adults' => '1',
                                                            'Children' => '0',
                                                        ),
                                                    ),
                                                    '@attributes' =>
                                                    array(
                                                        'Units' => '1',
                                                        'Source' => '1',
                                                        'AvailRooms' => '800',
                                                    ),
                                                ),
                                                1 =>
                                                array(
                                                    'Name' => 'Double',
                                                    'RoomCategory' =>
                                                    array(
                                                        '@value' => 'Category 2',
                                                        '@attributes' =>
                                                        array(
                                                            'Type' => '2',
                                                        ),
                                                    ),
                                                    'RoomOccupancy' =>
                                                    array(
                                                        '@value' => '',
                                                        '@attributes' =>
                                                        array(
                                                            'Occupancy' => '2',
                                                            'Adults' => '1',
                                                            'Children' => '1',
                                                        ),
                                                    ),
                                                    '@attributes' =>
                                                    array(
                                                        'Units' => '1',
                                                        'Source' => '2',
                                                        'AvailRooms' => '799',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'Prices' =>
                                        array(
                                            'Price' =>
                                            array(
                                                'TotalFixAmounts' =>
                                                array(
                                                    'Service' =>
                                                    array(
                                                        '@value' => '',
                                                        '@attributes' =>
                                                        array(
                                                            'Amount' => '912.34',
                                                        ),
                                                    ),
                                                    'ServiceTaxes' =>
                                                    array(
                                                        '@value' => '',
                                                        '@attributes' =>
                                                        array(
                                                            'Included' => 'false',
                                                            'Amount' => '91.23',
                                                        ),
                                                    ),
                                                    '@attributes' =>
                                                    array(
                                                        'Gross' => '1003.57',
                                                        'Nett' => '1003.57',
                                                    ),
                                                ),
                                                '@attributes' =>
                                                array(
                                                    'Type' => 'S',
                                                    'Currency' => 'EUR',
                                                ),
                                            ),
                                        ),
                                        'AdditionalElements' =>
                                        array(
                                            'HotelOffers' =>
                                            array(
                                                'HotelOffer' =>
                                                array(
                                                    'Name' => '[2019] 5% discount',
                                                    'Description' => 'Offer description',
                                                    '@attributes' =>
                                                    array(
                                                        'Code' => '843',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'HotelContent' =>
                                        array(
                                            'HotelName' => 'APARTAMENTOS ALLSUN PIL-LARI PLAYA',
                                            'Zone' =>
                                            array(
                                                '@value' => '',
                                                '@attributes' =>
                                                array(
                                                    'JPDCode' => 'JPD086855',
                                                    'Code' => '49435',
                                                ),
                                            ),
                                            'HotelCategory' =>
                                            array(
                                                '@value' => '3 Stars',
                                                '@attributes' =>
                                                array(
                                                    'Type' => '3est',
                                                ),
                                            ),
                                            'HotelType' =>
                                            array(
                                                '@value' => 'General',
                                                '@attributes' =>
                                                array(
                                                    'Type' => 'GEN',
                                                ),
                                            ),
                                            'Label' =>
                                            array(
                                                'Description' => 'Recommended',
                                                '@attributes' =>
                                                array(
                                                    'SortPriority' => '3',
                                                    'Code' => '3',
                                                ),
                                            ),
                                            'Address' =>
                                            array(
                                                'Address' => 'Calle Marbella 24',
                                                'Latitude' => '39.564713',
                                                'Longitude' => '2.627979',
                                            ),
                                            '@attributes' =>
                                            array(
                                                'Code' => 'JP046300',
                                            ),
                                        ),
                                    ),
                                    'OptionalElements' =>
                                    array(
                                        'Comments' =>
                                        array(
                                            'Comment' =>
                                            array(
                                                '@cdata' => '* 13/06/2018 - 31/12/2030: Please note that on this field hotels have the possibility of supplying you with important information like:<br><br>- Additional taxes (like, for example, a city tax).<br>- Additional features (like, for example, a detailed explanation of a promotion)<br>- Additional warnings (like, for example, the pool being closed due to renovations)<br>- Additional information (like, for example, the emergency phone)<br><br>Among other examples.<br>',
                                                '@attributes' =>
                                                array(
                                                    'Type' => 'HOT',
                                                ),
                                            ),
                                        ),
                                        'HotelSupplements' =>
                                        array(
                                            'HotelSupplement' =>
                                            array(
                                                'Name' => 'Buy now and safe',
                                                'Prices' =>
                                                array(
                                                    'Price' =>
                                                    array(
                                                        'TotalFixAmounts' =>
                                                        array(
                                                            'Service' =>
                                                            array(
                                                                '@value' => '',
                                                                '@attributes' =>
                                                                array(
                                                                    'Amount' => '912.34',
                                                                ),
                                                            ),
                                                            'ServiceTaxes' =>
                                                            array(
                                                                '@value' => '',
                                                                '@attributes' =>
                                                                array(
                                                                    'Included' => 'false',
                                                                    'Amount' => '91.23',
                                                                ),
                                                            ),
                                                            '@attributes' =>
                                                            array(
                                                                'Gross' => '1176.43',
                                                                'Nett' => '1003.57',
                                                            ),
                                                        ),
                                                        '@attributes' =>
                                                        array(
                                                            'Type' => 'S',
                                                            'Currency' => 'EUR',
                                                        ),
                                                    ),
                                                ),
                                                '@attributes' =>
                                                array(
                                                    'RatePlanCode' => 'ya79dM4dS6R6EywV4XhfEvwItLN5sfa4xcKoRWYtG4b/utM1C8FoU7wtvxeqXKhz2utopk4+5bpJX0EGM8YWSGAwgLA0.....',
                                                ),
                                            ),
                                        ),
                                    ),
                                    '@attributes' =>
                                    array(
                                        'Status' => 'OK',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    '@attributes' =>
                    array(
                        'Url' => 'http://xml-uat.bookingengine.es',
                        'TimeStamp' => '2019-10-03T09:36:30.0740353+02:00',
                        'IntCode' => '3TcqBkWJhWde1j6Wm6s7V8jmehwG5VR1rbUyY/4ufMs=',
                    ),
                ),
            ),
        );
        return response()->json($data);
    }

    public function BookingTest(Request $request)
    {
        $language = "en"; // Replace with the actual language
        $guid = "ExternalFakeRef"; // Replace with the actual GUID
        $bookingCode = $request->bookingCode; // Replace with the actual booking code
        $startDate = $request->startDate; // Replace with the actual start date
        $endDate = $request->endDate; // Replace with the actual end date
        $HotelCode = $request->HotelCode;
        $priceRange = array(
            'Minimum' => $request->minimumPrice, // Replace with the actual minimum price
            'Maximum' => $request->maximumPrice, // Replace with the actual maximum price
            'Currency' => $request->currency // Replace with the actual currency
        );

        $phoneNumber = $request->phone_number;
        $title = $request->title;
        $name = $request->name;
        $surname = $request->surname;
        $age = $request->age;
        $email = $request->email;
        $nationality = $request->nationality;
        $names = $request->names;
        $surnames = $request->surnames;
        $ages = $request->ages;

        $paxes = array();
        $paxes[] = array(
            'IdPax' => "1",
            'PhoneNumbers' => array(
                'PhoneNumber' => $phoneNumber
            ),
            'Title' => $title,
            'Name' => $name,
            'Surname' => $surname,
            'Age' => $age,
            'Email' => $email,
            'Nationality' => $nationality
        );

        if(isset($names) && count($names) > 0) {
           for ($x = 0; $x < count($names); $x++) {
                $paxNumber = (string) ($x + 2);
                $paxes[] = array(
                    'IdPax'     => $paxNumber,
                    'Name'      => $names[$x],
                    'Surname'   => $surnames[$x],
                    'Age'       => $ages[$x]
                );
            }
        }

        $relPaxes = array();
        $relPaxes[] = array('IdPax' => "1");

        if(isset($names) && count($names) > 0) {
            for ($y = 0; $y < count($names); $y++) {
                $paxNumber = (string)($y + 2);
                $relPaxes[] = array('IdPax' => $paxNumber);
            }
        }

        $options = array(
            'soap_version' => SOAP_1_2,
            'encoding' => 'UTF-8',
            'exceptions' => true,
            'trace' => true,
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
        );

        $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/JP/WebServiceJP.asmx?WSDL", $options);

        $requestData = array(
            'HotelBookingRQ' => array(
                'Version' => '1.1',
                'Language' => $language,
                'Login' => array(
                    'Email' => 'Xml_TestXMLTaNefer',
                    'Password' => 'U3dIp8i*eyAC8N7'
                ),
                'Paxes' => array(
                    'Pax' => $paxes
                ),
                'Holder' => array(
                    'RelPax' => array('IdPax' => "1")
                ),
                'ExternalBookingReference' => $guid,
                'Elements' => array(
                    'HotelElement' => array(
                        'BookingCode' => $bookingCode,
                        'RelPaxesDist' => array(
                            'RelPaxDist' => array(
                                'RelPaxes' => $relPaxes
                            )
                        ),
                        'HotelBookingInfo' => array(
                            'Start' => $startDate,
                            'End' => $endDate,
                            'Price' => array(
                                'PriceRange' => array(
                                    'Minimum' => $priceRange['Minimum'],
                                    'Maximum' => $priceRange['Maximum'],
                                    'Currency' => $priceRange['Currency']
                                )
                            ),
                            'HotelCode' => $HotelCode
                        )
                    )
                )
            )
        );

        return response()->json($requestData);

        // try {
        //     $response = $client->__soapCall('HotelBooking', array('parameters' => $requestData));
        //     return response()->json($response);
        // } catch (SoapFault $fault) {
        //     echo "Error: " . $fault->getMessage();
        // }
    }

    public function availabilityTest(Request $request)
    {
        $options = array(
            'soap_version' => SOAP_1_2,
            'encoding' => 'UTF-8',
            'exceptions' => true,
            'trace' => true,
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
        );

        $client = new \SoapClient("https://xml-uat.bookingengine.es/WebService/JP/WebServiceJP.asmx?WSDL", $options);

        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $hotels = $request->hotels;

        $hotelCodes = array(
            'HotelCode' => $hotels
        );

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
                        array('IdPax' => '1')
                    )
                ),
                'HotelRequest' => array(
                    'SearchSegmentsHotels' => array(
                        'SearchSegmentHotels' => array(
                            'Start' => $startDate,
                            'End' => $endDate,
                            // 'DestinationZone' => '221'
                        ),
                        'CountryOfResidence' => 'ES',
                        'HotelCodes' => $hotelCodes
                    ),
                    'RelPaxesDist' => array(
                        'RelPaxDist' => array(
                            'RelPaxes' => array(
                                array('IdPax' => '1')
                            )
                        )
                    )
                ),
                'AdvancedOptions' => array(
                    'ShowHotelInfo' => false,
                    'ShowCancellationPolicies' => true,
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
}
