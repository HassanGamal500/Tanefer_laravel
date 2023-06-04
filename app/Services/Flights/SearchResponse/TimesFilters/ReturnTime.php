<?php


namespace App\Services\Flights\SearchResponse\TimesFilters;


use Carbon\Carbon;

class ReturnTime
{
    /**
     * @var string $min
     * */
    public $min;

    /**
     * @var string $max
     * */
    public $max;

    public function setMin($flights)
    {
        $returnTime = Carbon::parse($flights[0]->flightSegments[1]->Segments[0]->DepartureTime);

        foreach ($flights as $flight){
            $departureTime = Carbon::parse($flight->flightSegments[1]->Segments[0]->DepartureTime);
            if($returnTime->gt($departureTime)){
                $returnTime = Carbon::parse($flight->flightSegments[1]->Segments[0]->DepartureTime);
            }
        }
        $this->min = $returnTime->format('H:i');

        return $this;
    }

    public function setMax($flights)
    {
        $returnTime = Carbon::parse($flights[0]->flightSegments[1]->Segments[0]->DepartureTime);

        foreach ($flights as $flight){
            $departureTime = Carbon::parse($flight->flightSegments[1]->Segments[0]->DepartureTime);
            if($returnTime->lt($departureTime)){
                $returnTime = Carbon::parse($flight->flightSegments[1]->Segments[0]->DepartureTime);
            }
        }

        $this->max = $returnTime->format('H:i');
        return $this;
    }
}
