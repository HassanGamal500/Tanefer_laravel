<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TripType
{

    /**
     * @var AirTripType $Value
     */
    protected $Value = null;

    /**
     * @param AirTripType $Value
     */
    public function __construct($Value = null)
    {
      $this->Value = $Value;
    }

    /**
     * @return AirTripType
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param AirTripType $Value
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TripType
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
