<?php


namespace App\Services\Flights\SearchResponse;


use App\Models\Airline;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class FlightSegment
{
    /**
     * @var int $stops
     *
     * @access public
     * */
    public $stops;

    /**
     * @var BaggageRule[] $baggage_rules
     *
     * @access public
     * */
    public $baggage_rules;

    /**
     * @var string $totalDuration
     *
     * @access public
     * */
    public $TotalDuration;

    /**
     * @var Segment[] $segments
     *
     * @access public
     * */
    public $Segments;

    /**
     * @var array $stopsDuration
     *
     * @access public
     * */
    public $stopsDuration;


    public function __construct($baggage_rules = [], $totalDuration = '', $segments = [], $stopsDuration = [], $stops = 0)
    {
        $this->stops = $stops;
        $this->baggage_rules = $baggage_rules;
        $this->TotalDuration = convertToHoursMins($totalDuration);
        $this->Segments = $segments;
        $this->stopsDuration = $stopsDuration;
    }

    public function setStops($segments)
    {
        $this->stops = count($segments) - 1;

        return $this;
    }

    public function setStopsDuration($segments)
    {
        $stopsDuration = [];

        for ($i = 0; $i < count($segments); $i++){
            if($i == 0){continue;}

            $arrivalDateTime = Carbon::parse($segments[$i-1]->ArrivalDate.' '.$segments[$i-1]->ArrivalTime);
            $departureDateTime = Carbon::parse($segments[$i]->DepartureDate.' '.$segments[$i]->DepartureTime);

            $stopsDuration[] = gmdate('H:i',$departureDateTime->diffInSeconds($arrivalDateTime));
        }

        $this->stopsDuration = $stopsDuration;

        return $this;
    }

    public function setBaggageRules($airlinesCode)
    {
        $airlineCodes = array_unique($airlinesCode);
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
                $baggage_url = '';
                $airline_name = '';
            }

            $baggageRule[] = new BaggageRule($airline_name,$baggage_url);
        }

        $this->baggage_rules = $baggageRule;

        return $this;
    }
}
