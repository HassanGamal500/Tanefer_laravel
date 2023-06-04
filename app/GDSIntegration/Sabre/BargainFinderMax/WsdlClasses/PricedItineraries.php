<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PricedItineraries
{

    /**
     * @var TPA_Extensions $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @var PricedItineraryType $PricedItinerary
     */
    protected $PricedItinerary = null;

    /**
     * @param TPA_Extensions $TPA_Extensions
     * @param PricedItineraryType $PricedItinerary
     */
    public function __construct($TPA_Extensions = null, $PricedItinerary = null)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      $this->PricedItinerary = $PricedItinerary;
    }

    /**
     * @return TPA_Extensions
     */
    public function getTPA_Extensions()
    {
      return $this->TPA_Extensions;
    }

    /**
     * @param TPA_Extensions $TPA_Extensions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PricedItineraries
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      return $this;
    }

    /**
     * @return PricedItineraryType
     */
    public function getPricedItinerary()
    {
      return $this->PricedItinerary;
    }

    /**
     * @param PricedItineraryType $PricedItinerary
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PricedItineraries
     */
    public function setPricedItinerary($PricedItinerary)
    {
      $this->PricedItinerary = $PricedItinerary;
      return $this;
    }

}
