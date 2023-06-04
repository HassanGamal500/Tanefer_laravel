<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class SimpleOneWayItineraries
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
     * @var RPH_Type $RPH
     */
    protected $RPH = null;

    /**
     * @param TPA_Extensions $TPA_Extensions
     * @param PricedItineraryType $PricedItinerary
     * @param RPH_Type $RPH
     */
    public function __construct($TPA_Extensions = null, $PricedItinerary = null, $RPH = null)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      $this->PricedItinerary = $PricedItinerary;
      $this->RPH = $RPH;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SimpleOneWayItineraries
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SimpleOneWayItineraries
     */
    public function setPricedItinerary($PricedItinerary)
    {
      $this->PricedItinerary = $PricedItinerary;
      return $this;
    }

    /**
     * @return RPH_Type
     */
    public function getRPH()
    {
      return $this->RPH;
    }

    /**
     * @param RPH_Type $RPH
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SimpleOneWayItineraries
     */
    public function setRPH($RPH)
    {
      $this->RPH = $RPH;
      return $this;
    }

}
