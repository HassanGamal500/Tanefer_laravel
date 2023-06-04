<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Vendor
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Vendor
     */
    public function setPriority($Priority)
    {
      $this->Priority = $Priority;
      return $this;
    }

}
