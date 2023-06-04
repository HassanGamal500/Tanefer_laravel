<?php


namespace App\Services\Flights\SearchResponse\TimesFilters;


use Carbon\Carbon;

class DepartureTime
{
    /**
     * @var string $min
     * */
    public $min;

    /**
     * @var string $max
     * */
    public $max;

    public function __construct($max = '',$min = '')
    {
        $this->max = $max;
        $this->min = $min;
    }

    public function setMin($flights)
    {
        $departTime = Carbon::parse($flights[0]->flightSegments[0]->Segments[0]->DepartureTime);
        foreach ($flights as $flight){
            $departureTime = Carbon::parse($flight->flightSegments[0]->Segments[0]->DepartureTime);
            if($departTime->gt($departureTime)){
                $departTime = Carbon::parse($flight->flightSegments[0]->Segments[0]->DepartureTime);
            }
        }

        $this->min = $departTime->format('H:i');
        return $this;
    }

    public function setMax($flights)
    {
        $departTime = Carbon::parse($flights[0]->flightSegments[0]->Segments[0]->DepartureTime);
        foreach ($flights as $flight){
            $departureTime = Carbon::parse($flight->flightSegments[0]->Segments[0]->DepartureTime);
            if($departTime->lt($departureTime)){
                $departTime = Carbon::parse($flight->flightSegments[0]->Segments[0]->DepartureTime);
            }
        }
        $this->max = $departTime->format('H:i');
        return $this;
    }
}
