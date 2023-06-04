<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ArrivalDates
{

    /**
     * @var Day $Day
     */
    protected $Day = null;

    /**
     * @var DaysRange $DaysRange
     */
    protected $DaysRange = null;

    /**
     * @param Day $Day
     * @param DaysRange $DaysRange
     */
    public function __construct($Day = null, $DaysRange = null)
    {
      $this->Day = $Day;
      $this->DaysRange = $DaysRange;
    }

    /**
     * @return Day
     */
    public function getDay()
    {
      return $this->Day;
    }

    /**
     * @param Day $Day
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ArrivalDates
     */
    public function setDay($Day)
    {
      $this->Day = $Day;
      return $this;
    }

    /**
     * @return DaysRange
     */
    public function getDaysRange()
    {
      return $this->DaysRange;
    }

    /**
     * @param DaysRange $DaysRange
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ArrivalDates
     */
    public function setDaysRange($DaysRange)
    {
      $this->DaysRange = $DaysRange;
      return $this;
    }

}
