<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class BrandCodePrefType
{

    /**
     * @var BrandCodeType $Code
     */
    protected $Code = null;

    /**
     * @var IncludeExcludePreferLevelType $PreferLevel
     */
    protected $PreferLevel = null;

    /**
     * @param BrandCodeType $Code
     * @param IncludeExcludePreferLevelType $PreferLevel
     */
    public function __construct($Code = null, $PreferLevel = null)
    {
      $this->Code = $Code;
      $this->PreferLevel = $PreferLevel;
    }

    /**
     * @return BrandCodeType
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param BrandCodeType $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandCodePrefType
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

    /**
     * @return IncludeExcludePreferLevelType
     */
    public function getPreferLevel()
    {
      return $this->PreferLevel;
    }

    /**
     * @param IncludeExcludePreferLevelType $PreferLevel
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandCodePrefType
     */
    public function setPreferLevel($PreferLevel)
    {
      $this->PreferLevel = $PreferLevel;
      return $this;
    }

}
