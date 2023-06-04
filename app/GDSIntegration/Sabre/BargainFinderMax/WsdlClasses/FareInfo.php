<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareInfo
{

    /**
     * @var string $DepartureDate
     */
    protected $DepartureDate = null;

    /**
     * @var StringLength1to8 $FareReference
     */
    protected $FareReference = null;

    /**
     * @var RuleInfoType $RuleInfo
     */
    protected $RuleInfo = null;

    /**
     * @var CompanyNameType $MarketingAirline
     */
    protected $MarketingAirline = null;

    /**
     * @var ResponseLocationType $DepartureAirport
     */
    protected $DepartureAirport = null;

    /**
     * @var ResponseLocationType $ArrivalAirport
     */
    protected $ArrivalAirport = null;

    /**
     * @var TPA_Extensions $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @var boolean $NegotiatedFare
     */
    protected $NegotiatedFare = null;

    /**
     * @var string $NegotiatedFareCode
     */
    protected $NegotiatedFareCode = null;

    /**
     * @param string $DepartureDate
     * @param StringLength1to8 $FareReference
     * @param RuleInfoType $RuleInfo
     * @param CompanyNameType $MarketingAirline
     * @param ResponseLocationType $DepartureAirport
     * @param ResponseLocationType $ArrivalAirport
     * @param TPA_Extensions $TPA_Extensions
     * @param boolean $NegotiatedFare
     * @param string $NegotiatedFareCode
     */
    public function __construct($DepartureDate = null, $FareReference = null, $RuleInfo = null, $MarketingAirline = null, $DepartureAirport = null, $ArrivalAirport = null, $TPA_Extensions = null, $NegotiatedFare = null, $NegotiatedFareCode = null)
    {
      $this->DepartureDate = $DepartureDate;
      $this->FareReference = $FareReference;
      $this->RuleInfo = $RuleInfo;
      $this->MarketingAirline = $MarketingAirline;
      $this->DepartureAirport = $DepartureAirport;
      $this->ArrivalAirport = $ArrivalAirport;
      $this->TPA_Extensions = $TPA_Extensions;
      $this->NegotiatedFare = $NegotiatedFare;
      $this->NegotiatedFareCode = $NegotiatedFareCode;
    }

    /**
     * @return string
     */
    public function getDepartureDate()
    {
      return $this->DepartureDate;
    }

    /**
     * @param string $DepartureDate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareInfo
     */
    public function setDepartureDate($DepartureDate)
    {
      $this->DepartureDate = $DepartureDate;
      return $this;
    }

    /**
     * @return StringLength1to8
     */
    public function getFareReference()
    {
      return $this->FareReference;
    }

    /**
     * @param StringLength1to8 $FareReference
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareInfo
     */
    public function setFareReference($FareReference)
    {
      $this->FareReference = $FareReference;
      return $this;
    }

    /**
     * @return RuleInfoType
     */
    public function getRuleInfo()
    {
      return $this->RuleInfo;
    }

    /**
     * @param RuleInfoType $RuleInfo
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareInfo
     */
    public function setRuleInfo($RuleInfo)
    {
      $this->RuleInfo = $RuleInfo;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareInfo
     */
    public function setMarketingAirline($MarketingAirline)
    {
      $this->MarketingAirline = $MarketingAirline;
      return $this;
    }

    /**
     * @return ResponseLocationType
     */
    public function getDepartureAirport()
    {
      return $this->DepartureAirport;
    }

    /**
     * @param ResponseLocationType $DepartureAirport
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareInfo
     */
    public function setDepartureAirport($DepartureAirport)
    {
      $this->DepartureAirport = $DepartureAirport;
      return $this;
    }

    /**
     * @return ResponseLocationType
     */
    public function getArrivalAirport()
    {
      return $this->ArrivalAirport;
    }

    /**
     * @param ResponseLocationType $ArrivalAirport
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareInfo
     */
    public function setArrivalAirport($ArrivalAirport)
    {
      $this->ArrivalAirport = $ArrivalAirport;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareInfo
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getNegotiatedFare()
    {
      return $this->NegotiatedFare;
    }

    /**
     * @param boolean $NegotiatedFare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareInfo
     */
    public function setNegotiatedFare($NegotiatedFare)
    {
      $this->NegotiatedFare = $NegotiatedFare;
      return $this;
    }

    /**
     * @return string
     */
    public function getNegotiatedFareCode()
    {
      return $this->NegotiatedFareCode;
    }

    /**
     * @param string $NegotiatedFareCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareInfo
     */
    public function setNegotiatedFareCode($NegotiatedFareCode)
    {
      $this->NegotiatedFareCode = $NegotiatedFareCode;
      return $this;
    }

}
