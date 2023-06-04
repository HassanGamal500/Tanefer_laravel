<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FlexibleFaresType
{

    /**
     * @var FareParameters[] $FareParameters
     */
    protected $FareParameters = null;

    /**
     * @param FareParameters[] $FareParameters
     */
    public function __construct(array $FareParameters = null)
    {
      $this->FareParameters = $FareParameters;
    }

    /**
     * @return FareParameters[]
     */
    public function getFareParameters()
    {
      return $this->FareParameters;
    }

    /**
     * @param FareParameters[] $FareParameters
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FlexibleFaresType
     */
    public function setFareParameters(array $FareParameters)
    {
      $this->FareParameters = $FareParameters;
      return $this;
    }

}
