<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TotalTax
{

    /**
     * @var string $Amount
     * */
    protected $Amount;

    /**
     * @var string $CurrencyCode
     * */
    protected $CurrencyCode;

    /**
     * @var Money $AmountAdjustment
     */
    protected $AmountAdjustment = null;

    /**
     * @param Money $AmountAdjustment
     */
    public function __construct($AmountAdjustment = null)
    {
      $this->AmountAdjustment = $AmountAdjustment;
    }

    /**
     * @return Money
     */
    public function getAmountAdjustment()
    {
      return $this->AmountAdjustment;
    }

    /**
     * @param Money $AmountAdjustment
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TotalTax
     */
    public function setAmountAdjustment($AmountAdjustment)
    {
      $this->AmountAdjustment = $AmountAdjustment;
      return $this;
    }

    public function getAmount()
    {
        return $this->Amount;
    }

    public function getCurrencyCode()
    {
        return $this->CurrencyCode;
    }


}
