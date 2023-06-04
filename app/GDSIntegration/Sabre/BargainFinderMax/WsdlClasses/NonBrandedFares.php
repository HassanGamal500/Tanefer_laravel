<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class NonBrandedFares
{

    /**
     * @var IncludeExcludePreferLevelType $PreferLevel
     */
    protected $PreferLevel = null;

    /**
     * @param IncludeExcludePreferLevelType $PreferLevel
     */
    public function __construct($PreferLevel = null)
    {
      $this->PreferLevel = $PreferLevel;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\NonBrandedFares
     */
    public function setPreferLevel($PreferLevel)
    {
      $this->PreferLevel = $PreferLevel;
      return $this;
    }

}
