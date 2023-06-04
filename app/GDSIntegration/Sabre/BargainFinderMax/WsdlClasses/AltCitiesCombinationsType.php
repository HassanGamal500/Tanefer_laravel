<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AltCitiesCombinationsType
{

    /**
     * @var AltCitiesCombinationsLocationsType $Origins
     */
    protected $Origins = null;

    /**
     * @var AltCitiesCombinationsLocationsType $Destinations
     */
    protected $Destinations = null;

    /**
     * @param AltCitiesCombinationsLocationsType $Origins
     * @param AltCitiesCombinationsLocationsType $Destinations
     */
    public function __construct($Origins = null, $Destinations = null)
    {
      $this->Origins = $Origins;
      $this->Destinations = $Destinations;
    }

    /**
     * @return AltCitiesCombinationsLocationsType
     */
    public function getOrigins()
    {
      return $this->Origins;
    }

    /**
     * @param AltCitiesCombinationsLocationsType $Origins
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AltCitiesCombinationsType
     */
    public function setOrigins($Origins)
    {
      $this->Origins = $Origins;
      return $this;
    }

    /**
     * @return AltCitiesCombinationsLocationsType
     */
    public function getDestinations()
    {
      return $this->Destinations;
    }

    /**
     * @param AltCitiesCombinationsLocationsType $Destinations
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AltCitiesCombinationsType
     */
    public function setDestinations($Destinations)
    {
      $this->Destinations = $Destinations;
      return $this;
    }

}
