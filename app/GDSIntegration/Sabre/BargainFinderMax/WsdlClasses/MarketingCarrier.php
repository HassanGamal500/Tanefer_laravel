<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class MarketingCarrier
{

    /**
     * @var Carrier $Carrier
     */
    protected $Carrier = null;

    /**
     * @var PriorityType $Priority
     */
    protected $Priority = null;

    /**
     * @var int $Leg
     */
    protected $Leg = null;

    /**
     * @param Carrier $Carrier
     * @param PriorityType $Priority
     * @param int $Leg
     */
    public function __construct($Carrier = null, $Priority = null, $Leg = null)
    {
      $this->Carrier = $Carrier;
      $this->Priority = $Priority;
      $this->Leg = $Leg;
    }

    /**
     * @return Carrier
     */
    public function getCarrier()
    {
      return $this->Carrier;
    }

    /**
     * @param Carrier $Carrier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MarketingCarrier
     */
    public function setCarrier($Carrier)
    {
      $this->Carrier = $Carrier;
      return $this;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MarketingCarrier
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MarketingCarrier
     */
    public function setLeg($Leg)
    {
      $this->Leg = $Leg;
      return $this;
    }

}
