<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PTC_FareBreakdowns
{

    /**
     * @var PTCFareBreakdownType $PTC_FareBreakdown
     */
    protected $PTC_FareBreakdown = null;

    /**
     * @param PTCFareBreakdownType $PTC_FareBreakdown
     */
    public function __construct($PTC_FareBreakdown = null)
    {
      $this->PTC_FareBreakdown = $PTC_FareBreakdown;
    }

    /**
     * @return PTCFareBreakdownType
     */
    public function getPTC_FareBreakdown()
    {
      return $this->PTC_FareBreakdown;
    }

    /**
     * @param PTCFareBreakdownType $PTC_FareBreakdown
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PTC_FareBreakdowns
     */
    public function setPTC_FareBreakdown($PTC_FareBreakdown)
    {
      $this->PTC_FareBreakdown = $PTC_FareBreakdown;
      return $this;
    }

}
