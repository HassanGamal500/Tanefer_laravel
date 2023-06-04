<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;



class OriginLocation
{

    /**
     * @var string $LocationType
     */
    protected $LocationType = null;

    /**
     * @var string $LocationCode
     */
    protected $LocationCode = null;

    /**
     * @var boolean $AllAirports
     */
    protected $AllAirports = null;

    /**
     * @param RequestSpecifiedLocationType $_
     * @param boolean $AllAirports
     */
    public function __construct($AllAirports = null,$LocationCode = null, $LocationType = null)
    {
      $this->LocationCode = $LocationCode;
      $this->LocationType = $LocationType;
      $this->AllAirports = $AllAirports;
    }


    /**
     * @return string
     */
    public function getLocationType()
    {
        return $this->LocationType;
    }

    /**
     * @param string $LocationType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginLocation
     */
    public function setLocationType($LocationType)
    {
        $this->LocationType = $LocationType;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocationCode()
    {
        return $this->LocationCode;
    }

    /**
     * @param string $LocationCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginLocation
     */
    public function setLocationCode($LocationCode)
    {
        $this->LocationCode = $LocationCode;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getAllAirports()
    {
      return $this->AllAirports;
    }

    /**
     * @param boolean $AllAirports
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginLocation
     */
    public function setAllAirports($AllAirports)
    {
      $this->AllAirports = $AllAirports;
      return $this;
    }

}
