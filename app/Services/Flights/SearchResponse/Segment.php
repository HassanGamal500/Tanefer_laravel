<?php


namespace App\Services\Flights\SearchResponse;


use App\GDSIntegration\Sabre\AircraftEquipmentLookup;
use App\GDSIntegration\Sabre\AirlineLookUp;
use App\GDSIntegration\Sabre\GeoAutoComplete;
use App\Models\Aircraft;
use App\Models\Airline;
use App\Models\Airport;
use Illuminate\Support\Facades\Cache;

class Segment
{
    /**
     * @var string $OriginLocation
     *
     * @access public
     * */
    public $OriginLocation;

    /**
     * @var string $DestinationLocation
     *
     * @access public
     * */
    public $DestinationLocation;

    /**
     * @var string $OriginLocationCode
     *
     * @access public
     * */
    public $OriginLocationCode;

    /**
     * @var string $DestinationLocationCode
     *
     * @access public
     * */
    public $DestinationLocationCode;

    /**
     * @var string $FlightNumber
     *
     * @access public
     * */
    public $FlightNumber;

    /**
     * @var string $BookingClass
     *
     * @access public
     * */
    public $BookingClass;

    /**
     * @var string $Duration
     *
     * @access public
     * */
    public $Duration;

    /**
     * @var string $MarketingAirlineCode
     *
     * @access public
     * */
    public $MarketingAirlineCode;

    /**
     * @var string $MarketingAirlineLogo
     *
     * @access public
     * */
    public $MarketingAirlineLogo;

    /**
     * @var string $MarketingAirlineLogoSM
     *
     * @access public
     * */
    public $MarketingAirlineLogoSM;

    /**
     * @var string $MarketingAirlineName
     *
     * @access public
     * */
    public $MarketingAirlineName;

    /**
     * @var string $OperatingAirlineCode
     *
     * @access public
     * */
    public $OperatingAirlineCode;

    /**
     * @var string $OperatingAirlineName
     *
     * @access public
     * */
    public $OperatingAirlineName;

    /**
     * @var string $aircraft
     *
     * @access public
     * */
    public $aircraft;

    /**
     * @var string $DepartureDate
     *
     * @access public
     * */
    public $DepartureDate;

    /**
     * @var string $DepartureTime
     *
     * @access public
     * */
    public $DepartureTime;

    /**
     * @var string $ArrivalDate
     *
     * @access public
     * */
    public $ArrivalDate;

    /**
     * @var string $ArrivalTime
     *
     * @access public
     * */
    public $ArrivalTime;


    /**
     * @var string $stopDuration
     *
     * @access public
     * */
    public $stopDuration;

    public $remainingSeats;


    public function __construct($OriginLocation = '',$DestinationLocation = '',$OriginLocationCode = '',
                                $DestinationLocationCode = '',$FlightNumber = '',$BookingClass = '',$Duration = '',
                                $MarketingAirlineCode = '',$MarketingAirlineLogo = '',$MarketingAirlineLogoSM = '',
                                $MarketingAirlineName = '',$OperatingAirlineCode = '',$OperatingAirlineName = '',
                                $aircraft = '',$DepartureDate = '',$DepartureTime  = '',$ArrivalDate = '',$ArrivalTime = '',$stopDuration = '')
    {
        $this->OriginLocation = $OriginLocation;
        $this->OriginLocationCode = $OriginLocationCode;
        $this->DestinationLocationCode = $DestinationLocationCode;
        $this->DestinationLocation = $DestinationLocation;
        $this->FlightNumber  = $FlightNumber;
        $this->BookingClass = $BookingClass;
        $this->MarketingAirlineCode = $MarketingAirlineCode;
        $this->MarketingAirlineLogo = $MarketingAirlineLogo;
        $this->MarketingAirlineLogoSM = $MarketingAirlineLogoSM;
        $this->MarketingAirlineName = $MarketingAirlineName;
        $this->OperatingAirlineCode = $OperatingAirlineCode;
        $this->OperatingAirlineName = $OperatingAirlineName;
        $this->aircraft = $aircraft;
        $this->DepartureDate = $DepartureDate;
        $this->DepartureTime = $DepartureTime;
        $this->ArrivalDate = $ArrivalDate;
        $this->ArrivalTime = $ArrivalTime;
        $this->Duration = $Duration;
        $this->stopDuration = $stopDuration;
        $this->remainingSeats = 0;
    }

    public function setOriginLocationAndOriginCode($originCode)
    {
        $this->OriginLocation = $this->getAirportDetails($originCode);
        $this->OriginLocationCode = $originCode;
        return $this;
    }

    public function setDestinationLocationAndCode($destinationCode)
    {
        $this->DestinationLocation = $this->getAirportDetails($destinationCode);
        $this->DestinationLocationCode = $destinationCode;

        return $this;
    }

    public function setFlightNumber($flightNumber)
    {
        $this->FlightNumber = $flightNumber;
        return $this;
    }

    public function setBookingClass($bookingClass)
    {
        $this->BookingClass = $bookingClass;
        return $this;
    }

    public function setMarketingAirlineCodeAndNameAndLogo($marketingAirlineCode)
    {
        $this->MarketingAirlineName = $this->getAirlineDetails($marketingAirlineCode);
        $this->MarketingAirlineCode = $marketingAirlineCode;
        $this->MarketingAirlineLogoSM = airline_logo_small_url($marketingAirlineCode);
        $this->MarketingAirlineLogo = config('sabre.airline_logo_url').$marketingAirlineCode.'.png';

        return $this;
    }

    public function setOperatingAirlineCodeAndName($operatingAirlineCode)
    {
        $this->OperatingAirlineName = $this->getAirlineDetails($operatingAirlineCode);
        $this->OperatingAirlineCode = $operatingAirlineCode;

        return $this;
    }

    public function setAircraft($aircraftCode)
    {
        if(Cache::has($aircraftCode)){
            $aircraft = Cache::get($aircraftCode);
        }else{
            $aircraft = Aircraft::where('code',$aircraftCode)->first();
            Cache::forever($aircraftCode,$aircraft);
        }

        if(is_null($aircraft)){
            $aircraftAPI = new AircraftEquipmentLookup();
            $aircraftAPI->getResponse($aircraftCode);
        }
        try {
            $aircraft_name = $aircraft->name.','.$aircraft->code;
        }catch (\Exception $exception){
            $aircraft_name = '';
        }

        $this->aircraft = $aircraft_name;

        return $this;
    }

    public function setDepartureDate($departureDate)
    {
        $this->DepartureDate = $departureDate;
        return $this;
    }

    public function setDepartureTime($departureTime)
    {
        $this->DepartureTime = $departureTime;
        return $this;
    }

    public function setArrivalDate($arrivalDate)
    {
        $this->ArrivalDate = $arrivalDate;
        return $this;
    }

    public function setArrivalTime($arrivalTime)
    {
        $this->ArrivalTime = $arrivalTime;
        return $this;
    }

    public function setDuration($segmentDuration)
    {
        $this->Duration = convertToHoursMins($segmentDuration);

        return $this;
    }

    public function setStopDuration($stopDuration)
    {
        $this->stopDuration = $stopDuration;

        return $this;
    }

    public function setRemainingSeats($seats)
    {
        $this->remainingSeats = $seats;
        return $this;
    }




    /**
     * Get Airline Name from Its IATA Code
     *
     * @param string $airlineCode
     * @param string $attempt
     *
     * @return string
     * */
    protected function getAirlineDetails($airlineCode, $attempt = 0)
    {
        if(Cache::has($airlineCode)){
            $airline = Cache::get($airlineCode);
        }else{
            $airline = Airline::where('airline_code',$airlineCode)->first();
            Cache::forever($airlineCode,$airline);
        }
        if(is_null($airline)){
            $airlineAPI = new AirlineLookUp();
            $airlineAPI->getResponse($airlineCode);
            if($attempt <= 1){
                return $this->getAirlineDetails($airlineCode,$attempt + 1);
            }else{
                $airline_name = '';
            }
        }else{
            $airline_name = $airline->airline_name;
        }

        return $airline_name;
    }
    /**
     * Get Airport Details Like Name and city and country from its IATA Code
     *
     * @param string $airportIataCode
     * @param int $attempt
     *
     * @return string
     * */
    protected function getAirportDetails($airportIataCode, $attempt = 0)
    {
        if(Cache::has($airportIataCode)){
            $airport = Cache::get($airportIataCode);
        }else{
            $airport = Airport::where('code',$airportIataCode)->first();
            Cache::forever($airportIataCode,$airport);
        }

        if(is_null($airport) || $airport == null){
            $airportAPI = new GeoAutoComplete();
            $airportAPI->getResponse($airportIataCode);
            if($attempt <= 1){
                return $this->getAirportDetails($airportIataCode, $attempt + 1);
            }
        }else{
            $airport_name = $airport->name.','.$airport->city.','.$airport->countryName.','.$airport->country;
        }

        return $airport_name;
    }
}
