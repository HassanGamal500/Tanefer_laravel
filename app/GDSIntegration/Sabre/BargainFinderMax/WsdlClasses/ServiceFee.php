<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ServiceFee
{

    /**
     * @var Money $Amount
     */
    protected $Amount = null;

    /**
     * @var Money $TaxAmount
     */
    protected $TaxAmount = null;

    /**
     * @param Money $Amount
     * @param Money $TaxAmount
     */
    public function __construct($Amount = null, $TaxAmount = null)
    {
      $this->Amount = $Amount;
      $this->TaxAmount = $TaxAmount;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ServiceFee
     */
    public function setAmount($Amount)
    {
      $this->Amount = $Amount;
      return $this;
    }

    /**
     * @return Money
     */
    public function getTaxAmount()
    {
      return $this->TaxAmount;
    }

    /**
     * @param Money $TaxAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ServiceFee
     */
    public function setTaxAmount($TaxAmount)
    {
      $this->TaxAmount = $TaxAmount;
      return $this;
    }

}
