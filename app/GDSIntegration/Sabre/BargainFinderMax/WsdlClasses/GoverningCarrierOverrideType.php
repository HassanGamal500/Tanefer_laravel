<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class GoverningCarrierOverrideType
{

    /**
     * @var CarrierCode $AirlineCode
     */
    protected $AirlineCode = null;

    /**
     * @param CarrierCode $AirlineCode
     */
    public function __construct($AirlineCode = null)
    {
      $this->AirlineCode = $AirlineCode;
    }

    /**
     * @return CarrierCode
     */
    public function getAirlineCode()
    {
      return $this->AirlineCode;
    }

    /**
     * @param CarrierCode $AirlineCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\GoverningCarrierOverrideType
     */
    public function setAirlineCode($AirlineCode)
    {
      $this->AirlineCode = $AirlineCode;
      return $this;
    }

}
