<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class StayRestrictionsType
{

    /**
     * @var MinimumStay $MinimumStay
     */
    protected $MinimumStay = null;

    /**
     * @var MaximumStay $MaximumStay
     */
    protected $MaximumStay = null;

    /**
     * @var boolean $StayRestrictionsInd
     */
    protected $StayRestrictionsInd = null;

    /**
     * @param MinimumStay $MinimumStay
     * @param MaximumStay $MaximumStay
     * @param boolean $StayRestrictionsInd
     */
    public function __construct($MinimumStay = null, $MaximumStay = null, $StayRestrictionsInd = null)
    {
      $this->MinimumStay = $MinimumStay;
      $this->MaximumStay = $MaximumStay;
      $this->StayRestrictionsInd = $StayRestrictionsInd;
    }

    /**
     * @return MinimumStay
     */
    public function getMinimumStay()
    {
      return $this->MinimumStay;
    }

    /**
     * @param MinimumStay $MinimumStay
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StayRestrictionsType
     */
    public function setMinimumStay($MinimumStay)
    {
      $this->MinimumStay = $MinimumStay;
      return $this;
    }

    /**
     * @return MaximumStay
     */
    public function getMaximumStay()
    {
      return $this->MaximumStay;
    }

    /**
     * @param MaximumStay $MaximumStay
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StayRestrictionsType
     */
    public function setMaximumStay($MaximumStay)
    {
      $this->MaximumStay = $MaximumStay;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getStayRestrictionsInd()
    {
      return $this->StayRestrictionsInd;
    }

    /**
     * @param boolean $StayRestrictionsInd
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StayRestrictionsType
     */
    public function setStayRestrictionsInd($StayRestrictionsInd)
    {
      $this->StayRestrictionsInd = $StayRestrictionsInd;
      return $this;
    }

}
