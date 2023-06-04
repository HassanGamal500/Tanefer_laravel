<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Distribution
{

    /**
     * @var Range $Range
     */
    protected $Range = null;

    /**
     * @var OutboundOrInbound $Direction
     */
    protected $Direction = null;

    /**
     * @var int $Leg
     */
    protected $Leg = null;

    /**
     * @var DepartureOrArrival $Endpoint
     */
    protected $Endpoint = null;

    /**
     * @param Range $Range
     * @param OutboundOrInbound $Direction
     * @param int $Leg
     * @param DepartureOrArrival $Endpoint
     */
    public function __construct($Range = null, $Direction = null, $Leg = null, $Endpoint = null)
    {
      $this->Range = $Range;
      $this->Direction = $Direction;
      $this->Leg = $Leg;
      $this->Endpoint = $Endpoint;
    }

    /**
     * @return Range
     */
    public function getRange()
    {
      return $this->Range;
    }

    /**
     * @param Range $Range
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Distribution
     */
    public function setRange($Range)
    {
      $this->Range = $Range;
      return $this;
    }

    /**
     * @return OutboundOrInbound
     */
    public function getDirection()
    {
      return $this->Direction;
    }

    /**
     * @param OutboundOrInbound $Direction
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Distribution
     */
    public function setDirection($Direction)
    {
      $this->Direction = $Direction;
      return $this;
    }

    /**
     * @return int
     */
    public function getLeg()
    {
      return $this->Leg;
    }

    /**
     * @param int $Leg
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Distribution
     */
    public function setLeg($Leg)
    {
      $this->Leg = $Leg;
      return $this;
    }

    /**
     * @return DepartureOrArrival
     */
    public function getEndpoint()
    {
      return $this->Endpoint;
    }

    /**
     * @param DepartureOrArrival $Endpoint
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Distribution
     */
    public function setEndpoint($Endpoint)
    {
      $this->Endpoint = $Endpoint;
      return $this;
    }

}
