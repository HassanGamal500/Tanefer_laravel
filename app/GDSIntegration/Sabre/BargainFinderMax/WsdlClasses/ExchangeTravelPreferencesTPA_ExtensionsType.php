<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ExchangeTravelPreferencesTPA_ExtensionsType
{

    /**
     * @var ExemptAllTaxes $ExemptAllTaxes
     */
    protected $ExemptAllTaxes = null;

    /**
     * @var ExemptAllTaxesAndFees $ExemptAllTaxesAndFees
     */
    protected $ExemptAllTaxesAndFees = null;

    /**
     * @var Taxes $Taxes
     */
    protected $Taxes = null;

    /**
     * @var TaxCodeType $ExemptTax
     */
    protected $ExemptTax = null;

    /**
     * @var SettlementMethodType $SettlementMethod
     */
    protected $SettlementMethod = null;

    /**
     * @param ExemptAllTaxes $ExemptAllTaxes
     * @param ExemptAllTaxesAndFees $ExemptAllTaxesAndFees
     * @param Taxes $Taxes
     * @param TaxCodeType $ExemptTax
     */
    public function __construct($ExemptAllTaxes = null, $ExemptAllTaxesAndFees = null, $Taxes = null, $ExemptTax = null)
    {
      $this->ExemptAllTaxes = $ExemptAllTaxes;
      $this->ExemptAllTaxesAndFees = $ExemptAllTaxesAndFees;
      $this->Taxes = $Taxes;
      $this->ExemptTax = $ExemptTax;
    }

    /**
     * @return ExemptAllTaxes
     */
    public function getExemptAllTaxes()
    {
      return $this->ExemptAllTaxes;
    }

    /**
     * @param ExemptAllTaxes $ExemptAllTaxes
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeTravelPreferencesTPA_ExtensionsType
     */
    public function setExemptAllTaxes($ExemptAllTaxes)
    {
      $this->ExemptAllTaxes = $ExemptAllTaxes;
      return $this;
    }

    /**
     * @return ExemptAllTaxesAndFees
     */
    public function getExemptAllTaxesAndFees()
    {
      return $this->ExemptAllTaxesAndFees;
    }

    /**
     * @param ExemptAllTaxesAndFees $ExemptAllTaxesAndFees
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeTravelPreferencesTPA_ExtensionsType
     */
    public function setExemptAllTaxesAndFees($ExemptAllTaxesAndFees)
    {
      $this->ExemptAllTaxesAndFees = $ExemptAllTaxesAndFees;
      return $this;
    }

    /**
     * @return Taxes
     */
    public function getTaxes()
    {
      return $this->Taxes;
    }

    /**
     * @param Taxes $Taxes
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeTravelPreferencesTPA_ExtensionsType
     */
    public function setTaxes($Taxes)
    {
      $this->Taxes = $Taxes;
      return $this;
    }

    /**
     * @return TaxCodeType
     */
    public function getExemptTax()
    {
      return $this->ExemptTax;
    }

    /**
     * @param TaxCodeType $ExemptTax
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeTravelPreferencesTPA_ExtensionsType
     */
    public function setExemptTax($ExemptTax)
    {
      $this->ExemptTax = $ExemptTax;
      return $this;
    }

    /**
     * @return SettlementMethodType
     */
    public function getSettlementMethod()
    {
      return $this->SettlementMethod;
    }

    /**
     * @param SettlementMethodType $SettlementMethod
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeTravelPreferencesTPA_ExtensionsType
     */
    public function setSettlementMethod($SettlementMethod)
    {
      $this->SettlementMethod = $SettlementMethod;
      return $this;
    }

}
