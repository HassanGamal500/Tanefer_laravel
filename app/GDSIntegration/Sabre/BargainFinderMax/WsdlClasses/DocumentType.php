<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class DocumentType
{

    /**
     * @var StringLength1to64 $DocHolderName
     */
    protected $DocHolderName = null;

    /**
     * @var StringLength1to64[] $DocLimitations
     */
    protected $DocLimitations = null;

    /**
     * @var StringLength1to64 $DocIssueAuthority
     */
    protected $DocIssueAuthority = null;

    /**
     * @var StringLength1to64 $DocIssueLocation
     */
    protected $DocIssueLocation = null;

    /**
     * @var StringLength1to32 $DocID
     */
    protected $DocID = null;

    /**
     * @var OTA_CodeType $DocType
     */
    protected $DocType = null;

    /**
     * @var anonymous337 $ShareSynchInd
     */
    protected $ShareSynchInd = null;

    /**
     * @var anonymous338 $ShareMarketInd
     */
    protected $ShareMarketInd = null;

    /**
     * @var anonymous335 $Gender
     */
    protected $Gender = null;

    /**
     * @var date $BirthDate
     */
    protected $BirthDate = null;

    /**
     * @var date $EffectiveDate
     */
    protected $EffectiveDate = null;

    /**
     * @var date $ExpireDate
     */
    protected $ExpireDate = null;

    /**
     * @param StringLength1to64 $DocIssueAuthority
     * @param StringLength1to64 $DocIssueLocation
     * @param StringLength1to32 $DocID
     * @param OTA_CodeType $DocType
     * @param anonymous337 $ShareSynchInd
     * @param anonymous338 $ShareMarketInd
     * @param anonymous335 $Gender
     * @param date $BirthDate
     * @param date $EffectiveDate
     * @param date $ExpireDate
     */
    public function __construct($DocIssueAuthority = null, $DocIssueLocation = null, $DocID = null, $DocType = null, $ShareSynchInd = null, $ShareMarketInd = null, $Gender = null, $BirthDate = null, $EffectiveDate = null, $ExpireDate = null)
    {
      $this->DocIssueAuthority = $DocIssueAuthority;
      $this->DocIssueLocation = $DocIssueLocation;
      $this->DocID = $DocID;
      $this->DocType = $DocType;
      $this->ShareSynchInd = $ShareSynchInd;
      $this->ShareMarketInd = $ShareMarketInd;
      $this->Gender = $Gender;
      $this->BirthDate = $BirthDate;
      $this->EffectiveDate = $EffectiveDate;
      $this->ExpireDate = $ExpireDate;
    }

    /**
     * @return StringLength1to64
     */
    public function getDocHolderName()
    {
      return $this->DocHolderName;
    }

    /**
     * @param StringLength1to64 $DocHolderName
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DocumentType
     */
    public function setDocHolderName($DocHolderName)
    {
      $this->DocHolderName = $DocHolderName;
      return $this;
    }

    /**
     * @return StringLength1to64[]
     */
    public function getDocLimitations()
    {
      return $this->DocLimitations;
    }

    /**
     * @param StringLength1to64[] $DocLimitations
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DocumentType
     */
    public function setDocLimitations(array $DocLimitations = null)
    {
      $this->DocLimitations = $DocLimitations;
      return $this;
    }

    /**
     * @return StringLength1to64
     */
    public function getDocIssueAuthority()
    {
      return $this->DocIssueAuthority;
    }

    /**
     * @param StringLength1to64 $DocIssueAuthority
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DocumentType
     */
    public function setDocIssueAuthority($DocIssueAuthority)
    {
      $this->DocIssueAuthority = $DocIssueAuthority;
      return $this;
    }

    /**
     * @return StringLength1to64
     */
    public function getDocIssueLocation()
    {
      return $this->DocIssueLocation;
    }

    /**
     * @param StringLength1to64 $DocIssueLocation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DocumentType
     */
    public function setDocIssueLocation($DocIssueLocation)
    {
      $this->DocIssueLocation = $DocIssueLocation;
      return $this;
    }

    /**
     * @return StringLength1to32
     */
    public function getDocID()
    {
      return $this->DocID;
    }

    /**
     * @param StringLength1to32 $DocID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DocumentType
     */
    public function setDocID($DocID)
    {
      $this->DocID = $DocID;
      return $this;
    }

    /**
     * @return OTA_CodeType
     */
    public function getDocType()
    {
      return $this->DocType;
    }

    /**
     * @param OTA_CodeType $DocType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DocumentType
     */
    public function setDocType($DocType)
    {
      $this->DocType = $DocType;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DocumentType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DocumentType
     */
    public function setShareMarketInd($ShareMarketInd)
    {
      $this->ShareMarketInd = $ShareMarketInd;
      return $this;
    }

    /**
     * @return anonymous335
     */
    public function getGender()
    {
      return $this->Gender;
    }

    /**
     * @param anonymous335 $Gender
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DocumentType
     */
    public function setGender($Gender)
    {
      $this->Gender = $Gender;
      return $this;
    }

    /**
     * @return date
     */
    public function getBirthDate()
    {
      return $this->BirthDate;
    }

    /**
     * @param date $BirthDate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DocumentType
     */
    public function setBirthDate($BirthDate)
    {
      $this->BirthDate = $BirthDate;
      return $this;
    }

    /**
     * @return date
     */
    public function getEffectiveDate()
    {
      return $this->EffectiveDate;
    }

    /**
     * @param date $EffectiveDate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DocumentType
     */
    public function setEffectiveDate($EffectiveDate)
    {
      $this->EffectiveDate = $EffectiveDate;
      return $this;
    }

    /**
     * @return date
     */
    public function getExpireDate()
    {
      return $this->ExpireDate;
    }

    /**
     * @param date $ExpireDate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DocumentType
     */
    public function setExpireDate($ExpireDate)
    {
      $this->ExpireDate = $ExpireDate;
      return $this;
    }

}
