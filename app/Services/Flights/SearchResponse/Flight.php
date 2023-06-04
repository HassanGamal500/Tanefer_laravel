<?php


namespace App\Services\Flights\SearchResponse;


use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Flight
{
    /**
     * @var string $id
     *
     * @access public
     * */
    public $id = '';

    /**
     * @var string $direction
     *
     * @access public
     * */
    public $direction = '';

    /**
     * @var PricingInfo  $pricingInfo
     *
     * @access public
     * */
    public $pricingInfo = null;

    /**
     * @var PassengerQuantity $passengerQuantity
     *
     * @access public
     * */
    public $passengerQuantity = null;

    /**
     * @var int $remainingSeats
     *
     * @access public
     * */
    public $remainingSeats = 0;

    /**
     * @var string $totalDuration
     *
     * @access public
     * */
    public $totalDuration = '';

    /**
     * @var FlightSegment[] $flightSegments
     *
     * @access public
     * */
    public $flightSegments = [];

    /**
     * @var boolean $mailOnlyFare
     *
     * @access public
     * */
    public $mailOnlyFare = false;

    /**
     * @var boolean $withAlternateDate
     * */
    public $withAlternateDate = false;

    /**
     * @var boolean $isDomesticFlight
     * */
    public $isDomesticFlight = false;


    /**
     * @param string $direction
     * @param PricingInfo  $pricingInfo
     * @param PassengerQuantity $passengerQuantity
     * @param int $remainingSeats
     * @param string $totalDuration
     * @param FlightSegment[] $flightSegments
     * */
    public function __construct($direction = '',
                                $pricingInfo = null,
                                $passengerQuantity = [], $remainingSeats = 0, $totalDuration = '',$flightSegments = [])
    {
        $this->id = Str::uuid()->toString();
        $this->direction = $direction;
        $this->pricingInfo = $pricingInfo;
        $this->remainingSeats = $remainingSeats;
        $this->passengerQuantity = $passengerQuantity;
        $this->totalDuration = $totalDuration;
        $this->flightSegments = $flightSegments;
    }

    public function setFlightSegments($flightSegments)
    {
        $this->flightSegments = $flightSegments;
        return $this;
    }

    public function setRemainingSeats($seatsRemaining)
    {
        $this->remainingSeats = $seatsRemaining;
        return $this;
    }

    public function setTotalDuration($totalDuration)
    {
        $this->totalDuration = convertToHoursMins($totalDuration);
        return $this;
    }

    public function setPassengerQuantity($passengerQuantity)
    {
        $this->passengerQuantity = $passengerQuantity;
        return $this;
    }

    public function setMailOnlyFare(array $marketingAirlinesCodes,array $excludeAirlinesCodes)
    {
        $publicOffersAirlines = array_intersect(array_unique($marketingAirlinesCodes),array_unique($excludeAirlinesCodes));

        if(count($publicOffersAirlines) == 0){
            $this->mailOnlyFare = false;
        }else{
            $this->mailOnlyFare = true;
        }

        return $this;
    }

    public function setWithAlternateDate($searchId)
    {
        if(Cache::has($searchId)){
            $this->withAlternateDate = true;
        }else{
            $this->withAlternateDate = false;
        }
        return $this;
    }

    public function setIsDomesticFlight($isDomesticFlight)
    {
        $this->isDomesticFlight = $isDomesticFlight;
        return $this;
    }


}
