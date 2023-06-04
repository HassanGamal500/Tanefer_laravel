<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AlternateLocation
{

    /**
     * @var anonymous98 $LocationCode
     */
    protected $LocationCode = null;

    /**
     * @param anonymous98 $LocationCode
     */
    public function __construct($LocationCode = null)
    {
      $this->LocationCode = $LocationCode;
    }

    /**
     * @return anonymous98
     */
    public function getLocationCode()
    {
      return $this->LocationCode;
    }

    /**
     * @param anonymous98 $LocationCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AlternateLocation
     */
    public function setLocationCode($LocationCode)
    {
      $this->LocationCode = $LocationCode;
      return $this;
    }

}
