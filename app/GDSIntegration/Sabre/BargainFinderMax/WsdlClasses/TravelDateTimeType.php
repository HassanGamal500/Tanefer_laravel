<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TravelDateTimeType
{

    /**
     * @var IntDateTime $DepartureDateTime
     */
    protected $DepartureDateTime = null;

    /**
     * @var IntDateTime $ArrivalDateTime
     */
    protected $ArrivalDateTime = null;

    /**
     * @var DepartureDates $DepartureDates
     */
    protected $DepartureDates = null;

    /**
     * @var ArrivalDates $ArrivalDates
     */
    protected $ArrivalDates = null;

    /**
     * @var TimeWindowType $DepartureWindow
     */
    protected $DepartureWindow = null;

    /**
     * @var TimeWindowType $ArrivalWindow
     */
    protected $ArrivalWindow = null;

    /**
     * @param IntDateTime $DepartureDateTime
     * @param IntDateTime $ArrivalDateTime
     * @param DepartureDates $DepartureDates
     * @param ArrivalDates $ArrivalDates
     */
    public function __construct($DepartureDateTime = null, $ArrivalDateTime = null, $DepartureDates = null, $ArrivalDates = null)
    {
      $this->DepartureDateTime = $DepartureDateTime;
      $this->ArrivalDateTime = $ArrivalDateTime;
      $this->DepartureDates = $DepartureDates;
      $this->ArrivalDates = $ArrivalDates;
    }

    /**
     * @return IntDateTime
     */
    public function getDepartureDateTime()
    {
      return $this->DepartureDateTime;
    }

    /**
     * @param string $DepartureDateTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelDateTimeType
     */
    public function setDepartureDateTime($DepartureDateTime)
    {
      $this->DepartureDateTime = $DepartureDateTime;
      return $this;
    }

    /**
     * @return IntDateTime
     */
    public function getArrivalDateTime()
    {
      return $this->ArrivalDateTime;
    }

    /**
     * @param IntDateTime $ArrivalDateTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelDateTimeType
     */
    public function setArrivalDateTime($ArrivalDateTime)
    {
      $this->ArrivalDateTime = $ArrivalDateTime;
      return $this;
    }

    /**
     * @return DepartureDates
     */
    public function getDepartureDates()
    {
      return $this->DepartureDates;
    }

    /**
     * @param DepartureDates $DepartureDates
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelDateTimeType
     */
    public function setDepartureDates($DepartureDates)
    {
      $this->DepartureDates = $DepartureDates;
      return $this;
    }

    /**
     * @return ArrivalDates
     */
    public function getArrivalDates()
    {
      return $this->ArrivalDates;
    }

    /**
     * @param ArrivalDates $ArrivalDates
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelDateTimeType
     */
    public function setArrivalDates($ArrivalDates)
    {
      $this->ArrivalDates = $ArrivalDates;
      return $this;
    }

    /**
     * @return TimeWindowType
     */
    public function getDepartureWindow()
    {
      return $this->DepartureWindow;
    }

    /**
     * @param TimeWindowType $DepartureWindow
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelDateTimeType
     */
    public function setDepartureWindow($DepartureWindow)
    {
      $this->DepartureWindow = $DepartureWindow;
      return $this;
    }

    /**
     * @return TimeWindowType
     */
    public function getArrivalWindow()
    {
      return $this->ArrivalWindow;
    }

    /**
     * @param TimeWindowType $ArrivalWindow
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelDateTimeType
     */
    public function setArrivalWindow($ArrivalWindow)
    {
      $this->ArrivalWindow = $ArrivalWindow;
      return $this;
    }

}
