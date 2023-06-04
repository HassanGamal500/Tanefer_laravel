<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ChangeFee
{

    /**
     * @var boolean $HighestChangeFee
     */
    protected $HighestChangeFee = null;

    /**
     * @var Money $PaymentAmount
     */
    protected $PaymentAmount = null;

    /**
     * @var CurrencyCodeType $PaymentCurrency
     */
    protected $PaymentCurrency = null;

    /**
     * @var int $PaymentDecimalPlaces
     */
    protected $PaymentDecimalPlaces = null;

    /**
     * @var boolean $ChangeFeeWaived
     */
    protected $ChangeFeeWaived = null;

    /**
     * @var boolean $ChangeFeeNotApplicable
     */
    protected $ChangeFeeNotApplicable = null;

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
     * @param boolean $HighestChangeFee
     * @param Money $PaymentAmount
     * @param CurrencyCodeType $PaymentCurrency
     * @param int $PaymentDecimalPlaces
     * @param boolean $ChangeFeeWaived
     * @param boolean $ChangeFeeNotApplicable
     * @param Money $Amount
     * @param CurrencyCodeType $CurrencyCode
     * @param int $DecimalPlaces
     */
    public function __construct($HighestChangeFee = null, $PaymentAmount = null, $PaymentCurrency = null, $PaymentDecimalPlaces = null, $ChangeFeeWaived = null, $ChangeFeeNotApplicable = null, $Amount = null, $CurrencyCode = null, $DecimalPlaces = null)
    {
      $this->HighestChangeFee = $HighestChangeFee;
      $this->PaymentAmount = $PaymentAmount;
      $this->PaymentCurrency = $PaymentCurrency;
      $this->PaymentDecimalPlaces = $PaymentDecimalPlaces;
      $this->ChangeFeeWaived = $ChangeFeeWaived;
      $this->ChangeFeeNotApplicable = $ChangeFeeNotApplicable;
      $this->Amount = $Amount;
      $this->CurrencyCode = $CurrencyCode;
      $this->DecimalPlaces = $DecimalPlaces;
    }

    /**
     * @return boolean
     */
    public function getHighestChangeFee()
    {
      return $this->HighestChangeFee;
    }

    /**
     * @param boolean $HighestChangeFee
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ChangeFee
     */
    public function setHighestChangeFee($HighestChangeFee)
    {
      $this->HighestChangeFee = $HighestChangeFee;
      return $this;
    }

    /**
     * @return Money
     */
    public function getPaymentAmount()
    {
      return $this->PaymentAmount;
    }

    /**
     * @param Money $PaymentAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ChangeFee
     */
    public function setPaymentAmount($PaymentAmount)
    {
      $this->PaymentAmount = $PaymentAmount;
      return $this;
    }

    /**
     * @return CurrencyCodeType
     */
    public function getPaymentCurrency()
    {
      return $this->PaymentCurrency;
    }

    /**
     * @param CurrencyCodeType $PaymentCurrency
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ChangeFee
     */
    public function setPaymentCurrency($PaymentCurrency)
    {
      $this->PaymentCurrency = $PaymentCurrency;
      return $this;
    }

    /**
     * @return int
     */
    public function getPaymentDecimalPlaces()
    {
      return $this->PaymentDecimalPlaces;
    }

    /**
     * @param int $PaymentDecimalPlaces
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ChangeFee
     */
    public function setPaymentDecimalPlaces($PaymentDecimalPlaces)
    {
      $this->PaymentDecimalPlaces = $PaymentDecimalPlaces;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getChangeFeeWaived()
    {
      return $this->ChangeFeeWaived;
    }

    /**
     * @param boolean $ChangeFeeWaived
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ChangeFee
     */
    public function setChangeFeeWaived($ChangeFeeWaived)
    {
      $this->ChangeFeeWaived = $ChangeFeeWaived;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getChangeFeeNotApplicable()
    {
      return $this->ChangeFeeNotApplicable;
    }

    /**
     * @param boolean $ChangeFeeNotApplicable
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ChangeFee
     */
    public function setChangeFeeNotApplicable($ChangeFeeNotApplicable)
    {
      $this->ChangeFeeNotApplicable = $ChangeFeeNotApplicable;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ChangeFee
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ChangeFee
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ChangeFee
     */
    public function setDecimalPlaces($DecimalPlaces)
    {
      $this->DecimalPlaces = $DecimalPlaces;
      return $this;
    }

}
