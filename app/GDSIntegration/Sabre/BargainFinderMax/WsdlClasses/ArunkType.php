<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ArunkType
{

    /**
     * @var RequestLocationType $OriginLocation
     */
    protected $OriginLocation = null;

    /**
     * @var RequestLocationType $DestinationLocation
     */
    protected $DestinationLocation = null;

    /**
     * @var SideTripType $SideTrip
     */
    protected $SideTrip = null;

    /**
     * @param RequestLocationType $OriginLocation
     * @param RequestLocationType $DestinationLocation
     */
    public function __construct($OriginLocation = null, $DestinationLocation = null)
    {
      $this->OriginLocation = $OriginLocation;
      $this->DestinationLocation = $DestinationLocation;
    }

    /**
     * @return RequestLocationType
     */
    public function getOriginLocation()
    {
      return $this->OriginLocation;
    }

    /**
     * @param RequestLocationType $OriginLocation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ArunkType
     */
    public function setOriginLocation($OriginLocation)
    {
      $this->OriginLocation = $OriginLocation;
      return $this;
    }

    /**
     * @return RequestLocationType
     */
    public function getDestinationLocation()
    {
      return $this->DestinationLocation;
    }

    /**
     * @param RequestLocationType $DestinationLocation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ArunkType
     */
    public function setDestinationLocation($DestinationLocation)
    {
      $this->DestinationLocation = $DestinationLocation;
      return $this;
    }

    /**
     * @return SideTripType
     */
    public function getSideTrip()
    {
      return $this->SideTrip;
    }

    /**
     * @param SideTripType $SideTrip
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ArunkType
     */
    public function setSideTrip($SideTrip)
    {
      $this->SideTrip = $SideTrip;
      return $this;
    }

}
