<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareBasisCode
{

    /**
     * @var StringLength1to16 $_
     */
    protected $_ = null;

    /**
     * @var anonymous707 $PrivateFareType
     */
    protected $PrivateFareType = null;

    /**
     * @var int $FareComponentReferenceID
     */
    protected $FareComponentReferenceID = null;

    /**
     * @var StringLength1to20 $AccountCode
     */
    protected $AccountCode = null;

    /**
     * @var int $Mileage
     */
    protected $Mileage = null;

    /**
     * @var anonymous708 $BookingCode
     */
    protected $BookingCode = null;

    /**
     * @var boolean $AvailabilityBreak
     */
    protected $AvailabilityBreak = null;

    /**
     * @var UNKNOWN $DepartureAirportCode
     */
    protected $DepartureAirportCode = null;

    /**
     * @var UNKNOWN $ArrivalAirportCode
     */
    protected $ArrivalAirportCode = null;

    /**
     * @var AirportCode $FareComponentBeginAirport
     */
    protected $FareComponentBeginAirport = null;

    /**
     * @var AirportCode $FareComponentEndAirport
     */
    protected $FareComponentEndAirport = null;

    /**
     * @var FareDirectionality $FareComponentDirectionality
     */
    protected $FareComponentDirectionality = null;

    /**
     * @var StringLength1to4 $FareComponentVendorCode
     */
    protected $FareComponentVendorCode = null;

    /**
     * @var anonymous709 $FareComponentFareTypeBitmap
     */
    protected $FareComponentFareTypeBitmap = null;

    /**
     * @var string $FareComponentFareType
     */
    protected $FareComponentFareType = null;

    /**
     * @var string $FareComponentFareTariff
     */
    protected $FareComponentFareTariff = null;

    /**
     * @var string $FareComponentFareRule
     */
    protected $FareComponentFareRule = null;

    /**
     * @var CarrierCode $GovCarrier
     */
    protected $GovCarrier = null;

    /**
     * @param StringLength1to16 $_
     * @param anonymous707 $PrivateFareType
     * @param int $FareComponentReferenceID
     * @param StringLength1to20 $AccountCode
     * @param int $Mileage
     * @param anonymous708 $BookingCode
     * @param boolean $AvailabilityBreak
     * @param UNKNOWN $DepartureAirportCode
     * @param UNKNOWN $ArrivalAirportCode
     * @param AirportCode $FareComponentBeginAirport
     * @param AirportCode $FareComponentEndAirport
     * @param FareDirectionality $FareComponentDirectionality
     * @param StringLength1to4 $FareComponentVendorCode
     * @param anonymous709 $FareComponentFareTypeBitmap
     * @param string $FareComponentFareType
     * @param string $FareComponentFareTariff
     * @param string $FareComponentFareRule
     * @param CarrierCode $GovCarrier
     */
    public function __construct($_ = null, $PrivateFareType = null, $FareComponentReferenceID = null, $AccountCode = null, $Mileage = null, $BookingCode = null, $AvailabilityBreak = null, $DepartureAirportCode = null, $ArrivalAirportCode = null, $FareComponentBeginAirport = null, $FareComponentEndAirport = null, $FareComponentDirectionality = null, $FareComponentVendorCode = null, $FareComponentFareTypeBitmap = null, $FareComponentFareType = null, $FareComponentFareTariff = null, $FareComponentFareRule = null, $GovCarrier = null)
    {
      $this->_ = $_;
      $this->PrivateFareType = $PrivateFareType;
      $this->FareComponentReferenceID = $FareComponentReferenceID;
      $this->AccountCode = $AccountCode;
      $this->Mileage = $Mileage;
      $this->BookingCode = $BookingCode;
      $this->AvailabilityBreak = $AvailabilityBreak;
      $this->DepartureAirportCode = $DepartureAirportCode;
      $this->ArrivalAirportCode = $ArrivalAirportCode;
      $this->FareComponentBeginAirport = $FareComponentBeginAirport;
      $this->FareComponentEndAirport = $FareComponentEndAirport;
      $this->FareComponentDirectionality = $FareComponentDirectionality;
      $this->FareComponentVendorCode = $FareComponentVendorCode;
      $this->FareComponentFareTypeBitmap = $FareComponentFareTypeBitmap;
      $this->FareComponentFareType = $FareComponentFareType;
      $this->FareComponentFareTariff = $FareComponentFareTariff;
      $this->FareComponentFareRule = $FareComponentFareRule;
      $this->GovCarrier = $GovCarrier;
    }

    /**
     * @return StringLength1to16
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param StringLength1to16 $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisCode
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return anonymous707
     */
    public function getPrivateFareType()
    {
      return $this->PrivateFareType;
    }

    /**
     * @param anonymous707 $PrivateFareType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisCode
     */
    public function setPrivateFareType($PrivateFareType)
    {
      $this->PrivateFareType = $PrivateFareType;
      return $this;
    }

    /**
     * @return int
     */
    public function getFareComponentReferenceID()
    {
      return $this->FareComponentReferenceID;
    }

    /**
     * @param int $FareComponentReferenceID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisCode
     */
    public function setFareComponentReferenceID($FareComponentReferenceID)
    {
      $this->FareComponentReferenceID = $FareComponentReferenceID;
      return $this;
    }

    /**
     * @return StringLength1to20
     */
    public function getAccountCode()
    {
      return $this->AccountCode;
    }

    /**
     * @param StringLength1to20 $AccountCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisCode
     */
    public function setAccountCode($AccountCode)
    {
      $this->AccountCode = $AccountCode;
      return $this;
    }

    /**
     * @return int
     */
    public function getMileage()
    {
      return $this->Mileage;
    }

    /**
     * @param int $Mileage
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisCode
     */
    public function setMileage($Mileage)
    {
      $this->Mileage = $Mileage;
      return $this;
    }

    /**
     * @return anonymous708
     */
    public function getBookingCode()
    {
      return $this->BookingCode;
    }

    /**
     * @param anonymous708 $BookingCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisCode
     */
    public function setBookingCode($BookingCode)
    {
      $this->BookingCode = $BookingCode;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getAvailabilityBreak()
    {
      return $this->AvailabilityBreak;
    }

    /**
     * @param boolean $AvailabilityBreak
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisCode
     */
    public function setAvailabilityBreak($AvailabilityBreak)
    {
      $this->AvailabilityBreak = $AvailabilityBreak;
      return $this;
    }

    /**
     * @return UNKNOWN
     */
    public function getDepartureAirportCode()
    {
      return $this->DepartureAirportCode;
    }

    /**
     * @param UNKNOWN $DepartureAirportCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisCode
     */
    public function setDepartureAirportCode($DepartureAirportCode)
    {
      $this->DepartureAirportCode = $DepartureAirportCode;
      return $this;
    }

    /**
     * @return UNKNOWN
     */
    public function getArrivalAirportCode()
    {
      return $this->ArrivalAirportCode;
    }

    /**
     * @param UNKNOWN $ArrivalAirportCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisCode
     */
    public function setArrivalAirportCode($ArrivalAirportCode)
    {
      $this->ArrivalAirportCode = $ArrivalAirportCode;
      return $this;
    }

    /**
     * @return AirportCode
     */
    public function getFareComponentBeginAirport()
    {
      return $this->FareComponentBeginAirport;
    }

    /**
     * @param AirportCode $FareComponentBeginAirport
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisCode
     */
    public function setFareComponentBeginAirport($FareComponentBeginAirport)
    {
      $this->FareComponentBeginAirport = $FareComponentBeginAirport;
      return $this;
    }

    /**
     * @return AirportCode
     */
    public function getFareComponentEndAirport()
    {
      return $this->FareComponentEndAirport;
    }

    /**
     * @param AirportCode $FareComponentEndAirport
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisCode
     */
    public function setFareComponentEndAirport($FareComponentEndAirport)
    {
      $this->FareComponentEndAirport = $FareComponentEndAirport;
      return $this;
    }

    /**
     * @return FareDirectionality
     */
    public function getFareComponentDirectionality()
    {
      return $this->FareComponentDirectionality;
    }

    /**
     * @param FareDirectionality $FareComponentDirectionality
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisCode
     */
    public function setFareComponentDirectionality($FareComponentDirectionality)
    {
      $this->FareComponentDirectionality = $FareComponentDirectionality;
      return $this;
    }

    /**
     * @return StringLength1to4
     */
    public function getFareComponentVendorCode()
    {
      return $this->FareComponentVendorCode;
    }

    /**
     * @param StringLength1to4 $FareComponentVendorCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisCode
     */
    public function setFareComponentVendorCode($FareComponentVendorCode)
    {
      $this->FareComponentVendorCode = $FareComponentVendorCode;
      return $this;
    }

    /**
     * @return anonymous709
     */
    public function getFareComponentFareTypeBitmap()
    {
      return $this->FareComponentFareTypeBitmap;
    }

    /**
     * @param anonymous709 $FareComponentFareTypeBitmap
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisCode
     */
    public function setFareComponentFareTypeBitmap($FareComponentFareTypeBitmap)
    {
      $this->FareComponentFareTypeBitmap = $FareComponentFareTypeBitmap;
      return $this;
    }

    /**
     * @return string
     */
    public function getFareComponentFareType()
    {
      return $this->FareComponentFareType;
    }

    /**
     * @param string $FareComponentFareType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisCode
     */
    public function setFareComponentFareType($FareComponentFareType)
    {
      $this->FareComponentFareType = $FareComponentFareType;
      return $this;
    }

    /**
     * @return string
     */
    public function getFareComponentFareTariff()
    {
      return $this->FareComponentFareTariff;
    }

    /**
     * @param string $FareComponentFareTariff
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisCode
     */
    public function setFareComponentFareTariff($FareComponentFareTariff)
    {
      $this->FareComponentFareTariff = $FareComponentFareTariff;
      return $this;
    }

    /**
     * @return string
     */
    public function getFareComponentFareRule()
    {
      return $this->FareComponentFareRule;
    }

    /**
     * @param string $FareComponentFareRule
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisCode
     */
    public function setFareComponentFareRule($FareComponentFareRule)
    {
      $this->FareComponentFareRule = $FareComponentFareRule;
      return $this;
    }

    /**
     * @return CarrierCode
     */
    public function getGovCarrier()
    {
      return $this->GovCarrier;
    }

    /**
     * @param CarrierCode $GovCarrier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisCode
     */
    public function setGovCarrier($GovCarrier)
    {
      $this->GovCarrier = $GovCarrier;
      return $this;
    }

}
