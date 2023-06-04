<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class HandlingMarkupDetail
{

    /**
     * @var string $MarkupHandlingFeeAppID
     */
    protected $MarkupHandlingFeeAppID = null;

    /**
     * @var string $MarkupTypeCode
     */
    protected $MarkupTypeCode = null;

    /**
     * @var Money $FareAmountAfterMarkup
     */
    protected $FareAmountAfterMarkup = null;

    /**
     * @var Money $MarkupAmount
     */
    protected $MarkupAmount = null;

    /**
     * @var CurrencyCodeType $AmountCurrency
     */
    protected $AmountCurrency = null;

    /**
     * @var PCCType $MarkupRuleSourcePCC
     */
    protected $MarkupRuleSourcePCC = null;

    /**
     * @var int $MarkupRuleItemNumber
     */
    protected $MarkupRuleItemNumber = null;

    /**
     * @var RetailerQualifierCodeType $RetailerRuleQualifier
     */
    protected $RetailerRuleQualifier = null;

    /**
     * @param string $MarkupHandlingFeeAppID
     * @param string $MarkupTypeCode
     * @param Money $FareAmountAfterMarkup
     * @param Money $MarkupAmount
     * @param CurrencyCodeType $AmountCurrency
     * @param PCCType $MarkupRuleSourcePCC
     * @param int $MarkupRuleItemNumber
     * @param RetailerQualifierCodeType $RetailerRuleQualifier
     */
    public function __construct($MarkupHandlingFeeAppID = null, $MarkupTypeCode = null, $FareAmountAfterMarkup = null, $MarkupAmount = null, $AmountCurrency = null, $MarkupRuleSourcePCC = null, $MarkupRuleItemNumber = null, $RetailerRuleQualifier = null)
    {
      $this->MarkupHandlingFeeAppID = $MarkupHandlingFeeAppID;
      $this->MarkupTypeCode = $MarkupTypeCode;
      $this->FareAmountAfterMarkup = $FareAmountAfterMarkup;
      $this->MarkupAmount = $MarkupAmount;
      $this->AmountCurrency = $AmountCurrency;
      $this->MarkupRuleSourcePCC = $MarkupRuleSourcePCC;
      $this->MarkupRuleItemNumber = $MarkupRuleItemNumber;
      $this->RetailerRuleQualifier = $RetailerRuleQualifier;
    }

    /**
     * @return string
     */
    public function getMarkupHandlingFeeAppID()
    {
      return $this->MarkupHandlingFeeAppID;
    }

    /**
     * @param string $MarkupHandlingFeeAppID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\HandlingMarkupDetail
     */
    public function setMarkupHandlingFeeAppID($MarkupHandlingFeeAppID)
    {
      $this->MarkupHandlingFeeAppID = $MarkupHandlingFeeAppID;
      return $this;
    }

    /**
     * @return string
     */
    public function getMarkupTypeCode()
    {
      return $this->MarkupTypeCode;
    }

    /**
     * @param string $MarkupTypeCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\HandlingMarkupDetail
     */
    public function setMarkupTypeCode($MarkupTypeCode)
    {
      $this->MarkupTypeCode = $MarkupTypeCode;
      return $this;
    }

    /**
     * @return Money
     */
    public function getFareAmountAfterMarkup()
    {
      return $this->FareAmountAfterMarkup;
    }

    /**
     * @param Money $FareAmountAfterMarkup
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\HandlingMarkupDetail
     */
    public function setFareAmountAfterMarkup($FareAmountAfterMarkup)
    {
      $this->FareAmountAfterMarkup = $FareAmountAfterMarkup;
      return $this;
    }

    /**
     * @return Money
     */
    public function getMarkupAmount()
    {
      return $this->MarkupAmount;
    }

    /**
     * @param Money $MarkupAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\HandlingMarkupDetail
     */
    public function setMarkupAmount($MarkupAmount)
    {
      $this->MarkupAmount = $MarkupAmount;
      return $this;
    }

    /**
     * @return CurrencyCodeType
     */
    public function getAmountCurrency()
    {
      return $this->AmountCurrency;
    }

    /**
     * @param CurrencyCodeType $AmountCurrency
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\HandlingMarkupDetail
     */
    public function setAmountCurrency($AmountCurrency)
    {
      $this->AmountCurrency = $AmountCurrency;
      return $this;
    }

    /**
     * @return PCCType
     */
    public function getMarkupRuleSourcePCC()
    {
      return $this->MarkupRuleSourcePCC;
    }

    /**
     * @param PCCType $MarkupRuleSourcePCC
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\HandlingMarkupDetail
     */
    public function setMarkupRuleSourcePCC($MarkupRuleSourcePCC)
    {
      $this->MarkupRuleSourcePCC = $MarkupRuleSourcePCC;
      return $this;
    }

    /**
     * @return int
     */
    public function getMarkupRuleItemNumber()
    {
      return $this->MarkupRuleItemNumber;
    }

    /**
     * @param int $MarkupRuleItemNumber
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\HandlingMarkupDetail
     */
    public function setMarkupRuleItemNumber($MarkupRuleItemNumber)
    {
      $this->MarkupRuleItemNumber = $MarkupRuleItemNumber;
      return $this;
    }

    /**
     * @return RetailerQualifierCodeType
     */
    public function getRetailerRuleQualifier()
    {
      return $this->RetailerRuleQualifier;
    }

    /**
     * @param RetailerQualifierCodeType $RetailerRuleQualifier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\HandlingMarkupDetail
     */
    public function setRetailerRuleQualifier($RetailerRuleQualifier)
    {
      $this->RetailerRuleQualifier = $RetailerRuleQualifier;
      return $this;
    }

}
