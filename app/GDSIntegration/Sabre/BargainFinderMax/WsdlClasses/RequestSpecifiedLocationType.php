<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class RequestSpecifiedLocationType extends RequestLocationType
{

    /**
     * @var RequestLocationType $_
     */
    protected $_ = null;

    /**
     * @var LocationACType $LocationType
     */
    protected $LocationType = null;

    /**
     * @param string $_
     * @param anonymous309 $LocationCode
     * @param anonymous310 $AirportsGroup
     * @param StringLength1to32 $CodeContext
     * @param RequestLocationType $_
     * @param LocationACType $LocationType
     */
    public function __construct($_ = null, $LocationCode = null, $AirportsGroup = null, $CodeContext = null, $LocationType = null)
    {
      parent::__construct($_, $LocationCode, $AirportsGroup, $CodeContext);
      $this->_ = $_;
      $this->LocationType = $LocationType;
    }

    /**
     * @return RequestLocationType
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param RequestLocationType $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\RequestSpecifiedLocationType
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return LocationACType
     */
    public function getLocationType()
    {
      return $this->LocationType;
    }

    /**
     * @param string $LocationType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\RequestSpecifiedLocationType
     */
    public function setLocationType($LocationType)
    {
      $this->LocationType = $LocationType;
      return $this;
    }

}
