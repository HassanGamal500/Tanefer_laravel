<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class SurchargeType
{

    /**
     * @var string $Type
     */
    protected $Type = null;

    /**
     * @var Money $Amount
     */
    protected $Amount = null;

    /**
     * @var CurrencyCodeType $Currency
     */
    protected $Currency = null;

    /**
     * @param string $Type
     * @param Money $Amount
     * @param CurrencyCodeType $Currency
     */
    public function __construct($Type = null, $Amount = null, $Currency = null)
    {
      $this->Type = $Type;
      $this->Amount = $Amount;
      $this->Currency = $Currency;
    }

    /**
     * @return string
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param string $Type
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SurchargeType
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SurchargeType
     */
    public function setAmount($Amount)
    {
      $this->Amount = $Amount;
      return $this;
    }

    /**
     * @return CurrencyCodeType
     */
    public function getCurrency()
    {
      return $this->Currency;
    }

    /**
     * @param CurrencyCodeType $Currency
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SurchargeType
     */
    public function setCurrency($Currency)
    {
      $this->Currency = $Currency;
      return $this;
    }

}
