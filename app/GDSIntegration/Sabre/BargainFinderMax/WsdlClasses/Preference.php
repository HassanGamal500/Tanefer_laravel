<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Preference
{

    /**
     * @var CarrierCode $Code
     */
    protected $Code = null;

    /**
     * @var IncludeExcludePreferLevelType $Level
     */
    protected $Level = null;

    /**
     * @param CarrierCode $Code
     * @param IncludeExcludePreferLevelType $Level
     */
    public function __construct($Code = null, $Level = null)
    {
      $this->Code = $Code;
      $this->Level = $Level;
    }

    /**
     * @return CarrierCode
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param CarrierCode $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Preference
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

    /**
     * @return IncludeExcludePreferLevelType
     */
    public function getLevel()
    {
      return $this->Level;
    }

    /**
     * @param IncludeExcludePreferLevelType $Level
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Preference
     */
    public function setLevel($Level)
    {
      $this->Level = $Level;
      return $this;
    }

}
