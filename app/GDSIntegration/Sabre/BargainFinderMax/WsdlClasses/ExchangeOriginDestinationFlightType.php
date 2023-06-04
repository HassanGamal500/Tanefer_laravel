<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ExchangeOriginDestinationFlightType
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
     * @var Fare $Fare
     */
    protected $Fare = null;

    /**
     * @var PlusUpType $PlusUp
     */
    protected $PlusUp = null;

    /**
     * @var SurchargeType $Surcharge
     */
    protected $Surcharge = null;

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
     * @param RequestLocationType $OriginLocation
     * @param RequestLocationType $DestinationLocation
     * @param AirlineType $Airline
     * @param SideTripType $SideTrip
     * @param ReservationType $Reservation
     * @param MileageDisplayType $MileageDisplay
     * @param ISellDateTimeType $BookingDateTime
     * @param Fare $Fare
     * @param PlusUpType $PlusUp
     * @param SurchargeType $Surcharge
     * @param int $Number
     * @param ISellDateTimeType $DepartureDateTime
     * @param ISellDateTimeType $ArrivalDateTime
     * @param string $MarriageStatus
     * @param anonymous426 $Type
     * @param boolean $Flown
     * @param ClassOfServiceType $ClassOfService
     */
    public function __construct($OriginLocation = null, $DestinationLocation = null, $Airline = null, $SideTrip = null, $Reservation = null, $MileageDisplay = null, $BookingDateTime = null, $Fare = null, $PlusUp = null, $Surcharge = null, $Number = null, $DepartureDateTime = null, $ArrivalDateTime = null, $MarriageStatus = null, $Type = null, $Flown = null, $ClassOfService = null)
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
      $this->Surcharge = $Surcharge;
      $this->Number = $Number;
      $this->DepartureDateTime = $DepartureDateTime;
      $this->ArrivalDateTime = $ArrivalDateTime;
      $this->MarriageStatus = $MarriageStatus;
      $this->Type = $Type;
      $this->Flown = $Flown;
      $this->ClassOfService = $ClassOfService;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationFlightType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationFlightType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationFlightType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationFlightType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationFlightType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationFlightType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationFlightType
     */
    public function setBookingDateTime($BookingDateTime)
    {
      $this->BookingDateTime = $BookingDateTime;
      return $this;
    }

    /**
     * @return Fare
     */
    public function getFare()
    {
      return $this->Fare;
    }

    /**
     * @param Fare $Fare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationFlightType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationFlightType
     */
    public function setPlusUp($PlusUp)
    {
      $this->PlusUp = $PlusUp;
      return $this;
    }

    /**
     * @return SurchargeType
     */
    public function getSurcharge()
    {
      return $this->Surcharge;
    }

    /**
     * @param SurchargeType $Surcharge
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationFlightType
     */
    public function setSurcharge($Surcharge)
    {
      $this->Surcharge = $Surcharge;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationFlightType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationFlightType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationFlightType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationFlightType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationFlightType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationFlightType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeOriginDestinationFlightType
     */
    public function setClassOfService($ClassOfService)
    {
      $this->ClassOfService = $ClassOfService;
      return $this;
    }

}
