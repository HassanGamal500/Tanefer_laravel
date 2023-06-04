<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ConnectionLocation
{

    /**
     * @var string $_
     */
    protected $_ = null;

    /**
     * @var AirportCode $LocationCode
     */
    protected $LocationCode = null;

    /**
     * @var AllowedExcludedPreferLevelType $PreferLevel
     */
    protected $PreferLevel = null;

    /**
     * @param string $_
     * @param AirportCode $LocationCode
     * @param AllowedExcludedPreferLevelType $PreferLevel
     */
    public function __construct($_ = null, $LocationCode = null, $PreferLevel = null)
    {
      $this->_ = $_;
      $this->LocationCode = $LocationCode;
      $this->PreferLevel = $PreferLevel;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ConnectionLocation
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return AirportCode
     */
    public function getLocationCode()
    {
      return $this->LocationCode;
    }

    /**
     * @param AirportCode $LocationCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ConnectionLocation
     */
    public function setLocationCode($LocationCode)
    {
      $this->LocationCode = $LocationCode;
      return $this;
    }

    /**
     * @return AllowedExcludedPreferLevelType
     */
    public function getPreferLevel()
    {
      return $this->PreferLevel;
    }

    /**
     * @param AllowedExcludedPreferLevelType $PreferLevel
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ConnectionLocation
     */
    public function setPreferLevel($PreferLevel)
    {
      $this->PreferLevel = $PreferLevel;
      return $this;
    }

}
