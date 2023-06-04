<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareTypePrefType
{

    /**
     * @var UpperCaseAlphaLength1to3 $Code
     */
    protected $Code = null;

    /**
     * @var IncludeExcludePreferLevelType $PreferLevel
     */
    protected $PreferLevel = null;

    /**
     * @param UpperCaseAlphaLength1to3 $Code
     * @param IncludeExcludePreferLevelType $PreferLevel
     */
    public function __construct($Code = null, $PreferLevel = null)
    {
      $this->Code = $Code;
      $this->PreferLevel = $PreferLevel;
    }

    /**
     * @return UpperCaseAlphaLength1to3
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param UpperCaseAlphaLength1to3 $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareTypePrefType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareTypePrefType
     */
    public function setPreferLevel($PreferLevel)
    {
      $this->PreferLevel = $PreferLevel;
      return $this;
    }

}
