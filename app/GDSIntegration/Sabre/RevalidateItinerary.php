<?php


namespace App\GDSIntegration\Sabre;


use App\Models\Aircraft;
use App\Models\Airline;
use App\Models\Airport;
use App\Models\ProfitSetting;
use App\Services\Flights\SearchResponse\Flight;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RevalidateItinerary extends Sabre
{
    public function revalidateResponse(Flight $flight,Collection $profitSettings)
    {
        $request = $this->revalidateRequest($flight);

        Storage::put('sabreRequests/'.$this->nowDate.'/RevalidateItin/'.$this->nowTime.'revalidateRQ.xml',$request);

        $response = $this->httpClient->executeSoapCall($request,$this->soap_url,$this->soapContentType,$this->timeout);

        Storage::put('sabreRequests/'.$this->nowDate.'/RevalidateItin/'.$this->nowTime.'revalidateRS.xml',$response['xmlResponse']);

        try{
            $result = $response['arrayResponse']['SOAP-ENV:Envelope']['SOAP-ENV:Body']['OTA_AirLowFareSearchRS']['PricedItineraries']['PricedItinerary'];
        }catch (\Exception $exception){

            sendErrorToMail($exception);

            return 'Invalid Flight Data, Please try another';

        }

        return $this->rearrangeResultData($result,$flight,$profitSettings);
    }

    public function revalidateRequest($flight)
    {

        $action = 'RevalidateItinRQ';

        $revalidateRQ = '<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
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
                                        <m:MessageId>'.Str::uuid()->toString().'</m:MessageId>
                                        <m:Timestamp>'.date("Y-m-d\TH:i:s\Z").'</m:Timestamp>
                                        <m:TimeToLive>'.date("Y-m-d\TH:i:s\Z").'</m:TimeToLive>
                                    </m:MessageData>
                                    <m:DuplicateElimination/>
                                    <m:Description>Bargain Finder Max Service</m:Description>
                                </m:MessageHeader>
                                <wsse:Security xmlns:wsse="http://schemas.xmlsoap.org/ws/2002/12/secext">
                                    <wsse:BinarySecurityToken valueType="String" EncodingType="wsse:Base64Binary">' . $this->getAccessToken() . '</wsse:BinarySecurityToken>
                                </wsse:Security>
                            </SOAP-ENV:Header>
                            <SOAP-ENV:Body>
                               <OTA_AirLowFareSearchRQ Version="5.2.0" ResponseType="OTA" ResponseVersion="6.1.0" xmlns="http://www.opentravel.org/OTA/2003/05"
                                     xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                                    <POS>
                                        <Source PseudoCityCode="'.$this->pcc.'">
                                            <RequestorID ID="1" Type="1">
                                                    <CompanyName Code="TN">TN</CompanyName>
                                            </RequestorID>
                                        </Source>
                                    </POS>
                                    '.$this->originDestinationInformation($flight).'
                                    <TravelPreferences>
                                        <TPA_Extensions>
                                            <FlexibleFares>
                                                <FareParameters>
                                                    '.$this->flexiblePassengerTypeQuantitySoap($flight)['passengerType'].'
                                                </FareParameters>
                                            </FlexibleFares>
                                            <VerificationItinCallLogic Value="B" AlwaysCheckAvailability="true"/>
                                        </TPA_Extensions>
                                    </TravelPreferences>
                                    <TravelerInfoSummary>
                                        <SeatsRequested>'.$this->passengerTypeQuantitySoap($flight)['passengersNumber'].'</SeatsRequested>
                                        <AirTravelerAvail>
                                              '.$this->passengerTypeQuantitySoap($flight)['passengerType'].'
                                        </AirTravelerAvail>
                                        <PriceRequestInformation CurrencyCode="'.$flight->pricingInfo->TotalFare_CurrencyCode.'">
                                            <TPA_Extensions>
                                                <PublicFare Ind="true"/>
                                                <Indicators><ResTicketing Ind="true" /></Indicators>
                                            </TPA_Extensions>
                                          </PriceRequestInformation>
                                    </TravelerInfoSummary>
                                    <TPA_Extensions>
                                        <IntelliSellTransaction>
                                            <RequestType Name="REVALIDATE"/>
                                            <ServiceTag Name="REVALIDATE"/>
                                        </IntelliSellTransaction>
                                    </TPA_Extensions>
                                </OTA_AirLowFareSearchRQ>
                            </SOAP-ENV:Body>
                         </SOAP-ENV:Envelope>';

        return $revalidateRQ;
    }

    protected function originDestinationInformation($flight)
    {
        $originDestination = '';

        $i = 1;
        foreach ($flight->flightSegments as $flightSegment){
            $j = $i;
            foreach ($flightSegment->Segments as $segment){

                $departureDateTime = $segment->DepartureDate.'T'.$segment->DepartureTime.':00';
                $arrivalDateTime = $segment->ArrivalDate.'T'.$segment->ArrivalTime.':00';

                $originDestination  .= '<OriginDestinationInformation RPH="'.$j.'">
                                            <DepartureDateTime>'.$departureDateTime.'</DepartureDateTime>
                                            <OriginLocation LocationCode="'.$segment->OriginLocationCode.'"/>
                                            <DestinationLocation LocationCode="'.$segment->DestinationLocationCode.'"/>
                                            <TPA_Extensions>
                                                <Flight ClassOfService="'.$segment->BookingClass.'"
                                                 Number="'.$segment->FlightNumber.'" Type="A"
                                                  DepartureDateTime="'.$departureDateTime.'" ArrivalDateTime="'.$arrivalDateTime.'">
                                                    <OriginLocation LocationCode="'.$segment->OriginLocationCode.'"/>
                                                    <DestinationLocation LocationCode="'.$segment->DestinationLocationCode.'"/>
                                                    <Airline Marketing="'.$segment->MarketingAirlineCode.'" Operating="'.$segment->OperatingAirlineCode.'"/>
                                                </Flight>
                                            </TPA_Extensions>
                                         </OriginDestinationInformation>';
            }
            $i = $j;

            $i++;
        }

        return $originDestination;

    }

    protected function flexiblePassengerTypeQuantitySoap($flight)
    {
        $passenger_type = '';
        $passengersNumber = 0;

        foreach ($flight->passengerQuantity as $item){
            $passenger_type .= '<PassengerTypeQuantity Code="'.$item->Code.'" Quantity="' .$item->Quantity. '"/>';
            if($item->Code == 'JCB' || $item->Code == 'JNN'){
                $passengersNumber += $item->Quantity;
            }
        }

        return ['passengerType' => $passenger_type,'passengersNumber' => $passengersNumber];
    }

    protected function passengerTypeQuantitySoap($flight)
    {
        $passenger_type = '';
        $passengersNumber = 0;

        foreach ($flight->passengerQuantity as $item){
            $passenger_type .= '<PassengerTypeQuantity Code="'.$item->Code.'" Quantity="' .$item->Quantity. '"/>';
            if($item->Code == 'ADT' || $item->Code == 'CNN'){
                $passengersNumber += $item->Quantity;
            }
        }

        return ['passengerType' => $passenger_type,'passengersNumber' => $passengersNumber];
    }

    public function rearrangeResultData(array $result,Flight $flight,Collection $profitSettings)
    {
        //return $data1;
        $data1 = $result;

        if(isset($data1[0])){
            $data = $data1;
        }else{
            $data['flight'] = $data1;
        }
        $flight_results = [];

        $i = 0;
        foreach($data as $item){

            $flight_results[$i]['id'] = $flight->id;
            $flight_results[$i]['mailOnlyFare'] = $flight->mailOnlyFare;

            if(array_key_exists('AdditionalFares',$item['TPA_Extensions'])){
                if(isset($item['TPA_Extensions']['AdditionalFares'][0])){
                    $additionalFares = $item['TPA_Extensions']['AdditionalFares'][0];
                }else{
                    $additionalFares = $item['TPA_Extensions']['AdditionalFares'];
                }
            }

            if(array_key_exists('TPA_Extensions',$item) && isset($additionalFares) &&
                ( (float)$additionalFares['AirItineraryPricingInfo']['ItinTotalFare']['TotalFare']['attr']['Amount'] <
                (float)$item['AirItineraryPricingInfo']['ItinTotalFare']['TotalFare']['attr']['Amount'] ||
            array_key_exists('PrivateFareType',$item['AirItineraryPricingInfo']['attr']))){

                $fareType = 'Net';
                $fareBreakDown = $additionalFares['AirItineraryPricingInfo']['PTC_FareBreakdowns']['PTC_FareBreakdown'];
                $itInTotalFare = $additionalFares['AirItineraryPricingInfo'];

            }else{
                $fareType = 'Publish';
                $fareBreakDown = $item['AirItineraryPricingInfo']['PTC_FareBreakdowns']['PTC_FareBreakdown'];
                $itInTotalFare = $item['AirItineraryPricingInfo'];
            }


            if(isset($fareBreakDown[0])){
                $fareBreakDowns = $fareBreakDown;
            }else{
                $fareBreakDowns[0] = $fareBreakDown;
            }
            $fq = 0;

            $numberOfPassengers = 0;
            foreach ($fareBreakDowns as $fareBreakDown){
                $numberOfPassengers +=  (int)$fareBreakDown['PassengerTypeQuantity']['attr']['Quantity'];
             }

            $priceFare = $this->priceOfFare($itInTotalFare,$fareType,$flight->isDomesticFlight,$profitSettings);
            $originalTotalBaseFare = $itInTotalFare['ItinTotalFare']['EquivFare']['attr']['Amount'];
            $calculatedBaseFare = $priceFare['base_fare'];

            $commissionValue = $calculatedBaseFare - $originalTotalBaseFare;
            if($commissionValue != 0){
                $commissionPerPassenger = $commissionValue / $numberOfPassengers;
            }else{
                $commissionPerPassenger = 0;
            }


            foreach ($fareBreakDowns as $fareBreakDown){
                $quantity = (int)$fareBreakDown['PassengerTypeQuantity']['attr']['Quantity'];
                $originalBaseFare = (float)$fareBreakDown['PassengerFare']['EquivFare']['attr']['Amount'];
                if(array_key_exists('Taxes',$fareBreakDown['PassengerFare'])){
                    $taxes = (float)$fareBreakDown['PassengerFare']['Taxes']['TotalTax']['attr']['Amount'];
                }else{
                    $taxes = 0;
                }

                $baseFare = $originalBaseFare + $commissionPerPassenger;

                switch ($fareBreakDown['PassengerTypeQuantity']['attr']['Code']){
                    case 'JCB':
                        $passengerCode = 'ADT';
                        break;
                    case 'JNN':
                        $passengerCode = 'CNN';
                        break;
                    default:
                        $passengerCode = $fareBreakDown['PassengerTypeQuantity']['attr']['Code'];
                }

                $flight_results[$i]['pricingInfo']['breakDowns'][$fq]['passengerType'] = $passengerCode;
                $flight_results[$i]['pricingInfo']['breakDowns'][$fq]['passengerQuantity'] = $quantity;
                $flight_results[$i]['pricingInfo']['breakDowns'][$fq]['baseFare'] = round($baseFare,2);
                $flight_results[$i]['pricingInfo']['breakDowns'][$fq]['taxes'] = $taxes;
                $flight_results[$i]['pricingInfo']['breakDowns'][$fq]['totalFare'] = round($baseFare + $taxes,2);
                $flight_results[$i]['passengerQuantity'][$fq]['Code'] = $fareBreakDown['PassengerTypeQuantity']['attr']['Code'];
                $flight_results[$i]['passengerQuantity'][$fq]['Quantity'] = (int)$fareBreakDown['PassengerTypeQuantity']['attr']['Quantity'];
                $fq++;
            }


            $flight_results[$i]['pricingInfo']['baseFare'] = round($priceFare['base_fare'],2);
            $flight_results[$i]['pricingInfo']['taxes'] = $priceFare['taxes'];
            $flight_results[$i]['pricingInfo']['TotalFare'] = round($priceFare['totalFare'],2);
            if(array_key_exists('originalFare',$priceFare)){
                $flight_results[$i]['pricingInfo']['originalFare'] = round($priceFare['originalFare'],2);
            }
            if($flight->pricingInfo->discount_amount != 0){

                $flight_results[$i]['pricingInfo']['discount_amount'] = $flight->pricingInfo->discount_amount;
                $flight_results[$i]['pricingInfo']['newFare']  = $flight->pricingInfo->newFare;
            }else{
                $flight_results[$i]['pricingInfo']['discount_amount']  = 0;
                $flight_results[$i]['pricingInfo']['newFare']  = 0;
            }
            $flight_results[$i]['pricingInfo']['TotalFare_CurrencyCode'] = $priceFare['totalFare_currency'];
            $flight_results[$i]['pricingInfo']['fare_type'] = $priceFare['fare_type'];

            if( isset($item['AirItineraryPricingInfo']['FareInfos']['FareInfo']['FareReference'])){
                $fareInfo =  $item['AirItineraryPricingInfo']['FareInfos']['FareInfo'];
            }else{
                $fareInfo =  $item['AirItineraryPricingInfo']['FareInfos']['FareInfo'][0];
            }
            $flight_results[$i]['remainingSeats'] = $fareInfo['TPA_Extensions']['SeatsRemaining']['attr']['Number'];
            $flight_results[$i]['totalDuration'] = $flight->totalDuration;

            $flight_results[$i]['flightSegments'] = $flight->flightSegments;

            $i++;
        }

        return $flight_results;
    }


    public function priceOfFare(array $airItineraryPricingInfo,
                                string $fareType,bool $isDomesticFlight,Collection $profitSettings)
    {
        $originalBaseFare = (float)$airItineraryPricingInfo['ItinTotalFare']['EquivFare']['attr']['Amount'];
        $taxes = (float)$airItineraryPricingInfo['ItinTotalFare']['Taxes']['Tax']['attr']['Amount'];

        $baseFare = $this->baseFareCalculations($originalBaseFare,$fareType,$isDomesticFlight, $profitSettings);

        $farePrice['base_fare'] = $baseFare;
        $farePrice['taxes'] = $taxes;
        $farePrice['totalFare'] = $baseFare + $taxes;
        $farePrice['originalFare'] = (float)$airItineraryPricingInfo['ItinTotalFare']['TotalFare']['attr']['Amount'];
        $farePrice['totalFare_currency'] = $airItineraryPricingInfo['ItinTotalFare']['TotalFare']['attr']['CurrencyCode'];
        $farePrice['fare_type']         = $fareType;

        return $farePrice;
    }

    private function baseFareCalculations(float $originalBaseFare,
                                          string $flightType,
                                          bool $isDomesticFlight,Collection  $profitSettings = null)
    {
        if($flightType == 'Net') {
            $finalProfitSettings = $this->profitSettingsOfNetFlights($profitSettings,$isDomesticFlight);
        }else{
            $finalProfitSettings = $this->profitSettingsOfPublishFlights($profitSettings,$isDomesticFlight);
        }

        if(is_null($finalProfitSettings)){
            $finalProfitSettings = $this->profitSettingsOfAllFlights($profitSettings,$isDomesticFlight);
            if(is_null($finalProfitSettings)){
                $baseFare = $originalBaseFare;
            }else{
                $baseFare = $this->calculateBaseFareFromProfitSettings($finalProfitSettings,$originalBaseFare);
            }
        }else{
            $baseFare = $this->calculateBaseFareFromProfitSettings($finalProfitSettings,$originalBaseFare);
        }

        return $baseFare;
    }

    private function profitSettingsOfNetFlights(Collection $profitSettings,bool $isDomesticFlight)
    {
        $profitSettingsNet = $profitSettings->filter(function ($item) {
            return false !== stristr($item->target, 'net');
        });

        if (count($profitSettingsNet) > 0) {
            foreach ($profitSettingsNet as $profitSetting) {
                switch ($profitSetting->target) {
                    case 'net-domestic-flights':
                        $finalProfitSettings = $isDomesticFlight ? $profitSetting : null;
                        break;
                    case 'net-international-flights':
                        $finalProfitSettings = $isDomesticFlight ? null : $profitSetting;
                        break;
                    case 'net-flights':
                        $finalProfitSettings = $profitSetting;
                        break;
                }// end condition for check types of net fares flights
            }// end loop for profit settings for net flights
        }// end condition if profit settings include net fares flights settings

        return $finalProfitSettings ?? null;
    }

    private function profitSettingsOfPublishFlights(Collection $profitSettings,bool $isDomesticFlight)
    {
        $profitSettingsPublish =  $profitSettings->filter(function($item){
            return false !== stristr($item->target,'publish');
        });

        if(count($profitSettingsPublish) > 0){
            foreach ($profitSettingsPublish as $profitSetting) {
                switch ($profitSetting->target) {
                    case 'publish-domestic-flights':
                        $finalProfitSettings = $isDomesticFlight ? $profitSetting : null;
                        break;
                    case 'publish-international-flights':
                        $finalProfitSettings = $isDomesticFlight ? null : $profitSetting;
                        break;
                    case 'publish-flights':
                        $finalProfitSettings = $profitSetting;
                        break;
                }// end condition for check types of publish fares flights
            }
        }

        return $finalProfitSettings ?? null;
    }

    private function profitSettingsOfAllFlights(Collection $profitSettings,bool $isDomesticFlight)
    {
        $profitSettingsAll = $profitSettings->filter(function($item){
            return false !== stristr($item->target,'all');
        });

        foreach ($profitSettingsAll as $profitSetting){
            switch ($profitSetting->target) {
                case 'all-domestic-flights':
                    $finalProfitSettings = $isDomesticFlight ? $profitSetting : null;
                    break;
                case 'all-international-flights':
                    $finalProfitSettings = $isDomesticFlight ? null : $profitSetting;
                    break;
            }// end condition for check all types of fares flights
        }


        return $finalProfitSettings ?? null;
    }

    private function calculateBaseFareFromProfitSettings(ProfitSetting $finalProfitSettings,float $originalBaseFare)
    {
        $profitAmount = $finalProfitSettings->amount;
        $profitType   = $finalProfitSettings->type;
        $minAmount = $finalProfitSettings->min_profit_amount;

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

        return $baseFare;
    }
}
