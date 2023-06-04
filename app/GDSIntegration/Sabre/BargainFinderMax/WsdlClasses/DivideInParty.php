<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class DivideInParty
{

    /**
     * @var boolean $Indicator
     */
    protected $Indicator = null;

    /**
     * @param boolean $Indicator
     */
    public function __construct($Indicator = null)
    {
      $this->Indicator = $Indicator;
    }

    /**
     * @return boolean
     */
    public function getIndicator()
    {
      return $this->Indicator;
    }

    /**
     * @param boolean $Indicator
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DivideInParty
     */
    public function setIndicator($Indicator)
    {
      $this->Indicator = $Indicator;
      return $this;
    }

}
