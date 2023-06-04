<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Mileage
{

    /**
     * @var int $Amount
     */
    protected $Amount = null;

    /**
     * @param int $Amount
     */
    public function __construct($Amount = null)
    {
      $this->Amount = $Amount;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
      return $this->Amount;
    }

    /**
     * @param int $Amount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Mileage
     */
    public function setAmount($Amount)
    {
      $this->Amount = $Amount;
      return $this;
    }

}
