<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Price
{

    /**
     * @var PriorityType $Priority
     */
    protected $Priority = null;

    /**
     * @param PriorityType $Priority
     */
    public function __construct($Priority = null)
    {
      $this->Priority = $Priority;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Price
     */
    public function setPriority($Priority)
    {
      $this->Priority = $Priority;
      return $this;
    }

}
