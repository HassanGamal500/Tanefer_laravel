<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PublicFare
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PublicFare
     */
    public function setInd($Ind)
    {
      $this->Ind = $Ind;
      return $this;
    }

}
