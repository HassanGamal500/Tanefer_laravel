<?php


namespace App\GDSIntegration\Amadeus;


use Amadeus\Client\RequestOptions\Fare\MPDate;
use Amadeus\Client\RequestOptions\Fare\MPItinerary;
use Amadeus\Client\RequestOptions\Fare\MPLocation;
use Amadeus\Client\RequestOptions\Fare\MPPassenger;
use Amadeus\Client\RequestOptions\FareMasterPricerTbSearch;
use Amadeus\Client\Result;
use App\GDSIntegration\Amadeus\Enum\ReferenceQualifier;
use App\Services\Flights\SearchResponse\Flight;
use App\Services\Flights\SearchResponse\FlightSearchResponse;
use App\Services\Flights\SearchResponse\FlightSegment;
use App\Services\Flights\SearchResponse\PassengerQuantity;
use App\Services\Flights\SearchResponse\PricingInfo;
use App\Services\Flights\SearchResponse\Segment;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class FareMasterPricerTravelBoardSearch extends Amadeus
{
    const ZEROTIME  = 'T00:00:00+0000';

    public function search(array $searchData,string $currencyCode,
            $searchId,$excludeAirlines,$promotion,$isDomesticFlights,$profitSettings)
    {
        if(array_key_exists('search_id',$searchData) && $searchData['search_id'] != ''){
            return new FlightSearchResponse();
        }

        $originDestinationInformation = $this->originDestinationInformation($searchData);
        $numberOfPassengers = $this->numberOfPassengers($searchData);

        $fareMasterPricerTBSearchArray = $this->fareMasterPricerTBSearchArray($numberOfPassengers,$originDestinationInformation,
        $currencyCode,$searchData);

        $fareMasterPricerTBSearch = new FareMasterPricerTbSearch($fareMasterPricerTBSearchArray);

        $client = $this->statelessClient();

        $response = $client->fareMasterPricerTravelBoardSearch($fareMasterPricerTBSearch);


        Storage::put('/amadeusRequests/'.$this->nowDate.'/search/'.$this->nowTime.'searchRQ.xml',
            $client->getLastRequest());
        Storage::put('/amadeusRequests/'.$this->nowDate.'/search/'.$this->nowTime.'searchRS.xml',
            $client->getLastResponse());
        Storage::put('/amadeusRequests/'.$this->nowDate.'/search/'.$this->nowTime.'searchAmadeusResultRS.json',
            json_encode($response));


        if($response->status == Result::STATUS_OK){
            $result = $this->searchResponseResult($response->response,$searchData,$excludeAirlines,$promotion,
            $searchId,$isDomesticFlights,$profitSettings);
            Storage::put('/amadeusRequests/'.$this->nowDate.'/search/'.$this->nowTime.'searchRS.json',
                json_encode($result));
        }elseif ($response->status == Result::STATUS_ERROR){
            $errorMessages = $this->errorMessages($response);
            $result = $errorMessages;
        }

        return $result;

    }

    protected function fareMasterPricerTBSearchArray($numberOfPassengers,$originDestinationInformation,$currencyCode,$searchData)
    {
        $fareMasterPricerTBSearchArray = [
            'nrOfRequestedResults' => 75,
            'nrOfRequestedPassengers' => $numberOfPassengers['adults'] + $numberOfPassengers['children'],
            'passengers' => $this->passengerTypeQuantity($numberOfPassengers['adults'],$numberOfPassengers['children'],$numberOfPassengers['infants']),
            'itinerary' => $originDestinationInformation,
            'currencyOverride' => $currencyCode,
            'flightOptions' => [
                FareMasterPricerTbSearch::FLIGHTOPT_PUBLISHED,
                FareMasterPricerTbSearch::FLIGHTOPT_UNIFARES
            ],
            'cabinClass' => $searchData['classType'],
            'cabinOption' => FareMasterPricerTbSearch::CABINOPT_MANDATORY,
        ];

        if(array_key_exists('preferredAirline',$searchData)){
            $airlinePreferred = [
                'airlineOptions' => [
                    FareMasterPricerTbSearch::AIRLINEOPT_PREFERRED => [$searchData['preferredAirline']]
                ]
            ];
            $fareMasterPricerTBSearchArray =  array_merge($airlinePreferred,$fareMasterPricerTBSearchArray);
        }

        return $fareMasterPricerTBSearchArray;
    }

    /**
     * Set Origin Destination Search Criteria
     *
     * @param $searchData
     *
     * @return MPItinerary[]
     * */
    protected function originDestinationInformation(array $searchData)
    {
        $alternateDateRange = [
            'rangeMode' => MPDate::RANGEMODE_MINUS_PLUS,
            'range' => 1
        ];
        $typeType = $searchData['tripType'];
        if($typeType == 'one'){
            $originDestinationInformation = $this->oneWayFlight(strtoupper($searchData['origin']),
                $searchData['originType'],$searchData['destinationType'],strtoupper($searchData['destination']),$searchData['departureDate'],$alternateDateRange);
        }
        elseif ($typeType == 'round') {
            $originDestinationInformation = $this->roundWayFlight(strtoupper($searchData['origin']),
                $searchData['originType'],$searchData['destinationType'],strtoupper($searchData['destination']), $searchData['departureDate'],
                $searchData['arrivalDate'],$alternateDateRange);
        }
        elseif ($typeType == 'multi') {
            $originDestinationInformation = $this->multiWayFlight($searchData['origin'],$searchData['originType'],$searchData['destinationType'],
                $searchData['destination'], $searchData['departureDate'],$alternateDateRange);
        }else{
            $originDestinationInformation = [];
        }

        return $originDestinationInformation;
    }

     /**
      * Create MPItinerary array for one way flight
      * @param string $origin
      * @param string $originType
      * @param string $destination
      * @param string $destinationType
      * @param string $departureDate
      *
      * @return MPItinerary[]
      */
    private function oneWayFlight(string $origin,string $originType,string $destinationType,string $destination,string $departureDate,$alternateDateRang)
    {
        $departureDate = new \DateTime($departureDate.self::ZEROTIME);

        $itinerary[] = new MPItinerary([
            'departureLocation' => $this->setItineraryLocation($origin,$originType),
            'arrivalLocation' => $this->setItineraryLocation($destination,$destinationType),
            'date' => new MPDate(array_merge($alternateDateRang,[
                'dateTime' => $departureDate
            ]))
        ]);

        return $itinerary;
    }

    /**
     * Create MPItinerary array of Objects for round way flight
     *
     * @param string $origin
     * @param string $originType
     * @param string $destination
     * @param string $destinationType
     * @param string $departureDate
     * @param string $arrivalDate
     *
     * @return MPItinerary[]
     * */
    private function roundWayFlight(string $origin,string $originType,string $destinationType,string $destination,
                                    string $departureDate,string $arrivalDate,$alternateDateRange)
    {
        $departureDate = new \DateTime($departureDate.self::ZEROTIME);
        $arrivalDate = new \DateTime($arrivalDate.self::ZEROTIME);

        $itinerary[] = new MPItinerary([
            'departureLocation' => $this->setItineraryLocation($origin,$originType),
            'arrivalLocation' => $this->setItineraryLocation($destination,$destinationType),
            'date' => new MPDate(array_merge($alternateDateRange,[
                'dateTime' => $departureDate
            ]))
        ]);

        $itinerary[] = new MPItinerary([
            'departureLocation' => $this->setItineraryLocation($destination,$destinationType),
            'arrivalLocation' => $this->setItineraryLocation($origin,$destinationType),
            'date' => new MPDate([
                'dateTime' => $arrivalDate
            ])
        ]);

        return $itinerary;
    }

    /**
     * Create MPItinerary array of Objects for multi city flight
     *
     * @param array $origin
     * @param array $originType
     * @param array $destination
     * @param array $destinationType
     * @param array $departureDate
     *
     * @return MPItinerary[]
     * */
    private function multiWayFlight(array $origin,array $originType,array $destinationType,array $destination,array $departureDate,$alternateDateRange)
    {
        $itinerary = [];

        for ($i=0; $i < count($origin); $i++){
            $departureDateObject = new \DateTime($departureDate[$i].self::ZEROTIME);
            $itinerary[] = new MPItinerary([
                'departureLocation' => $this->setItineraryLocation($origin[$i],$originType[$i]),
                'arrivalLocation' => $this->setItineraryLocation($destination[$i],$destinationType[$i]),
                'date' => new MPDate(array_merge($alternateDateRange,[
                    'dateTime' => $departureDateObject
                ]))
            ]);
        }

        return $itinerary;
    }



    private function setItineraryLocation($code,$type)
    {
        if($type == 'C'){
            $location = new MPLocation(['city' => $code]);
        }else{
            $location = new MPLocation(['airport' => $code]);
        }

        return $location;
    }

    protected function passengerTypeQuantity($adults,$children,$infants)
    {
        $passengers[] = new MPPassenger([
            'type' => MPPassenger::TYPE_ADULT,
            'count' => $adults
        ]);
        if($children){
            $passengers[] = new MPPassenger([
                'type' => MPPassenger::TYPE_CHILD,
                'count' => $children
            ]);
        }
        if ($infants){
            $passengers[] = new MPPassenger([
                'type' => MPPassenger::TYPE_INFANT,
                'count' => $infants
            ]);
        }

        return $passengers;
    }

    protected function numberOfPassengers(array $searchCriteria)
    {
        $children = array_key_exists('children',$searchCriteria) ? (int)$searchCriteria['children'] : 0;
        $infants = array_key_exists('infants',$searchCriteria) ? (int)$searchCriteria['infants'] : 0;

        return [
            'adults' => (int)$searchCriteria['adults'],
            'children'  => $children,
            'infants' => $infants
        ];
    }



    /****************************** Response Functions **********************************/

    public function searchResponseResult($response,$searchData,$excludeAirlines,$promotion,$searchId,$isDomesticFlights,$profitSettings)
    {
        $recommendations = convertObjectToArray($response->recommendation);

        foreach ($recommendations as $recommendation){
            //TODO if segmentFlightRef is array add the rest segments on alternate segment object inside flightSegments
            $segmentFlightRefArray = convertObjectToArray($recommendation->segmentFlightRef);
            $referencingDetailArray = convertObjectToArray($segmentFlightRefArray[0]->referencingDetail);

            $direction = $this->direction($searchData['tripType']);

            $pricingInfo = $this->pricingInfo($recommendation->paxFareProduct,
                $response->conversionRate->conversionRateDetail->currency,$promotion,$isDomesticFlights,$profitSettings);

            $flight = new Flight($direction,$pricingInfo);

            $paxFareProduct = is_array($recommendation->paxFareProduct) ? $recommendation->paxFareProduct[0] : $recommendation->paxFareProduct;

            $refNumbers = Arr::where($referencingDetailArray,function ($value){
                return $value->refQualifier == ReferenceQualifier::SEGMENT_OR_SERVICE;
            });
            $i = 0;
            foreach ($refNumbers as $refNumber){
                $fareDetails = is_array($paxFareProduct->fareDetails) ? $paxFareProduct->fareDetails[$i] : $paxFareProduct->fareDetails;

                $flightIndex = is_array($response->flightIndex) ? $response->flightIndex[$i] : $response->flightIndex;

                $flightSegmentDetails = array_values(Arr::where($flightIndex->groupOfFlights,function ($value) use ($refNumber){
                    return $value->propFlightGrDetail->flightProposal[0]->ref == $refNumber->refNumber;
                }));
                $s = 0;
                foreach ($flightSegmentDetails[0]->flightDetails as $flightDetail){
                    $flightDetails = $flightDetail->flightInformation ?? $flightDetail;
                    if(! isset($flightDetails->flightOrtrainNumber)){
                        continue;
                    }
                    $groupOfFares = is_array($fareDetails->groupOfFares) ? $fareDetails->groupOfFares[$s] : $fareDetails->groupOfFares;
                    //TODO Check What is bookingModifier for array

                    $cabinProduct = convertObjectToArray($groupOfFares->productInformation->cabinProduct);
                    $segment = new Segment();
                    $segment->setAircraft($flightDetails->productDetail->equipmentType,'amadeus');
                    $segment->setOriginLocationAndOriginCode($flightDetails->location[0]->locationId);
                    $segment->setDestinationLocationAndCode($flightDetails->location[1]->locationId);
                    $segment->setFlightNumber($flightDetails->flightOrtrainNumber);
                    $segment->setBookingClass($cabinProduct[0]->rbd);
                    $segment->setClassCabin($this->cabinClass($cabinProduct[0]->cabin));

                    $departureDate = $this->formatDate($flightDetails->productDateTime->dateOfDeparture);
                    $departureTime = $this->formatTime($flightDetails->productDateTime->timeOfDeparture);

                    $departureDateTime = Carbon::parse($departureDate.' '.$departureTime);

                    $segment->setDepartureDate($departureDate);
                    $segment->setDepartureTime($departureTime);

                    if (isset($arrivalDateTime)) {
                        $segment->setStopDuration(gmdate('H:i', $departureDateTime->diffInSeconds($arrivalDateTime)));
                    }

                    $operatingCarrier = $flightDetails->companyId->operatingCarrier ?? '';

                    $arrivalDate = $this->formatDate($flightDetails->productDateTime->dateOfArrival);
                    $arrivalTime = $this->formatTime($flightDetails->productDateTime->timeOfArrival);
                    $arrivalDateTime = Carbon::parse($arrivalDate.' '.$arrivalTime);
                    $segment->setArrivalDate($arrivalDate);
                    $segment->setArrivalTime($arrivalTime);
                    $segment->setMarketingAirlineCodeAndNameAndLogo($flightDetails->companyId->marketingCarrier,'amadeus');
                    $segment->setOperatingAirlineCodeAndName($operatingCarrier,'amadeus');
                    $segment->setDuration();
                    $departureTerminal = $flightDetails->location[0]->terminal ?? null;
                    $arrivalTerminal = $flightDetails->location[1]->terminal ?? null;
                    $segment->setDepartureTerminal($departureTerminal);
                    $segment->setArrivalTerminal($arrivalTerminal);
                    $segment->setRemainingSeats($cabinProduct[0]->avlStatus);

                    $marketingAirlinesCodes[] = $flightDetails->companyId->marketingCarrier;
                    $segments[] = $segment;
                    $s++;
                }

                $totalDuration = array_values(Arr::where($flightSegmentDetails[0]->propFlightGrDetail->flightProposal,function ($value){
                    return isset($value->unitQualifier) && $value->unitQualifier == 'EFT';
                }));

                $flightSegment = new FlightSegment([],$this->formatTime($totalDuration[0]->ref),$segments);
                $flightSegment->setLeg($segments);
                $flightSegment->setStops($segments);
                $flightSegment->setStopsDuration($segments);
                $flightSegments[] = $flightSegment;

                $segments = [];
                $i++;
            }


            $flight->setFlightSegments($flightSegments);
            $flight->setRemainingSeats($this->remainingSeats($recommendation));
            $flight->setPassengerQuantity($this->passengerQuantity($recommendation->paxFareProduct));

            $flights[] = $flight;

            $marketingAirlinesCodes = [];
            $flightSegments = [];
        }
        $flightSearchResponse = new FlightSearchResponse();
        $flightSearchResponse->setSearchId($searchId);
        $flightSearchResponse->setNumberOfFlights(count($flights));
        $flightSearchResponse->setFlights($flights);
        $flightSearchResponse->setSearchCriteria($searchData);
        $flightSearchResponse->cacheFlightsResult($searchId, $flightSearchResponse->flights);
        $flightSearchResponse->setFilters($flights);

        return $flightSearchResponse;
    }

    private function remainingSeats($recommendation)
    {
        $paxFareProduct = convertObjectToArray($recommendation->paxFareProduct);
        $fareDetails = convertObjectToArray($paxFareProduct[0]->fareDetails);

        foreach ($fareDetails as $fareDetail){
            $groupOfFares = convertObjectToArray($fareDetail->groupOfFares);
            foreach ($groupOfFares as $groupOfFare){
                $productInformation = $groupOfFare->productInformation ?? $groupOfFare;
                $cabinProduct = convertObjectToArray($productInformation->cabinProduct);
                if($cabinProduct[0]->avlStatus < 9){
                    $seatsRemaining = $cabinProduct[0]->avlStatus;
                }
            }
        }

        return $seatsRemaining ?? 9;
    }

    private function passengerQuantity($paxFareProduct)
    {
        $paxFares = convertObjectToArray($paxFareProduct);
        foreach ($paxFares as $paxFare){
            $code = $paxFare->paxReference->ptc;
            $travellers = convertObjectToArray($paxFare->paxReference->traveller);
            $quantity = count($travellers);

            $passengerQuantity[] = new PassengerQuantity($code,$quantity);
        }

        return $passengerQuantity;
    }

    private function direction($tripType)
    {
        switch ($tripType){
            case 'one':
                $direction = 'OneWay';
                break;
            case 'round':
                $direction = 'Return';
                break;
            case 'multi':
                $direction = 'Multi City';
                break;
            default:
                $direction = 'Return';
        }
        return $direction;
    }

    private function pricingInfo($paxFares,$currency,$promotion,$isDomesticFlights,$profitSettings)
    {
        $paxFares = convertObjectToArray($paxFares);
        $adultFare = $paxFares[0];
        $baseFare = $adultFare->paxFareDetail->totalFareAmount - $adultFare->paxFareDetail->totalTaxAmount;
        $fareDetails = convertObjectToArray($adultFare->fareDetails);
        $groupOfFares = convertObjectToArray($fareDetails[0]->groupOfFares);
        $fareType = $this->fareType($groupOfFares[0]->productInformation->fareProductDetail->fareType);
        $pricingInfo = new PricingInfo();
        $pricingInfo->setFareType($fareType);
        $pricingInfo->setBaseFare($baseFare,$isDomesticFlights,$profitSettings);
        $pricingInfo->setOriginalBaseFare(round($baseFare,2));
        $pricingInfo->setTaxes($adultFare->paxFareDetail->totalTaxAmount);
        $pricingInfo->setOriginalFare($adultFare->paxFareDetail->totalFareAmount);
        $pricingInfo->setTotalFare();
        $pricingInfo->setTotalFareCurrency($currency);
        $pricingInfo->setTotalFareNote();
        return $pricingInfo;
    }

    private function fareType($amadeusFareType)
    {
        switch ($amadeusFareType){
            case 'RP':
                $fareType = 'Publish';
                break;
            case 'RA':
                $fareType = 'Net';
                break;
                default;
                $fareType = 'Publish';
        }
        return $fareType;
    }

    private function errorMessages($response)
    {
        if(isset($response->response->errorMessage)){
            return 'No Flights Found';
        }else{
            return 'SomeThing went wrong, please try again';
        }
    }
}
