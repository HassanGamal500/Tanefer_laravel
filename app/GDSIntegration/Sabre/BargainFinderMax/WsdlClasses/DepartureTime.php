<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class DepartureTime
{

    /**
     * @var PriorityType $Priority
     */
    protected $Priority = null;

    /**
     * @var int $Leg
     */
    protected $Leg = null;

    /**
     * @param PriorityType $Priority
     * @param int $Leg
     */
    public function __construct($Priority = null, $Leg = null)
    {
      $this->Priority = $Priority;
      $this->Leg = $Leg;
    }

    /**
     * @return PriorityType
     */
    public function getPriority()
    {
      return $this->Priority;
    }

    /**
     * @param PriorityType $Priority
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DepartureTime
     */
    public function setPriority($Priority)
    {
      $this->Priority = $Priority;
      return $this;
    }

    /**
     * @return int
     */
    public function getLeg()
    {
      return $this->Leg;
    }

    /**
     * @param int $Leg
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DepartureTime
     */
    public function setLeg($Leg)
    {
      $this->Leg = $Leg;
      return $this;
    }

}
