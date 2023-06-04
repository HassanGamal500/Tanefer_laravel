<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class MultiAirportCodes
{

    /**
     * @var boolean $EnableOpenJaw
     */
    protected $EnableOpenJaw = null;

    /**
     * @param boolean $EnableOpenJaw
     */
    public function __construct($EnableOpenJaw = null)
    {
      $this->EnableOpenJaw = $EnableOpenJaw;
    }

    /**
     * @return boolean
     */
    public function getEnableOpenJaw()
    {
      return $this->EnableOpenJaw;
    }

    /**
     * @param boolean $EnableOpenJaw
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MultiAirportCodes
     */
    public function setEnableOpenJaw($EnableOpenJaw)
    {
      $this->EnableOpenJaw = $EnableOpenJaw;
      return $this;
    }

}
