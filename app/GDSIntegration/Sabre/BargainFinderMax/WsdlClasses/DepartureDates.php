<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class DepartureDates
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
     * @var LengthOfStay $LengthOfStay
     */
    protected $LengthOfStay = null;

    /**
     * @var LengthOfStayRange $LengthOfStayRange
     */
    protected $LengthOfStayRange = null;

    /**
     * @param Day $Day
     * @param DaysRange $DaysRange
     * @param LengthOfStay $LengthOfStay
     * @param LengthOfStayRange $LengthOfStayRange
     */
    public function __construct($Day = null, $DaysRange = null, $LengthOfStay = null, $LengthOfStayRange = null)
    {
      $this->Day = $Day;
      $this->DaysRange = $DaysRange;
      $this->LengthOfStay = $LengthOfStay;
      $this->LengthOfStayRange = $LengthOfStayRange;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DepartureDates
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DepartureDates
     */
    public function setDaysRange($DaysRange)
    {
      $this->DaysRange = $DaysRange;
      return $this;
    }

    /**
     * @return LengthOfStay
     */
    public function getLengthOfStay()
    {
      return $this->LengthOfStay;
    }

    /**
     * @param LengthOfStay $LengthOfStay
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DepartureDates
     */
    public function setLengthOfStay($LengthOfStay)
    {
      $this->LengthOfStay = $LengthOfStay;
      return $this;
    }

    /**
     * @return LengthOfStayRange
     */
    public function getLengthOfStayRange()
    {
      return $this->LengthOfStayRange;
    }

    /**
     * @param LengthOfStayRange $LengthOfStayRange
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DepartureDates
     */
    public function setLengthOfStayRange($LengthOfStayRange)
    {
      $this->LengthOfStayRange = $LengthOfStayRange;
      return $this;
    }

}
