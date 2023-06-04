<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class MinMaxStay
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MinMaxStay
     */
    public function setInd($Ind)
    {
      $this->Ind = $Ind;
      return $this;
    }

}
