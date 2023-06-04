<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class StopAirports
{

    /**
     * @var StopAirport $StopAirport
     */
    protected $StopAirport = null;

    /**
     * @param StopAirport $StopAirport
     */
    public function __construct($StopAirport = null)
    {
      $this->StopAirport = $StopAirport;
    }

    /**
     * @return StopAirport
     */
    public function getStopAirport()
    {
      return $this->StopAirport;
    }

    /**
     * @param StopAirport $StopAirport
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StopAirports
     */
    public function setStopAirport($StopAirport)
    {
      $this->StopAirport = $StopAirport;
      return $this;
    }

}
