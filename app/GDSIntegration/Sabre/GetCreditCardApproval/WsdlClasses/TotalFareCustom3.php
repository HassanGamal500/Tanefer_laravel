<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class TotalFareCustom3
{

    /**
     * @var string $Amount
     */
    protected $Amount = null;

    /**
     * @var string $CurrencyCode
     */
    protected $CurrencyCode = null;

    /**
     * @param string $Amount
     * @param string $CurrencyCode
     */
    public function __construct($Amount = null, $CurrencyCode = null)
    {
      $this->Amount = $Amount;
      $this->CurrencyCode = $CurrencyCode;
    }

    /**
     * @return string
     */
    public function getAmount()
    {
      return $this->Amount;
    }

    /**
     * @param string $Amount
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\TotalFareCustom3
     */
    public function setAmount($Amount)
    {
      $this->Amount = $Amount;
      return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
      return $this->CurrencyCode;
    }

    /**
     * @param string $CurrencyCode
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\TotalFareCustom3
     */
    public function setCurrencyCode($CurrencyCode)
    {
      $this->CurrencyCode = $CurrencyCode;
      return $this;
    }

}
