<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class RequestLocationType
{

    /**
     * @var string $_
     */
    protected $_ = null;

    /**
     * @var anonymous309 $LocationCode
     */
    protected $LocationCode = null;

    /**
     * @var anonymous310 $AirportsGroup
     */
    protected $AirportsGroup = null;

    /**
     * @var StringLength1to32 $CodeContext
     */
    protected $CodeContext = null;

    /**
     * @param string $_
     * @param anonymous309 $LocationCode
     * @param anonymous310 $AirportsGroup
     * @param StringLength1to32 $CodeContext
     */
    public function __construct($_ = null, $LocationCode = null, $AirportsGroup = null, $CodeContext = null)
    {
      $this->_ = $_;
      $this->LocationCode = $LocationCode;
      $this->AirportsGroup = $AirportsGroup;
      $this->CodeContext = $CodeContext;
    }

    /**
     * @return string
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param string $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\RequestLocationType
     */
    public function set_($_)
    {
      $this->_ = $_;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\RequestLocationType
     */
    public function setLocationCode($LocationCode)
    {
      $this->LocationCode = $LocationCode;
      return $this;
    }

    /**
     * @return anonymous310
     */
    public function getAirportsGroup()
    {
      return $this->AirportsGroup;
    }

    /**
     * @param anonymous310 $AirportsGroup
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\RequestLocationType
     */
    public function setAirportsGroup($AirportsGroup)
    {
      $this->AirportsGroup = $AirportsGroup;
      return $this;
    }

    /**
     * @return StringLength1to32
     */
    public function getCodeContext()
    {
      return $this->CodeContext;
    }

    /**
     * @param StringLength1to32 $CodeContext
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\RequestLocationType
     */
    public function setCodeContext($CodeContext)
    {
      $this->CodeContext = $CodeContext;
      return $this;
    }

}
