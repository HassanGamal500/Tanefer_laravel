<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareInfos
{

    /**
     * @var FareInfo $FareInfo
     */
    protected $FareInfo = null;

    /**
     * @param FareInfo $FareInfo
     */
    public function __construct($FareInfo = null)
    {
      $this->FareInfo = $FareInfo;
    }

    /**
     * @return FareInfo
     */
    public function getFareInfo()
    {
      return $this->FareInfo;
    }

    /**
     * @param FareInfo $FareInfo
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareInfos
     */
    public function setFareInfo($FareInfo)
    {
      $this->FareInfo = $FareInfo;
      return $this;
    }

}
