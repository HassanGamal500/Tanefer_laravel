<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class EquivFare
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
     * @var Money $EffectivePriceDeviation
     */
    protected $EffectivePriceDeviation = null;

    /**
     * @param Money $EffectivePriceDeviation
     */
    public function __construct($EffectivePriceDeviation = null)
    {
      $this->EffectivePriceDeviation = $EffectivePriceDeviation;
    }

    /**
     * @return Money
     */
    public function getEffectivePriceDeviation()
    {
      return $this->EffectivePriceDeviation;
    }

    /**
     * @param Money $EffectivePriceDeviation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\EquivFare
     */
    public function setEffectivePriceDeviation($EffectivePriceDeviation)
    {
      $this->EffectivePriceDeviation = $EffectivePriceDeviation;
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
