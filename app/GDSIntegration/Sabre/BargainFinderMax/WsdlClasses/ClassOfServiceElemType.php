<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ClassOfServiceElemType
{

    /**
     * @var ClassOfServiceType $Code
     */
    protected $Code = null;

    /**
     * @var IncludeExcludePreferLevelType $PreferLevel
     */
    protected $PreferLevel = null;

    /**
     * @param ClassOfServiceType $Code
     * @param IncludeExcludePreferLevelType $PreferLevel
     */
    public function __construct($Code = null, $PreferLevel = null)
    {
      $this->Code = $Code;
      $this->PreferLevel = $PreferLevel;
    }

    /**
     * @return ClassOfServiceType
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param ClassOfServiceType $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ClassOfServiceElemType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ClassOfServiceElemType
     */
    public function setPreferLevel($PreferLevel)
    {
      $this->PreferLevel = $PreferLevel;
      return $this;
    }

}
