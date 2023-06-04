<?php


namespace App\GDSIntegration\Sabre;


use App\Models\Aircraft;
use App\Models\Airline;
use App\Models\Airport;
use App\GDSIntegration\HttpClient\HttpClient;
use App\Models\ProfitSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BargainFinderMax extends Sabre
{
    public function searchResult($request,$excludeAirlines)
    {
        $data = $this->requestDetails($request,$request['classtype']);
        $now = Carbon::now()->format('Y-m-d');
        Storage::put('/sabreRequests/'.$now.'/search/'.now()->format('H:i:s').'searchRQ.json',$data);

        $http_client = new HttpClient();

        $result = $http_client
            ->executePostCall($this->rest_url,'/v1/offers/shop',$this
                ->requestDetails($request,$request['classtype']),$this->getAccessToken());

        Storage::put('/sabreRequests/'.$now.'/search/'.now()->format('H:i:s').'searchRS.json',$result);

        return json_decode($result,true);
    }

    public function searchResultBySoap($request,$excludeAirlines = [], $promotion = null, $searchId = null)
    {
        $mailOnlyFares = $this->mailOnlyFares($excludeAirlines);

        if(array_key_exists('search_id',$request) && array_key_exists('withFares',$request)){
            $requestType = 'WithNetFares';
        }elseif (array_key_exists('search_id',$request)){
            $requestType = 'WithAlternateDates';
        }else{
            $requestType = 'WithPublished';
        }

        $xmlRequest = $this->requestDetailsSoap($this->getAccessToken(),$request,$request['classType']);
        Storage::put('/sabreRequests/'.$this->nowDate.'/search/'.$this->nowTime.'search'.$requestType.'RQ.xml', $xmlRequest);

        $http_client = new HttpClient();
        $result = $http_client->executeSoapCall($xmlRequest, $this->soap_url,$this->soapContentType, $this->timeout);

        Storage::put('/sabreRequests/'.$this->nowDate.'/search/'.$this->nowTime.'search'.$requestType.'RS.xml',$result['xmlResponse']);

        if($result['curlErrorCode'] != 0){
            return 'Error in Response please try again';
        }

        $arrayResult = $result['arrayResponse'];
//        dd($arrayResult);

        if(isset($arrayResult['SOAP-ENV:Envelope']['SOAP-ENV:Body']['OTA_AirLowFareSearchRS']['Errors'])){
            $errors = $arrayResult['SOAP-ENV:Envelope']['SOAP-ENV:Body']['OTA_AirLowFareSearchRS']['Errors'];
            if($errors['Error'][0]['attr']['ShortText'] == 'No complete journey can be built in IF2/ADVJR1.'){
                $errorMessage = 'No Flights Found For locations specified';
                return $errorMessage;
            }

            if(strpos($errors['Error'][0]['attr']['ShortText'],'server returned an error: unknown')){
                if(strpos($errors['Error'][0]['attr']['ShortText'],'OFF')){
                    $errorMessage = 'Unknown Arrival airport';
                }elseif (strpos($errors['Error'][0]['attr']['ShortText'],'BRD')){
                    $errorMessage = 'Unknown Departure airport';
                }
                $airportCode = explode('=',$errors['Error'][0]['attr']['ShortText'])[1];

                $airport = Airport::where('code',$airportCode)->first();
                is_null($airport)? '' : $airport->update(['availability' => 0]);

                return $errorMessage;
            }

        }

        if((int)$arrayResult['SOAP-ENV:Envelope']['SOAP-ENV:Body']['OTA_AirLowFareSearchRS']['attr']['PricedItinCount'] == 0){
            return 'No Flights Found For locations specified';
        }

        if(array_key_exists('soap-env:Envelope',$arrayResult)){
            if(array_key_exists('soap-env:Fault',$arrayResult['soap-env:Envelope']['soap-env:Body'])){
                $errorMessage = $arrayResult['soap-env:Envelope']['soap-env:Body']['soap-env:Fault']['faultcode']['value'];
                if($errorMessage == 'soap-env:Client.InvalidSecurityToken'){
                    $this->getAccessToken();
                    $this->searchResultBySoap($request);
                }
            }
        }

        if($arrayResult['SOAP-ENV:Envelope']['SOAP-ENV:Body']['OTA_AirLowFareSearchRS']['attr']['PricedItinCount'] == 0){
            $errorMessage = 'No Flights Found For locations and Dates specified';
            return $errorMessage;
        }


        $flights = $arrayResult['SOAP-ENV:Envelope']['SOAP-ENV:Body']['OTA_AirLowFareSearchRS']['PricedItineraries']['PricedItinerary'];
        $numberOfFlights = (int)$arrayResult['SOAP-ENV:Envelope']['SOAP-ENV:Body']['OTA_AirLowFareSearchRS']['attr']['PricedItinCount'];
        $resultData = ['flights' => $flights, 'numberOfFlights' => $numberOfFlights];

        return $this->rearrangeSearchResultDataFromSoap($request,$resultData,$mailOnlyFares,$promotion,$searchId);
    }

    protected function requestDetails($request, $classType)
    {
        $searchRequest = '{
                        "OTA_AirLowFareSearchRQ": {
                            "Version": "1.0.0",
                                    '.$this->originDestinationInformation($request).'
                            "POS": {
                                "Source": [
                                    {
                                        "PseudoCityCode":"'.$this->pcc.'",
                                        "RequestorID": {
                                            "CompanyName": {
                                                "Code": "TN"
                                            },
                                            "ID": "REQ.ID",
                                            "Type": "0.AAA.X"
                                        }
                                    }
                                ]
                            },
                            "TPA_Extensions": {
                                "IntelliSellTransaction": {
                                    "RequestType": {
                                        "Name": "50ITINS"
                                    }
                                }
                            },
                            "TravelPreferences": {
                                "CabinPref":[
                                    {
                                        "Cabin":"'.$request['classType'].'"
                                    }
                                ]
                            },
                            "TravelerInfoSummary": {
                                "AirTravelerAvail": [
                                    {
                                        '.$this->passengerTypeQuantity($request['adults'], $request['children'],$request['infants']).'
                                    }
                                ]
                            }
                        }
                    }';
        return $searchRequest;
    }

    protected function originDestinationInformation($request, $api_type = 'rest')
    {
        $trip_type = $request['tripType'];

        if($trip_type == 'one'){
            $info = $this->oneWayFlight(strtoupper($request['origin']),
                $request['originType'],$request['destinationType'],strtoupper($request['destination']),$request['departureDate'], $api_type);
        }
        elseif ($trip_type == 'round')
        {
            $info = $this->roundWayFlight(strtoupper($request['origin']),
                $request['originType'],$request['destinationType'],strtoupper($request['destination']),
                $request['departureDate'], $request['arrivalDate'], $api_type);
        }
        elseif ($trip_type == 'multi')
        {
            $info = $this->multiWayFlight($request['origin'],$request['originType'],$request['destinationType'],
                $request['destination'], $request['departureDate'], $api_type);
        }else{
            $info = '';
        }

        return $info;
    }


    public function oneWayFlight($origin,$originType,$destinationType, $destination, $departureDate, $api_type)
    {
        $departureDate = date('Y-m-d',strtotime($departureDate));

        if($api_type == 'soap'){
            $searchRequest = '<OriginDestinationInformation RPH="1">
                                    <DepartureDateTime>' . $departureDate.'T00:00:00</DepartureDateTime>
                                    <OriginLocation LocationCode="' . $origin . '" LocationType="'.$originType.'"/>
                                    <DestinationLocation LocationCode="' . $destination . '" LocationType="'.$destinationType.'"/>
                            </OriginDestinationInformation>';
        }else{
            $searchRequest = ' "OriginDestinationInformation": [
                    {
                        "DepartureDateTime": "'.$departureDate.'T00:00:00",
                        "DestinationLocation": {
                            "LocationCode": "'.$destination.'",
                            "LocationType": "'.$destinationType.'"
                    },
                        "OriginLocation": {
                            "LocationCode": "'.$origin.'",
                            "LocationType": "'.$originType.'"
                    },
                        "RPH":"1"
                    }
            ],';
        }

        return $searchRequest;
    }

    public function roundWayFlight($origin,$originType,$destinationType, $destination, $departureDate, $arrivalDate, $api_type)
    {
        $departureDate = date('Y-m-d',strtotime($departureDate));
        $arrivalDate = date('Y-m-d',strtotime($arrivalDate));

        if($api_type == 'soap'){
            $searchRequest = '<OriginDestinationInformation RPH="1">
                                    <DepartureDateTime>' . $departureDate.'T00:00:00</DepartureDateTime>
                                    <OriginLocation LocationCode="' . $origin . '" LocationType="'.$originType.'"/>
                                    <DestinationLocation LocationCode="' . $destination . '" LocationType="'.$destinationType.'"/>
                            </OriginDestinationInformation>
                            <OriginDestinationInformation RPH="2">
                                    <DepartureDateTime>' . $arrivalDate.'T00:00:00</DepartureDateTime>
                                    <OriginLocation LocationCode="' . $destination . '" LocationType="'.$destinationType.'"/>
                                    <DestinationLocation LocationCode="' . $origin . '" LocationType="'.$originType.'"/>
                            </OriginDestinationInformation>';
        }else{
            $searchRequest = '"OriginDestinationInformation": [
                    {
                        "DepartureDateTime": "'.$departureDate.'T00:00:00",
                        "DestinationLocation": {
                            "LocationCode": "'.$destination.'",
                            "LocationType": "'.$destinationType.'"
                    },
                        "OriginLocation": {
                            "LocationCode": "'.$origin.'",
                            "LocationType": "'.$originType.'"
                    },
                        "RPH":"1"
                    },
                    {
                        "DepartureDateTime": "'.$arrivalDate.'T00:00:00",
                        "DestinationLocation": {
                            "LocationCode": "'.$origin.'",
                             "LocationType": "'.$originType.'"
                            },
                        "OriginLocation": {
                        "LocationCode": "'.$destination.'",
                        "LocationType": "'.$destinationType.'"
                            },
                        "RPH":"2"
                    }
            ],';
        }


        return $searchRequest;
    }

    public function multiWayFlight($origin,$originType ,$destinationType,$destination, $departureDate, $api_type)
    {
        $originDestination = '';
        $searchRequest = '';
        if($api_type == 'soap'){
            for ($i=0; $i < count($origin); $i++){
                $departureDate[$i] = date('Y-m-d',strtotime($departureDate[$i]));
                $searchRequest .= '<OriginDestinationInformation RPH="'.($i+1).'">
                                    <DepartureDateTime>' . $departureDate[$i].'T00:00:00</DepartureDateTime>
                                    <OriginLocation LocationCode="' . strtoupper($origin[$i]) . '" LocationType="'.$originType[$i].'"/>
                                    <DestinationLocation LocationCode="' . strtoupper($destination[$i]) . '" LocationType="'.$destinationType[$i].'"/>
                            </OriginDestinationInformation>';
            }
        }else{
            for ($i=0; $i < count($origin); $i++){
                $departureDate[$i] = date('Y-m-d',strtotime($departureDate[$i]));
                $searchRequest .= '{
                        "DepartureDateTime": "'.$departureDate[$i].'T00:00:00",
                        "DestinationLocation": {
                            "LocationCode": "'.strtoupper($destination[$i]).'",
                            "LocationType:  "'.$destinationType[$i].'"
                            },
                        "OriginLocation": {
                            "LocationCode": "'.strtoupper($origin[$i]).'",
                            "LocationType: "'.$originType[$i].'"
                            },
                        "RPH":"'.($i + 1).'"
                    }';
                if($i != count($origin) - 1){
                    $searchRequest .= ',';
                }
            }

            $searchRequest = '"OriginDestinationInformation": [
                                '.$searchRequest.'
                          ],';
        }

        return $searchRequest;
    }

    protected function passengerTypeQuantity($adults, $children, $infants)
    {
        $passenger_type = '';
        if($adults != 0 || !is_null($adults)){
            $passenger_type .= '{
                                    "Code": "ADT",
                                    "Quantity": '.$adults.'
                                }';
        }
        if($children != 0 || !is_null($children)){
            $passenger_type .= ',{
                                    "Code": "CNN",
                                    "Quantity": '.$children.'
                                }';
        }

        if($infants != 0 || !is_null($infants)){
            $passenger_type .= ',{
                                    "Code": "INF",
                                    "Quantity": '.$infants.'
                                }';
        }
        $passenger_type_quantity = '"PassengerTypeQuantity": [
                                '.$passenger_type.'
                        ]';

        return $passenger_type_quantity;
    }

    /*
     *
     * Methods for Soap API for BargainFinderMax
     *
     * */

    protected function flexiblePassengerTypeQuantitySoap($adults, $children, $infants)
    {
        $passenger_type = '';
        if($adults != 0 && !is_null($adults)){
            $passenger_type .= '<PassengerTypeQuantity Code="JCB" Quantity="' . $adults . '"/>';
        }
        if($children != 0 && !is_null($children)){
            $passenger_type .= '<PassengerTypeQuantity Code="JNN" Quantity="' . $children . '"/>';
        }
        if($infants != 0 && !is_null($infants)){
            $passenger_type .= '<PassengerTypeQuantity Code="INF" Quantity="' . $infants . '"/>';
        }

        return $passenger_type;
    }

    protected function passengerTypeQuantitySoap($adults, $children, $infants)
    {
        $passenger_type = '';
        if($adults != 0 && !is_null($adults)){
            $passenger_type .= '<PassengerTypeQuantity Code="ADT" Quantity="' . $adults . '"/>';
        }
        if($children != 0 && !is_null($children)){
            $passenger_type .= '<PassengerTypeQuantity Code="CNN" Quantity="' . $children . '"/>';
        }
        if($infants != 0 && !is_null($infants)){
            $passenger_type .= '<PassengerTypeQuantity Code="INF" Quantity="' . $infants . '"/>';
        }

        return $passenger_type;
    }


    public function requestDetailsSoap($token,$request, $classType)
    {
        $client = resolve('client');
        $mainClient = $client->parenClient ?? $client;

        $multiTicket = is_array($request['origin']) ? '<MultiTicket DisplayPolicy="SOW"/>' : '';
        $searchId = array_key_exists('search_id',$request) ? $request['search_id'] : null;
        $children = array_key_exists('children',$request) ? $request['children'] : 0;
        $infants = array_key_exists('infants',$request) ? $request['infants'] : 0;

        if(array_key_exists('preferredAirline',$request)){
            $preferredAirline = '<VendorPref Code="'.strtoupper($request['preferredAirline']).'" PreferLevel="Preferred" Type="Marketing"/>
                                    <VendorPrefApplicability Type="Marketing" Value="AllSegments"/>';
        }else{
            $preferredAirline = null;
        }

        if(Cache::has($searchId)){
            $action = 'BargainFinderMax_ADRQ';
            $requestType = 'AD1';
        }else{
            $action = 'BargainFinderMaxRQ';
            $requestType = '50ITINS';
        }

        $fareType = '<PriceRequestInformation CurrencyCode="'.$mainClient->currency.'">
                        <TPA_Extensions>
                            <PublicFare Ind="true"/>

                            <Indicators><ResTicketing Ind="true" /></Indicators>

                        </TPA_Extensions>
                      </PriceRequestInformation>';


        $searchRequest = '<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
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
                            <m:Action>'.$action.'</m:Action>
                            <m:MessageData>
                                <m:MessageId>1315103467381090610</m:MessageId>
                                <m:Timestamp>'.date("Y-m-d\TH:i:s\Z").'</m:Timestamp>
                                <m:TimeToLive>'.date("Y-m-d\TH:i:s\Z").'</m:TimeToLive>
                            </m:MessageData>
                            <m:DuplicateElimination/>
                            <m:Description>Bargain Finder Max Service</m:Description>
                        </m:MessageHeader>
                        <wsse:Security xmlns:wsse="http://schemas.xmlsoap.org/ws/2002/12/secext">
                            <wsse:BinarySecurityToken valueType="String" EncodingType="wsse:Base64Binary">' . $token . '</wsse:BinarySecurityToken>
                        </wsse:Security>
                    </SOAP-ENV:Header>
                    <SOAP-ENV:Body>
                        <OTA_AirLowFareSearchRQ Version="5.2.0" ResponseType="OTA" ResponseVersion="5.2.0" xmlns="http://www.opentravel.org/OTA/2003/05">
                            <POS>
                                    <Source PseudoCityCode="'.$this->pcc.'">
                                            <RequestorID ID="1" Type="1">
                                                    <CompanyName Code="TN">TN</CompanyName>
                                            </RequestorID>
                                    </Source>
                            </POS>
                            '.$this->originDestinationInformation($request,'soap').'
                            <TravelPreferences ValidInterlineTicket="true">
                                    '.$preferredAirline.'
                                    <CabinPref Cabin="' . $classType . '"/>
                                     <TPA_Extensions>
                                      <FlexibleFares>
                                            <FareParameters>
                                                '.$this->flexiblePassengerTypeQuantitySoap($request['adults'], $children ,$infants).'
                                            </FareParameters>
                                       </FlexibleFares>
                                      </TPA_Extensions>
                                    <Baggage RequestType="C" Description="true"/>
                            </TravelPreferences>
                            <TravelerInfoSummary>
                                    <SeatsRequested>'.($request['adults'] + $children).'</SeatsRequested>
                                    <AirTravelerAvail>
                                          '.$this->passengerTypeQuantitySoap($request['adults'], $children ,$infants).'
                                    </AirTravelerAvail>
                                    '.$fareType.'
                            </TravelerInfoSummary>
                            <TPA_Extensions>
                                    <IntelliSellTransaction>
                                            <RequestType Name="'.$requestType.'"/>
                                    </IntelliSellTransaction>
                                    '.$multiTicket.'
                            </TPA_Extensions>
                        </OTA_AirLowFareSearchRQ>
                    </SOAP-ENV:Body>
            </SOAP-ENV:Envelope>';

        return $searchRequest;
    }

    public function mailOnlyFares($excludeAirlines)
    {
        $excludeAirlinesCodesArray = [];

        $blacklistAirlines = Airline::where('blacklisted',1)->get();

        if(count($blacklistAirlines) > 0){
            $blacklistAirlinesCodes = array_column($blacklistAirlines->toArray(),'airline_code');
            $airlinesCodes = array_merge($excludeAirlines,$blacklistAirlinesCodes);
           $excludeAirlinesCodesArray =  array_merge($airlinesCodes,$excludeAirlinesCodesArray);
        }else{
            $excludeAirlinesCodesArray =  array_merge($excludeAirlines,$excludeAirlinesCodesArray);
        }

        if(auth()->guard('api')->user()){
            $excludeAirlinesCodesArray = [];
        }

        return $excludeAirlinesCodesArray;
    }


    public function rearrangeSearchResultDataFromSoap($request,$sabreSearchFlightsResponse,$mailOnlyFares = [],$promotion = null, $searchId = null)
    {
        //return $data1;
        $data1 = $sabreSearchFlightsResponse['flights'];

        if(isset($data1[0])){
            $data = $data1;
        }else{
            $data['flight'] = $data1;
        }

        $cache_key = $searchId != null ? $searchId : Str::uuid();


        $flight_results = $this->flightsResults($data,$mailOnlyFares,$promotion);

        if(isset($request['search_id']) && Cache::has($request['search_id'])){
            if(count($flight_results) > 0){
                $oldFlights = Cache::get($request['search_id']);
                $allFlights = array_merge($oldFlights,$flight_results);
                Cache::put($request['search_id'],$allFlights,1200);
            }
        }else{
            Cache::put($cache_key,$flight_results,1200);
        }


        $matrix = $this->matrix($flight_results);
        $maxMinPrice = $this->maxMinPrice($flight_results);


        $searchResult = [
            'search_id' => isset($request['search_id']) && Cache::has($request['search_id'])? $request['search_id'] : $cache_key,
            'numberOfFlights' => $sabreSearchFlightsResponse['numberOfFlights'],
            'flights' => $flight_results,
            'FilterMatrix' => $matrix,
            'maxPrice' => (float)$maxMinPrice['maxPrice'],
            'minPrice' => (float)$maxMinPrice['minPrice'],
            'airlines' => $this->airlinesFilter($flight_results),
            'goingTimes' => $this->goingTimes($flight_results),
            'returningTimes' => $this->returningTimes($flight_results),
            'alternateDates' => isset($request['search_id']) && Cache::has($request['search_id'])? true : false,
        ];

//        if($promotion != null){
//            Cache::put(app()->environment().'-'.$promotion->origin_code.'-'.$promotion->destination_code,$searchResult,3600);
//        }
        return $searchResult;
    }

    private function flightsResults($flightsData,$mailOnlyFares = [],$promotion = null)
    {
        $i = 0;
        foreach($flightsData as $item){
            $originDestination = $item['AirItinerary']['OriginDestinationOptions']['OriginDestinationOption'];
            //$flight_results['flights'][] = $item;

            if(isset($originDestination[0])){
                $originDestinationOptions = $originDestination;
            }else{
                $originDestinationOptions['flight'] = $originDestination;
            }
            // $flight_results[$i]['id'] = rand(88,900000).time().Str::random(10);
            $flight_results[$i]['id'] = Str::uuid();
            //$flight_results[$i]['session_time'] = time();
            $flight_results[$i]['direction'] = $item['AirItinerary']['attr']['DirectionInd'];

            if(array_key_exists('TPA_Extensions',$item) && array_key_exists('AdditionalFares',$item['TPA_Extensions']) &&
                (float)$item['TPA_Extensions']['AdditionalFares']['AirItineraryPricingInfo']['ItinTotalFare']['TotalFare']['attr']['Amount'] <
                (float)$item['AirItineraryPricingInfo']['ItinTotalFare']['TotalFare']['attr']['Amount']){

                $fareType = 'Net';
                $flight_results[$i]['pricingInfo']['fare_type'] = $fareType;
                $additionalFares = $item['TPA_Extensions']['AdditionalFares'];
                $fareBreakDown = $additionalFares['AirItineraryPricingInfo']['PTC_FareBreakdowns']['PTC_FareBreakdown'];
            }else{
                $fareType = 'Publish';
                $flight_results[$i]['pricingInfo']['fare_type'] = $fareType;
                $fareBreakDown = $item['AirItineraryPricingInfo']['PTC_FareBreakdowns']['PTC_FareBreakdown'];
            }

            if(isset($fareBreakDown[0])){
                $fareBreakDowns = $fareBreakDown;
            }else{
                $fareBreakDowns[0] = $fareBreakDown;
            }
            $fq = 0;
            foreach ($fareBreakDowns as $fareBreakDown){
                $flight_results[$i]['passengerQuantity'][$fq]['Code'] = $fareBreakDown['PassengerTypeQuantity']['attr']['Code'];
                $flight_results[$i]['passengerQuantity'][$fq]['Quantity'] = (int)$fareBreakDown['PassengerTypeQuantity']['attr']['Quantity'];
                $fq++;
            }


            $itInTotalFare = isset($additionalFares) ?
                $additionalFares['AirItineraryPricingInfo'] : $item['AirItineraryPricingInfo'];

            $priceFare = $this->priceOfFare($itInTotalFare,$fareBreakDowns,$fareType);


            $flight_results[$i]['pricingInfo']['baseFare'] = round($priceFare['base_fare'],2);
            $flight_results[$i]['pricingInfo']['taxes'] = $priceFare['taxes'];
            $flight_results[$i]['pricingInfo']['TotalFare'] = round($priceFare['totalFare'],2);
            if(array_key_exists('originalFare',$priceFare)){
                $flight_results[$i]['pricingInfo']['originalFare'] = round($priceFare['originalFare'],2);
            }
            if(!is_null($promotion)){
                $discount = $promotion->discount_amount;
                $flight_results[$i]['pricingInfo']['discount_amount'] = $discount;
                $flight_results[$i]['pricingInfo']['newFare']  = round($priceFare['totalFare'] - $discount,2);
            }else{
                $flight_results[$i]['pricingInfo']['discount_amount']  = 0;
                $flight_results[$i]['pricingInfo']['newFare']  = 0;
            }
            $flight_results[$i]['pricingInfo']['TotalFare_CurrencyCode'] = $priceFare['totalFare_currency'];
            $flight_results[$i]['pricingInfo']['totalFareNote'] = $priceFare['totalFareNote'];
            //$flight_results[$i]['pricingInfo']['fare_type'] = $priceFare['fare_type'];

            if( isset($item['AirItineraryPricingInfo']['FareInfos']['FareInfo']['FareReference'])){
                $fareInfo =  $item['AirItineraryPricingInfo']['FareInfos']['FareInfo'];
            }else{
                $fareInfo =  $item['AirItineraryPricingInfo']['FareInfos']['FareInfo'][0];
            }
            $flight_results[$i]['remainingSeats'] = $fareInfo['TPA_Extensions']['SeatsRemaining']['attr']['Number'];
            $flight_results[$i]['totalDuration'] = 0;
            $j = 0;

            $totalDurationOfFlight = 0;
            foreach ($originDestinationOptions as $originDestinationOption){

                $totalDurationOfFlight += $originDestinationOption['attr']['ElapsedTime'];
                $flight_results[$i]['totalDuration'] = convertToHoursMins($totalDurationOfFlight);
                $flight_details1 = $originDestinationOption['FlightSegment'];

                if (isset($flight_details1[0])) {
                    $flight_details = $flight_details1;
                } else {
                    $flight_details[0] = $flight_details1;
                }
                $flight_results[$i]['flightSegments'][$j]['stops']  = count($flight_details) - 1;
                $flight_results[$i]['flightSegments'][$j]['baggage_rules'] = $this->getBaggageUrl($flight_details);
                $k=0;
                foreach ($flight_details as $flight_detail){

                    //$airlinesCodes[] =  $flight_detail['OperatingAirline']['attr']['Code'];
                    $airlinesCodes[] = $flight_detail['MarketingAirline']['attr']['Code'];

                    $flight_results[$i]['flightSegments'][$j]['TotalDuration'] = convertToHoursMins($originDestinationOption['attr']['ElapsedTime']);
                    //$flight_results['flights'][$i]['flightSegments'][$j]['stops'] = $k;
                    $OriginLocation = $flight_detail['DepartureAirport']['attr']['LocationCode'];
                    $DestinationLocation = $flight_detail['ArrivalAirport']['attr']['LocationCode'];

                    $flight_results[$i]['flightSegments'][$j]['Segments'][$k]['OriginLocation'] = $this->getAirportName($OriginLocation);
                    $flight_results[$i]['flightSegments'][$j]['Segments'][$k]['DestinationLocation'] = $this->getAirportName($DestinationLocation);
                    $flight_results[$i]['flightSegments'][$j]['Segments'][$k]['OriginLocationCode'] = $OriginLocation;
                    $flight_results[$i]['flightSegments'][$j]['Segments'][$k]['DestinationLocationCode'] = $DestinationLocation;
                    $flight_results[$i]['flightSegments'][$j]['Segments'][$k]['FlightNumber'] = $flight_detail['attr']['FlightNumber'];
                    $flight_results[$i]['flightSegments'][$j]['Segments'][$k]['BookingClass'] = $flight_detail['attr']['ResBookDesigCode'];
                    $flight_results[$i]['flightSegments'][$j]['Segments'][$k]['Duration'] = convertToHoursMins($flight_detail['attr']['ElapsedTime']);
                    $marketing_airline_code = $flight_detail['MarketingAirline']['attr']['Code'];
                    $operating_airlineCode = $flight_detail['OperatingAirline']['attr']['Code'];

                    $flight_results[$i]['flightSegments'][$j]['Segments'][$k]['MarketingAirlineCode'] = $marketing_airline_code;
                    $flight_results[$i]['flightSegments'][$j]['Segments'][$k]['MarketingAirlineLogo'] = config('sabre.airline_logo_url').$marketing_airline_code.'.png';
                    $flight_results[$i]['flightSegments'][$j]['Segments'][$k]['MarketingAirlineLogoSM'] = airline_logo_small_url($marketing_airline_code);
                    $flight_results[$i]['flightSegments'][$j]['Segments'][$k]['MarketingAirlineName'] =  $this->getAirlineName($marketing_airline_code);
                    $flight_results[$i]['flightSegments'][$j]['Segments'][$k]['OperatingAirlineCode'] = $operating_airlineCode;
                    $flight_results[$i]['flightSegments'][$j]['Segments'][$k]['OperatingAirlineName'] = $this->getAirlineName($operating_airlineCode);

                    $flight_results[$i]['flightSegments'][$j]['Segments'][$k]['aircraft'] = $this->getAircraftName($flight_detail['Equipment']['attr']['AirEquipType']);
                    $DepartureDateTime_r = $flight_detail['attr']['DepartureDateTime'];
                    $departureDateTime = Carbon::parse(str_replace('T',' ',$DepartureDateTime_r));
                    if(isset($arrivalDateTime) && $arrivalDateTime != ''){
                        $stopDuration[] = gmdate('H:i',$departureDateTime->diffInSeconds($arrivalDateTime));
                        $flight_results[$i]['flightSegments'][$j]['Segments'][$k]['stopDuration'] = gmdate('H:i',$departureDateTime->diffInSeconds($arrivalDateTime));
                    }
                    $DepartureDateTime_r_1 = explode('T', $DepartureDateTime_r);
                    $DepartureDateTime_r_2 = explode(':', $DepartureDateTime_r_1[1]);
                    $flight_results[$i]['flightSegments'][$j]['Segments'][$k]['DepartureDate'] = $DepartureDateTime_r_1[0];
                    $flight_results[$i]['flightSegments'][$j]['Segments'][$k]['DepartureTime'] = $DepartureDateTime_r_2[0] . ":" . $DepartureDateTime_r_2[1];
                    $ArrivalDateTime_r = $flight_detail['attr']['ArrivalDateTime'];
                    $arrivalDateTime = Carbon::parse(str_replace('T',' ',$ArrivalDateTime_r));
                    $ArrivalDateTime_r_1 = explode('T', $ArrivalDateTime_r);
                    $ArrivalDateTime_r_2 = explode(':', $ArrivalDateTime_r_1[1]);
                    $flight_results[$i]['flightSegments'][$j]['Segments'][$k]['ArrivalDate'] = $ArrivalDateTime_r_1[0];
                    $flight_results[$i]['flightSegments'][$j]['Segments'][$k]['ArrivalTime'] = $ArrivalDateTime_r_2[0] . ":" . $ArrivalDateTime_r_2[1];

                    $k++;
                }
                $flight_details = [];
                $arrivalDateTime = '';

                $flight_results[$i]['flightSegments'][$j]['stopsDuration'] = isset($stopDuration)?$stopDuration:'';
                $stopDuration = [];

                $j++;
            }
            $publicOffersAirlines = array_intersect(array_unique($airlinesCodes),$mailOnlyFares);

            if(count($publicOffersAirlines) == 0){
                $flight_results[$i]['mailOnlyFare'] = false;
            }else{
                $flight_results[$i]['mailOnlyFare'] = true;
            }

            $stopDuration = [];
            $i++;
        }

        return $flight_results;
    }

    public function matrix($flights)
    {
        $i = 0;
        $airlines_code_and_price_array = [];

        $alt_matrix = [];
        $matrix = [];
        foreach ($flights as $flight){
            if($flight['mailOnlyFare']){
                continue;
            }
            $price =  ($flight['pricingInfo']['newFare'] == 0)?$flight['pricingInfo']['TotalFare']:$flight['pricingInfo']['newFare'];
            $matrix[$i]['AirlineName'] = $flight['flightSegments'][0]['Segments'][0]['MarketingAirlineName'];
            $matrix[$i]['AirlineCode'] = $flight['flightSegments'][0]['Segments'][0]['MarketingAirlineCode'];
            $matrix[$i]['AirlineLogo'] = airline_logo_small_url($flight['flightSegments'][0]['Segments'][0]['MarketingAirlineCode']);
            $matrix[$i]['flightPrice'] = $price;
            $matrix[$i]['numberOfStops'] = max(array_column($flight['flightSegments'],'stops'));

            $currentAirlineCodeAndPrice = $flight['flightSegments'][0]['Segments'][0]['MarketingAirlineCode'].','.$price;

            if(!in_array($currentAirlineCodeAndPrice,$airlines_code_and_price_array)){
                $airlines_code_and_price_array[$i] = $currentAirlineCodeAndPrice;
                $alt_matrix[] = $matrix[$i];
            }
            $i++;
        }
        return $alt_matrix;
    }

    public function goingTimes($flights)
    {
        $departTime = Carbon::parse($flights[0]['flightSegments'][0]['Segments'][0]['DepartureTime']);
        foreach ($flights as $flight){
            $departureTime = Carbon::parse($flight['flightSegments'][0]['Segments'][0]['DepartureTime']);
            if($departTime->lt($departureTime)){
                $departTime = Carbon::parse($flight['flightSegments'][0]['Segments'][0]['DepartureTime']);
            }
        }

        $maxDepartureTime = $departTime;

        $departTime = Carbon::parse($flights[0]['flightSegments'][0]['Segments'][0]['DepartureTime']);
        foreach ($flights as $flight){
            $departureTime = Carbon::parse($flight['flightSegments'][0]['Segments'][0]['DepartureTime']);
            if($departTime->gt($departureTime)){
                $departTime = Carbon::parse($flight['flightSegments'][0]['Segments'][0]['DepartureTime']);
            }
        }

        $minDepartureTime = $departTime;

        $departureTimes = ['min' => $minDepartureTime->format('H:i'),'max' => $maxDepartureTime->format('H:i')];
        $arrivalTimes = $this->arrivalTimes($flights);

        return ['departureTimes' => $departureTimes,'arrivalTimes' => $arrivalTimes];
    }

    public function arrivalTimes($flights)
    {
        $indexOfLastArrivalTime = count($flights[0]['flightSegments'][0]['Segments']) - 1;
        $arrivTime = Carbon::parse($flights[0]['flightSegments'][0]['Segments'][$indexOfLastArrivalTime]['ArrivalTime']);

        foreach ($flights as $flight){
            $indexOfLastArrivalTime = count($flight['flightSegments'][0]['Segments']) - 1;
            $arrivalTime = Carbon::parse($flight['flightSegments'][0]['Segments'][$indexOfLastArrivalTime]['ArrivalTime']);
            if($arrivTime->lt($arrivalTime)){
                $arrivTime = Carbon::parse($flight['flightSegments'][0]['Segments'][$indexOfLastArrivalTime]['ArrivalTime']);
            }
        }

        $maxArrivalTime = $arrivTime;

        $indexOfLastArrivalTime = count($flights[0]['flightSegments'][0]['Segments']) - 1;
        $arrivTime = Carbon::parse($flights[0]['flightSegments'][0]['Segments'][$indexOfLastArrivalTime]['ArrivalTime']);

        foreach ($flights as $flight){
            $indexOfLastArrivalTime = count($flight['flightSegments'][0]['Segments']) - 1;
            $arrivalTime = Carbon::parse($flight['flightSegments'][0]['Segments'][$indexOfLastArrivalTime]['ArrivalTime']);
            if($arrivTime->gt($arrivalTime)){
                $arrivTime = Carbon::parse($flight['flightSegments'][0]['Segments'][$indexOfLastArrivalTime]['ArrivalTime']);
            }
        }

        $minArrivalTime = $arrivTime;

        return ['min' => $minArrivalTime->format('H:i') ,'max' => $maxArrivalTime->format('H:i')];
    }

    public function returningTimes($flights)
    {
        if(count($flights[0]['flightSegments']) == 1){
            return new \stdClass();
        }
        $returnTime = Carbon::parse($flights[0]['flightSegments'][1]['Segments'][0]['DepartureTime']);
        foreach ($flights as $flight){
            $departureTime = Carbon::parse($flight['flightSegments'][1]['Segments'][0]['DepartureTime']);
            if($returnTime->lt($departureTime)){
                $returnTime = Carbon::parse($flight['flightSegments'][1]['Segments'][0]['DepartureTime']);
            }
        }

        $maxReturnTime = $returnTime;

        $returnTime = Carbon::parse($flights[0]['flightSegments'][1]['Segments'][0]['DepartureTime']);
        foreach ($flights as $flight){
            $departureTime = Carbon::parse($flight['flightSegments'][1]['Segments'][0]['DepartureTime']);
            if($returnTime->gt($departureTime)){
                $returnTime = Carbon::parse($flight['flightSegments'][1]['Segments'][0]['DepartureTime']);
            }
        }

        $minReturnTime = $returnTime;

        $returnTimes = ['min' => $minReturnTime->format('H:i'), 'max' => $maxReturnTime->format('H:i')];

        return ['returnTimes' => $returnTimes,'arrivalTimes' => $this->returningArrivalTimes($flights)];
    }

    public function returningArrivalTimes($flights)
    {
        $indexOfLastArrivalTime = count($flights[0]['flightSegments'][1]['Segments']) - 1;
        $arrivTime = Carbon::parse($flights[0]['flightSegments'][1]['Segments'][$indexOfLastArrivalTime]['ArrivalTime']);

        foreach ($flights as $flight){
            $indexOfLastArrivalTime = count($flight['flightSegments'][1]['Segments']) - 1;
            $arrivalTime = Carbon::parse($flight['flightSegments'][1]['Segments'][$indexOfLastArrivalTime]['ArrivalTime']);
            if($arrivTime->lt($arrivalTime)){
                $arrivTime = Carbon::parse($flight['flightSegments'][1]['Segments'][$indexOfLastArrivalTime]['ArrivalTime']);
            }
        }

        $maxArrivalTime = $arrivTime;

        $indexOfLastArrivalTime = count($flights[0]['flightSegments'][1]['Segments']) - 1;
        $arrivTime = Carbon::parse($flights[0]['flightSegments'][1]['Segments'][$indexOfLastArrivalTime]['ArrivalTime']);

        foreach ($flights as $flight){
            $indexOfLastArrivalTime = count($flight['flightSegments'][1]['Segments']) - 1;
            $arrivalTime = Carbon::parse($flight['flightSegments'][1]['Segments'][$indexOfLastArrivalTime]['ArrivalTime']);
            if($arrivTime->gt($arrivalTime)){
                $arrivTime = Carbon::parse($flight['flightSegments'][1]['Segments'][$indexOfLastArrivalTime]['ArrivalTime']);
            }
        }

        $minArrivalTime = $arrivTime;

        return ['min' => $minArrivalTime->format('H:i') ,'max' => $maxArrivalTime->format('H:i')];
    }

    public function maxMinPrice($flights)
    {
        $price  = ($flights[0]['pricingInfo']['newFare'] == 0)?$flights[0]['pricingInfo']['TotalFare']:$flights[0]['pricingInfo']['newFare'];
        foreach ($flights as $flight){
            if($flight['pricingInfo']['newFare'] == 0){
                if($price < $flight['pricingInfo']['TotalFare']) {
                    $price = $flight['pricingInfo']['TotalFare'];
                }
            }else{
                if($price < $flight['pricingInfo']['newFare']) {
                    $price = $flight['pricingInfo']['newFare'];
                }
            }
        }

        $maxPrice = $price;

        $price  = ($flights[0]['pricingInfo']['newFare'] == 0)?$flights[0]['pricingInfo']['TotalFare']:$flights[0]['pricingInfo']['newFare'];
        foreach ($flights as $flight){
            if($flight['pricingInfo']['newFare'] == 0){
                if($price > $flight['pricingInfo']['TotalFare']){
                    $price = $flight['pricingInfo']['TotalFare'];
                }
            }else{
                if($price > $flight['pricingInfo']['newFare']){
                    $price = $flight['pricingInfo']['newFare'];
                }
            }

        }
        $minPrice = $price;

        return ['maxPrice' => $maxPrice, 'minPrice' => $minPrice];
    }

    public function airlinesFilter($flights)
    {
        $airlines_codes_array = [];
        $alt_airlines = [];
        for($i=0; $i < count($flights); $i++){
            if($flights[$i]['mailOnlyFare']){
                continue;
            }
            $price =  ($flights[$i]['pricingInfo']['newFare'] == 0)?$flights[$i]['pricingInfo']['TotalFare']:$flights[$i]['pricingInfo']['newFare'];
            $airlines[$i]['airlineCode'] = $flights[$i]['flightSegments'][0]['Segments'][0]['MarketingAirlineCode'];
            $airlines[$i]['airlineName'] = $flights[$i]['flightSegments'][0]['Segments'][0]['MarketingAirlineName'];
            $airlines[$i]['price']       = $price;
            $airlinesCodes[]  = $flights[$i]['flightSegments'][0]['Segments'][0]['MarketingAirlineCode'];
            $currentAirlineCode = $flights[$i]['flightSegments'][0]['Segments'][0]['MarketingAirlineCode'];

            if(!in_array($currentAirlineCode,$airlines_codes_array)){
                $airlines_codes_array[$i] = $currentAirlineCode;
                $alt_airlines[] = $airlines[$i];
            }
        }

        return $alt_airlines;
    }

    public function getAirlineName($code,$attempt = 0)
    {
        if(Cache::has($code)){
            $airline = Cache::get($code);
        }else{
            $airline = Airline::where('airline_code',$code)->first();
            Cache::put($code,$airline,config('cache.ttl'));
        }
        if(is_null($airline)){
            $airlineAPI = new AirlineLookUp();
            $airlineAPI->getResponse($code);
            if($attempt <= 1){
                return $this->getAirlineName($code,$attempt + 1);
            }else{
                $airline_name = '';
            }
        }else{
            $airline_name = $airline->airline_name;
        }

        return $airline_name;
    }

    public function getBaggageUrl($flight_details)
    {
        foreach ($flight_details as $flight_detail) {
            $airlineCodes[] = $flight_detail['MarketingAirline']['attr']['Code'];
        }
        $airlineCodes = array_unique($airlineCodes);
        foreach ($airlineCodes as $code){
            if(Cache::has($code)){
                $airline = Cache::get($code);
            }else{
                $airline = Airline::where('airline_code',$code)->first();
                Cache::put($code,$airline,config('cache.ttl'));
            }

            try{
                $baggage_url = $airline->baggage_url;
                $airline_name = $airline->airline_name;
            }catch (\Exception $exception){
                if(! app()->environment('local')){
                    sendErrorToMail($exception);
                }
                $baggage_url = '';
                $airline_name = '';
            }

            $baggage_info[] = [
                'airlineName' => $airline_name,
                'baggage_url' => $baggage_url ?? ''
            ];
        }
        return $baggage_info;
    }

    public function getAirportName($code, $attempt = 0)
    {
        if(Cache::has($code)){
            $airport = Cache::get($code);
        }else{
            $airport = Airport::where('code',$code)->first();
            Cache::put($code,$airport,config('cache.ttl'));
        }

        if(is_null($airport) || $airport == null){
            $airportAPI = new GeoAutoComplete();
            $airportAPI->getResponse($code);
            if($attempt <= 1){
                return $this->getAirportName($code, $attempt + 1);
            }
        }else{
            $airport_name = $airport->name.','.$airport->city.','.$airport->countryName.','.$airport->country;
        }

        return $airport_name;
    }

    public function getAircraftName($code)
    {
        if(Cache::has($code)){
            $aircraft = Cache::get($code);
        }else{
            $aircraft = Aircraft::where('code',$code)->first();
            Cache::put($code,$aircraft,config('cache.ttl'));
        }

        if(is_null($aircraft)){
            $aircraftAPI = new AircraftEquipmentLookup();
            $aircraftAPI->getResponse($code);
        }
        try {
            $aircraft_name = $aircraft->name.','.$aircraft->code;
        }catch (\Exception $exception){
            $aircraft_name = '';
        }

        return $aircraft_name;
    }

    public function priceOfFare($airItineraryPricingInfo,$breakDown,$fareType)
    {
        $baseFare = $this->baseFareCalculations($breakDown[0]['PassengerFare']['EquivFare']['attr']['Amount'],$fareType);
        $taxes = $breakDown[0]['PassengerFare']['Taxes']['TotalTax']['attr']['Amount'];
        $total = $breakDown[0]['PassengerFare']['TotalFare']['attr']['Amount'];

        $farePrice['base_fare'] = $baseFare;
        $farePrice['taxes'] = $taxes;
        $farePrice['totalFare'] = $baseFare + $taxes;
        //$farePrice['originalFare'] = (float)$airItineraryPricingInfo['ItinTotalFare']['TotalFare']['attr']['Amount'];
        $farePrice['totalFare_currency'] = $breakDown[0]['PassengerFare']['TotalFare']['attr']['CurrencyCode'];
        $farePrice['totalFareNote'] = 'price per person(Adult) (incl. taxes & fees)';

        return $farePrice;
    }

    private function baseFareCalculations($originalBaseFare,$flightType)
    {
        if($flightType == 'Net'){
            $flightProfit = ProfitSetting::where('target','flight')->first();
            if(is_null($flightProfit)){
                $profitAmount = 10;
                $profitType   = 'percentage';
                $minAmount = 10;
            }else{
                $profitAmount = $flightProfit->amount;
                $profitType   = $flightProfit->type;
                $minAmount = $flightProfit->min_profit_amount;
            }
            if($profitType == 'percentage'){
                $percentage = $profitAmount / 100;
                $commissionValue = ($originalBaseFare * $percentage);
                if($commissionValue <= $minAmount){
                    $baseFare = $originalBaseFare + $minAmount;
                }else{
                    $baseFare = $originalBaseFare + $commissionValue;
                }
            }else{
                $baseFare = $profitAmount + $originalBaseFare;
            }
        }else{
            $baseFare = $originalBaseFare;
        }


        return $baseFare;
    }

}
