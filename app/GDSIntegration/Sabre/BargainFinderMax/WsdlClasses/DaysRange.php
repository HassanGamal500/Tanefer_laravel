<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class DaysRange
{

    /**
     * @var ISellDateType $FromDate
     */
    protected $FromDate = null;

    /**
     * @var ISellDateType $ToDate
     */
    protected $ToDate = null;

    /**
     * @var ISellWeekDaysType $WeekDays
     */
    protected $WeekDays = null;

    /**
     * @param ISellDateType $FromDate
     * @param ISellDateType $ToDate
     * @param ISellWeekDaysType $WeekDays
     */
    public function __construct($FromDate = null, $ToDate = null, $WeekDays = null)
    {
      $this->FromDate = $FromDate;
      $this->ToDate = $ToDate;
      $this->WeekDays = $WeekDays;
    }

    /**
     * @return ISellDateType
     */
    public function getFromDate()
    {
      return $this->FromDate;
    }

    /**
     * @param ISellDateType $FromDate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DaysRange
     */
    public function setFromDate($FromDate)
    {
      $this->FromDate = $FromDate;
      return $this;
    }

    /**
     * @return ISellDateType
     */
    public function getToDate()
    {
      return $this->ToDate;
    }

    /**
     * @param ISellDateType $ToDate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DaysRange
     */
    public function setToDate($ToDate)
    {
      $this->ToDate = $ToDate;
      return $this;
    }

    /**
     * @return ISellWeekDaysType
     */
    public function getWeekDays()
    {
      return $this->WeekDays;
    }

    /**
     * @param ISellWeekDaysType $WeekDays
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DaysRange
     */
    public function setWeekDays($WeekDays)
    {
      $this->WeekDays = $WeekDays;
      return $this;
    }

}
