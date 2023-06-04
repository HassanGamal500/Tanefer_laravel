<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class OBFees
{

    /**
     * @var OBFeeType $OBFee
     */
    protected $OBFee = null;

    /**
     * @var Money $TTypeAmount
     */
    protected $TTypeAmount = null;

    /**
     * @param OBFeeType $OBFee
     * @param Money $TTypeAmount
     */
    public function __construct($OBFee = null, $TTypeAmount = null)
    {
      $this->OBFee = $OBFee;
      $this->TTypeAmount = $TTypeAmount;
    }

    /**
     * @return OBFeeType
     */
    public function getOBFee()
    {
      return $this->OBFee;
    }

    /**
     * @param OBFeeType $OBFee
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OBFees
     */
    public function setOBFee($OBFee)
    {
      $this->OBFee = $OBFee;
      return $this;
    }

    /**
     * @return Money
     */
    public function getTTypeAmount()
    {
      return $this->TTypeAmount;
    }

    /**
     * @param Money $TTypeAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OBFees
     */
    public function setTTypeAmount($TTypeAmount)
    {
      $this->TTypeAmount = $TTypeAmount;
      return $this;
    }

}
