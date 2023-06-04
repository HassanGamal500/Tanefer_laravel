<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AlternateAirportCities
{

    /**
     * @var SpecifiedLocation $SpecifiedLocation
     */
    protected $SpecifiedLocation = null;

    /**
     * @var AlternateLocation $AlternateLocation
     */
    protected $AlternateLocation = null;

    /**
     * @param SpecifiedLocation $SpecifiedLocation
     * @param AlternateLocation $AlternateLocation
     */
    public function __construct($SpecifiedLocation = null, $AlternateLocation = null)
    {
      $this->SpecifiedLocation = $SpecifiedLocation;
      $this->AlternateLocation = $AlternateLocation;
    }

    /**
     * @return SpecifiedLocation
     */
    public function getSpecifiedLocation()
    {
      return $this->SpecifiedLocation;
    }

    /**
     * @param SpecifiedLocation $SpecifiedLocation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AlternateAirportCities
     */
    public function setSpecifiedLocation($SpecifiedLocation)
    {
      $this->SpecifiedLocation = $SpecifiedLocation;
      return $this;
    }

    /**
     * @return AlternateLocation
     */
    public function getAlternateLocation()
    {
      return $this->AlternateLocation;
    }

    /**
     * @param AlternateLocation $AlternateLocation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AlternateAirportCities
     */
    public function setAlternateLocation($AlternateLocation)
    {
      $this->AlternateLocation = $AlternateLocation;
      return $this;
    }

}
