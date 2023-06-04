<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class BookFlightSegmentType extends ResponseLocationType
{

    /**
     * @var AirportInformationType $DepartureAirport
     */
    protected $DepartureAirport = null;

    /**
     * @var AirportInformationType $ArrivalAirport
     */
    protected $ArrivalAirport = null;

    /**
     * @var OperatingAirlineType $OperatingAirline
     */
    protected $OperatingAirline = null;

    /**
     * @var EquipmentType[] $Equipment
     */
    protected $Equipment = null;

    /**
     * @var CompanyNameType $MarketingAirline
     */
    protected $MarketingAirline = null;

    /**
     * @var CompanyNameType $DisclosureAirline
     */
    protected $DisclosureAirline = null;

    /**
     * @var StringLength1to16 $MarriageGrp
     */
    protected $MarriageGrp = null;

    /**
     * @var StopAirports $StopAirports
     */
    protected $StopAirports = null;

    /**
     * @var DepartureTimeZone $DepartureTimeZone
     */
    protected $DepartureTimeZone = null;

    /**
     * @var ArrivalTimeZone $ArrivalTimeZone
     */
    protected $ArrivalTimeZone = null;

    /**
     * @var OnTimePerformance $OnTimePerformance
     */
    protected $OnTimePerformance = null;

    /**
     * @var TPA_Extensions $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @var string $DepartureDateTime
     */
    protected $DepartureDateTime = null;

    /**
     * @var string $ArrivalDateTime
     */
    protected $ArrivalDateTime = null;

    /**
     * @var int $StopQuantity
     */
    protected $StopQuantity = null;

    /**
     * @var RPH_Type $RPH
     */
    protected $RPH = null;

    /**
     * @var StringLength1to32 $InfoSource
     */
    protected $InfoSource = null;

    /**
     * @var FlightNumberType $FlightNumber
     */
    protected $FlightNumber = null;

    /**
     * @var StringLength1to8 $TourOperatorFlightID
     */
    protected $TourOperatorFlightID = null;

    /**
     * @var UpperCaseAlphaLength1to2WithSpace $ResBookDesigCode
     */
    protected $ResBookDesigCode = null;

    /**
     * @var ActionCodeType $ActionCode
     */
    protected $ActionCode = null;

    /**
     * @var int $NumberInParty
     */
    protected $NumberInParty = null;

    /**
     * @var int $ElapsedTime
     */
    protected $ElapsedTime = null;

    /**
     * @param string $_
     * @param StringLength1to8 $LocationCode
     * @param StringLength1to32 $CodeContext
     * @param AirportInformationType $DepartureAirport
     * @param AirportInformationType $ArrivalAirport
     * @param string $DepartureDateTime
     * @param string $ArrivalDateTime
     * @param int $StopQuantity
     * @param RPH_Type $RPH
     * @param StringLength1to32 $InfoSource
     * @param FlightNumberType $FlightNumber
     * @param StringLength1to8 $TourOperatorFlightID
     * @param UpperCaseAlphaLength1to2WithSpace $ResBookDesigCode
     * @param ActionCodeType $ActionCode
     * @param int $NumberInParty
     * @param int $ElapsedTime
     */
    public function __construct($_ = null, $LocationCode = null, $CodeContext = null, $DepartureAirport = null, $ArrivalAirport = null, $DepartureDateTime = null, $ArrivalDateTime = null, $StopQuantity = null, $RPH = null, $InfoSource = null, $FlightNumber = null, $TourOperatorFlightID = null, $ResBookDesigCode = null, $ActionCode = null, $NumberInParty = null, $ElapsedTime = null)
    {
      parent::__construct($_, $LocationCode, $CodeContext);
      $this->DepartureAirport = $DepartureAirport;
      $this->ArrivalAirport = $ArrivalAirport;
      $this->DepartureDateTime = $DepartureDateTime;
      $this->ArrivalDateTime = $ArrivalDateTime;
      $this->StopQuantity = $StopQuantity;
      $this->RPH = $RPH;
      $this->InfoSource = $InfoSource;
      $this->FlightNumber = $FlightNumber;
      $this->TourOperatorFlightID = $TourOperatorFlightID;
      $this->ResBookDesigCode = $ResBookDesigCode;
      $this->ActionCode = $ActionCode;
      $this->NumberInParty = $NumberInParty;
      $this->ElapsedTime = $ElapsedTime;
    }

    /**
     * @return AirportInformationType
     */
    public function getDepartureAirport()
    {
      return $this->DepartureAirport;
    }

    /**
     * @param AirportInformationType $DepartureAirport
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setDepartureAirport($DepartureAirport)
    {
      $this->DepartureAirport = $DepartureAirport;
      return $this;
    }

    /**
     * @return AirportInformationType
     */
    public function getArrivalAirport()
    {
      return $this->ArrivalAirport;
    }

    /**
     * @param AirportInformationType $ArrivalAirport
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setArrivalAirport($ArrivalAirport)
    {
      $this->ArrivalAirport = $ArrivalAirport;
      return $this;
    }

    /**
     * @return OperatingAirlineType
     */
    public function getOperatingAirline()
    {
      return $this->OperatingAirline;
    }

    /**
     * @param OperatingAirlineType $OperatingAirline
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setOperatingAirline($OperatingAirline)
    {
      $this->OperatingAirline = $OperatingAirline;
      return $this;
    }

    /**
     * @return EquipmentType[]
     */
    public function getEquipment()
    {
      return $this->Equipment;
    }

    /**
     * @param EquipmentType[] $Equipment
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setEquipment(array $Equipment = null)
    {
      $this->Equipment = $Equipment;
      return $this;
    }

    /**
     * @return CompanyNameType
     */
    public function getMarketingAirline()
    {
      return $this->MarketingAirline;
    }

    /**
     * @param CompanyNameType $MarketingAirline
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setMarketingAirline($MarketingAirline)
    {
      $this->MarketingAirline = $MarketingAirline;
      return $this;
    }

    /**
     * @return CompanyNameType
     */
    public function getDisclosureAirline()
    {
      return $this->DisclosureAirline;
    }

    /**
     * @param CompanyNameType $DisclosureAirline
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setDisclosureAirline($DisclosureAirline)
    {
      $this->DisclosureAirline = $DisclosureAirline;
      return $this;
    }

    /**
     * @return StringLength1to16
     */
    public function getMarriageGrp()
    {
      return $this->MarriageGrp;
    }

    /**
     * @param StringLength1to16 $MarriageGrp
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setMarriageGrp($MarriageGrp)
    {
      $this->MarriageGrp = $MarriageGrp;
      return $this;
    }

    /**
     * @return StopAirports
     */
    public function getStopAirports()
    {
      return $this->StopAirports;
    }

    /**
     * @param StopAirports $StopAirports
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setStopAirports($StopAirports)
    {
      $this->StopAirports = $StopAirports;
      return $this;
    }

    /**
     * @return DepartureTimeZone
     */
    public function getDepartureTimeZone()
    {
      return $this->DepartureTimeZone;
    }

    /**
     * @param DepartureTimeZone $DepartureTimeZone
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setDepartureTimeZone($DepartureTimeZone)
    {
      $this->DepartureTimeZone = $DepartureTimeZone;
      return $this;
    }

    /**
     * @return ArrivalTimeZone
     */
    public function getArrivalTimeZone()
    {
      return $this->ArrivalTimeZone;
    }

    /**
     * @param ArrivalTimeZone $ArrivalTimeZone
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setArrivalTimeZone($ArrivalTimeZone)
    {
      $this->ArrivalTimeZone = $ArrivalTimeZone;
      return $this;
    }

    /**
     * @return OnTimePerformance
     */
    public function getOnTimePerformance()
    {
      return $this->OnTimePerformance;
    }

    /**
     * @param OnTimePerformance $OnTimePerformance
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setOnTimePerformance($OnTimePerformance)
    {
      $this->OnTimePerformance = $OnTimePerformance;
      return $this;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      return $this;
    }

    /**
     * @return string
     */
    public function getDepartureDateTime()
    {
      return $this->DepartureDateTime;
    }

    /**
     * @param string $DepartureDateTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setDepartureDateTime($DepartureDateTime)
    {
      $this->DepartureDateTime = $DepartureDateTime;
      return $this;
    }

    /**
     * @return string
     */
    public function getArrivalDateTime()
    {
      return $this->ArrivalDateTime;
    }

    /**
     * @param string $ArrivalDateTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setArrivalDateTime($ArrivalDateTime)
    {
      $this->ArrivalDateTime = $ArrivalDateTime;
      return $this;
    }

    /**
     * @return int
     */
    public function getStopQuantity()
    {
      return $this->StopQuantity;
    }

    /**
     * @param int $StopQuantity
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setStopQuantity($StopQuantity)
    {
      $this->StopQuantity = $StopQuantity;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setRPH($RPH)
    {
      $this->RPH = $RPH;
      return $this;
    }

    /**
     * @return StringLength1to32
     */
    public function getInfoSource()
    {
      return $this->InfoSource;
    }

    /**
     * @param StringLength1to32 $InfoSource
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setInfoSource($InfoSource)
    {
      $this->InfoSource = $InfoSource;
      return $this;
    }

    /**
     * @return FlightNumberType
     */
    public function getFlightNumber()
    {
      return $this->FlightNumber;
    }

    /**
     * @param FlightNumberType $FlightNumber
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setFlightNumber($FlightNumber)
    {
      $this->FlightNumber = $FlightNumber;
      return $this;
    }

    /**
     * @return StringLength1to8
     */
    public function getTourOperatorFlightID()
    {
      return $this->TourOperatorFlightID;
    }

    /**
     * @param StringLength1to8 $TourOperatorFlightID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setTourOperatorFlightID($TourOperatorFlightID)
    {
      $this->TourOperatorFlightID = $TourOperatorFlightID;
      return $this;
    }

    /**
     * @return UpperCaseAlphaLength1to2WithSpace
     */
    public function getResBookDesigCode()
    {
      return $this->ResBookDesigCode;
    }

    /**
     * @param UpperCaseAlphaLength1to2WithSpace $ResBookDesigCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setResBookDesigCode($ResBookDesigCode)
    {
      $this->ResBookDesigCode = $ResBookDesigCode;
      return $this;
    }

    /**
     * @return ActionCodeType
     */
    public function getActionCode()
    {
      return $this->ActionCode;
    }

    /**
     * @param ActionCodeType $ActionCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setActionCode($ActionCode)
    {
      $this->ActionCode = $ActionCode;
      return $this;
    }

    /**
     * @return int
     */
    public function getNumberInParty()
    {
      return $this->NumberInParty;
    }

    /**
     * @param int $NumberInParty
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setNumberInParty($NumberInParty)
    {
      $this->NumberInParty = $NumberInParty;
      return $this;
    }

    /**
     * @return int
     */
    public function getElapsedTime()
    {
      return $this->ElapsedTime;
    }

    /**
     * @param int $ElapsedTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookFlightSegmentType
     */
    public function setElapsedTime($ElapsedTime)
    {
      $this->ElapsedTime = $ElapsedTime;
      return $this;
    }

}
