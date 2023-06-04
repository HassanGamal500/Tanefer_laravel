<?php


namespace App\GDSIntegration\Sabre\BargainFinderMax;


use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Baggage;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BargainFinderMaxService;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CabinPrefType;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CompanyNamePrefType;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CompanyNameType;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DestinationLocation;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareInfos;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FlexibleFaresType;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MultiTicket;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationInformation;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginLocation;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PassengerTypeQuantityType;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\POS_Type;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PricedItineraryType;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PriceRequestInformationType;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PTC_FareBreakdowns;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PTCFareBreakdownType;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\RequestType;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TPA_ExtensionsForTransactionType;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TPA_ExtensionsForTravelPreference;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelerInformationType;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelerInfoSummaryType;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\UniqueID_Type;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VendorPrefApplicabilityType;
use App\GDSIntegration\Sabre\Sabre;
use App\Models\Airport;
use App\Models\FlightsPromotion;
use App\Services\Flights\SearchResponse\FlightSearchResponse;
use App\Services\Flights\SearchResponse\FlightSegment;
use App\Services\Flights\SearchResponse\PassengerQuantity;
use App\Services\Flights\SearchResponse\PricingInfo;
use App\Services\Flights\SearchResponse\Segment;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Flight extends Sabre
{
    /**
     * Return Sabre Search Flight Results
     *
     * @param array $searchCritiera
     * @param string $currencyCode
     * @param string $searchId
     * @param array $excludeAirlinesCodes
     * @param FlightsPromotion $promotion
     * @param boolean $domesticFlights
     *
     * @return FlightSearchResponse|string
     * */
    public function searchResult(array $searchCriteria,string $currencyCode,string $searchId,
                                 array $excludeAirlinesCodes,FlightsPromotion $promotion = null,
                                 bool $isDomesticFlights = false,Collection $profitSettings  = null)
    {
        $requestType = $this->setRequestType($searchId);

        $multiTicket = is_array($searchCriteria['origin']) ? true : false;

        $bargainFinderMaxService = new BargainFinderMaxService([
            'trace' => true,
            'exception'=> true,
            'uri' => $this->soap_url
            ]);

        $bargainFinderMaxService->__setSoapHeaders($this->soapHeaders($requestType['action'],$this->getAccessToken()));
        $bargainFinderMaxService->__setLocation($this->soap_url);

        try {
            $startCallTime = microtime(true);
            $response = $bargainFinderMaxService
                ->BargainFinderMaxRQ($this->set_otaAirLowFareSearchRQ($searchCriteria,$currencyCode,$requestType['requestType'],$multiTicket));
            $endCallTime = microtime(true);

        }catch (\Exception $exception){
            sendErrorToMail($exception);
            return 'SomThing Went Wrong';
        }

        if(Cache::has($searchId)){
            $logName = 'searchWithAlternate';
        }else{
            $logName = 'searchWithRegular';
        }

        $requestTime = $endCallTime - $startCallTime;
        Storage::put('/sabreRequests/'.$this->nowDate.'/search/'.$this->nowTime.$logName.'RQ.xml',
            $bargainFinderMaxService->__getLastRequest());
        Storage::put('/sabreRequests/'.$this->nowDate.'/search/'.$this->nowTime.$logName.'RS.xml',
            $bargainFinderMaxService->__getLastResponse());
        Storage::append('/sabreRequests/'.$this->nowDate.'/search/searchCallTime.txt',$this->nowTime."\t".'Request Time: '.$requestTime."\n");

        return  $this->searchResponseResult($response,$searchCriteria,$excludeAirlinesCodes,$promotion,$searchId,$isDomesticFlights,$profitSettings);
    }

    /**
     * Set Request Type to specify type of data returned if alternate data request or not
     * @param string $searchId
     *
     * @return array
     * */
    private function setRequestType(string $searchId)
    {
        if(Cache::has($searchId)){
            $action = 'BargainFinderMax_ADRQ';
            $requestType = 'AD3';
        }else{
            $action = 'BargainFinderMaxRQ';
            $requestType = '50ITINS';
        }

        return ['action' => $action,'requestType' => $requestType];
    }


    /**
     * Set OTA Air low Fare Search Request
     *
     * @param array $searchData
     * @param string $currencyCode
     * @param string $requestType
     *
     * @return OTA_AirLowFareSearchRQ
     * */
    private function set_otaAirLowFareSearchRQ(array $searchData,string $currencyCode,string $requestType,bool $multitickets)
    {
        $children = array_key_exists('children',$searchData) ? (int)$searchData['children'] : 0;
        $infants = array_key_exists('infants',$searchData) ? (int)$searchData['infants'] : 0;
        $preferredAirline = array_key_exists('preferredAirline',$searchData) ? $searchData['preferredAirline'] : '';

        $ota_airLowFareSearchRQ = new OTA_AirLowFareSearchRQ();
        $ota_airLowFareSearchRQ->setVersion('5.2.0');
        $ota_airLowFareSearchRQ->setResponseType('OTA');
        $ota_airLowFareSearchRQ->setPOS($this->getPos());
        $ota_airLowFareSearchRQ->setOriginDestinationInformation($this->originDestinationInformation($searchData));
        $ota_airLowFareSearchRQ
            ->setTravelPreferences($this->travelPreferences($searchData['classType'],$preferredAirline,
                (int)$searchData['adults'],$children,$infants));

        $ota_airLowFareSearchRQ->
        setTravelerInfoSummary($this->travelerInfoSummary((int)$searchData['adults'],$children,$infants,$currencyCode));

        $ota_airLowFareSearchRQ->setTPA_Extensions($this->tpaExtensions($requestType,$multitickets));

        return $ota_airLowFareSearchRQ;
    }

    /**
     * Set Point of Sale Object
     * */
    private function getPos()
    {
        $companyName = new CompanyNameType();
        $companyName->set_('TN');
        $companyName->setCode('TN');

        $uniqueIdType = new UniqueID_Type();
        $uniqueIdType->setCompanyName($companyName);
        $uniqueIdType->setID('1');
        $uniqueIdType->setType('1');

        $sourceType = new SourceType();
        $sourceType->setRequestorID($uniqueIdType);
        $sourceType->setPseudoCityCode($this->pcc);

        $posType = new POS_Type();
        $posType->setSource([$sourceType]);

        return $posType;
    }

    /**
     * Set Origin Destination Flight Criteria
     *
     * @param $searchData
     *
     * @return OriginDestinationInformation
     * */
    private function originDestinationInformation(array $searchData)
    {
        $typeType = $searchData['tripType'];
        if($typeType == 'one'){
            $originDestinationInformation = $this->oneWayFlight(strtoupper($searchData['origin']),
                $searchData['originType'],$searchData['destinationType'],strtoupper($searchData['destination']),$searchData['departureDate']);
        }
        elseif ($typeType == 'round')
        {
            $originDestinationInformation = $this->roundWayFlight(strtoupper($searchData['origin']),
                $searchData['originType'],$searchData['destinationType'],strtoupper($searchData['destination']), $searchData['departureDate'],
                $searchData['arrivalDate']);
        }
        elseif ($typeType == 'multi')
        {
            $originDestinationInformation = $this->multiWayFlight($searchData['origin'],$searchData['originType'],$searchData['destinationType'],
                $searchData['destination'], $searchData['departureDate']);
        }else{
            $originDestinationInformation = null;
        }

        return $originDestinationInformation;
    }


    /**
     * Create OriginDestinationInformation Object for one way flight
     * @param string $origin
     * @param string $originType
     * @param string $destination
     * @param string $destinationType
     * @param string $departureDate
     *
     * @return OriginDestinationInformation
     * */
    private function oneWayFlight(string $origin,string $originType,string $destinationType,string $destination,string $departureDate)
    {
        $departureDate = date('Y-m-d',strtotime($departureDate));

        $originDestinationInformation = new OriginDestinationInformation();
        $originDestinationInformation->setRPH('1');
        $originDestinationInformation->setOriginLocation($this->originLocation($origin,$originType));
        $originDestinationInformation->
        setDestinationLocation($this->destinationLocation($destination, $destinationType));
        $originDestinationInformation->setDepartureDateTime($departureDate.'T00:00:00');

        return $originDestinationInformation;
    }

    /**
     * Create OriginDestinationInformation array of Objects for round way flight
     *
     * @param string $origin
     * @param string $originType
     * @param string $destination
     * @param string $destinationType
     * @param string $departureDate
     * @param string $arrivalDate
     *
     * @return OriginDestinationInformation[]
     * */
    private function roundWayFlight(string $origin,string $originType,string $destinationType,string $destination,
                                    string $departureDate,string $arrivalDate)
    {
        $departureDate = date('Y-m-d',strtotime($departureDate));
        $arrivalDate = date('Y-m-d',strtotime($arrivalDate));

        $originDestinationInformation1 = new OriginDestinationInformation();
        $originDestinationInformation1->setRPH('1');
        $originDestinationInformation1->setOriginLocation($this->originLocation($origin,$originType));
        $originDestinationInformation1->
        setDestinationLocation($this->destinationLocation($destination, $destinationType));
        $originDestinationInformation1->setDepartureDateTime($departureDate.'T00:00:00');

        $originDestinationInformation2 = new OriginDestinationInformation();
        $originDestinationInformation2->setRPH('2');
        $originDestinationInformation2->setOriginLocation($this->originLocation($destination,$destinationType));
        $originDestinationInformation2->
        setDestinationLocation($this->destinationLocation($origin, $originType));
        $originDestinationInformation2->setDepartureDateTime($arrivalDate.'T00:00:00');

        return [ $originDestinationInformation1, $originDestinationInformation2];
    }

    /**
     * Create OriginDestinationInformation array of Objects for multi city flight
     *
     * @param array $origin
     * @param array $originType
     * @param array $destination
     * @param array $destinationType
     * @param array $departureDate
     *
     * @return OriginDestinationInformation[]
     * */
    private function multiWayFlight(array $origin,array $originType,array $destinationType,array $destination,array $departureDate)
    {
        $originDestinationInformationArray = [];

        for ($i=0; $i < count($origin); $i++){

            $departureDate[$i] = date('Y-m-d',strtotime($departureDate[$i]));

            $originDestinationInformation = new OriginDestinationInformation();
            $originDestinationInformation->setRPH(($i+1));
            $originDestinationInformation->setOriginLocation($this->originLocation($origin[$i],$originType[$i]));
            $originDestinationInformation->
            setDestinationLocation($this->
            destinationLocation($destination[$i], $destinationType[$i]));
            $originDestinationInformation->setDepartureDateTime($departureDate[$i].'T00:00:00');

            $originDestinationInformationArray[] = $originDestinationInformation;
        }

        return $originDestinationInformationArray;
    }

    /**
     * Set Object of Origin Location
     * @param string $origin
     * @param string $locationType
     * */
    protected function originLocation(string $origin,string $locationType)
    {
        $originLocation = new OriginLocation();

        $originLocation->setLocationType($locationType);
        $originLocation->setLocationCode(strtoupper($origin));

        return $originLocation;
    }

    /**
     * Set Object of Destination Location
     * @param string $destination
     * @param string $locationType
     * */
    protected function destinationLocation(string $destination,string $locationType)
    {
        $destinationLocation = new DestinationLocation();
        $destinationLocation->setLocationType($locationType);
        $destinationLocation->setLocationCode(strtoupper($destination));

        return $destinationLocation;
    }

    /**
     * Create TravelPreferences Object which contain classType and number of passengers
     * and preferred airline
     *
     * @param string
     * @param int $adults
     * @param int $children
     * @param int $infants
     *
     * @return AirSearchPrefsType
     * */
    private function travelPreferences(string $classType,string $preferredAirline,int $adults,
                                       int $children,int $infants)
    {
        $cabinPref = new CabinPrefType();
        $cabinPref->setCabin($classType);
        $cabinPrefArray[] = $cabinPref;

        $baggage = new Baggage();
        $baggage->setRequestType('C');
        $baggage->setDescription(true);

        $airSearchPrefsType = new AirSearchPrefsType();
        $airSearchPrefsType->setValidInterlineTicket(true);
        $airSearchPrefsType->setCabinPref($cabinPrefArray);
        $airSearchPrefsType->setBaggage($baggage);
        $airSearchPrefsType->setTPA_Extensions($this->travelPreferencesTPAExtensions($adults,$children,$infants));

        if($preferredAirline != ''){
            $companyNamePrefType = new CompanyNamePrefType();
            $companyNamePrefType->setCode($preferredAirline);
            $companyNamePrefType->setPreferLevel('Preferred');
            $companyNamePrefType->setType('Marketing');

            $companyNamePrefTypeArray[] = $companyNamePrefType;

            $vendorPrefApplicabilityType = new VendorPrefApplicabilityType();
            $vendorPrefApplicabilityType->setType('Marketing');
            $vendorPrefApplicabilityType->setValue('AllSegments');

            $vendorPrefApplicabilityTypeArray[] = $vendorPrefApplicabilityType;

            $airSearchPrefsType->setVendorPref($companyNamePrefTypeArray);
            $airSearchPrefsType->setVendorPrefApplicability($vendorPrefApplicabilityTypeArray);
        }

        return $airSearchPrefsType;
    }

    /**
     * Create TPA Extension Object which contain flexible fares with passengers numbers and types
     * To get bulk fares
     *
     * @param int $adults
     * @param int $children
     * @param int $infants
     *
     * @return TPA_ExtensionsForTravelPreference
     * */
    private function travelPreferencesTPAExtensions(int $adults,int $children,int $infants)
    {
        $tpaExtensions = new TPA_ExtensionsForTravelPreference();

        $fareParameters = new FareParameters();
        $fareParameters->setPassengerTypeQuantity($this->flexiblePassengerTypeQuantity($adults,$children,$infants));

        $fareParametersArray[] = $fareParameters;

        $flexibleFaresType = new FlexibleFaresType();
        $flexibleFaresType->setFareParameters($fareParametersArray);

        $tpaExtensions->setFlexibleFares($flexibleFaresType);

        return $tpaExtensions;
    }

    /**
     * Create Passenger Type Quantity Object which contain passengers numbers and type To get bulk fares
     *
     * @param int $adults
     * @param int $children
     * @param int $infants
     *
     * @return PassengerTypeQuantityType[]
     * */
    private function flexiblePassengerTypeQuantity(int $adults,int $children,int $infants)
    {
        $passengerTypeQuantityType = new PassengerTypeQuantityType();
        $passengerTypeQuantityType->setCode('JCB');
        $passengerTypeQuantityType->setQuantity($adults);

        $passengerTypeQuantityTypeArray[] = $passengerTypeQuantityType;

        if($children != 0 && !is_null($children)){
            $passengerTypeQuantityType2 = new PassengerTypeQuantityType();
            $passengerTypeQuantityType2->setCode('JNN');
            $passengerTypeQuantityType2->setQuantity($children);
            $passengerTypeQuantityTypeArray[] = $passengerTypeQuantityType2;
        }
        if($infants != 0 && !is_null($infants)){
            $passengerTypeQuantityType3 = new PassengerTypeQuantityType();
            $passengerTypeQuantityType3->setCode('INF');
            $passengerTypeQuantityType3->setQuantity($infants);
            $passengerTypeQuantityTypeArray[] = $passengerTypeQuantityType3;
        }

        return $passengerTypeQuantityTypeArray;
    }


    /**
     * Create TravelerInfoSummery Object which contain passenger types and numbers and currencyCode
     *
     * @param int $adults
     * @param int $children
     * @param int $infants
     * @param string $currencyCode
     * */
    private function travelerInfoSummary(int $adults,int $children,int $infants,string $currencyCode)
    {
        $priceRequestInformation = new PriceRequestInformationType();
        $priceRequestInformation->setCurrencyCode($currencyCode);

        $seatsRequests[] = $adults + $children;

        $travelerInfoSummaryType = new TravelerInfoSummaryType();
        $travelerInfoSummaryType->setSeatsRequested($seatsRequests);
        $travelerInfoSummaryType->setAirTravelerAvail($this->passengerTypeQuantity($adults,$children,$infants));
        $travelerInfoSummaryType->setPriceRequestInformation($priceRequestInformation);

        return $travelerInfoSummaryType;
    }

    /**
     * Create TravelerInfoType which contain passengers type and quantity
     *
     * @param int $adults
     * @param int $children
     * @param int $infants
     *
     * @return TravelerInformationType[]
     * */
    private function passengerTypeQuantity(int $adults,int $children,int $infants)
    {
        $passengerTypeQuantityType = new PassengerTypeQuantityType();
        $passengerTypeQuantityType->setCode('ADT');
        $passengerTypeQuantityType->setQuantity($adults);

        $passengerTypeQuantityTypeArray[] = $passengerTypeQuantityType;

        if($children != 0 && !is_null($children)){
            $passengerTypeQuantityType2 = new PassengerTypeQuantityType();
            $passengerTypeQuantityType2->setCode('CNN');
            $passengerTypeQuantityType2->setQuantity($children);
            $passengerTypeQuantityTypeArray[] = $passengerTypeQuantityType2;
        }
        if($infants != 0 && !is_null($infants)){
            $passengerTypeQuantityType3 = new PassengerTypeQuantityType();
            $passengerTypeQuantityType3->setCode('INF');
            $passengerTypeQuantityType3->setQuantity($infants);
            $passengerTypeQuantityTypeArray[] = $passengerTypeQuantityType3;
        }


        $travelerInformationType = new TravelerInformationType();
        $travelerInformationType->setPassengerTypeQuantity($passengerTypeQuantityTypeArray);

        $travelerInformationTypeArray[] = $travelerInformationType;

        return $travelerInformationTypeArray;
    }

    /**
     * Create TPA Extension Object which contain request type or number of flights returned
     *
     * @param string $requestType :
     *
     * @return TPA_ExtensionsForTransactionType
     * */
    private function tpaExtensions(string $requestTypeOption,bool $multiTickets)
    {
        $requestType = new RequestType();
        $requestType->setName($requestTypeOption);

        $transactionType = new TransactionType();
        $transactionType->setRequestType($requestType);

        $tpaExtensionForTransactioType = new TPA_ExtensionsForTransactionType();
        $tpaExtensionForTransactioType->setIntelliSellTransaction($transactionType);

        if($multiTickets){
            $multiTicket = new MultiTicket();
            $multiTicket->setDisplayPolicy('GOW2RT');
        }else{
            $multiTicket = new MultiTicket();
            $multiTicket->setDisplayPolicy('SOW');
        }


        $tpaExtensionForTransactioType->setMultiTicket($multiTicket);

        return $tpaExtensionForTransactioType;
    }


    /**
     *
     * Response
     *
     * @param OTA_AirLowFareSearchRS $result
     * */
    private function searchResponseResult(OTA_AirLowFareSearchRS $result,
                                          array $searchCriteria,
                                          array $excludeAirlinesCodes,
                                          FlightsPromotion $promotion = null,
                                          string $searchId,
                                          bool $isDomesticFlights,
                                          Collection $profitSettings)
    {
        $flightSearchResponse = new FlightSearchResponse($result->getPricedItinCount());
        $flightSearchResponse->setSearchId($searchId);

        if($result->getErrors() != null){
            $flightSearchResponse->setErrorMessage($this->errors($result->getErrors()->getError()));
        }elseif($result->getPricedItinCount() == 0){
            $flightSearchResponse->setErrorMessage('No Flights Found For locations and Dates specified');
        }else{
            //Flights Loop
            foreach ($result->getPricedItineraries()->getPricedItinerary() as $itinerary){
                //Flight Segment Loop
                $flightSegments = $itinerary->getAirItinerary()->getOriginDestinationOptions()->getOriginDestinationOption();
                $filterBestPrice = $this->filterBestPrice($itinerary,$promotion,$isDomesticFlights,$profitSettings);
                $breakDowns = $filterBestPrice['breakDowns'];
                $pricingInfo = $filterBestPrice['pricingInfo'];

                $totalDuration = 0;
                foreach ($flightSegments as $flightSegment){
                    $segments = $flightSegment->getFlightSegment();
                    //Segments loop
                    foreach ($segments as $key => $segment) {
                        $resultSegment = new Segment();
                        $resultSegment->setOriginLocationAndOriginCode($segment->getDepartureAirport()->getLocationCode());
                        $resultSegment->setDestinationLocationAndCode($segment->getArrivalAirport()->getLocationCode());
                        $resultSegment->setFlightNumber($segment->getFlightNumber());
                        $resultSegment->setBookingClass($segment->getResBookDesigCode());
                        $resultSegment->setDuration($segment->getElapsedTime());
                        $resultSegment->setMarketingAirlineCodeAndNameAndLogo($segment->getMarketingAirline()->getCode());
                        $resultSegment->setOperatingAirlineCodeAndName($segment->getOperatingAirline()->getCode());
                        $resultSegment->setAircraft($segment->getEquipment()[0]->getAirEquipType());

                        $departureDateTime = Carbon::parse($segment->getDepartureDateTime());
                        $resultSegment->setDepartureDate($departureDateTime->format('Y-m-d'));
                        $resultSegment->setDepartureTime($departureDateTime->format('H:i'));
                        if(isset($arrivalDateTime)){
                            $resultSegment->setStopDuration(gmdate('H:i',$departureDateTime->diffInSeconds($arrivalDateTime)));
                        }
                        $arrivalDateTime = Carbon::parse($segment->getArrivalDateTime());
                        $resultSegment->setArrivalDate($arrivalDateTime->format('Y-m-d'));
                        $resultSegment->setArrivalTime($arrivalDateTime->format('H:i'));
                        $resultSegment->setRemainingSeats($itinerary
                            ->getAirItineraryPricingInfo()[0]->getFareInfos()->getFareInfo()[$key]->getTPA_Extensions()->getSeatsRemaining()->getNumber());

                        $marketingAirlinesCodes[] = $segment->getMarketingAirline()->getCode();

                        $resultSegments[] = $resultSegment;
                    }

                    $totalDuration += $flightSegment->getElapsedTime();
                    $flightSegmentResult = new FlightSegment([],$flightSegment->getElapsedTime(),$resultSegments);
                    $flightSegmentResult->setStopsDuration($resultSegments);
                    $flightSegmentResult->setStops($resultSegments);
                    $flightSegmentResult->setBaggageRules($marketingAirlinesCodes);
                    $flightSegmentResults[] = $flightSegmentResult;

                    $resultSegments = [];
                }

                $flight = new \App\Services\Flights\SearchResponse\Flight($itinerary->getAirItinerary()->getDirectionInd(),$pricingInfo);
                $flight->setFlightSegments($flightSegmentResults);
                $flight->setRemainingSeats($this->remainingSeats($itinerary->getAirItineraryPricingInfo()[0]->getFareInfos()->getFareInfo()));
                $flight->setTotalDuration($totalDuration);
                $flight->setPassengerQuantity($this->passengerQuantity($breakDowns));
                $flight->setMailOnlyFare($marketingAirlinesCodes,$excludeAirlinesCodes);
                $flight->setWithAlternateDate($searchId);
                $flight->setIsDomesticFlight($isDomesticFlights);
                $flights[] = $flight;

                $marketingAirlinesCodes = [];
                $flightSegmentResults = [];
            }

            $flightSearchResponse->setSearchCriteria($searchCriteria);
            $flightSearchResponse->setFlights($flights);
            $flightSearchResponse->setAlternateDates($searchId);
            $flightSearchResponse->setFilterMatrix($flights);
            $flightSearchResponse->setMaxPrice($flights);
            $flightSearchResponse->setMinPrice($flights);
            $flightSearchResponse->setAirlines($flights);
            $flightSearchResponse->setGoingTimes($flights);
            $flightSearchResponse->setReturningTimes($flights);
        }

        $flightSearchResponse->cacheFlightsResult($searchId,$flightSearchResponse->flights);

        return $flightSearchResponse;
    }


    private function filterBestPrice(PricedItineraryType $itinerary,FlightsPromotion $promotion = null,
                                     bool $isDomesticFlight,Collection $profitSettings)
    {
        $additionalFares = $itinerary->getTPA_Extensions()->getAdditionalFares();

        if(is_array($additionalFares)){
            $additionalFares = $additionalFares[0];
        }

        if(is_array($itinerary->getAirItineraryPricingInfo())){
            $airItineraryPricingInfo = $itinerary->getAirItineraryPricingInfo()[0];
        }else{
            $airItineraryPricingInfo = $itinerary->getAirItineraryPricingInfo();
        }

        if(is_null($additionalFares)){
            $breakDowns = $airItineraryPricingInfo->getPTC_FareBreakdowns()->getPTC_FareBreakdown();
            $pricingInfo =  $this->pricingInfo($breakDowns[0],'Publish',$isDomesticFlight,$profitSettings,$promotion);
        }else{
            if(is_array($additionalFares->getAirItineraryPricingInfo())){
                $airItineraryPricingInfoForBulk = $additionalFares->getAirItineraryPricingInfo()[0];
            }else{
                $airItineraryPricingInfoForBulk = $additionalFares->getAirItineraryPricingInfo();
            }
            $totalFareForBulk = $airItineraryPricingInfoForBulk->getItinTotalFare()->getTotalFare()->getAmount();
            $totalFareForPublish = $airItineraryPricingInfo->getItinTotalFare()->getTotalFare()->getAmount();

            if($totalFareForBulk < $totalFareForPublish){
                $breakDowns = $airItineraryPricingInfoForBulk->getPTC_FareBreakdowns()->getPTC_FareBreakdown();
                $pricingInfo = $this->pricingInfo($breakDowns[0],'Net',$isDomesticFlight,$profitSettings,$promotion);
            }else{
                $breakDowns = $airItineraryPricingInfo->getPTC_FareBreakdowns()->getPTC_FareBreakdown();
                $pricingInfo =  $this->pricingInfo($breakDowns[0],'Publish',$isDomesticFlight,$profitSettings,$promotion);
            }
        }

        return ['breakDowns' => $breakDowns, 'pricingInfo' => $pricingInfo];
    }

    private function remainingSeats(array $fareInfos)
    {
        foreach ($fareInfos as $fareInfo) {
            if ($fareInfo->getTPA_Extensions()->getSeatsRemaining()->getNumber() < 9) {
                $seatsRemaining = $fareInfo->getTPA_Extensions()->getSeatsRemaining()->getNumber();
            }
        }
        return $seatsRemaining ?? 9;
    }

    private function passengerQuantity(array $breakDowns)
    {
        foreach ($breakDowns as $breakDown){
            $code = $breakDown->getPassengerTypeQuantity()->getCode();
            $quantity = $breakDown->getPassengerTypeQuantity()->getQuantity();

            $passengerQuantity[] = new PassengerQuantity($code,$quantity);
        }

        return $passengerQuantity;
    }


    private function pricingInfo(PTCFareBreakdownType $adultBreakDown,
                                 string $fareType,
                                 bool $isDomesticFlight = false,
                                 Collection $profitSettings = null,
                                 FlightsPromotion $promotion = null)
    {
        $pricingInfo = new PricingInfo();
        $pricingInfo->setFareType($fareType);
        $pricingInfo->setBaseFare($adultBreakDown->getPassengerFare()->getEquivFare()->getAmount(),$isDomesticFlight,$profitSettings);
        $pricingInfo->setOriginalFare($adultBreakDown->getPassengerFare()->getTotalFare()->getAmount());
        $pricingInfo->setTaxes($adultBreakDown->getPassengerFare()->getTaxes()->getTotalTax()->getAmount());
        $pricingInfo->setTotalFare();
        $pricingInfo->setDiscountAmount($promotion);
        $pricingInfo->setNewFare($promotion);
        $pricingInfo->setTotalFareCurrency($adultBreakDown->getPassengerFare()->getTotalFare()->getCurrencyCode());
        $pricingInfo->setTotalFareNote();

        return $pricingInfo;
    }


    private function errors(array $errors)
    {
        if($errors[0]->getShortText() == 'No complete journey can be built in IF2/ADVJR1.'){
            return 'No Flights Found For locations specified';
        }elseif (str_contains($errors[0]->getShortText(),'DSF server returned an error: unknown BRD')){
            $this->setAirportUnavailability($errors[0]->getShortText());
            return 'Unknown Departure airport';
        }elseif (str_contains($errors[0]->getShortText(),'DSF server returned an error: unknown OFF')){
            $this->setAirportUnavailability($errors[0]->getShortText());
            return 'Unknown Arrival airport';
        }elseif ($errors[0]->getShortText() == 'NO SCHEDULE'){
         return 'No Flights Found';
        }else{
            return 'SomeThing went wrong';
        }
    }

    private function setAirportUnavailability(string $shortText)
    {
        $airportCode = explode('=',$shortText)[1];
        $airport = Airport::where('code',$airportCode)->first();
        is_null($airport)? '' : $airport->update(['availability' => 0]);
    }


}
