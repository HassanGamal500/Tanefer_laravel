<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class OriginDestinationOption
{

    /**
     * @var FlightSegment $FlightSegment
     */
    protected $FlightSegment = null;

    /**
     * @param FlightSegment $FlightSegment
     */
    public function __construct($FlightSegment = null)
    {
      $this->FlightSegment = $FlightSegment;
    }

    /**
     * @return FlightSegment
     */
    public function getFlightSegment()
    {
      return $this->FlightSegment;
    }

    /**
     * @param FlightSegment $FlightSegment
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationOption
     */
    public function setFlightSegment($FlightSegment)
    {
      $this->FlightSegment = $FlightSegment;
      return $this;
    }

}
