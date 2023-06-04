<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class OriginDestinationInformationType extends TravelDateTimeType
{

    /**
     * @var OriginLocation $OriginLocation
     */
    protected $OriginLocation = null;

    /**
     * @var DestinationLocation $DestinationLocation
     */
    protected $DestinationLocation = null;

    /**
     * @var ConnectionType $ConnectionLocations
     */
    protected $ConnectionLocations = null;

    /**
     * @param IntDateTime $DepartureDateTime
     * @param IntDateTime $ArrivalDateTime
     * @param DepartureDates $DepartureDates
     * @param ArrivalDates $ArrivalDates
     * @param OriginLocation $OriginLocation
     * @param DestinationLocation $DestinationLocation
     */
    public function __construct($DepartureDateTime = null, $ArrivalDateTime = null, $DepartureDates = null, $ArrivalDates = null, $OriginLocation = null, $DestinationLocation = null)
    {
      parent::__construct($DepartureDateTime, $ArrivalDateTime, $DepartureDates, $ArrivalDates);
      $this->OriginLocation = $OriginLocation;
      $this->DestinationLocation = $DestinationLocation;
    }

    /**
     * @return OriginLocation
     */
    public function getOriginLocation()
    {
      return $this->OriginLocation;
    }

    /**
     * @param OriginLocation $OriginLocation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationInformationType
     */
    public function setOriginLocation($OriginLocation)
    {
      $this->OriginLocation = $OriginLocation;
      return $this;
    }

    /**
     * @return DestinationLocation
     */
    public function getDestinationLocation()
    {
      return $this->DestinationLocation;
    }

    /**
     * @param DestinationLocation $DestinationLocation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationInformationType
     */
    public function setDestinationLocation($DestinationLocation)
    {
      $this->DestinationLocation = $DestinationLocation;
      return $this;
    }

    /**
     * @return ConnectionType
     */
    public function getConnectionLocations()
    {
      return $this->ConnectionLocations;
    }

    /**
     * @param ConnectionType $ConnectionLocations
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationInformationType
     */
    public function setConnectionLocations($ConnectionLocations)
    {
      $this->ConnectionLocations = $ConnectionLocations;
      return $this;
    }

}
