<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class OriginalItinerary
{

    /**
     * @var Taxes $Taxes
     */
    protected $Taxes = null;

    /**
     * @param Taxes $Taxes
     */
    public function __construct($Taxes = null)
    {
      $this->Taxes = $Taxes;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginalItinerary
     */
    public function setTaxes($Taxes)
    {
      $this->Taxes = $Taxes;
      return $this;
    }

}
