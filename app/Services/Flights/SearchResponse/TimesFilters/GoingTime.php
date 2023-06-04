<?php


namespace App\Services\Flights\SearchResponse\TimesFilters;


class GoingTime
{
    /**
     * @var DepartureTime $departureTimes
     * */
    public $departureTimes;

    /**
     * @var ArrivalTime $arrivalTimes
     * */
    public $arrivalTimes;

    public function __construct($departureTimes,$arrivalTimes)
    {
        $this->departureTimes = $departureTimes;
        $this->arrivalTimes = $arrivalTimes;
    }
}
