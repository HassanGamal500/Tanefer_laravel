<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class maxRelFareLvlOfxForNonStp
{

    /**
     * @var float $Value
     */
    protected $Value = null;

    /**
     * @param float $Value
     */
    public function __construct($Value = null)
    {
      $this->Value = $Value;
    }

    /**
     * @return float
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param float $Value
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\maxRelFareLvlOfxForNonStp
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
