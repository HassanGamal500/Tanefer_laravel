<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class StopoverPoint
{

    /**
     * @var AirportCode $LocationCode
     */
    protected $LocationCode = null;

    /**
     * @var LocationACType $LocationType
     */
    protected $LocationType = null;

    /**
     * @param AirportCode $LocationCode
     * @param LocationACType $LocationType
     */
    public function __construct($LocationCode = null, $LocationType = null)
    {
      $this->LocationCode = $LocationCode;
      $this->LocationType = $LocationType;
    }

    /**
     * @return AirportCode
     */
    public function getLocationCode()
    {
      return $this->LocationCode;
    }

    /**
     * @param AirportCode $LocationCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StopoverPoint
     */
    public function setLocationCode($LocationCode)
    {
      $this->LocationCode = $LocationCode;
      return $this;
    }

    /**
     * @return LocationACType
     */
    public function getLocationType()
    {
      return $this->LocationType;
    }

    /**
     * @param LocationACType $LocationType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StopoverPoint
     */
    public function setLocationType($LocationType)
    {
      $this->LocationType = $LocationType;
      return $this;
    }

}
