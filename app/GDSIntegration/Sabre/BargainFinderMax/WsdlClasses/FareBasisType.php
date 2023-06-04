<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareBasisType
{

    /**
     * @var FareBasisCodePatternType $Code
     */
    protected $Code = null;

    /**
     * @var IncludeExcludePreferLevelType $PreferLevel
     */
    protected $PreferLevel = null;

    /**
     * @param FareBasisCodePatternType $Code
     * @param IncludeExcludePreferLevelType $PreferLevel
     */
    public function __construct($Code = null, $PreferLevel = null)
    {
      $this->Code = $Code;
      $this->PreferLevel = $PreferLevel;
    }

    /**
     * @return FareBasisCodePatternType
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param FareBasisCodePatternType $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareBasisType
     */
    public function setPreferLevel($PreferLevel)
    {
      $this->PreferLevel = $PreferLevel;
      return $this;
    }

}
