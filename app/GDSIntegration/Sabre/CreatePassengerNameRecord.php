<?php


namespace App\GDSIntegration\Sabre;


use App\Models\Airline;
use App\Models\Airport;
use App\GDSIntegration\HttpClient\HttpClient;
use App\GDSIntegration\Sabre\AirlineLookUp;
use App\Http\Resources\AirportResource;
use App\Models\ProfitSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Propaganistas\LaravelPhone\PhoneNumber;

class CreatePassengerNameRecord extends Sabre
{
    /*
     * send PNR request
     *
     * return array
     * */
    public function createPNRRequest($request,$flight)
    {

        $http_client = new HttpClient();

        $requestData = json_encode($this->createPassengerNameRecordRQ($request,$flight));

        //log PNR request
        // if(app()->environment('local') || app()->environment('development')){
        Storage::put('sabreRequests/'.$this->nowDate.'/PNR/'.$this->nowTime.'pnrRQ.json',$requestData);
        // }

        $result = $http_client
            ->executePostCall($this->rest_url,'/v2.2.0/passenger/records?mode=create',
                $requestData,$this->getAccessToken());

        //log PNR response
        Storage::put('sabreRequests/'.$this->nowDate.'/PNR/'.$this->nowTime.'pnrsRS.json',$result);


        $status = json_decode($result,true)['CreatePassengerNameRecordRS']['ApplicationResults']['status'];

        if($status == 'Complete'){

            $data = $this->responsePNR($result,$flight);

        }
        elseif ($status == 'Incomplete'){
            $data = 'You Cannot book this flight';
        }
        else{
            $data = 'Your Booking didn\'t create Yet, Please try again in few seconds';
        }

        return $data;
    }


    /*
     * PNR request data
     *
     * return string
     * */
    public function createPassengerNameRecordRQ($request,$flight)
    {
        /*
        $lastSegment = end(end($flight['flightSegments'])['Segments']);
        $arrivalDate = $lastSegment['ArrivalDate'];
        $arrivalTime = $lastSegment['ArrivalTime'];
        $arrivalDateTime = Carbon::parse($arrivalDate.' '.$arrivalTime);
        $numberOfDaysLeft = $arrivalDateTime->diffInDays(Carbon::now());
        if($numberOfDaysLeft < 24){
            $ticketTimeLimitDate = date('dM' , strtotime('now +1 day'));
            $ticketTimeLimitTime = date('hA' , strtotime('now +1 day'));
        }else{
            $ticketTimeLimitDate = date('dM',strtotime('now +3 day'));
            $ticketTimeLimitTime = date('hA',strtotime('now +3 day'));
        }

        $ticketTimeLimit = $ticketTimeLimitTime.'/'.$ticketTimeLimitDate;
        $ticketType = '8'.str_replace('M','',$ticketTimeLimit);
        */

        if($flight['pricingInfo']['fare_type'] == 'Net'){
            $remark = $this->remark($flight['pricingInfo'],null,'Net');
        }elseif ($flight['pricingInfo']['discount_amount'] != 0) {
            $remark = $this->remark($flight['pricingInfo']);
        }elseif(isset($request->redeem)){
            $remark = $this->remark($flight['pricingInfo'],$request->redeem);
        }else{
            $remark = [];
        }

        $addRemark = array_merge($remark,$this->fOP_remark($request));

        /*  "Profile":{
          "UniqueID" :{
              "id" : "a746283"
                  }
              },*/
        $email = auth()->guard('api')->check() ? auth()->guard('api')->user()->email : $request->contact_email;

        $pnrRequest = [
            'CreatePassengerNameRecordRQ' => [
                'version' => '2.2.0',
                'haltOnAirPriceError' => false,
                'TravelItineraryAddInfo' => [
                    'AgencyInfo' => [
                        'Ticketing' => [
                            'TicketType' => '7TAW'
                        ]
                    ],
                    'CustomerInfo' => $this->CustomerInfo($request)
                ],
                'AirBook' => [
                    'HaltOnStatus' => [
                        ['Code' => 'HL'],
                        ['Code' => 'KK'],
                        ['Code' => 'LL'],
                        ['Code' => 'NN'],
                        ['Code' => 'NO'],
                        ['Code' => 'UC'],
                        ['Code' => 'US']
                    ],
                    'OriginDestinationInformation' => $this->originDestinationInformation($request,$flight),
                    'RedisplayReservation' => [
                        'NumAttempts' => 10,
                        'WaitInterval' => 300
                    ]
                ],
                'AirPrice' => $this->airPrice($request,$flight),
                'SpecialReqDetails' => [
                    'AddRemark' => [
                        'RemarkInfo' => $addRemark
                    ],
                    'SpecialService' => [
                        'SpecialServiceInfo' => [
                            "AdvancePassenger" => $this->advancePassengerDetails($request->passengerDetails),
                            "Service" => $this->specialService($flight,$email)
                            ]
                    ]
                ],
                'PostProcessing' => [
                    'EndTransaction' => [
                        'Source' => $this->receivedFrom(),
                        //"Email"  => [
                            //"eTicket" => ["PDF" => ["Ind" => true],"Ind" => true],
                            //"Invoice" => ["Ind" => true],
                   //         "Itinerary" =>["PDF" => ["Ind" => true],"Ind" => true] ,
                    //        "Ind" => true
                    //    ]
                    ],
                    'RedisplayReservation' => ['waitInterval' => 100]
                ]
            ]
        ];

        return $pnrRequest;
    }

    public function receivedFrom()
    {
        $client = resolve('client');
        if(auth()->guard('api')->check() && auth()->guard('api')->user()->hasRole(['admin','subAgent'])){
            $receivedFrom = ["ReceivedFrom"=> auth()->guard('api')->user()->name];
        }elseif(app()->environment('production')){
            $receivedFrom = ["ReceivedFrom"=> $client->name];
        }else{
            $receivedFrom = ["ReceivedFrom"=> "Test"];
        }

        return $receivedFrom;
    }

    /**
     *  customer Information Contain Contact Number & Person Name
     *
     * @return array
     * */

    public function customerInfo($request)
    {
        $phone = auth()->guard('api')->check() ? auth()->guard('api')->user()->phone : PhoneNumber::make($request->contact_phone)->ofCountry($request->countryIsoCode)
            ->formatInternational();
        $email = auth()->guard('api')->check() ? auth()->guard('api')->user()->email : $request->contact_email;

        $phone = str_replace('+','00',$phone);


        $i=0;
        $personName = [];
        foreach ($request->passengerDetails as $detail){
            $infant = $detail['passengerType'] == "INF" ? true : false;
            $personName[] = [
                "Infant"=> $infant,
                "NameNumber"=> ($i+1).'.1',
                "PassengerType"=> $detail['passengerType'],
                "GivenName"=> $detail['passengerFirstName'].' '.$detail['passengerTitle'],
                "Surname"=>  $detail['passengerLastName']
            ];
            $i++;
        }

        $customerInfo =  [
            "ContactNumbers"=> [
                "ContactNumber"=> [
                    [
                        "NameNumber"=> "1.1",
                        "Phone"=> "{$phone}",
                        "PhoneUseType"=> "H"
                    ]
                ]
            ],
            "PersonName"=> $personName,
            'Email' => [
                [
                    'Address' => $email,
                    'NameNumber' => "1.1"
                ]
            ]
        ];

        return $customerInfo;
    }

    /*
     * Passengers Information (Passport Information)
     *
     * @return string
     * */

    public function advancePassengerDetails($passengerDetails)
    {
        $advancePassenger = [];
        $i = 1;
        foreach ($passengerDetails as $passengerDetail){

            if(array_key_exists('passengerGender',$passengerDetail)){
                $gender = ["Gender"=> $passengerDetail['passengerGender']];
            }

            $passengerDetails = [
                "GivenName"=> $passengerDetail['passengerFirstName'],
                "Surname"  => $passengerDetail['passengerLastName'],
                "DateOfBirth"=> $passengerDetail['date_of_birth'],
                "NameNumber" => $i.'.1'
            ];

            $personName = array_merge($passengerDetails,$gender);

            $advancePassenger[] = [
                "Document"=> [
                    "IssueCountry"=> $passengerDetail['passport_issue_country'],
                    "NationalityCountry"=> $passengerDetail['passport_issue_country'],
                    "ExpirationDate"    => $passengerDetail['passport_expire_date'],
                    "Number"            => (string)$passengerDetail['passport_number'],
                    "Type"              => "P"
                ],
                "PersonName"=> $personName
            ];
            $i++;
        }

        $passportInfo = $advancePassenger;

        return $passportInfo;
    }

    public function specialService($flight,$email)
    {
        $flightSegments = array_column($flight['flightSegments'],'Segments');
        $marketingAirlinesCodes = [];
        foreach ($flightSegments as $flightSegment){
            $airlineCodes = array_column($flightSegment,'MarketingAirlineCode');
            $marketingAirlinesCodes = array_merge($marketingAirlinesCodes,$airlineCodes);
        }
        $hostedAirlines = array_unique($marketingAirlinesCodes);
        $contactEmail = str_replace('@','//',$email);
        $contactEmail = str_replace('_','--',$contactEmail);

        foreach ($hostedAirlines as $hostedAirline){
            $services[] = [
                "PersonName" => ["NameNumber" => "1.1"],
                "Text"       => 'CTCE '.$contactEmail,
                "VendorPrefs"=> ["Airline" => [
                    "Code" => $hostedAirline,
                    "Hosted" => false
                ]],
                "SSR_Code"   => "OSI"
            ];
        }

        return $services;

    }

    /*
     * Segments information
     *
     * return string
     * */

    public function originDestinationInformation($request,$flight)
    {
        foreach ($request->passengerDetails as $passengerDetail){
            if($passengerDetail['passengerType'] != 'INF'){
                $passengers[] = $passengerDetail;
            }
        }
        $numberOfPassengersExceptINF = count($passengers);

        $flightSegments = [];

        foreach ($flight['flightSegments'] as $flightSegment){

            foreach ($flightSegment->Segments as $segment){
                $flightSegments[] = [
                    "ArrivalDateTime"=> $segment->ArrivalDate.'T'.$segment->ArrivalTime,
                    "DepartureDateTime"=> $segment->DepartureDate.'T'.$segment->DepartureTime,
                    "FlightNumber"=> $segment->FlightNumber,
                    "NumberInParty"=> (string)$numberOfPassengersExceptINF,
                    "ResBookDesigCode"=> $segment->BookingClass,
                    "Status"=> "NN",
                    "DestinationLocation"=> [
                        "LocationCode"=> $segment->DestinationLocationCode
                    ],
                    "MarketingAirline"=> [
                        "Code"=> $segment->MarketingAirlineCode,
                        "FlightNumber"=> $segment->FlightNumber
                    ],
                    "OriginLocation"=> [
                        "LocationCode"=> $segment->OriginLocationCode
                    ]
                ];
            }

        }
        $originDestinationInfo =  [ "FlightSegment"=> $flightSegments ];

        return $originDestinationInfo;
    }


    /*
     * pricing information request data
     *
     * return string
     * */

    public function airPrice($request,$flight)
    {
        $airPriceInfo = [];

        $passengerTypes = array_count_values(array_column($request->passengerDetails,'passengerType'));

        foreach ($passengerTypes as $key => $value){
            $nameNumber = [];
            $nM = isset($nM)?  $nM: 1;
            for ($n=1; $n<=$value; $n++){
                $nameNumber[] = [
                    "NameNumber" => $nM.'.1'
                ];
                $nM++;
            }

            $airPriceInfo[] = [
                "PriceRequestInformation"=> [
                    "Retain"=> true,
                    "OptionalQualifiers"=> [
                        "FOP_Qualifiers"=> [
                            "BasicFOP"=> $this->paymentType($request)
                        ],
                        "PricingQualifiers"=> [
                            "NameSelect"=> $nameNumber,
                            "PassengerType"=> [
                                [
                                    "Code"=> $key,
                                    "Quantity"=> (string)$value
                                ]
                            ]
                        ]
                    ]
                ]
            ];
        }


        return $airPriceInfo;
    }


    /*
     * Payment type instead of redeem points
     * */

    public function paymentType($request,$cardNumberType = 'integer')
    {

        if(auth()->guard('api')->check()){
            $atsRole = auth()->guard('api')->user()->roles()->where('name','LIKE','ats_%')->first();
        }else{
            $atsRole = null;
        }

        if(auth()->guard('api')->check()){
            $authUser = auth()->guard('api')->user();
            $atsRole = auth()->guard('api')->user()->roles()->where('name','LIKE','ats_%')->first();
        }

        if(isset($request->redeem) || ( isset($authUser) && isset($request->cash) && (($atsRole != null) || ($authUser->hasRole(['admin','subAgent'])) ) )){
            $payment = ["Type" => "CA"];
        }else{
            $number = $cardNumberType == 'integer' ? ["Number"=> (integer)$request->creditCardNumber] : ["Number"=> '"'.$request->creditCardNumber.'"'];

            $paymentCardInfo =  [
                "ExpireDate"=> $request->creditCardExpireDate,
                "Code"=> $request->creditCardType
            ];

            $paymentCard = array_merge($number,$paymentCardInfo);

            $payment = [
                "CC_Info"=> [ "PaymentCard" => $paymentCard ]
            ];
        }

        return $payment;
    }

    public function fOP_remark($request)
    {
        $payment = $this->paymentType($request,'string');

        $fopRemark = [];

        if(array_key_exists('CC_Info',$payment)){
            $fopRemark = ["FOP_Remark"=> $payment ];
        }

        return $fopRemark;
    }

    /*
     * Add remark for promotions flight
     *
     * */
    public function remark($pricing = null,$redeem = null,$net = null)
    {
        $netRemark = [];
        if($net == 'Net'){
            $netRemark = [
                "Text"=> '"Price is '.$pricing['originalFare'].' With Commission '.$pricing['TotalFare'],
                "Type"=> "Invoice"
            ];
        }

        if( $pricing['discount_amount'] != 0){
            $discountRemark = [
                "Text" => '"Discount Amount is '.$pricing['discount_amount'].' Total fare after discount is '.$pricing['newFare'].'"',
                "Type" => "Invoice"
            ];
            $remark[] = array_merge($discountRemark,$netRemark);
        }elseif (! is_null($net)){
            $remark =
                [[
                    "Text"=> '"Price is '.$pricing['originalFare'].' With Commission '.$pricing['TotalFare'],
                    "Type"=> "Invoice"
                ]];
        }else{
            $remark = [[
                "Text" => "Free Flight from loyalty program",
                "Type" => "Invoice"
            ]
            ];
        }



        return ['Remark' => $remark];
    }

    /*
     * Handle PNR response Data
     *
     * return array
     * */
    public function responsePNR($response,$flight)
    {
        $response = json_decode($response,true);

        $totalPrice = ($flight['pricingInfo']['newFare'] == 0) ? $flight['pricingInfo']['TotalFare'] : $flight['pricingInfo']['newFare'];

        $pnrDetails['PNR'] = $response['CreatePassengerNameRecordRS']['ItineraryRef']['ID'];
        $pnrDetails['totalPrice'] =  array_key_exists('redeemedFare',$flight['pricingInfo']) ? 0 : $totalPrice;
        $pnrDetails['originalPrice'] = array_key_exists('originalFare',$flight['pricingInfo'])?$flight['pricingInfo']['originalFare']:
            $totalPrice;

        $pnrDetails['priceCurrency'] = $flight['pricingInfo']['TotalFare_CurrencyCode'];
        $pnrDetails['createdDate'] = Carbon::now()->format('m/d/Y h:i a');
        //$flight_segments = $response['CreatePassengerNameRecordRS']['AirBook']['OriginDestinationOption']['FlightSegment'];
        $pnrDetails['flight_segments'] = [];
        $i = 0;
        foreach ($flight['flightSegments'] as $flight_segment){
            foreach ($flight_segment->Segments as $segment){
                $departureDate = $segment->DepartureDate;
                $departureTime = $segment->DepartureTime;
                $arrivalDate   = $segment->ArrivalDate;
                $arrivalTime   = $segment->ArrivalTime;
                $originAirport = Airport::airport($segment->OriginLocationCode)->first();
                if(is_null($originAirport)){
                    $geoAutocomplete = new GeoAutoComplete();
                    $originAirport   = new AirportResource($geoAutocomplete->getResponse($segment->OriginLocationCode)[0]);
                }else{
                    $originAirport = new AirportResource($originAirport);
                }

                $destinationAirport = Airport::airport($segment->DestinationLocationCode)->first();

                if(is_null($destinationAirport)){
                    $geoAutocomplete = new GeoAutoComplete();
                    $destinationAirport   = new AirportResource($geoAutocomplete->getResponse($segment->DestinationLocationCode)[0]);
                }else{
                    $destinationAirport = new AirportResource($destinationAirport);
                }

                $airline = Airline::airline($segment->MarketingAirlineCode)->first();

                if(! is_null($airline)){
                    $airline_name = $airline->airline_name;
                }else{
                    $airline_name = $segment->MarketingAirlineCode;
                }

                $pnrDetails['flight_segments'][$i]['departureDate'] = $departureDate;
                $pnrDetails['flight_segments'][$i]['departureTime'] = $departureTime;
                $pnrDetails['flight_segments'][$i]['arrivalDate']   = $arrivalDate;
                $pnrDetails['flight_segments'][$i]['arrivalTime']   = $arrivalTime;
                $pnrDetails['flight_segments'][$i]['flight_number'] = $segment->FlightNumber;
                $pnrDetails['flight_segments'][$i]['originLocation']= $originAirport;
                $pnrDetails['flight_segments'][$i]['destinationLocation'] = $destinationAirport;
                $pnrDetails['flight_segments'][$i]['airline']     = $airline_name;
                $pnrDetails['flight_segments'][$i]['flight_duration'] = $segment->Duration;

                $i++;
            }

        }

        return $pnrDetails;
    }
}
