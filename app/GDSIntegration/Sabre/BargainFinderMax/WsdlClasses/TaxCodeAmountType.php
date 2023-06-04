<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TaxCodeAmountType extends TaxCodeType
{

    /**
     * @var Money $Amount
     */
    protected $Amount = null;

    /**
     * @param anonymous333 $TaxCode
     * @param Money $Amount
     */
    public function __construct($TaxCode = null, $Amount = null)
    {
      parent::__construct($TaxCode);
      $this->Amount = $Amount;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TaxCodeAmountType
     */
    public function setAmount($Amount)
    {
      $this->Amount = $Amount;
      return $this;
    }

}
