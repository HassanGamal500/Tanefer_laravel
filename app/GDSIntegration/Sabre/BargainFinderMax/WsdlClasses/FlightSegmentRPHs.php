<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FlightSegmentRPHs
{

    /**
     * @var RPH_Type $FlightSegmentRPH
     */
    protected $FlightSegmentRPH = null;

    /**
     * @param RPH_Type $FlightSegmentRPH
     */
    public function __construct($FlightSegmentRPH = null)
    {
      $this->FlightSegmentRPH = $FlightSegmentRPH;
    }

    /**
     * @return RPH_Type
     */
    public function getFlightSegmentRPH()
    {
      return $this->FlightSegmentRPH;
    }

    /**
     * @param RPH_Type $FlightSegmentRPH
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FlightSegmentRPHs
     */
    public function setFlightSegmentRPH($FlightSegmentRPH)
    {
      $this->FlightSegmentRPH = $FlightSegmentRPH;
      return $this;
    }

}
