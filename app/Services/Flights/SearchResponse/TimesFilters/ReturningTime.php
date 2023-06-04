<?php


namespace App\Services\Flights\SearchResponse\TimesFilters;


class ReturningTime
{
    /**
     * @var ReturnTime $returnTimes
     * */
    public $returnTimes;

    /**
     * @var ArrivalTimeForReturn $arrivalTimes
     * */
    public $arrivalTimes;

    public function __construct($returnTimes = null, $arrivalTimes = null)
    {
        $this->returnTimes = $returnTimes;
        $this->arrivalTimes = $arrivalTimes;
    }
}
