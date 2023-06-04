<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareRestrictPrefType
{

    /**
     * @var OTA_CodeType $FareRestriction
     */
    protected $FareRestriction = null;

    /**
     * @var PreferLevelType $PreferLevel
     */
    protected $PreferLevel = null;

    /**
     * @param OTA_CodeType $FareRestriction
     * @param PreferLevelType $PreferLevel
     */
    public function __construct($FareRestriction = null, $PreferLevel = null)
    {
      $this->FareRestriction = $FareRestriction;
      $this->PreferLevel = $PreferLevel;
    }

    /**
     * @return OTA_CodeType
     */
    public function getFareRestriction()
    {
      return $this->FareRestriction;
    }

    /**
     * @param OTA_CodeType $FareRestriction
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareRestrictPrefType
     */
    public function setFareRestriction($FareRestriction)
    {
      $this->FareRestriction = $FareRestriction;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareRestrictPrefType
     */
    public function setPreferLevel($PreferLevel)
    {
      $this->PreferLevel = $PreferLevel;
      return $this;
    }

}
