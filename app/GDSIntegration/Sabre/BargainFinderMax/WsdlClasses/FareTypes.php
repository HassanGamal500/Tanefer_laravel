<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareTypes
{

    /**
     * @var FareType $FareType
     */
    protected $FareType = null;

    /**
     * @param FareType $FareType
     */
    public function __construct($FareType = null)
    {
      $this->FareType = $FareType;
    }

    /**
     * @return FareType
     */
    public function getFareType()
    {
      return $this->FareType;
    }

    /**
     * @param FareType $FareType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareTypes
     */
    public function setFareType($FareType)
    {
      $this->FareType = $FareType;
      return $this;
    }

}
