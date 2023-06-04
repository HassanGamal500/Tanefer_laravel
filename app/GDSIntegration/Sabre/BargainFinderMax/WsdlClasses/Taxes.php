<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Taxes
{

    /**
     * @var AirTaxType $Tax
     */
    protected $Tax = null;

    /**
     * @var AirTaxSummaryType $TaxSummary
     * */
    protected $TaxSummary;

    /**
     * @var TotalTax $TotalTax
     * */
    protected $TotalTax;

    /**
     * @param AirTaxType $Tax
     */
    public function __construct($Tax = null)
    {
      $this->Tax = $Tax;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Taxes
     */
    public function setTax($Tax)
    {
      $this->Tax = $Tax;
      return $this;
    }

    public function getTotalTax()
    {
        return $this->TotalTax;
    }
}
