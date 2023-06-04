<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FlightSegment
{

    /**
     * @var UNKNOWN $DepartureAirportCode
     */
    protected $DepartureAirportCode = null;

    /**
     * @var UNKNOWN $ArrivalAirportCode
     */
    protected $ArrivalAirportCode = null;

    /**
     * @param UNKNOWN $DepartureAirportCode
     * @param UNKNOWN $ArrivalAirportCode
     */
    public function __construct($DepartureAirportCode = null, $ArrivalAirportCode = null)
    {
      $this->DepartureAirportCode = $DepartureAirportCode;
      $this->ArrivalAirportCode = $ArrivalAirportCode;
    }

    /**
     * @return UNKNOWN
     */
    public function getDepartureAirportCode()
    {
      return $this->DepartureAirportCode;
    }

    /**
     * @param UNKNOWN $DepartureAirportCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FlightSegment
     */
    public function setDepartureAirportCode($DepartureAirportCode)
    {
      $this->DepartureAirportCode = $DepartureAirportCode;
      return $this;
    }

    /**
     * @return UNKNOWN
     */
    public function getArrivalAirportCode()
    {
      return $this->ArrivalAirportCode;
    }

    /**
     * @param UNKNOWN $ArrivalAirportCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FlightSegment
     */
    public function setArrivalAirportCode($ArrivalAirportCode)
    {
      $this->ArrivalAirportCode = $ArrivalAirportCode;
      return $this;
    }

}
