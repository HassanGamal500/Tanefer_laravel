<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PersonNameType
{

    /**
     * @var StringLength1to16[] $NamePrefix
     */
    protected $NamePrefix = null;

    /**
     * @var StringLength1to64[] $GivenName
     */
    protected $GivenName = null;

    /**
     * @var StringLength1to64[] $MiddleName
     */
    protected $MiddleName = null;

    /**
     * @var StringLength1to16 $SurnamePrefix
     */
    protected $SurnamePrefix = null;

    /**
     * @var StringLength1to64 $Surname
     */
    protected $Surname = null;

    /**
     * @var StringLength1to16[] $NameSuffix
     */
    protected $NameSuffix = null;

    /**
     * @var StringLength1to16[] $NameTitle
     */
    protected $NameTitle = null;

    /**
     * @var OTA_CodeType $NameType
     */
    protected $NameType = null;

    /**
     * @var anonymous337 $ShareSynchInd
     */
    protected $ShareSynchInd = null;

    /**
     * @var anonymous338 $ShareMarketInd
     */
    protected $ShareMarketInd = null;

    /**
     * @param StringLength1to64 $Surname
     * @param OTA_CodeType $NameType
     * @param anonymous337 $ShareSynchInd
     * @param anonymous338 $ShareMarketInd
     */
    public function __construct($Surname = null, $NameType = null, $ShareSynchInd = null, $ShareMarketInd = null)
    {
      $this->Surname = $Surname;
      $this->NameType = $NameType;
      $this->ShareSynchInd = $ShareSynchInd;
      $this->ShareMarketInd = $ShareMarketInd;
    }

    /**
     * @return StringLength1to16[]
     */
    public function getNamePrefix()
    {
      return $this->NamePrefix;
    }

    /**
     * @param StringLength1to16[] $NamePrefix
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PersonNameType
     */
    public function setNamePrefix(array $NamePrefix = null)
    {
      $this->NamePrefix = $NamePrefix;
      return $this;
    }

    /**
     * @return StringLength1to64[]
     */
    public function getGivenName()
    {
      return $this->GivenName;
    }

    /**
     * @param StringLength1to64[] $GivenName
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PersonNameType
     */
    public function setGivenName(array $GivenName = null)
    {
      $this->GivenName = $GivenName;
      return $this;
    }

    /**
     * @return StringLength1to64[]
     */
    public function getMiddleName()
    {
      return $this->MiddleName;
    }

    /**
     * @param StringLength1to64[] $MiddleName
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PersonNameType
     */
    public function setMiddleName(array $MiddleName = null)
    {
      $this->MiddleName = $MiddleName;
      return $this;
    }

    /**
     * @return StringLength1to16
     */
    public function getSurnamePrefix()
    {
      return $this->SurnamePrefix;
    }

    /**
     * @param StringLength1to16 $SurnamePrefix
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PersonNameType
     */
    public function setSurnamePrefix($SurnamePrefix)
    {
      $this->SurnamePrefix = $SurnamePrefix;
      return $this;
    }

    /**
     * @return StringLength1to64
     */
    public function getSurname()
    {
      return $this->Surname;
    }

    /**
     * @param StringLength1to64 $Surname
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PersonNameType
     */
    public function setSurname($Surname)
    {
      $this->Surname = $Surname;
      return $this;
    }

    /**
     * @return StringLength1to16[]
     */
    public function getNameSuffix()
    {
      return $this->NameSuffix;
    }

    /**
     * @param StringLength1to16[] $NameSuffix
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PersonNameType
     */
    public function setNameSuffix(array $NameSuffix = null)
    {
      $this->NameSuffix = $NameSuffix;
      return $this;
    }

    /**
     * @return StringLength1to16[]
     */
    public function getNameTitle()
    {
      return $this->NameTitle;
    }

    /**
     * @param StringLength1to16[] $NameTitle
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PersonNameType
     */
    public function setNameTitle(array $NameTitle = null)
    {
      $this->NameTitle = $NameTitle;
      return $this;
    }

    /**
     * @return OTA_CodeType
     */
    public function getNameType()
    {
      return $this->NameType;
    }

    /**
     * @param OTA_CodeType $NameType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PersonNameType
     */
    public function setNameType($NameType)
    {
      $this->NameType = $NameType;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PersonNameType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PersonNameType
     */
    public function setShareMarketInd($ShareMarketInd)
    {
      $this->ShareMarketInd = $ShareMarketInd;
      return $this;
    }

}
