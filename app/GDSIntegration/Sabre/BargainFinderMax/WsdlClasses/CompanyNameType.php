<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class CompanyNameType
{

    /**
     * @var string $_
     */
    protected $_ = null;

    /**
     * @var StringLength1to64 $CompanyShortName
     */
    protected $CompanyShortName = null;

    /**
     * @var OTA_CodeType $TravelSector
     */
    protected $TravelSector = null;

    /**
     * @var StringLength1to8 $Code
     */
    protected $Code = null;

    /**
     * @var StringLength1to32 $CodeContext
     */
    protected $CodeContext = null;

    /**
     * @param string $_
     * @param StringLength1to64 $CompanyShortName
     * @param OTA_CodeType $TravelSector
     * @param StringLength1to8 $Code
     * @param StringLength1to32 $CodeContext
     */
    public function __construct($_ = null, $CompanyShortName = null, $TravelSector = null, $Code = null, $CodeContext = null)
    {
      $this->_ = $_;
      $this->CompanyShortName = $CompanyShortName;
      $this->TravelSector = $TravelSector;
      $this->Code = $Code;
      $this->CodeContext = $CodeContext;
    }

    /**
     * @return string
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param string $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CompanyNameType
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return StringLength1to64
     */
    public function getCompanyShortName()
    {
      return $this->CompanyShortName;
    }

    /**
     * @param StringLength1to64 $CompanyShortName
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CompanyNameType
     */
    public function setCompanyShortName($CompanyShortName)
    {
      $this->CompanyShortName = $CompanyShortName;
      return $this;
    }

    /**
     * @return OTA_CodeType
     */
    public function getTravelSector()
    {
      return $this->TravelSector;
    }

    /**
     * @param OTA_CodeType $TravelSector
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CompanyNameType
     */
    public function setTravelSector($TravelSector)
    {
      $this->TravelSector = $TravelSector;
      return $this;
    }

    /**
     * @return StringLength1to8
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param string $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CompanyNameType
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

    /**
     * @return StringLength1to32
     */
    public function getCodeContext()
    {
      return $this->CodeContext;
    }

    /**
     * @param StringLength1to32 $CodeContext
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CompanyNameType
     */
    public function setCodeContext($CodeContext)
    {
      $this->CodeContext = $CodeContext;
      return $this;
    }

}
