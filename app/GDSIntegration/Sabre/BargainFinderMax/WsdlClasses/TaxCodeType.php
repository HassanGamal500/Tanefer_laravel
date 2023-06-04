<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TaxCodeType
{

    /**
     * @var anonymous333 $TaxCode
     */
    protected $TaxCode = null;

    /**
     * @param anonymous333 $TaxCode
     */
    public function __construct($TaxCode = null)
    {
      $this->TaxCode = $TaxCode;
    }

    /**
     * @return anonymous333
     */
    public function getTaxCode()
    {
      return $this->TaxCode;
    }

    /**
     * @param anonymous333 $TaxCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TaxCodeType
     */
    public function setTaxCode($TaxCode)
    {
      $this->TaxCode = $TaxCode;
      return $this;
    }

}
