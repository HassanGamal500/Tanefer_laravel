<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Fees
{

    /**
     * @var AirFeeType $Fee
     */
    protected $Fee = null;

    /**
     * @param AirFeeType $Fee
     */
    public function __construct($Fee = null)
    {
      $this->Fee = $Fee;
    }

    /**
     * @return AirFeeType
     */
    public function getFee()
    {
      return $this->Fee;
    }

    /**
     * @param AirFeeType $Fee
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Fees
     */
    public function setFee($Fee)
    {
      $this->Fee = $Fee;
      return $this;
    }

}
