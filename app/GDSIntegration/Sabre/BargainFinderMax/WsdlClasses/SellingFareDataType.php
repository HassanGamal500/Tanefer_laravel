<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class SellingFareDataType
{

    /**
     * @var HandlingMarkupSummaryType[] $HandlingMarkupSummary
     */
    protected $HandlingMarkupSummary = null;

    /**
     * @var AirTaxType[] $Tax
     */
    protected $Tax = null;

    /**
     * @var AirTaxSummaryType[] $TaxSummary
     */
    protected $TaxSummary = null;

    /**
     * @var string $LayerTypeName
     */
    protected $LayerTypeName = null;

    /**
     * @var MonetaryAmountType $BaseFareAmount
     */
    protected $BaseFareAmount = null;

    /**
     * @var MonetaryAmountType $ConstructedTotalAmount
     */
    protected $ConstructedTotalAmount = null;

    /**
     * @var MonetaryAmountType $EquivalentAmount
     */
    protected $EquivalentAmount = null;

    /**
     * @var MonetaryAmountType $TotalTaxes
     */
    protected $TotalTaxes = null;

    /**
     * @var MonetaryAmountType $TotalPerPassenger
     */
    protected $TotalPerPassenger = null;

    /**
     * @var string $FareCalculation
     */
    protected $FareCalculation = null;

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
     * @param string $LayerTypeName
     * @param MonetaryAmountType $BaseFareAmount
     * @param MonetaryAmountType $ConstructedTotalAmount
     * @param MonetaryAmountType $EquivalentAmount
     * @param MonetaryAmountType $TotalTaxes
     * @param MonetaryAmountType $TotalPerPassenger
     * @param string $FareCalculation
     * @param boolean $HiddenHandlingFee
     * @param boolean $NonHiddenHandlingFee
     * @param boolean $FareRetailerRule
     */
    public function __construct($LayerTypeName = null, $BaseFareAmount = null, $ConstructedTotalAmount = null, $EquivalentAmount = null, $TotalTaxes = null, $TotalPerPassenger = null, $FareCalculation = null, $HiddenHandlingFee = null, $NonHiddenHandlingFee = null, $FareRetailerRule = null)
    {
      $this->LayerTypeName = $LayerTypeName;
      $this->BaseFareAmount = $BaseFareAmount;
      $this->ConstructedTotalAmount = $ConstructedTotalAmount;
      $this->EquivalentAmount = $EquivalentAmount;
      $this->TotalTaxes = $TotalTaxes;
      $this->TotalPerPassenger = $TotalPerPassenger;
      $this->FareCalculation = $FareCalculation;
      $this->HiddenHandlingFee = $HiddenHandlingFee;
      $this->NonHiddenHandlingFee = $NonHiddenHandlingFee;
      $this->FareRetailerRule = $FareRetailerRule;
    }

    /**
     * @return HandlingMarkupSummaryType[]
     */
    public function getHandlingMarkupSummary()
    {
      return $this->HandlingMarkupSummary;
    }

    /**
     * @param HandlingMarkupSummaryType[] $HandlingMarkupSummary
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SellingFareDataType
     */
    public function setHandlingMarkupSummary(array $HandlingMarkupSummary = null)
    {
      $this->HandlingMarkupSummary = $HandlingMarkupSummary;
      return $this;
    }

    /**
     * @return AirTaxType[]
     */
    public function getTax()
    {
      return $this->Tax;
    }

    /**
     * @param AirTaxType[] $Tax
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SellingFareDataType
     */
    public function setTax(array $Tax = null)
    {
      $this->Tax = $Tax;
      return $this;
    }

    /**
     * @return AirTaxSummaryType[]
     */
    public function getTaxSummary()
    {
      return $this->TaxSummary;
    }

    /**
     * @param AirTaxSummaryType[] $TaxSummary
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SellingFareDataType
     */
    public function setTaxSummary(array $TaxSummary = null)
    {
      $this->TaxSummary = $TaxSummary;
      return $this;
    }

    /**
     * @return string
     */
    public function getLayerTypeName()
    {
      return $this->LayerTypeName;
    }

    /**
     * @param string $LayerTypeName
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SellingFareDataType
     */
    public function setLayerTypeName($LayerTypeName)
    {
      $this->LayerTypeName = $LayerTypeName;
      return $this;
    }

    /**
     * @return MonetaryAmountType
     */
    public function getBaseFareAmount()
    {
      return $this->BaseFareAmount;
    }

    /**
     * @param MonetaryAmountType $BaseFareAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SellingFareDataType
     */
    public function setBaseFareAmount($BaseFareAmount)
    {
      $this->BaseFareAmount = $BaseFareAmount;
      return $this;
    }

    /**
     * @return MonetaryAmountType
     */
    public function getConstructedTotalAmount()
    {
      return $this->ConstructedTotalAmount;
    }

    /**
     * @param MonetaryAmountType $ConstructedTotalAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SellingFareDataType
     */
    public function setConstructedTotalAmount($ConstructedTotalAmount)
    {
      $this->ConstructedTotalAmount = $ConstructedTotalAmount;
      return $this;
    }

    /**
     * @return MonetaryAmountType
     */
    public function getEquivalentAmount()
    {
      return $this->EquivalentAmount;
    }

    /**
     * @param MonetaryAmountType $EquivalentAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SellingFareDataType
     */
    public function setEquivalentAmount($EquivalentAmount)
    {
      $this->EquivalentAmount = $EquivalentAmount;
      return $this;
    }

    /**
     * @return MonetaryAmountType
     */
    public function getTotalTaxes()
    {
      return $this->TotalTaxes;
    }

    /**
     * @param MonetaryAmountType $TotalTaxes
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SellingFareDataType
     */
    public function setTotalTaxes($TotalTaxes)
    {
      $this->TotalTaxes = $TotalTaxes;
      return $this;
    }

    /**
     * @return MonetaryAmountType
     */
    public function getTotalPerPassenger()
    {
      return $this->TotalPerPassenger;
    }

    /**
     * @param MonetaryAmountType $TotalPerPassenger
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SellingFareDataType
     */
    public function setTotalPerPassenger($TotalPerPassenger)
    {
      $this->TotalPerPassenger = $TotalPerPassenger;
      return $this;
    }

    /**
     * @return string
     */
    public function getFareCalculation()
    {
      return $this->FareCalculation;
    }

    /**
     * @param string $FareCalculation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SellingFareDataType
     */
    public function setFareCalculation($FareCalculation)
    {
      $this->FareCalculation = $FareCalculation;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SellingFareDataType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SellingFareDataType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SellingFareDataType
     */
    public function setFareRetailerRule($FareRetailerRule)
    {
      $this->FareRetailerRule = $FareRetailerRule;
      return $this;
    }

}
