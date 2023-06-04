<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AirFeeType
{

    /**
     * @var string $_
     */
    protected $_ = null;

    /**
     * @var StringLength1to16 $FeeCode
     */
    protected $FeeCode = null;

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
     * @param string $_
     * @param StringLength1to16 $FeeCode
     * @param Money $Amount
     * @param CurrencyCodeType $CurrencyCode
     * @param int $DecimalPlaces
     */
    public function __construct($_ = null, $FeeCode = null, $Amount = null, $CurrencyCode = null, $DecimalPlaces = null)
    {
      $this->_ = $_;
      $this->FeeCode = $FeeCode;
      $this->Amount = $Amount;
      $this->CurrencyCode = $CurrencyCode;
      $this->DecimalPlaces = $DecimalPlaces;
    }

    /**
     * @return string
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param string $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirFeeType
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return StringLength1to16
     */
    public function getFeeCode()
    {
      return $this->FeeCode;
    }

    /**
     * @param StringLength1to16 $FeeCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirFeeType
     */
    public function setFeeCode($FeeCode)
    {
      $this->FeeCode = $FeeCode;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirFeeType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirFeeType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirFeeType
     */
    public function setDecimalPlaces($DecimalPlaces)
    {
      $this->DecimalPlaces = $DecimalPlaces;
      return $this;
    }

}
