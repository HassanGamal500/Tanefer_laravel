<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AddressType
{

    /**
     * @var StreetNmbrType $StreetNmbr
     */
    protected $StreetNmbr = null;

    /**
     * @var StringLength0to64 $BldgRoom
     */
    protected $BldgRoom = null;

    /**
     * @var StringLength1to64[] $AddressLine
     */
    protected $AddressLine = null;

    /**
     * @var StringLength1to64 $CityName
     */
    protected $CityName = null;

    /**
     * @var StringLength1to16 $PostalCode
     */
    protected $PostalCode = null;

    /**
     * @var StringLength1to32 $County
     */
    protected $County = null;

    /**
     * @var StateProvType $StateProv
     */
    protected $StateProv = null;

    /**
     * @var CountryNameType $CountryName
     */
    protected $CountryName = null;

    /**
     * @var OTA_CodeType $Type
     */
    protected $Type = null;

    /**
     * @var boolean $FormattedInd
     */
    protected $FormattedInd = null;

    /**
     * @var anonymous337 $ShareSynchInd
     */
    protected $ShareSynchInd = null;

    /**
     * @var anonymous338 $ShareMarketInd
     */
    protected $ShareMarketInd = null;

    /**
     * @param OTA_CodeType $Type
     * @param boolean $FormattedInd
     * @param anonymous337 $ShareSynchInd
     * @param anonymous338 $ShareMarketInd
     */
    public function __construct($Type = null, $FormattedInd = null, $ShareSynchInd = null, $ShareMarketInd = null)
    {
      $this->Type = $Type;
      $this->FormattedInd = $FormattedInd;
      $this->ShareSynchInd = $ShareSynchInd;
      $this->ShareMarketInd = $ShareMarketInd;
    }

    /**
     * @return StreetNmbrType
     */
    public function getStreetNmbr()
    {
      return $this->StreetNmbr;
    }

    /**
     * @param StreetNmbrType $StreetNmbr
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AddressType
     */
    public function setStreetNmbr($StreetNmbr)
    {
      $this->StreetNmbr = $StreetNmbr;
      return $this;
    }

    /**
     * @return StringLength0to64
     */
    public function getBldgRoom()
    {
      return $this->BldgRoom;
    }

    /**
     * @param StringLength0to64 $BldgRoom
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AddressType
     */
    public function setBldgRoom($BldgRoom)
    {
      $this->BldgRoom = $BldgRoom;
      return $this;
    }

    /**
     * @return StringLength1to64[]
     */
    public function getAddressLine()
    {
      return $this->AddressLine;
    }

    /**
     * @param StringLength1to64[] $AddressLine
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AddressType
     */
    public function setAddressLine(array $AddressLine = null)
    {
      $this->AddressLine = $AddressLine;
      return $this;
    }

    /**
     * @return StringLength1to64
     */
    public function getCityName()
    {
      return $this->CityName;
    }

    /**
     * @param StringLength1to64 $CityName
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AddressType
     */
    public function setCityName($CityName)
    {
      $this->CityName = $CityName;
      return $this;
    }

    /**
     * @return StringLength1to16
     */
    public function getPostalCode()
    {
      return $this->PostalCode;
    }

    /**
     * @param StringLength1to16 $PostalCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AddressType
     */
    public function setPostalCode($PostalCode)
    {
      $this->PostalCode = $PostalCode;
      return $this;
    }

    /**
     * @return StringLength1to32
     */
    public function getCounty()
    {
      return $this->County;
    }

    /**
     * @param StringLength1to32 $County
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AddressType
     */
    public function setCounty($County)
    {
      $this->County = $County;
      return $this;
    }

    /**
     * @return StateProvType
     */
    public function getStateProv()
    {
      return $this->StateProv;
    }

    /**
     * @param StateProvType $StateProv
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AddressType
     */
    public function setStateProv($StateProv)
    {
      $this->StateProv = $StateProv;
      return $this;
    }

    /**
     * @return CountryNameType
     */
    public function getCountryName()
    {
      return $this->CountryName;
    }

    /**
     * @param CountryNameType $CountryName
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AddressType
     */
    public function setCountryName($CountryName)
    {
      $this->CountryName = $CountryName;
      return $this;
    }

    /**
     * @return OTA_CodeType
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param OTA_CodeType $Type
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AddressType
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getFormattedInd()
    {
      return $this->FormattedInd;
    }

    /**
     * @param boolean $FormattedInd
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AddressType
     */
    public function setFormattedInd($FormattedInd)
    {
      $this->FormattedInd = $FormattedInd;
      return $this;
    }

    /**
     * @return anonymous337
     */
    public function getShareSynchInd()
    {
      return $this->ShareSynchInd;
    }

    /**
     * @param anonymous337 $ShareSynchInd
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AddressType
     */
    public function setShareSynchInd($ShareSynchInd)
    {
      $this->ShareSynchInd = $ShareSynchInd;
      return $this;
    }

    /**
     * @return anonymous338
     */
    public function getShareMarketInd()
    {
      return $this->ShareMarketInd;
    }

    /**
     * @param anonymous338 $ShareMarketInd
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AddressType
     */
    public function setShareMarketInd($ShareMarketInd)
    {
      $this->ShareMarketInd = $ShareMarketInd;
      return $this;
    }

}
