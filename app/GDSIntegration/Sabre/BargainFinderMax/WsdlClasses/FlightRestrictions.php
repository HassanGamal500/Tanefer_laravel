<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FlightRestrictions
{

    /**
     * @var boolean $AvoidLastFlight
     */
    protected $AvoidLastFlight = null;

    /**
     * @param boolean $AvoidLastFlight
     */
    public function __construct($AvoidLastFlight = null)
    {
      $this->AvoidLastFlight = $AvoidLastFlight;
    }

    /**
     * @return boolean
     */
    public function getAvoidLastFlight()
    {
      return $this->AvoidLastFlight;
    }

    /**
     * @param boolean $AvoidLastFlight
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FlightRestrictions
     */
    public function setAvoidLastFlight($AvoidLastFlight)
    {
      $this->AvoidLastFlight = $AvoidLastFlight;
      return $this;
    }

}
