<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareComponents
{

    /**
     * @var FareComponent $FareComponent
     */
    protected $FareComponent = null;

    /**
     * @param FareComponent $FareComponent
     */
    public function __construct($FareComponent = null)
    {
      $this->FareComponent = $FareComponent;
    }

    /**
     * @return FareComponent
     */
    public function getFareComponent()
    {
      return $this->FareComponent;
    }

    /**
     * @param FareComponent $FareComponent
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponents
     */
    public function setFareComponent($FareComponent)
    {
      $this->FareComponent = $FareComponent;
      return $this;
    }

}
