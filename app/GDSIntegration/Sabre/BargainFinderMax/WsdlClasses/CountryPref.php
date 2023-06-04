<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class CountryPref
{

    /**
     * @var ISO3166 $Code
     */
    protected $Code = null;

    /**
     * @var anonymous254 $PreferLevel
     */
    protected $PreferLevel = null;

    /**
     * @param ISO3166 $Code
     * @param anonymous254 $PreferLevel
     */
    public function __construct($Code = null, $PreferLevel = null)
    {
      $this->Code = $Code;
      $this->PreferLevel = $PreferLevel;
    }

    /**
     * @return ISO3166
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param ISO3166 $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CountryPref
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

    /**
     * @return anonymous254
     */
    public function getPreferLevel()
    {
      return $this->PreferLevel;
    }

    /**
     * @param anonymous254 $PreferLevel
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CountryPref
     */
    public function setPreferLevel($PreferLevel)
    {
      $this->PreferLevel = $PreferLevel;
      return $this;
    }

}
