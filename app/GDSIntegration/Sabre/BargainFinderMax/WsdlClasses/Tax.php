<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Tax
{

    /**
     * @var AirTaxType $_
     */
    protected $_ = null;

    /**
     * @var Money $AdjustedAmount
     */
    protected $AdjustedAmount = null;

    /**
     * @param AirTaxType $_
     * @param Money $AdjustedAmount
     */
    public function __construct($_ = null, $AdjustedAmount = null)
    {
      $this->_ = $_;
      $this->AdjustedAmount = $AdjustedAmount;
    }

    /**
     * @return AirTaxType
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param AirTaxType $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Tax
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Tax
     */
    public function setAdjustedAmount($AdjustedAmount)
    {
      $this->AdjustedAmount = $AdjustedAmount;
      return $this;
    }

}
