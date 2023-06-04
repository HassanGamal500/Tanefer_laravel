<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Legs
{

    /**
     * @var Leg $Leg
     */
    protected $Leg = null;

    /**
     * @param Leg $Leg
     */
    public function __construct($Leg = null)
    {
      $this->Leg = $Leg;
    }

    /**
     * @return Leg
     */
    public function getLeg()
    {
      return $this->Leg;
    }

    /**
     * @param Leg $Leg
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Legs
     */
    public function setLeg($Leg)
    {
      $this->Leg = $Leg;
      return $this;
    }

}
