<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class OrderStandardBag
{

    /**
     * @var PassengerBags $PassengerBags
     */
    protected $PassengerBags = null;

    /**
     * @param PassengerBags $PassengerBags
     */
    public function __construct($PassengerBags = null)
    {
      $this->PassengerBags = $PassengerBags;
    }

    /**
     * @return PassengerBags
     */
    public function getPassengerBags()
    {
      return $this->PassengerBags;
    }

    /**
     * @param PassengerBags $PassengerBags
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OrderStandardBag
     */
    public function setPassengerBags($PassengerBags)
    {
      $this->PassengerBags = $PassengerBags;
      return $this;
    }

}
