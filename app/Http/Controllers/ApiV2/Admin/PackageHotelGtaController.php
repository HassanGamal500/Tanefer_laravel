<?php

namespace App\Http\Controllers\ApiV2\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class PackageHotelGtaController extends Controller
{

    function removeNamespaceFromXML( $xml )
    {
        // Because I know all of the the namespaces that will possibly appear in
        // in the XML string I can just hard code them and check for
        // them to remove them
        $toRemove = ['rap', 'turss', 'crim', 'cred', 'j', 'rap-code', 'evic'];
        // This is part of a regex I will use to remove the namespace declaration from string
        $nameSpaceDefRegEx = '(\S+)=["\']?((?:.(?!["\']?\s+(?:\S+)=|[>"\']))+.)["\']?';

        // Cycle through each namespace and remove it from the XML string
        foreach( $toRemove as $remove ) {
                // First remove the namespace from the opening of the tag
            $xml = str_replace('<' . $remove . ':', '<', $xml);
            // Now remove the namespace from the closing of the tag
            $xml = str_replace('</' . $remove . ':', '</', $xml);
            // This XML uses the name space with CommentText, so remove that too
            $xml = str_replace($remove . ':commentText', 'commentText', $xml);
            // Complete the pattern for RegEx to remove this namespace declaration
            $pattern = "/xmlns:{$remove}{$nameSpaceDefRegEx}/";
            // Remove the actual namespace declaration using the Pattern
            $xml = preg_replace($pattern, '', $xml, 1);
        }

        // Return sanitized and cleaned up XML with no namespaces
        return $xml;
    }
    public function sendSoapRequest()
    {
        // Create a new Guzzle client instance
        $client = new Client();

        // Define the SOAP request XML
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

        // Send the SOAP request using Guzzle
        $response = $client->post('https://xml-uat.bookingengine.es/WebService/jp/operations/staticdatatransactions.asmx', [
            'headers' => [
                'Content-Type' => 'text/xml;charset=UTF-8',
                'Accept-Encoding' => 'gzip, deflate',
                'SOAPAction' => 'http://www.juniper.es/webservice/2007/HotelPortfolio', // Specify the SOAP action if required by the service
            ],
            'body' => $soapRequest,
        ]);


        // $xml = simplexml_load_string($response->getBody());

        // // Convert XML object to array
        // $xmlArray = json_decode(json_encode($xml), true);

        // // Convert array to JSON with pretty print
        // $json = json_encode($xmlArray, JSON_PRETTY_PRINT);

        return json_decode(json_encode(simplexml_load_string(Self::removeNamespaceFromXML($response->getBody()))), true);



        // Get the response body as JSON
        // $responseJson = $response->getBody()->getContents();

        // Do further processing or return the JSON response
        // return response()->json($responseJson);
    }
}
