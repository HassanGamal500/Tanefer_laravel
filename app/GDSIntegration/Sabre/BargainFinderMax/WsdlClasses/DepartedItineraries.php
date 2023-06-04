<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class DepartedItineraries
{

    /**
     * @var PricedItineraries $PricedItineraries
     */
    protected $PricedItineraries = null;

    /**
     * @var OneWayItineraries $OneWayItineraries
     */
    protected $OneWayItineraries = null;

    /**
     * @param PricedItineraries $PricedItineraries
     * @param OneWayItineraries $OneWayItineraries
     */
    public function __construct($PricedItineraries = null, $OneWayItineraries = null)
    {
      $this->PricedItineraries = $PricedItineraries;
      $this->OneWayItineraries = $OneWayItineraries;
    }

    /**
     * @return PricedItineraries
     */
    public function getPricedItineraries()
    {
      return $this->PricedItineraries;
    }

    /**
     * @param PricedItineraries $PricedItineraries
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DepartedItineraries
     */
    public function setPricedItineraries($PricedItineraries)
    {
      $this->PricedItineraries = $PricedItineraries;
      return $this;
    }

    /**
     * @return OneWayItineraries
     */
    public function getOneWayItineraries()
    {
      return $this->OneWayItineraries;
    }

    /**
     * @param OneWayItineraries $OneWayItineraries
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DepartedItineraries
     */
    public function setOneWayItineraries($OneWayItineraries)
    {
      $this->OneWayItineraries = $OneWayItineraries;
      return $this;
    }

}
