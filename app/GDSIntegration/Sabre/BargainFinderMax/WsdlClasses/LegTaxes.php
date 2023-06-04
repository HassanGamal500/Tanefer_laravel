<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class LegTaxes
{

    /**
     * @var AirTaxType $Tax
     */
    protected $Tax = null;

    /**
     * @var AirTaxSummaryType $TaxSummary
     */
    protected $TaxSummary = null;

    /**
     * @var int $Number
     */
    protected $Number = null;

    /**
     * @param AirTaxType $Tax
     * @param AirTaxSummaryType $TaxSummary
     * @param int $Number
     */
    public function __construct($Tax = null, $TaxSummary = null, $Number = null)
    {
      $this->Tax = $Tax;
      $this->TaxSummary = $TaxSummary;
      $this->Number = $Number;
    }

    /**
     * @return AirTaxType
     */
    public function getTax()
    {
      return $this->Tax;
    }

    /**
     * @param AirTaxType $Tax
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\LegTaxes
     */
    public function setTax($Tax)
    {
      $this->Tax = $Tax;
      return $this;
    }

    /**
     * @return AirTaxSummaryType
     */
    public function getTaxSummary()
    {
      return $this->TaxSummary;
    }

    /**
     * @param AirTaxSummaryType $TaxSummary
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\LegTaxes
     */
    public function setTaxSummary($TaxSummary)
    {
      $this->TaxSummary = $TaxSummary;
      return $this;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
      return $this->Number;
    }

    /**
     * @param int $Number
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\LegTaxes
     */
    public function setNumber($Number)
    {
      $this->Number = $Number;
      return $this;
    }

}
