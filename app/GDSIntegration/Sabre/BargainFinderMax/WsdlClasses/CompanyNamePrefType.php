<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class CompanyNamePrefType extends CompanyNameType
{

    /**
     * @var CompanyNameType $_
     */
    protected $_ = null;

    /**
     * @var CarrierType $Type
     */
    protected $Type = null;

    /**
     * @var PreferLevelType $PreferLevel
     */
    protected $PreferLevel = null;

    /**
     * @param string $_
     * @param StringLength1to64 $CompanyShortName
     * @param OTA_CodeType $TravelSector
     * @param StringLength1to8 $Code
     * @param StringLength1to32 $CodeContext
     * @param CompanyNameType $_
     * @param CarrierType $Type
     * @param PreferLevelType $PreferLevel
     */
    public function __construct($_ = null, $CompanyShortName = null, $TravelSector = null, $Code = null, $CodeContext = null, $Type = null, $PreferLevel = null)
    {
      parent::__construct($_, $CompanyShortName, $TravelSector, $Code, $CodeContext);
      $this->_ = $_;
      $this->Type = $Type;
      $this->PreferLevel = $PreferLevel;
    }

    /**
     * @return CompanyNameType
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param CompanyNameType $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CompanyNamePrefType
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return CarrierType
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param CarrierType $Type
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CompanyNamePrefType
     */
    public function setType($Type)
    {
      $this->Type = $Type;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CompanyNamePrefType
     */
    public function setPreferLevel($PreferLevel)
    {
      $this->PreferLevel = $PreferLevel;
      return $this;
    }

}
