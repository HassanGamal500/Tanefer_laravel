<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PassengerPriceAdjustmentType extends PriceAdjustmentType
{

    /**
     * @var int $PassengerID
     */
    protected $PassengerID = null;

    /**
     * @param int $PassengerID
     */
    public function __construct($PassengerID = null)
    {
      parent::__construct();
      $this->PassengerID = $PassengerID;
    }

    /**
     * @return int
     */
    public function getPassengerID()
    {
      return $this->PassengerID;
    }

    /**
     * @param int $PassengerID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PassengerPriceAdjustmentType
     */
    public function setPassengerID($PassengerID)
    {
      $this->PassengerID = $PassengerID;
      return $this;
    }

}
