<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class SplitTaxes
{

    /**
     * @var boolean $ByLeg
     */
    protected $ByLeg = null;

    /**
     * @var boolean $ByFareComponent
     */
    protected $ByFareComponent = null;

    /**
     * @param boolean $ByLeg
     * @param boolean $ByFareComponent
     */
    public function __construct($ByLeg = null, $ByFareComponent = null)
    {
      $this->ByLeg = $ByLeg;
      $this->ByFareComponent = $ByFareComponent;
    }

    /**
     * @return boolean
     */
    public function getByLeg()
    {
      return $this->ByLeg;
    }

    /**
     * @param boolean $ByLeg
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SplitTaxes
     */
    public function setByLeg($ByLeg)
    {
      $this->ByLeg = $ByLeg;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getByFareComponent()
    {
      return $this->ByFareComponent;
    }

    /**
     * @param boolean $ByFareComponent
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SplitTaxes
     */
    public function setByFareComponent($ByFareComponent)
    {
      $this->ByFareComponent = $ByFareComponent;
      return $this;
    }

}
