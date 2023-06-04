<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ExchangeOriginDestinationInformationType extends OriginDestinationInformationType
{

    /**
     * @var ExchangeOriginDestinationFlightType[] $Flight
     */
    protected $Flight = null;

    /**
     * @var DateFlexibility $DateFlexibility
     */
    protected $DateFlexibility = null;

    /**
     * @var RequestSpecifiedLocationType $SisterDestinationLocation
     */
    protected $SisterDestinationLocation = null;

    /**
     * @var SisterDestinationMileage $SisterDestinationMileage
     */
    protected $SisterDestinationMileage = null;

    /**
     * @var RequestSpecifiedLocationType $SisterOriginLocation
     */
    protected $SisterOriginLocation = null;

    /**
     * @var SisterOriginMileage $SisterOriginMileage
     */
    protected $SisterOriginMileage = null;

    /**
     * @var SegmentType $SegmentType
     */
    protected $SegmentType = null;

    /**
     * @var AlternateTime $AlternateTime
     */
    protected $AlternateTime = null;

    /**
     * @var MaxOneWayOptions $MaxOneWayOptions
     */
    protected $MaxOneWayOptions = null;

    /**
     * @var NumOneWayOptions $NumOneWayOptions
     */
    protected $NumOneWayOptions = null;

    /**
     * @var CabinPrefType $CabinPref
     */
    protected $CabinPref = null;

    /**
     * @var ConnectionTime $ConnectionTime
     */
    protected $ConnectionTime = null;

    /**
     * @var TotalTravelTime $TotalTravelTime
     */
    protected $TotalTravelTime = null;

    /**
     * @param IntDateTime $DepartureDateTime
     * @param IntDateTime $ArrivalDateTime
     * @param DepartureDates $DepartureDates
     * @param ArrivalDates $ArrivalDates
     * @param OriginLocation $OriginLocation
     * @param DestinationLocation $DestinationLocation
     * @param ExchangeOriginDestinationFlightType[] $Flight
     * @param DateFlexibility $DateFlexibility
     * @param RequestSpecifiedLocationType $SisterDestinationLocation
     * @param SisterDestinationMileage $SisterDestinationMileage
     * @param RequestSpecifiedLocationType $SisterOriginLocation
     * @param SisterOriginMileage $SisterOriginMileage
     * @param SegmentType $SegmentType
     * @param AlternateTime $AlternateTime
     * @param MaxOneWayOptions $MaxOneWayOptions
     * @param NumOneWayOptions $NumOneWayOptions
     * @param CabinPrefType $CabinPref
     * @param ConnectionTime $ConnectionTime
     * @param TotalTravelTime $TotalTravelTime
     */
    public function __construct($DepartureDateTime = null, $ArrivalDateTime = null, $DepartureDates = null, $ArrivalDates = null, $OriginLocation = null, $DestinationLocation = null, array $Flight = null, $DateFlexibility = null, $SisterDestinationLocation = null, $SisterDestinationMileage = null, $SisterOriginLocation = null, $SisterOriginMileage = null, $SegmentType = null, $AlternateTime = null, $MaxOneWayOptions = null, $NumOneWayOptions = null, $CabinPref = null, $ConnectionTime = null, $TotalTravelTime = null)
    {
      parent::__construct($DepartureDateTime, $ArrivalDateTime, $DepartureDates, $ArrivalDates, $OriginLocation, $DestinationLocation);
      $this->Flight = $Flight;
      $this->DateFlexibility = $DateFlexibility;
      $this->SisterDestinationLocation = $SisterDestinationLocation;
      $this->SisterDestinationMileage = $SisterDestinationMileage;
      $this->SisterOriginLocation = $SisterOriginLocation;
      $this->SisterOriginMileage = $SisterOriginMileage;
      $this->SegmentType = $SegmentType;
      $this->AlternateTime = $AlternateTime;
      $this->MaxOneWayOptions = $MaxOneWayOptions;
      $this->NumOneWayOptions = $NumOneWayOptions;
      $this->CabinPref = $CabinPref;
      $this->ConnectionTime = $ConnectionTime;
      $this->TotalTravelTime = $TotalTravelTime;
    }

    /**
     * @return ExchangeOriginDestinationFlightType[]
     */
    public function getFlight()
    {
      return $this->Flight;
    }

    /**
     * @param ExchangeOriginDestinationFlightType[] $Flight
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationInformationType
     */
    public function setFlight(array $Flight)
    {
      $this->Flight = $Flight;
      return $this;
    }

    /**
     * @return DateFlexibility
     */
    public function getDateFlexibility()
    {
      return $this->DateFlexibility;
    }

    /**
     * @param DateFlexibility $DateFlexibility
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationInformationType
     */
    public function setDateFlexibility($DateFlexibility)
    {
      $this->DateFlexibility = $DateFlexibility;
      return $this;
    }

    /**
     * @return RequestSpecifiedLocationType
     */
    public function getSisterDestinationLocation()
    {
      return $this->SisterDestinationLocation;
    }

    /**
     * @param RequestSpecifiedLocationType $SisterDestinationLocation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationInformationType
     */
    public function setSisterDestinationLocation($SisterDestinationLocation)
    {
      $this->SisterDestinationLocation = $SisterDestinationLocation;
      return $this;
    }

    /**
     * @return SisterDestinationMileage
     */
    public function getSisterDestinationMileage()
    {
      return $this->SisterDestinationMileage;
    }

    /**
     * @param SisterDestinationMileage $SisterDestinationMileage
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationInformationType
     */
    public function setSisterDestinationMileage($SisterDestinationMileage)
    {
      $this->SisterDestinationMileage = $SisterDestinationMileage;
      return $this;
    }

    /**
     * @return RequestSpecifiedLocationType
     */
    public function getSisterOriginLocation()
    {
      return $this->SisterOriginLocation;
    }

    /**
     * @param RequestSpecifiedLocationType $SisterOriginLocation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationInformationType
     */
    public function setSisterOriginLocation($SisterOriginLocation)
    {
      $this->SisterOriginLocation = $SisterOriginLocation;
      return $this;
    }

    /**
     * @return SisterOriginMileage
     */
    public function getSisterOriginMileage()
    {
      return $this->SisterOriginMileage;
    }

    /**
     * @param SisterOriginMileage $SisterOriginMileage
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationInformationType
     */
    public function setSisterOriginMileage($SisterOriginMileage)
    {
      $this->SisterOriginMileage = $SisterOriginMileage;
      return $this;
    }

    /**
     * @return SegmentType
     */
    public function getSegmentType()
    {
      return $this->SegmentType;
    }

    /**
     * @param SegmentType $SegmentType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationInformationType
     */
    public function setSegmentType($SegmentType)
    {
      $this->SegmentType = $SegmentType;
      return $this;
    }

    /**
     * @return AlternateTime
     */
    public function getAlternateTime()
    {
      return $this->AlternateTime;
    }

    /**
     * @param AlternateTime $AlternateTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationInformationType
     */
    public function setAlternateTime($AlternateTime)
    {
      $this->AlternateTime = $AlternateTime;
      return $this;
    }

    /**
     * @return MaxOneWayOptions
     */
    public function getMaxOneWayOptions()
    {
      return $this->MaxOneWayOptions;
    }

    /**
     * @param MaxOneWayOptions $MaxOneWayOptions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationInformationType
     */
    public function setMaxOneWayOptions($MaxOneWayOptions)
    {
      $this->MaxOneWayOptions = $MaxOneWayOptions;
      return $this;
    }

    /**
     * @return NumOneWayOptions
     */
    public function getNumOneWayOptions()
    {
      return $this->NumOneWayOptions;
    }

    /**
     * @param NumOneWayOptions $NumOneWayOptions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationInformationType
     */
    public function setNumOneWayOptions($NumOneWayOptions)
    {
      $this->NumOneWayOptions = $NumOneWayOptions;
      return $this;
    }

    /**
     * @return CabinPrefType
     */
    public function getCabinPref()
    {
      return $this->CabinPref;
    }

    /**
     * @param CabinPrefType $CabinPref
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationInformationType
     */
    public function setCabinPref($CabinPref)
    {
      $this->CabinPref = $CabinPref;
      return $this;
    }

    /**
     * @return ConnectionTime
     */
    public function getConnectionTime()
    {
      return $this->ConnectionTime;
    }

    /**
     * @param ConnectionTime $ConnectionTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationInformationType
     */
    public function setConnectionTime($ConnectionTime)
    {
      $this->ConnectionTime = $ConnectionTime;
      return $this;
    }

    /**
     * @return TotalTravelTime
     */
    public function getTotalTravelTime()
    {
      return $this->TotalTravelTime;
    }

    /**
     * @param TotalTravelTime $TotalTravelTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationInformationType
     */
    public function setTotalTravelTime($TotalTravelTime)
    {
      $this->TotalTravelTime = $TotalTravelTime;
      return $this;
    }

}
