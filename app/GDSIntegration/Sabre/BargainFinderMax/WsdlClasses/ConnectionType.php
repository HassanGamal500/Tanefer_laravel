<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ConnectionType
{

    /**
     * @var ConnectionLocation[] $ConnectionLocation
     */
    protected $ConnectionLocation = null;

    /**
     * @param ConnectionLocation[] $ConnectionLocation
     */
    public function __construct(array $ConnectionLocation = null)
    {
      $this->ConnectionLocation = $ConnectionLocation;
    }

    /**
     * @return ConnectionLocation[]
     */
    public function getConnectionLocation()
    {
      return $this->ConnectionLocation;
    }

    /**
     * @param ConnectionLocation[] $ConnectionLocation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ConnectionType
     */
    public function setConnectionLocation(array $ConnectionLocation)
    {
      $this->ConnectionLocation = $ConnectionLocation;
      return $this;
    }

}
