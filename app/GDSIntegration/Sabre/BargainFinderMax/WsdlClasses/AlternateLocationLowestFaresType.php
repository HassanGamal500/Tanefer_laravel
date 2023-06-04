<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AlternateLocationLowestFaresType
{

    /**
     * @var ResponseLocationType $OriginLocation
     */
    protected $OriginLocation = null;

    /**
     * @var ResponseLocationType $DestinationLocation
     */
    protected $DestinationLocation = null;

    /**
     * @var CurrencyAmountType $LowestFare
     */
    protected $LowestFare = null;

    /**
     * @param ResponseLocationType $OriginLocation
     * @param ResponseLocationType $DestinationLocation
     * @param CurrencyAmountType $LowestFare
     */
    public function __construct($OriginLocation = null, $DestinationLocation = null, $LowestFare = null)
    {
      $this->OriginLocation = $OriginLocation;
      $this->DestinationLocation = $DestinationLocation;
      $this->LowestFare = $LowestFare;
    }

    /**
     * @return ResponseLocationType
     */
    public function getOriginLocation()
    {
      return $this->OriginLocation;
    }

    /**
     * @param ResponseLocationType $OriginLocation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AlternateLocationLowestFaresType
     */
    public function setOriginLocation($OriginLocation)
    {
      $this->OriginLocation = $OriginLocation;
      return $this;
    }

    /**
     * @return ResponseLocationType
     */
    public function getDestinationLocation()
    {
      return $this->DestinationLocation;
    }

    /**
     * @param ResponseLocationType $DestinationLocation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AlternateLocationLowestFaresType
     */
    public function setDestinationLocation($DestinationLocation)
    {
      $this->DestinationLocation = $DestinationLocation;
      return $this;
    }

    /**
     * @return CurrencyAmountType
     */
    public function getLowestFare()
    {
      return $this->LowestFare;
    }

    /**
     * @param CurrencyAmountType $LowestFare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AlternateLocationLowestFaresType
     */
    public function setLowestFare($LowestFare)
    {
      $this->LowestFare = $LowestFare;
      return $this;
    }

}
