<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PreferredCarrier
{

    /**
     * @var CarrierCode $Code
     */
    protected $Code = null;

    /**
     * @param CarrierCode $Code
     */
    public function __construct($Code = null)
    {
      $this->Code = $Code;
    }

    /**
     * @return CarrierCode
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param CarrierCode $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PreferredCarrier
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

}
