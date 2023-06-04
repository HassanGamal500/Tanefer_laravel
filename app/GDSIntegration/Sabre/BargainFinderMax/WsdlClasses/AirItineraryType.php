<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AirItineraryType
{

    /**
     * @var OriginDestinationOptions $OriginDestinationOptions
     */
    protected $OriginDestinationOptions = null;

    /**
     * @var AirTripType $DirectionInd
     */
    protected $DirectionInd = null;

    /**
     * @var date $DepartureDate
     */
    protected $DepartureDate = null;

    /**
     * @param AirTripType $DirectionInd
     * @param date $DepartureDate
     */
    public function __construct($DirectionInd = null, $DepartureDate = null)
    {
      $this->DirectionInd = $DirectionInd;
      $this->DepartureDate = $DepartureDate;
    }

    /**
     * @return OriginDestinationOptions
     */
    public function getOriginDestinationOptions()
    {
      return $this->OriginDestinationOptions;
    }

    /**
     * @param OriginDestinationOptions $OriginDestinationOptions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryType
     */
    public function setOriginDestinationOptions($OriginDestinationOptions)
    {
      $this->OriginDestinationOptions = $OriginDestinationOptions;
      return $this;
    }

    /**
     * @return AirTripType
     */
    public function getDirectionInd()
    {
      return $this->DirectionInd;
    }

    /**
     * @param AirTripType $DirectionInd
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryType
     */
    public function setDirectionInd($DirectionInd)
    {
      $this->DirectionInd = $DirectionInd;
      return $this;
    }

    /**
     * @return date
     */
    public function getDepartureDate()
    {
      return $this->DepartureDate;
    }

    /**
     * @param date $DepartureDate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryType
     */
    public function setDepartureDate($DepartureDate)
    {
      $this->DepartureDate = $DepartureDate;
      return $this;
    }

}
