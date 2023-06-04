<?php


namespace App\Services\Flights\SearchResponse\TimesFilters;


use Carbon\Carbon;

class ArrivalTimeForReturn
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
        $indexOfLastArrivalTime = count($flights[0]->flightSegments[1]->Segments) - 1;
        $arrivTime = Carbon::parse($flights[0]->flightSegments[1]->Segments[$indexOfLastArrivalTime]->ArrivalTime);

        foreach ($flights as $flight){
            $indexOfLastArrivalTime = count($flight->flightSegments[1]->Segments) - 1;
            $arrivalTime = Carbon::parse($flight->flightSegments[1]->Segments[$indexOfLastArrivalTime]->ArrivalTime);
            if($arrivTime->gt($arrivalTime)){
                $arrivTime = Carbon::parse($flight->flightSegments[1]->Segments[$indexOfLastArrivalTime]->ArrivalTime);
            }
        }

        $this->min = $arrivTime->format('H:i');

        return $this;
    }

    public function setMax($flights)
    {
        $indexOfLastArrivalTime = count($flights[0]->flightSegments[1]->Segments) - 1;
        $arrivTime = Carbon::parse($flights[0]->flightSegments[1]->Segments[$indexOfLastArrivalTime]->ArrivalTime);

        foreach ($flights as $flight){
            $indexOfLastArrivalTime = count($flight->flightSegments[1]->Segments) - 1;
            $arrivalTime = Carbon::parse($flight->flightSegments[1]->Segments[$indexOfLastArrivalTime]->ArrivalTime);
            if($arrivTime->lt($arrivalTime)){
                $arrivTime = Carbon::parse($flight->flightSegments[1]->Segments[$indexOfLastArrivalTime]->ArrivalTime);
            }
        }

        $this->max = $arrivTime->format('H:i');
        return $this;
    }
}
