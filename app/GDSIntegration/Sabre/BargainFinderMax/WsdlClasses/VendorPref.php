<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class VendorPref
{

    /**
     * @var StringLength1to8 $Code
     */
    protected $Code = null;

    /**
     * @var PreferLevelType $PreferLevel
     */
    protected $PreferLevel = null;

    /**
     * @param StringLength1to8 $Code
     * @param PreferLevelType $PreferLevel
     */
    public function __construct($Code = null, $PreferLevel = null)
    {
      $this->Code = $Code;
      $this->PreferLevel = $PreferLevel;
    }

    /**
     * @return StringLength1to8
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param StringLength1to8 $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VendorPref
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

    /**
     * @return PreferLevelType
     */
    public function getPreferLevel()
    {
      return $this->PreferLevel;
    }

    /**
     * @param PreferLevelType $PreferLevel
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VendorPref
     */
    public function setPreferLevel($PreferLevel)
    {
      $this->PreferLevel = $PreferLevel;
      return $this;
    }

}
