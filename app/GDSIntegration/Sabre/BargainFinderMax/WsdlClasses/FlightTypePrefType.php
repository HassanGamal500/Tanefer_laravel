<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FlightTypePrefType
{

    /**
     * @var FlightTypeType $FlightType
     */
    protected $FlightType = null;

    /**
     * @var anonymous293 $MaxConnections
     */
    protected $MaxConnections = null;

    /**
     * @var PreferLevelType $PreferLevel
     */
    protected $PreferLevel = null;

    /**
     * @param FlightTypeType $FlightType
     * @param anonymous293 $MaxConnections
     * @param PreferLevelType $PreferLevel
     */
    public function __construct($FlightType = null, $MaxConnections = null, $PreferLevel = null)
    {
      $this->FlightType = $FlightType;
      $this->MaxConnections = $MaxConnections;
      $this->PreferLevel = $PreferLevel;
    }

    /**
     * @return FlightTypeType
     */
    public function getFlightType()
    {
      return $this->FlightType;
    }

    /**
     * @param FlightTypeType $FlightType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FlightTypePrefType
     */
    public function setFlightType($FlightType)
    {
      $this->FlightType = $FlightType;
      return $this;
    }

    /**
     * @return anonymous293
     */
    public function getMaxConnections()
    {
      return $this->MaxConnections;
    }

    /**
     * @param anonymous293 $MaxConnections
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FlightTypePrefType
     */
    public function setMaxConnections($MaxConnections)
    {
      $this->MaxConnections = $MaxConnections;
      return $this;
    }

    /**
     * @return PreferLevelType
     */
    public function getPreferLevel()
    {
      return $this->PreferLevel;
    }

    /**
     * @param PreferLevelType $PreferLevel
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FlightTypePrefType
     */
    public function setPreferLevel($PreferLevel)
    {
      $this->PreferLevel = $PreferLevel;
      return $this;
    }

}
