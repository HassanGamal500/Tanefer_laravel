<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareOverrides
{

    /**
     * @var FareOverride $FareOverride
     */
    protected $FareOverride = null;

    /**
     * @param FareOverride $FareOverride
     */
    public function __construct($FareOverride = null)
    {
      $this->FareOverride = $FareOverride;
    }

    /**
     * @return FareOverride
     */
    public function getFareOverride()
    {
      return $this->FareOverride;
    }

    /**
     * @param FareOverride $FareOverride
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareOverrides
     */
    public function setFareOverride($FareOverride)
    {
      $this->FareOverride = $FareOverride;
      return $this;
    }

}
