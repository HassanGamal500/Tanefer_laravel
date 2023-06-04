<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class RoutingLegType
{

    /**
     * @var RoutingAirlineCodeType[] $InboundOutboundCarrier
     */
    protected $InboundOutboundCarrier = null;

    /**
     * @var RoutingAirlineCodeType[] $InboundCarrier
     */
    protected $InboundCarrier = null;

    /**
     * @var RoutingAirlineCodeType[] $OutboundCarrier
     */
    protected $OutboundCarrier = null;

    /**
     * @var RoutingAirportCodeType[] $ConnectPoint
     */
    protected $ConnectPoint = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return RoutingAirlineCodeType[]
     */
    public function getInboundOutboundCarrier()
    {
      return $this->InboundOutboundCarrier;
    }

    /**
     * @param RoutingAirlineCodeType[] $InboundOutboundCarrier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\RoutingLegType
     */
    public function setInboundOutboundCarrier(array $InboundOutboundCarrier = null)
    {
      $this->InboundOutboundCarrier = $InboundOutboundCarrier;
      return $this;
    }

    /**
     * @return RoutingAirlineCodeType[]
     */
    public function getInboundCarrier()
    {
      return $this->InboundCarrier;
    }

    /**
     * @param RoutingAirlineCodeType[] $InboundCarrier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\RoutingLegType
     */
    public function setInboundCarrier(array $InboundCarrier = null)
    {
      $this->InboundCarrier = $InboundCarrier;
      return $this;
    }

    /**
     * @return RoutingAirlineCodeType[]
     */
    public function getOutboundCarrier()
    {
      return $this->OutboundCarrier;
    }

    /**
     * @param RoutingAirlineCodeType[] $OutboundCarrier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\RoutingLegType
     */
    public function setOutboundCarrier(array $OutboundCarrier = null)
    {
      $this->OutboundCarrier = $OutboundCarrier;
      return $this;
    }

    /**
     * @return RoutingAirportCodeType[]
     */
    public function getConnectPoint()
    {
      return $this->ConnectPoint;
    }

    /**
     * @param RoutingAirportCodeType[] $ConnectPoint
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\RoutingLegType
     */
    public function setConnectPoint(array $ConnectPoint = null)
    {
      $this->ConnectPoint = $ConnectPoint;
      return $this;
    }

}
