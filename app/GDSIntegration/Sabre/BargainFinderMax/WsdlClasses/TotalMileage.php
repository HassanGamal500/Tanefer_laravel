<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TotalMileage
{

    /**
     * @var UNKNOWN $Amount
     */
    protected $Amount = null;

    /**
     * @param UNKNOWN $Amount
     */
    public function __construct($Amount = null)
    {
      $this->Amount = $Amount;
    }

    /**
     * @return UNKNOWN
     */
    public function getAmount()
    {
      return $this->Amount;
    }

    /**
     * @param UNKNOWN $Amount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TotalMileage
     */
    public function setAmount($Amount)
    {
      $this->Amount = $Amount;
      return $this;
    }

}
