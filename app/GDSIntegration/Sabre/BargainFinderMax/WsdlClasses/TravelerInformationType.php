<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TravelerInformationType
{

    /**
     * @var PassengerTypeQuantityType[] $PassengerTypeQuantity
     */
    protected $PassengerTypeQuantity = null;

    /**
     * @var AirTravelerType $AirTraveler
     */
    protected $AirTraveler = null;

    /**
     * @param PassengerTypeQuantityType[] $PassengerTypeQuantity
     */
    public function __construct(array $PassengerTypeQuantity = null)
    {
      $this->PassengerTypeQuantity = $PassengerTypeQuantity;
    }

    /**
     * @return PassengerTypeQuantityType[]
     */
    public function getPassengerTypeQuantity()
    {
      return $this->PassengerTypeQuantity;
    }

    /**
     * @param PassengerTypeQuantityType[] $PassengerTypeQuantity
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelerInformationType
     */
    public function setPassengerTypeQuantity(array $PassengerTypeQuantity)
    {
      $this->PassengerTypeQuantity = $PassengerTypeQuantity;
      return $this;
    }

    /**
     * @return AirTravelerType
     */
    public function getAirTraveler()
    {
      return $this->AirTraveler;
    }

    /**
     * @param AirTravelerType $AirTraveler
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelerInformationType
     */
    public function setAirTraveler($AirTraveler)
    {
      $this->AirTraveler = $AirTraveler;
      return $this;
    }

}
