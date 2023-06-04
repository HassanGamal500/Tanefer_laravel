<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class OriginDestinationFlightType
{

    /**
     * @var RequestLocationType $OriginLocation
     */
    protected $OriginLocation = null;

    /**
     * @var RequestLocationType $DestinationLocation
     */
    protected $DestinationLocation = null;

    /**
     * @var AirlineType $Airline
     */
    protected $Airline = null;

    /**
     * @var SideTripType $SideTrip
     */
    protected $SideTrip = null;

    /**
     * @var ReservationType $Reservation
     */
    protected $Reservation = null;

    /**
     * @var MileageDisplayType $MileageDisplay
     */
    protected $MileageDisplay = null;

    /**
     * @var ISellDateTimeType $BookingDateTime
     */
    protected $BookingDateTime = null;

    /**
     * @var FareOptionalDetailsType $Fare
     */
    protected $Fare = null;

    /**
     * @var PlusUpType $PlusUp
     */
    protected $PlusUp = null;

    /**
     * @var int $Number
     */
    protected $Number = null;

    /**
     * @var ISellDateTimeType $DepartureDateTime
     */
    protected $DepartureDateTime = null;

    /**
     * @var ISellDateTimeType $ArrivalDateTime
     */
    protected $ArrivalDateTime = null;

    /**
     * @var string $MarriageStatus
     */
    protected $MarriageStatus = null;

    /**
     * @var anonymous426 $Type
     */
    protected $Type = null;

    /**
     * @var boolean $Flown
     */
    protected $Flown = null;

    /**
     * @var ClassOfServiceType $ClassOfService
     */
    protected $ClassOfService = null;

    /**
     * @var boolean $Shopped
     */
    protected $Shopped = null;

    /**
     * @param RequestLocationType $OriginLocation
     * @param RequestLocationType $DestinationLocation
     * @param AirlineType $Airline
     * @param SideTripType $SideTrip
     * @param ReservationType $Reservation
     * @param MileageDisplayType $MileageDisplay
     * @param ISellDateTimeType $BookingDateTime
     * @param FareOptionalDetailsType $Fare
     * @param PlusUpType $PlusUp
     * @param int $Number
     * @param ISellDateTimeType $DepartureDateTime
     * @param ISellDateTimeType $ArrivalDateTime
     * @param string $MarriageStatus
     * @param anonymous426 $Type
     * @param boolean $Flown
     * @param ClassOfServiceType $ClassOfService
     * @param boolean $Shopped
     */
    public function __construct($OriginLocation = null, $DestinationLocation = null, $Airline = null, $SideTrip = null, $Reservation = null, $MileageDisplay = null, $BookingDateTime = null, $Fare = null, $PlusUp = null, $Number = null, $DepartureDateTime = null, $ArrivalDateTime = null, $MarriageStatus = null, $Type = null, $Flown = null, $ClassOfService = null, $Shopped = null)
    {
      $this->OriginLocation = $OriginLocation;
      $this->DestinationLocation = $DestinationLocation;
      $this->Airline = $Airline;
      $this->SideTrip = $SideTrip;
      $this->Reservation = $Reservation;
      $this->MileageDisplay = $MileageDisplay;
      $this->BookingDateTime = $BookingDateTime;
      $this->Fare = $Fare;
      $this->PlusUp = $PlusUp;
      $this->Number = $Number;
      $this->DepartureDateTime = $DepartureDateTime;
      $this->ArrivalDateTime = $ArrivalDateTime;
      $this->MarriageStatus = $MarriageStatus;
      $this->Type = $Type;
      $this->Flown = $Flown;
      $this->ClassOfService = $ClassOfService;
      $this->Shopped = $Shopped;
    }

    /**
     * @return RequestLocationType
     */
    public function getOriginLocation()
    {
      return $this->OriginLocation;
    }

    /**
     * @param RequestLocationType $OriginLocation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationFlightType
     */
    public function setOriginLocation($OriginLocation)
    {
      $this->OriginLocation = $OriginLocation;
      return $this;
    }

    /**
     * @return RequestLocationType
     */
    public function getDestinationLocation()
    {
      return $this->DestinationLocation;
    }

    /**
     * @param RequestLocationType $DestinationLocation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationFlightType
     */
    public function setDestinationLocation($DestinationLocation)
    {
      $this->DestinationLocation = $DestinationLocation;
      return $this;
    }

    /**
     * @return AirlineType
     */
    public function getAirline()
    {
      return $this->Airline;
    }

    /**
     * @param AirlineType $Airline
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationFlightType
     */
    public function setAirline($Airline)
    {
      $this->Airline = $Airline;
      return $this;
    }

    /**
     * @return SideTripType
     */
    public function getSideTrip()
    {
      return $this->SideTrip;
    }

    /**
     * @param SideTripType $SideTrip
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationFlightType
     */
    public function setSideTrip($SideTrip)
    {
      $this->SideTrip = $SideTrip;
      return $this;
    }

    /**
     * @return ReservationType
     */
    public function getReservation()
    {
      return $this->Reservation;
    }

    /**
     * @param ReservationType $Reservation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationFlightType
     */
    public function setReservation($Reservation)
    {
      $this->Reservation = $Reservation;
      return $this;
    }

    /**
     * @return MileageDisplayType
     */
    public function getMileageDisplay()
    {
      return $this->MileageDisplay;
    }

    /**
     * @param MileageDisplayType $MileageDisplay
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationFlightType
     */
    public function setMileageDisplay($MileageDisplay)
    {
      $this->MileageDisplay = $MileageDisplay;
      return $this;
    }

    /**
     * @return ISellDateTimeType
     */
    public function getBookingDateTime()
    {
      return $this->BookingDateTime;
    }

    /**
     * @param ISellDateTimeType $BookingDateTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationFlightType
     */
    public function setBookingDateTime($BookingDateTime)
    {
      $this->BookingDateTime = $BookingDateTime;
      return $this;
    }

    /**
     * @return FareOptionalDetailsType
     */
    public function getFare()
    {
      return $this->Fare;
    }

    /**
     * @param FareOptionalDetailsType $Fare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationFlightType
     */
    public function setFare($Fare)
    {
      $this->Fare = $Fare;
      return $this;
    }

    /**
     * @return PlusUpType
     */
    public function getPlusUp()
    {
      return $this->PlusUp;
    }

    /**
     * @param PlusUpType $PlusUp
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationFlightType
     */
    public function setPlusUp($PlusUp)
    {
      $this->PlusUp = $PlusUp;
      return $this;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
      return $this->Number;
    }

    /**
     * @param int $Number
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationFlightType
     */
    public function setNumber($Number)
    {
      $this->Number = $Number;
      return $this;
    }

    /**
     * @return ISellDateTimeType
     */
    public function getDepartureDateTime()
    {
      return $this->DepartureDateTime;
    }

    /**
     * @param ISellDateTimeType $DepartureDateTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationFlightType
     */
    public function setDepartureDateTime($DepartureDateTime)
    {
      $this->DepartureDateTime = $DepartureDateTime;
      return $this;
    }

    /**
     * @return ISellDateTimeType
     */
    public function getArrivalDateTime()
    {
      return $this->ArrivalDateTime;
    }

    /**
     * @param ISellDateTimeType $ArrivalDateTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationFlightType
     */
    public function setArrivalDateTime($ArrivalDateTime)
    {
      $this->ArrivalDateTime = $ArrivalDateTime;
      return $this;
    }

    /**
     * @return string
     */
    public function getMarriageStatus()
    {
      return $this->MarriageStatus;
    }

    /**
     * @param string $MarriageStatus
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationFlightType
     */
    public function setMarriageStatus($MarriageStatus)
    {
      $this->MarriageStatus = $MarriageStatus;
      return $this;
    }

    /**
     * @return anonymous426
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param anonymous426 $Type
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationFlightType
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getFlown()
    {
      return $this->Flown;
    }

    /**
     * @param boolean $Flown
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationFlightType
     */
    public function setFlown($Flown)
    {
      $this->Flown = $Flown;
      return $this;
    }

    /**
     * @return ClassOfServiceType
     */
    public function getClassOfService()
    {
      return $this->ClassOfService;
    }

    /**
     * @param ClassOfServiceType $ClassOfService
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationFlightType
     */
    public function setClassOfService($ClassOfService)
    {
      $this->ClassOfService = $ClassOfService;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getShopped()
    {
      return $this->Shopped;
    }

    /**
     * @param boolean $Shopped
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationFlightType
     */
    public function setShopped($Shopped)
    {
      $this->Shopped = $Shopped;
      return $this;
    }

}
