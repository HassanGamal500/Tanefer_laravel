<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Fare
{

    /**
     * @var Adjustment $Adjustment
     */
    protected $Adjustment = null;

    /**
     * @param Adjustment $Adjustment
     */
    public function __construct($Adjustment = null)
    {
      $this->Adjustment = $Adjustment;
    }

    /**
     * @return Adjustment
     */
    public function getAdjustment()
    {
      return $this->Adjustment;
    }

    /**
     * @param Adjustment $Adjustment
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Fare
     */
    public function setAdjustment($Adjustment)
    {
      $this->Adjustment = $Adjustment;
      return $this;
    }

}
