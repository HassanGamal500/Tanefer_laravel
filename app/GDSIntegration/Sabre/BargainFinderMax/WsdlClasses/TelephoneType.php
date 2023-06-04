<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TelephoneType
{

    /**
     * @var anonymous337 $ShareSynchInd
     */
    protected $ShareSynchInd = null;

    /**
     * @var anonymous338 $ShareMarketInd
     */
    protected $ShareMarketInd = null;

    /**
     * @var OTA_CodeType $PhoneLocationType
     */
    protected $PhoneLocationType = null;

    /**
     * @var OTA_CodeType $PhoneTechType
     */
    protected $PhoneTechType = null;

    /**
     * @var NumericStringLength1to3 $CountryAccessCode
     */
    protected $CountryAccessCode = null;

    /**
     * @var NumericStringLength1to8 $AreaCityCode
     */
    protected $AreaCityCode = null;

    /**
     * @var StringLength1to32 $PhoneNumber
     */
    protected $PhoneNumber = null;

    /**
     * @var NumericStringLength1to5 $Extension
     */
    protected $Extension = null;

    /**
     * @var StringLength1to8 $PIN
     */
    protected $PIN = null;

    /**
     * @var boolean $FormattedInd
     */
    protected $FormattedInd = null;

    /**
     * @param anonymous337 $ShareSynchInd
     * @param anonymous338 $ShareMarketInd
     * @param OTA_CodeType $PhoneLocationType
     * @param OTA_CodeType $PhoneTechType
     * @param NumericStringLength1to3 $CountryAccessCode
     * @param NumericStringLength1to8 $AreaCityCode
     * @param StringLength1to32 $PhoneNumber
     * @param NumericStringLength1to5 $Extension
     * @param StringLength1to8 $PIN
     * @param boolean $FormattedInd
     */
    public function __construct($ShareSynchInd = null, $ShareMarketInd = null, $PhoneLocationType = null, $PhoneTechType = null, $CountryAccessCode = null, $AreaCityCode = null, $PhoneNumber = null, $Extension = null, $PIN = null, $FormattedInd = null)
    {
      $this->ShareSynchInd = $ShareSynchInd;
      $this->ShareMarketInd = $ShareMarketInd;
      $this->PhoneLocationType = $PhoneLocationType;
      $this->PhoneTechType = $PhoneTechType;
      $this->CountryAccessCode = $CountryAccessCode;
      $this->AreaCityCode = $AreaCityCode;
      $this->PhoneNumber = $PhoneNumber;
      $this->Extension = $Extension;
      $this->PIN = $PIN;
      $this->FormattedInd = $FormattedInd;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TelephoneType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TelephoneType
     */
    public function setShareMarketInd($ShareMarketInd)
    {
      $this->ShareMarketInd = $ShareMarketInd;
      return $this;
    }

    /**
     * @return OTA_CodeType
     */
    public function getPhoneLocationType()
    {
      return $this->PhoneLocationType;
    }

    /**
     * @param OTA_CodeType $PhoneLocationType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TelephoneType
     */
    public function setPhoneLocationType($PhoneLocationType)
    {
      $this->PhoneLocationType = $PhoneLocationType;
      return $this;
    }

    /**
     * @return OTA_CodeType
     */
    public function getPhoneTechType()
    {
      return $this->PhoneTechType;
    }

    /**
     * @param OTA_CodeType $PhoneTechType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TelephoneType
     */
    public function setPhoneTechType($PhoneTechType)
    {
      $this->PhoneTechType = $PhoneTechType;
      return $this;
    }

    /**
     * @return NumericStringLength1to3
     */
    public function getCountryAccessCode()
    {
      return $this->CountryAccessCode;
    }

    /**
     * @param NumericStringLength1to3 $CountryAccessCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TelephoneType
     */
    public function setCountryAccessCode($CountryAccessCode)
    {
      $this->CountryAccessCode = $CountryAccessCode;
      return $this;
    }

    /**
     * @return NumericStringLength1to8
     */
    public function getAreaCityCode()
    {
      return $this->AreaCityCode;
    }

    /**
     * @param NumericStringLength1to8 $AreaCityCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TelephoneType
     */
    public function setAreaCityCode($AreaCityCode)
    {
      $this->AreaCityCode = $AreaCityCode;
      return $this;
    }

    /**
     * @return StringLength1to32
     */
    public function getPhoneNumber()
    {
      return $this->PhoneNumber;
    }

    /**
     * @param StringLength1to32 $PhoneNumber
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TelephoneType
     */
    public function setPhoneNumber($PhoneNumber)
    {
      $this->PhoneNumber = $PhoneNumber;
      return $this;
    }

    /**
     * @return NumericStringLength1to5
     */
    public function getExtension()
    {
      return $this->Extension;
    }

    /**
     * @param NumericStringLength1to5 $Extension
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TelephoneType
     */
    public function setExtension($Extension)
    {
      $this->Extension = $Extension;
      return $this;
    }

    /**
     * @return StringLength1to8
     */
    public function getPIN()
    {
      return $this->PIN;
    }

    /**
     * @param StringLength1to8 $PIN
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TelephoneType
     */
    public function setPIN($PIN)
    {
      $this->PIN = $PIN;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TelephoneType
     */
    public function setFormattedInd($FormattedInd)
    {
      $this->FormattedInd = $FormattedInd;
      return $this;
    }

}
