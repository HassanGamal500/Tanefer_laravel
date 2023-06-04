<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ResTicketingRules
{

    /**
     * @var AdvResTicketingType $AdvResTicketing
     */
    protected $AdvResTicketing = null;

    /**
     * @param AdvResTicketingType $AdvResTicketing
     */
    public function __construct($AdvResTicketing = null)
    {
      $this->AdvResTicketing = $AdvResTicketing;
    }

    /**
     * @return AdvResTicketingType
     */
    public function getAdvResTicketing()
    {
      return $this->AdvResTicketing;
    }

    /**
     * @param AdvResTicketingType $AdvResTicketing
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ResTicketingRules
     */
    public function setAdvResTicketing($AdvResTicketing)
    {
      $this->AdvResTicketing = $AdvResTicketing;
      return $this;
    }

}
