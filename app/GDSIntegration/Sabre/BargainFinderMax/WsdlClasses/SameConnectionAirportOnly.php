<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class SameConnectionAirportOnly
{

    /**
     * @var boolean $Ind
     */
    protected $Ind = null;

    /**
     * @param boolean $Ind
     */
    public function __construct($Ind = null)
    {
      $this->Ind = $Ind;
    }

    /**
     * @return boolean
     */
    public function getInd()
    {
      return $this->Ind;
    }

    /**
     * @param boolean $Ind
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SameConnectionAirportOnly
     */
    public function setInd($Ind)
    {
      $this->Ind = $Ind;
      return $this;
    }

}
