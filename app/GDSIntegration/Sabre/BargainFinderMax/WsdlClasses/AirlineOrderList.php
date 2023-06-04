<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AirlineOrderList
{

    /**
     * @var AirlineOrder $AirlineOrder
     */
    protected $AirlineOrder = null;

    /**
     * @param AirlineOrder $AirlineOrder
     */
    public function __construct($AirlineOrder = null)
    {
      $this->AirlineOrder = $AirlineOrder;
    }

    /**
     * @return AirlineOrder
     */
    public function getAirlineOrder()
    {
      return $this->AirlineOrder;
    }

    /**
     * @param AirlineOrder $AirlineOrder
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirlineOrderList
     */
    public function setAirlineOrder($AirlineOrder)
    {
      $this->AirlineOrder = $AirlineOrder;
      return $this;
    }

}
