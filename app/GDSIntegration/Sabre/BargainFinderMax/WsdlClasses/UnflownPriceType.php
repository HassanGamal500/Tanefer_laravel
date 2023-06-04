<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class UnflownPriceType
{

    /**
     * @var Money $Amount
     */
    protected $Amount = null;

    /**
     * @var CurrencyCodeType $CurrencyCode
     */
    protected $CurrencyCode = null;

    /**
     * @var int $DecimalPlaces
     */
    protected $DecimalPlaces = null;

    /**
     * @param Money $Amount
     * @param CurrencyCodeType $CurrencyCode
     * @param int $DecimalPlaces
     */
    public function __construct($Amount = null, $CurrencyCode = null, $DecimalPlaces = null)
    {
      $this->Amount = $Amount;
      $this->CurrencyCode = $CurrencyCode;
      $this->DecimalPlaces = $DecimalPlaces;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\UnflownPriceType
     */
    public function setAmount($Amount)
    {
      $this->Amount = $Amount;
      return $this;
    }

    /**
     * @return CurrencyCodeType
     */
    public function getCurrencyCode()
    {
      return $this->CurrencyCode;
    }

    /**
     * @param CurrencyCodeType $CurrencyCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\UnflownPriceType
     */
    public function setCurrencyCode($CurrencyCode)
    {
      $this->CurrencyCode = $CurrencyCode;
      return $this;
    }

    /**
     * @return int
     */
    public function getDecimalPlaces()
    {
      return $this->DecimalPlaces;
    }

    /**
     * @param int $DecimalPlaces
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\UnflownPriceType
     */
    public function setDecimalPlaces($DecimalPlaces)
    {
      $this->DecimalPlaces = $DecimalPlaces;
      return $this;
    }

}
