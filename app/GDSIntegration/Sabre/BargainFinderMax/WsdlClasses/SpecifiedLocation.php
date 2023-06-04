<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class SpecifiedLocation
{

    /**
     * @var anonymous96 $LocationCode
     */
    protected $LocationCode = null;

    /**
     * @param anonymous96 $LocationCode
     */
    public function __construct($LocationCode = null)
    {
      $this->LocationCode = $LocationCode;
    }

    /**
     * @return anonymous96
     */
    public function getLocationCode()
    {
      return $this->LocationCode;
    }

    /**
     * @param anonymous96 $LocationCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SpecifiedLocation
     */
    public function setLocationCode($LocationCode)
    {
      $this->LocationCode = $LocationCode;
      return $this;
    }

}
