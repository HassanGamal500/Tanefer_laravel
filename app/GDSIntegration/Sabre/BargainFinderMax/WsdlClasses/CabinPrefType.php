<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class CabinPrefType
{

    /**
     * @var CabinType $Cabin
     */
    protected $Cabin = null;

    /**
     * @var PreferLevelType $PreferLevel
     */
    protected $PreferLevel = null;

    /**
     * @param CabinType $Cabin
     * @param PreferLevelType $PreferLevel
     */
    public function __construct($Cabin = null, $PreferLevel = null)
    {
      $this->Cabin = $Cabin;
      $this->PreferLevel = $PreferLevel;
    }

    /**
     * @return CabinType
     */
    public function getCabin()
    {
      return $this->Cabin;
    }

    /**
     * @param CabinType $Cabin
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CabinPrefType
     */
    public function setCabin($Cabin)
    {
      $this->Cabin = $Cabin;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CabinPrefType
     */
    public function setPreferLevel($PreferLevel)
    {
      $this->PreferLevel = $PreferLevel;
      return $this;
    }

}
