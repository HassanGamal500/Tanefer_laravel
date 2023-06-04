<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareComponentsTaxes
{

    /**
     * @var FareComponentTaxesType $FareComponentTaxes
     */
    protected $FareComponentTaxes = null;

    /**
     * @param FareComponentTaxesType $FareComponentTaxes
     */
    public function __construct($FareComponentTaxes = null)
    {
      $this->FareComponentTaxes = $FareComponentTaxes;
    }

    /**
     * @return FareComponentTaxesType
     */
    public function getFareComponentTaxes()
    {
      return $this->FareComponentTaxes;
    }

    /**
     * @param FareComponentTaxesType $FareComponentTaxes
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponentsTaxes
     */
    public function setFareComponentTaxes($FareComponentTaxes)
    {
      $this->FareComponentTaxes = $FareComponentTaxes;
      return $this;
    }

}
