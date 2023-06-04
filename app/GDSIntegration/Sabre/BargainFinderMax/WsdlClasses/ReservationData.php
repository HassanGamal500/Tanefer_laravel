<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ReservationData
{

    /**
     * @var string $DKNumber
     */
    protected $DKNumber = null;

    /**
     * @param string $DKNumber
     */
    public function __construct($DKNumber = null)
    {
      $this->DKNumber = $DKNumber;
    }

    /**
     * @return string
     */
    public function getDKNumber()
    {
      return $this->DKNumber;
    }

    /**
     * @param string $DKNumber
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ReservationData
     */
    public function setDKNumber($DKNumber)
    {
      $this->DKNumber = $DKNumber;
      return $this;
    }

}
