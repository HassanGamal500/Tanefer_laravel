<?php


namespace App\Services\Flights\SearchResponse;


use App\Services\Flights\SearchResponse\TimesFilters\ArrivalTime;
use App\Services\Flights\SearchResponse\TimesFilters\ArrivalTimeForReturn;
use App\Services\Flights\SearchResponse\TimesFilters\DepartureTime;
use App\Services\Flights\SearchResponse\TimesFilters\GoingTime;
use App\Services\Flights\SearchResponse\TimesFilters\ReturningTime;
use App\Services\Flights\SearchResponse\TimesFilters\ReturnTime;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class FlightSearchResponse
{
    /**
     * @var string $search_id
     *
     * @access public
     * */
    public $search_id = '';

   /**
    * @var array $searchCriteria
    *
    * @access public
    * */
    public $searchCriteria = null;

    /**
     * @var int $numberOfFlights
     *
     * @access public
     * */
    public $numberOfFlights = 0;

    /**
     * @var Flight[] $flights
     *
     * @access public
     * */
    public $flights = [];

    /**
     * @var array $FilterMatrix
     *
     * @access public
     * */
    public $FilterMatrix = [];

    /**
     * @var float $maxPrice
     *
     * @access public
     * */
    public $maxPrice = 0;

    /**
     * @var float $minPrice
     *
     * @access public
     * */
    public $minPrice = 0;

    /**
     * @var array $airlines
     *
     * @access public
     * */
    public $airlines = [];

    /**
     * @var GoingTime $goingTimes
     *
     * @access public
     * */
    public $goingTimes = null;

    /**
     * @var ReturningTime $returningTimes
     *
     * @access public
     * */
    public $returningTimes = null;

    /**
     * @var boolean $alternateDates;
     *
     * @access public
     * */
    public $alternateDates = false;

    /**
     * @var string $errorMessage
     * */
    public $errorMessage = null;



    /**
     * @param int $numberOfFlights
     * @param Flight[] $flights
     * */
    public function __construct($numberOfFlights,$flights = [])
    {
        $this->search_id = Str::uuid()->toString();
        $this->numberOfFlights = $numberOfFlights;
        $this->flights = $flights;
    }

    public function setSearchId($searchId)
    {
        $this->search_id = $searchId;
        return $this;
    }

    public function setSearchCriteria(array $searchCriteria)
    {
        $this->searchCriteria = $searchCriteria;
        return $this;
    }

    public function setFlights($flights)
    {
        $this->flights = $flights;
        return $this;
    }

    public function setAlternateDates($searchId)
    {
        if(Cache::has($searchId)){
            $this->alternateDates = true;
        }else{
            $this->alternateDates = false;
        }
    }

    public function setFilterMatrix($flights)
    {
        $i = 0;
        $airlines_code_and_price_array = [];

        $alt_matrix = [];
        $matrix = [];
        foreach ($flights as $flight){
            if($flight->mailOnlyFare){
                continue;
            }
            $price =  ($flight->pricingInfo->newFare == 0) ? $flight->pricingInfo->TotalFare : $flight->pricingInfo->newFare;
            $matrix[$i]['AirlineName'] = $flight->flightSegments[0]->Segments[0]->MarketingAirlineName;
            $matrix[$i]['AirlineCode'] = $flight->flightSegments[0]->Segments[0]->MarketingAirlineCode;
            $matrix[$i]['AirlineLogo'] = airline_logo_small_url($flight->flightSegments[0]->Segments[0]->MarketingAirlineCode);
            $matrix[$i]['flightPrice'] = $price;
            $matrix[$i]['numberOfStops'] = max(array_column($flight->flightSegments,'stops'));

            $currentAirlineCodeAndPrice = $flight->flightSegments[0]->Segments[0]->MarketingAirlineCode.','.$price;

            if(! in_array($currentAirlineCodeAndPrice,$airlines_code_and_price_array)){
                $airlines_code_and_price_array[$i] = $currentAirlineCodeAndPrice;
                $alt_matrix[] = $matrix[$i];
            }
            $i++;
        }
        $this->FilterMatrix = $alt_matrix;
        return $this;
    }

    public function setMaxPrice($flights)
    {
        $price  = ($flights[0]->pricingInfo->newFare == 0)?$flights[0]->pricingInfo->TotalFare:$flights[0]->pricingInfo->newFare;
        foreach ($flights as $flight){
            if($flight->pricingInfo->newFare == 0){
                if($price < $flight->pricingInfo->TotalFare) {
                    $price = $flight->pricingInfo->TotalFare;
                }
            }else{
                if($price < $flight->pricingInfo->newFare) {
                    $price = $flight->pricingInfo->newFare;
                }
            }
        }

        $this->maxPrice = $price;
        return $this;
    }

    public function setMinPrice($flights)
    {
        $price  = ($flights[0]->pricingInfo->newFare == 0)?$flights[0]->pricingInfo->TotalFare:$flights[0]->pricingInfo->newFare;
        foreach ($flights as $flight){
            if($flight->pricingInfo->newFare == 0){
                if($price > $flight->pricingInfo->TotalFare){
                    $price = $flight->pricingInfo->TotalFare;
                }
            }else{
                if($price > $flight->pricingInfo->newFare){
                    $price = $flight->pricingInfo->newFare;
                }
            }
        }

        $this->minPrice = $price;
        return $this;
    }

    public function setAirlines($flights)
    {
        $airlines_codes_array = [];
        $alt_airlines = [];
        for($i=0; $i < count($flights); $i++){
            if($flights[$i]->mailOnlyFare){
                continue;
            }
            $price =  ($flights[$i]->pricingInfo->newFare == 0)?$flights[$i]->pricingInfo->TotalFare:$flights[$i]->pricingInfo->newFare;
            $airlines[$i]['airlineCode'] = $flights[$i]->flightSegments[0]->Segments[0]->MarketingAirlineCode;
            $airlines[$i]['airlineName'] = $flights[$i]->flightSegments[0]->Segments[0]->MarketingAirlineName;
            $airlines[$i]['price']       = $price;
            $airlinesCodes[]  = $flights[$i]->flightSegments[0]->Segments[0]->MarketingAirlineCode;
            $currentAirlineCode = $flights[$i]->flightSegments[0]->Segments[0]->MarketingAirlineCode;

            if(!in_array($currentAirlineCode,$airlines_codes_array)){
                $airlines_codes_array[$i] = $currentAirlineCode;
                $alt_airlines[] = $airlines[$i];
            }
        }
        $this->airlines = $alt_airlines;
        return $this;
    }

    public function setGoingTimes($flights)
    {
        $departureTime = new DepartureTime();
        $departureTime->setMax($flights);
        $departureTime->setMin($flights);

        $arrivalTime = new ArrivalTime();
        $arrivalTime->setMin($flights);
        $arrivalTime->setMax($flights);

        $this->goingTimes = new GoingTime($departureTime,$arrivalTime);
        return $this;
    }

    public function setReturningTimes($flights)
    {
        if(count($flights[0]->flightSegments) == 1){
            $this->returningTimes =  new \stdClass();
        }else{
            $returnTime = new ReturnTime();
            $returnTime->setMax($flights);
            $returnTime->setMin($flights);

            $arrivalTimeForReturn = new ArrivalTimeForReturn();
            $arrivalTimeForReturn->setMin($flights);
            $arrivalTimeForReturn->setMax($flights);

            $this->returningTimes = new ReturningTime($returnTime,$arrivalTimeForReturn);
        }

        return $this;
    }

    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }

    public function cacheFlightsResult($searchId,$flights)
    {
        if(Cache::has($searchId)){
            $oldFlights = Cache::get($searchId);
            $checkFlights = Arr::where($oldFlights,function ($value,$key){
                return $value->withAlternateDate == true;
            });
            if(count($checkFlights) == 0){
                $allFlights = array_merge($oldFlights,$flights);
                Cache::put($searchId,$allFlights,1200);
            }
        }else{
            Cache::put($searchId,$flights,1200);
        }
    }
}
