<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ShowFareAmounts
{

    /**
     * @var boolean $Original
     */
    protected $Original = null;

    /**
     * @var boolean $Adjusted
     */
    protected $Adjusted = null;

    /**
     * @param boolean $Original
     * @param boolean $Adjusted
     */
    public function __construct($Original = null, $Adjusted = null)
    {
      $this->Original = $Original;
      $this->Adjusted = $Adjusted;
    }

    /**
     * @return boolean
     */
    public function getOriginal()
    {
      return $this->Original;
    }

    /**
     * @param boolean $Original
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ShowFareAmounts
     */
    public function setOriginal($Original)
    {
      $this->Original = $Original;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getAdjusted()
    {
      return $this->Adjusted;
    }

    /**
     * @param boolean $Adjusted
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ShowFareAmounts
     */
    public function setAdjusted($Adjusted)
    {
      $this->Adjusted = $Adjusted;
      return $this;
    }

}
