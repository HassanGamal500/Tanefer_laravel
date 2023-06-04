<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Weightings
{

    /**
     * @var Numeric0To10Type $PriceWeight
     */
    protected $PriceWeight = null;

    /**
     * @var Numeric0To10Type $TravelTimeWeight
     */
    protected $TravelTimeWeight = null;

    /**
     * @param Numeric0To10Type $PriceWeight
     * @param Numeric0To10Type $TravelTimeWeight
     */
    public function __construct($PriceWeight = null, $TravelTimeWeight = null)
    {
      $this->PriceWeight = $PriceWeight;
      $this->TravelTimeWeight = $TravelTimeWeight;
    }

    /**
     * @return Numeric0To10Type
     */
    public function getPriceWeight()
    {
      return $this->PriceWeight;
    }

    /**
     * @param Numeric0To10Type $PriceWeight
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Weightings
     */
    public function setPriceWeight($PriceWeight)
    {
      $this->PriceWeight = $PriceWeight;
      return $this;
    }

    /**
     * @return Numeric0To10Type
     */
    public function getTravelTimeWeight()
    {
      return $this->TravelTimeWeight;
    }

    /**
     * @param Numeric0To10Type $TravelTimeWeight
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Weightings
     */
    public function setTravelTimeWeight($TravelTimeWeight)
    {
      $this->TravelTimeWeight = $TravelTimeWeight;
      return $this;
    }

}
