<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareBasisCodes
{

    /**
     * @var FareBasisCode $FareBasisCode
     */
    protected $FareBasisCode = null;

    /**
     * @param FareBasisCode $FareBasisCode
     */
    public function __construct($FareBasisCode = null)
    {
      $this->FareBasisCode = $FareBasisCode;
    }

    /**
     * @return FareBasisCode
     */
    public function getFareBasisCode()
    {
      return $this->FareBasisCode;
    }

    /**
     * @param FareBasisCode $FareBasisCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisCodes
     */
    public function setFareBasisCode($FareBasisCode)
    {
      $this->FareBasisCode = $FareBasisCode;
      return $this;
    }

}
