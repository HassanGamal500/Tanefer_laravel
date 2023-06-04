<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class ItinTotalFareCustom3
{

    /**
     * @var TotalFare $TotalFare
     */
    protected $TotalFare = null;

    /**
     * @param TotalFare $TotalFare
     */
    public function __construct($TotalFare = null)
    {
      $this->TotalFare = $TotalFare;
    }

    /**
     * @return TotalFare
     */
    public function getTotalFare()
    {
      return $this->TotalFare;
    }

    /**
     * @param TotalFare $TotalFare
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ItinTotalFareCustom3
     */
    public function setTotalFare($TotalFare)
    {
      $this->TotalFare = $TotalFare;
      return $this;
    }

}
