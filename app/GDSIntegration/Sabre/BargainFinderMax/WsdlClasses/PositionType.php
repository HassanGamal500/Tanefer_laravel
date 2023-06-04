<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PositionType
{

    /**
     * @var StringLength1to16 $Latitude
     */
    protected $Latitude = null;

    /**
     * @var StringLength1to16 $Longitude
     */
    protected $Longitude = null;

    /**
     * @var StringLength1to16 $Altitude
     */
    protected $Altitude = null;

    /**
     * @param StringLength1to16 $Latitude
     * @param StringLength1to16 $Longitude
     * @param StringLength1to16 $Altitude
     */
    public function __construct($Latitude = null, $Longitude = null, $Altitude = null)
    {
      $this->Latitude = $Latitude;
      $this->Longitude = $Longitude;
      $this->Altitude = $Altitude;
    }

    /**
     * @return StringLength1to16
     */
    public function getLatitude()
    {
      return $this->Latitude;
    }

    /**
     * @param StringLength1to16 $Latitude
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PositionType
     */
    public function setLatitude($Latitude)
    {
      $this->Latitude = $Latitude;
      return $this;
    }

    /**
     * @return StringLength1to16
     */
    public function getLongitude()
    {
      return $this->Longitude;
    }

    /**
     * @param StringLength1to16 $Longitude
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PositionType
     */
    public function setLongitude($Longitude)
    {
      $this->Longitude = $Longitude;
      return $this;
    }

    /**
     * @return StringLength1to16
     */
    public function getAltitude()
    {
      return $this->Altitude;
    }

    /**
     * @param StringLength1to16 $Altitude
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PositionType
     */
    public function setAltitude($Altitude)
    {
      $this->Altitude = $Altitude;
      return $this;
    }

}
