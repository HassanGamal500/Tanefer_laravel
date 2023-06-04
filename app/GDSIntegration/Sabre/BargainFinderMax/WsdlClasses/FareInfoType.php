<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareInfoType
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
     * @var CompanyNameType[] $MarketingAirline
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
     * @var boolean $NegotiatedFare
     */
    protected $NegotiatedFare = null;

    /**
     * @var string $NegotiatedFareCode
     */
    protected $NegotiatedFareCode = null;

    /**
     * @param StringLength1to8 $FareReference
     * @param RuleInfoType $RuleInfo
     * @param ResponseLocationType $DepartureAirport
     * @param ResponseLocationType $ArrivalAirport
     * @param boolean $NegotiatedFare
     * @param string $NegotiatedFareCode
     */
    public function __construct($FareReference = null, $RuleInfo = null, $DepartureAirport = null, $ArrivalAirport = null, $NegotiatedFare = null, $NegotiatedFareCode = null)
    {
      $this->FareReference = $FareReference;
      $this->RuleInfo = $RuleInfo;
      $this->DepartureAirport = $DepartureAirport;
      $this->ArrivalAirport = $ArrivalAirport;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareInfoType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareInfoType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareInfoType
     */
    public function setRuleInfo($RuleInfo)
    {
      $this->RuleInfo = $RuleInfo;
      return $this;
    }

    /**
     * @return CompanyNameType[]
     */
    public function getMarketingAirline()
    {
      return $this->MarketingAirline;
    }

    /**
     * @param CompanyNameType[] $MarketingAirline
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareInfoType
     */
    public function setMarketingAirline(array $MarketingAirline = null)
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareInfoType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareInfoType
     */
    public function setArrivalAirport($ArrivalAirport)
    {
      $this->ArrivalAirport = $ArrivalAirport;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareInfoType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareInfoType
     */
    public function setNegotiatedFareCode($NegotiatedFareCode)
    {
      $this->NegotiatedFareCode = $NegotiatedFareCode;
      return $this;
    }

}
