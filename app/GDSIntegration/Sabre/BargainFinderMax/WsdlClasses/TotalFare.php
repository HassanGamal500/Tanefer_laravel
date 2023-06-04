<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TotalFare
{

    /**
     * @var Money $AdjustedAmount
     */
    protected $AdjustedAmount = null;

    /**
     * @var string $Amount
     * */
    protected $Amount;

    /**
     * @var string $CurrencyCode
     * */
    protected $CurrencyCode;

    /**
     * @var int $DecimalPlaces
     * */
    protected $DecimalPlaces;

    /**
     * @param Money $AdjustedAmount
     */
    public function __construct($AdjustedAmount = null)
    {
      $this->AdjustedAmount = $AdjustedAmount;
    }

    /**
     * @return Money
     */
    public function getAdjustedAmount()
    {
      return $this->AdjustedAmount;
    }

    /**
     * @param Money $AdjustedAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TotalFare
     */
    public function setAdjustedAmount($AdjustedAmount)
    {
      $this->AdjustedAmount = $AdjustedAmount;
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

    public function getDecimalPlaces()
    {
        return $this->DecimalPlaces;
    }

}
