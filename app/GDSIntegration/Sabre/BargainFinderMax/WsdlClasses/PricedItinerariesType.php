<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PricedItinerariesType
{

    /**
     * @var PricedItineraryType[] $PricedItinerary
     */
    protected $PricedItinerary = null;

    /**
     * @param PricedItineraryType[] $PricedItinerary
     */
    public function __construct(array $PricedItinerary = null)
    {
      $this->PricedItinerary = $PricedItinerary;
    }

    /**
     * @return PricedItineraryType[]
     */
    public function getPricedItinerary()
    {
      return $this->PricedItinerary;
    }

    /**
     * @param PricedItineraryType[] $PricedItinerary
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PricedItinerariesType
     */
    public function setPricedItinerary(array $PricedItinerary)
    {
      $this->PricedItinerary = $PricedItinerary;
      return $this;
    }

}
