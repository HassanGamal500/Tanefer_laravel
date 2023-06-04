<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PassengerStatus
{

    /**
     * @var StateCodeType $StateCode
     */
    protected $StateCode = null;

    /**
     * @var CountryCodeType $CountryCode
     */
    protected $CountryCode = null;

    /**
     * @var CityCodeType $CityCode
     */
    protected $CityCode = null;

    /**
     * @var anonymous154 $Type
     */
    protected $Type = null;

    /**
     * @param StateCodeType $StateCode
     * @param CountryCodeType $CountryCode
     * @param CityCodeType $CityCode
     * @param anonymous154 $Type
     */
    public function __construct($StateCode = null, $CountryCode = null, $CityCode = null, $Type = null)
    {
      $this->StateCode = $StateCode;
      $this->CountryCode = $CountryCode;
      $this->CityCode = $CityCode;
      $this->Type = $Type;
    }

    /**
     * @return StateCodeType
     */
    public function getStateCode()
    {
      return $this->StateCode;
    }

    /**
     * @param StateCodeType $StateCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PassengerStatus
     */
    public function setStateCode($StateCode)
    {
      $this->StateCode = $StateCode;
      return $this;
    }

    /**
     * @return CountryCodeType
     */
    public function getCountryCode()
    {
      return $this->CountryCode;
    }

    /**
     * @param CountryCodeType $CountryCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PassengerStatus
     */
    public function setCountryCode($CountryCode)
    {
      $this->CountryCode = $CountryCode;
      return $this;
    }

    /**
     * @return CityCodeType
     */
    public function getCityCode()
    {
      return $this->CityCode;
    }

    /**
     * @param CityCodeType $CityCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PassengerStatus
     */
    public function setCityCode($CityCode)
    {
      $this->CityCode = $CityCode;
      return $this;
    }

    /**
     * @return anonymous154
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param anonymous154 $Type
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PassengerStatus
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

}
