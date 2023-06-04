<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class DiversitySwapper
{

    /**
     * @var float $WeighedPriceAmount
     */
    protected $WeighedPriceAmount = null;

    /**
     * @param float $WeighedPriceAmount
     */
    public function __construct($WeighedPriceAmount = null)
    {
      $this->WeighedPriceAmount = $WeighedPriceAmount;
    }

    /**
     * @return float
     */
    public function getWeighedPriceAmount()
    {
      return $this->WeighedPriceAmount;
    }

    /**
     * @param float $WeighedPriceAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DiversitySwapper
     */
    public function setWeighedPriceAmount($WeighedPriceAmount)
    {
      $this->WeighedPriceAmount = $WeighedPriceAmount;
      return $this;
    }

}
