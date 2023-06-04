<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PlusUpType
{

    /**
     * @var Money $Amount
     */
    protected $Amount = null;

    /**
     * @var AlphaLength3 $OriginCity
     */
    protected $OriginCity = null;

    /**
     * @var AlphaLength3 $DestinationCity
     */
    protected $DestinationCity = null;

    /**
     * @var AlphaLength3 $FareOriginCity
     */
    protected $FareOriginCity = null;

    /**
     * @var AlphaLength3 $FareDestinationCity
     */
    protected $FareDestinationCity = null;

    /**
     * @var AlphaLength3 $ViaCity
     */
    protected $ViaCity = null;

    /**
     * @var string $Message
     */
    protected $Message = null;

    /**
     * @var ISO3166 $CountryOfPayment
     */
    protected $CountryOfPayment = null;

    /**
     * @param Money $Amount
     * @param AlphaLength3 $OriginCity
     * @param AlphaLength3 $DestinationCity
     * @param AlphaLength3 $FareOriginCity
     * @param AlphaLength3 $FareDestinationCity
     * @param AlphaLength3 $ViaCity
     * @param string $Message
     * @param ISO3166 $CountryOfPayment
     */
    public function __construct($Amount = null, $OriginCity = null, $DestinationCity = null, $FareOriginCity = null, $FareDestinationCity = null, $ViaCity = null, $Message = null, $CountryOfPayment = null)
    {
      $this->Amount = $Amount;
      $this->OriginCity = $OriginCity;
      $this->DestinationCity = $DestinationCity;
      $this->FareOriginCity = $FareOriginCity;
      $this->FareDestinationCity = $FareDestinationCity;
      $this->ViaCity = $ViaCity;
      $this->Message = $Message;
      $this->CountryOfPayment = $CountryOfPayment;
    }

    /**
     * @return Money
     */
    public function getAmount()
    {
      return $this->Amount;
    }

    /**
     * @param Money $Amount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PlusUpType
     */
    public function setAmount($Amount)
    {
      $this->Amount = $Amount;
      return $this;
    }

    /**
     * @return AlphaLength3
     */
    public function getOriginCity()
    {
      return $this->OriginCity;
    }

    /**
     * @param AlphaLength3 $OriginCity
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PlusUpType
     */
    public function setOriginCity($OriginCity)
    {
      $this->OriginCity = $OriginCity;
      return $this;
    }

    /**
     * @return AlphaLength3
     */
    public function getDestinationCity()
    {
      return $this->DestinationCity;
    }

    /**
     * @param AlphaLength3 $DestinationCity
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PlusUpType
     */
    public function setDestinationCity($DestinationCity)
    {
      $this->DestinationCity = $DestinationCity;
      return $this;
    }

    /**
     * @return AlphaLength3
     */
    public function getFareOriginCity()
    {
      return $this->FareOriginCity;
    }

    /**
     * @param AlphaLength3 $FareOriginCity
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PlusUpType
     */
    public function setFareOriginCity($FareOriginCity)
    {
      $this->FareOriginCity = $FareOriginCity;
      return $this;
    }

    /**
     * @return AlphaLength3
     */
    public function getFareDestinationCity()
    {
      return $this->FareDestinationCity;
    }

    /**
     * @param AlphaLength3 $FareDestinationCity
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PlusUpType
     */
    public function setFareDestinationCity($FareDestinationCity)
    {
      $this->FareDestinationCity = $FareDestinationCity;
      return $this;
    }

    /**
     * @return AlphaLength3
     */
    public function getViaCity()
    {
      return $this->ViaCity;
    }

    /**
     * @param AlphaLength3 $ViaCity
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PlusUpType
     */
    public function setViaCity($ViaCity)
    {
      $this->ViaCity = $ViaCity;
      return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
      return $this->Message;
    }

    /**
     * @param string $Message
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PlusUpType
     */
    public function setMessage($Message)
    {
      $this->Message = $Message;
      return $this;
    }

    /**
     * @return ISO3166
     */
    public function getCountryOfPayment()
    {
      return $this->CountryOfPayment;
    }

    /**
     * @param ISO3166 $CountryOfPayment
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PlusUpType
     */
    public function setCountryOfPayment($CountryOfPayment)
    {
      $this->CountryOfPayment = $CountryOfPayment;
      return $this;
    }

}
