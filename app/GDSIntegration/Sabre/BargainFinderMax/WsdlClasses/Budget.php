<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Budget
{

    /**
     * @var UNKNOWN $MinimumPrice
     */
    protected $MinimumPrice = null;

    /**
     * @var UNKNOWN $MaximumPrice
     */
    protected $MaximumPrice = null;

    /**
     * @var SignedCountOrPercentage $RelativePriceThreshold
     */
    protected $RelativePriceThreshold = null;

    /**
     * @param UNKNOWN $MinimumPrice
     * @param UNKNOWN $MaximumPrice
     * @param SignedCountOrPercentage $RelativePriceThreshold
     */
    public function __construct($MinimumPrice = null, $MaximumPrice = null, $RelativePriceThreshold = null)
    {
      $this->MinimumPrice = $MinimumPrice;
      $this->MaximumPrice = $MaximumPrice;
      $this->RelativePriceThreshold = $RelativePriceThreshold;
    }

    /**
     * @return UNKNOWN
     */
    public function getMinimumPrice()
    {
      return $this->MinimumPrice;
    }

    /**
     * @param UNKNOWN $MinimumPrice
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Budget
     */
    public function setMinimumPrice($MinimumPrice)
    {
      $this->MinimumPrice = $MinimumPrice;
      return $this;
    }

    /**
     * @return UNKNOWN
     */
    public function getMaximumPrice()
    {
      return $this->MaximumPrice;
    }

    /**
     * @param UNKNOWN $MaximumPrice
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Budget
     */
    public function setMaximumPrice($MaximumPrice)
    {
      $this->MaximumPrice = $MaximumPrice;
      return $this;
    }

    /**
     * @return SignedCountOrPercentage
     */
    public function getRelativePriceThreshold()
    {
      return $this->RelativePriceThreshold;
    }

    /**
     * @param SignedCountOrPercentage $RelativePriceThreshold
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Budget
     */
    public function setRelativePriceThreshold($RelativePriceThreshold)
    {
      $this->RelativePriceThreshold = $RelativePriceThreshold;
      return $this;
    }

}
