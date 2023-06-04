<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class XOFares
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\XOFares
     */
    public function setInd($Ind)
    {
      $this->Ind = $Ind;
      return $this;
    }

}
