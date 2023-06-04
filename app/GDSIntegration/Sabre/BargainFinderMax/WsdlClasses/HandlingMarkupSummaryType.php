<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class HandlingMarkupSummaryType
{

    /**
     * @var CharacterType $TypeCode
     */
    protected $TypeCode = null;

    /**
     * @var string $Description
     */
    protected $Description = null;

    /**
     * @var string $ExtendedDescription
     */
    protected $ExtendedDescription = null;

    /**
     * @var Money $MonetaryAmountValue
     */
    protected $MonetaryAmountValue = null;

    /**
     * @var boolean $HiddenHandlingFee
     */
    protected $HiddenHandlingFee = null;

    /**
     * @var boolean $NonHiddenHandlingFee
     */
    protected $NonHiddenHandlingFee = null;

    /**
     * @var boolean $FareRetailerRule
     */
    protected $FareRetailerRule = null;

    /**
     * @param CharacterType $TypeCode
     * @param string $Description
     * @param string $ExtendedDescription
     * @param Money $MonetaryAmountValue
     * @param boolean $HiddenHandlingFee
     * @param boolean $NonHiddenHandlingFee
     * @param boolean $FareRetailerRule
     */
    public function __construct($TypeCode = null, $Description = null, $ExtendedDescription = null, $MonetaryAmountValue = null, $HiddenHandlingFee = null, $NonHiddenHandlingFee = null, $FareRetailerRule = null)
    {
      $this->TypeCode = $TypeCode;
      $this->Description = $Description;
      $this->ExtendedDescription = $ExtendedDescription;
      $this->MonetaryAmountValue = $MonetaryAmountValue;
      $this->HiddenHandlingFee = $HiddenHandlingFee;
      $this->NonHiddenHandlingFee = $NonHiddenHandlingFee;
      $this->FareRetailerRule = $FareRetailerRule;
    }

    /**
     * @return CharacterType
     */
    public function getTypeCode()
    {
      return $this->TypeCode;
    }

    /**
     * @param CharacterType $TypeCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\HandlingMarkupSummaryType
     */
    public function setTypeCode($TypeCode)
    {
      $this->TypeCode = $TypeCode;
      return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
      return $this->Description;
    }

    /**
     * @param string $Description
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\HandlingMarkupSummaryType
     */
    public function setDescription($Description)
    {
      $this->Description = $Description;
      return $this;
    }

    /**
     * @return string
     */
    public function getExtendedDescription()
    {
      return $this->ExtendedDescription;
    }

    /**
     * @param string $ExtendedDescription
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\HandlingMarkupSummaryType
     */
    public function setExtendedDescription($ExtendedDescription)
    {
      $this->ExtendedDescription = $ExtendedDescription;
      return $this;
    }

    /**
     * @return Money
     */
    public function getMonetaryAmountValue()
    {
      return $this->MonetaryAmountValue;
    }

    /**
     * @param Money $MonetaryAmountValue
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\HandlingMarkupSummaryType
     */
    public function setMonetaryAmountValue($MonetaryAmountValue)
    {
      $this->MonetaryAmountValue = $MonetaryAmountValue;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getHiddenHandlingFee()
    {
      return $this->HiddenHandlingFee;
    }

    /**
     * @param boolean $HiddenHandlingFee
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\HandlingMarkupSummaryType
     */
    public function setHiddenHandlingFee($HiddenHandlingFee)
    {
      $this->HiddenHandlingFee = $HiddenHandlingFee;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getNonHiddenHandlingFee()
    {
      return $this->NonHiddenHandlingFee;
    }

    /**
     * @param boolean $NonHiddenHandlingFee
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\HandlingMarkupSummaryType
     */
    public function setNonHiddenHandlingFee($NonHiddenHandlingFee)
    {
      $this->NonHiddenHandlingFee = $NonHiddenHandlingFee;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getFareRetailerRule()
    {
      return $this->FareRetailerRule;
    }

    /**
     * @param boolean $FareRetailerRule
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\HandlingMarkupSummaryType
     */
    public function setFareRetailerRule($FareRetailerRule)
    {
      $this->FareRetailerRule = $FareRetailerRule;
      return $this;
    }

}
