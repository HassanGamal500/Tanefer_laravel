<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class CustLoyaltyType
{

    /**
     * @var StringLength1to16 $ProgramID
     */
    protected $ProgramID = null;

    /**
     * @var StringLength1to32 $MembershipID
     */
    protected $MembershipID = null;

    /**
     * @var OTA_CodeType $TravelSector
     */
    protected $TravelSector = null;

    /**
     * @var RPH_Type $RPH
     */
    protected $RPH = null;

    /**
     * @var anonymous337 $ShareSynchInd
     */
    protected $ShareSynchInd = null;

    /**
     * @var anonymous338 $ShareMarketInd
     */
    protected $ShareMarketInd = null;

    /**
     * @var StringLength1to16 $LoyalLevel
     */
    protected $LoyalLevel = null;

    /**
     * @var anonymous339 $SingleVendorInd
     */
    protected $SingleVendorInd = null;

    /**
     * @var date $SignupDate
     */
    protected $SignupDate = null;

    /**
     * @var date $EffectiveDate
     */
    protected $EffectiveDate = null;

    /**
     * @var date $ExpireDate
     */
    protected $ExpireDate = null;

    /**
     * @param StringLength1to16 $ProgramID
     * @param StringLength1to32 $MembershipID
     * @param OTA_CodeType $TravelSector
     * @param RPH_Type $RPH
     * @param anonymous337 $ShareSynchInd
     * @param anonymous338 $ShareMarketInd
     * @param StringLength1to16 $LoyalLevel
     * @param anonymous339 $SingleVendorInd
     * @param date $SignupDate
     * @param date $EffectiveDate
     * @param date $ExpireDate
     */
    public function __construct($ProgramID = null, $MembershipID = null, $TravelSector = null, $RPH = null, $ShareSynchInd = null, $ShareMarketInd = null, $LoyalLevel = null, $SingleVendorInd = null, $SignupDate = null, $EffectiveDate = null, $ExpireDate = null)
    {
      $this->ProgramID = $ProgramID;
      $this->MembershipID = $MembershipID;
      $this->TravelSector = $TravelSector;
      $this->RPH = $RPH;
      $this->ShareSynchInd = $ShareSynchInd;
      $this->ShareMarketInd = $ShareMarketInd;
      $this->LoyalLevel = $LoyalLevel;
      $this->SingleVendorInd = $SingleVendorInd;
      $this->SignupDate = $SignupDate;
      $this->EffectiveDate = $EffectiveDate;
      $this->ExpireDate = $ExpireDate;
    }

    /**
     * @return StringLength1to16
     */
    public function getProgramID()
    {
      return $this->ProgramID;
    }

    /**
     * @param StringLength1to16 $ProgramID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CustLoyaltyType
     */
    public function setProgramID($ProgramID)
    {
      $this->ProgramID = $ProgramID;
      return $this;
    }

    /**
     * @return StringLength1to32
     */
    public function getMembershipID()
    {
      return $this->MembershipID;
    }

    /**
     * @param StringLength1to32 $MembershipID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CustLoyaltyType
     */
    public function setMembershipID($MembershipID)
    {
      $this->MembershipID = $MembershipID;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CustLoyaltyType
     */
    public function setTravelSector($TravelSector)
    {
      $this->TravelSector = $TravelSector;
      return $this;
    }

    /**
     * @return RPH_Type
     */
    public function getRPH()
    {
      return $this->RPH;
    }

    /**
     * @param RPH_Type $RPH
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CustLoyaltyType
     */
    public function setRPH($RPH)
    {
      $this->RPH = $RPH;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CustLoyaltyType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CustLoyaltyType
     */
    public function setShareMarketInd($ShareMarketInd)
    {
      $this->ShareMarketInd = $ShareMarketInd;
      return $this;
    }

    /**
     * @return StringLength1to16
     */
    public function getLoyalLevel()
    {
      return $this->LoyalLevel;
    }

    /**
     * @param StringLength1to16 $LoyalLevel
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CustLoyaltyType
     */
    public function setLoyalLevel($LoyalLevel)
    {
      $this->LoyalLevel = $LoyalLevel;
      return $this;
    }

    /**
     * @return anonymous339
     */
    public function getSingleVendorInd()
    {
      return $this->SingleVendorInd;
    }

    /**
     * @param anonymous339 $SingleVendorInd
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CustLoyaltyType
     */
    public function setSingleVendorInd($SingleVendorInd)
    {
      $this->SingleVendorInd = $SingleVendorInd;
      return $this;
    }

    /**
     * @return date
     */
    public function getSignupDate()
    {
      return $this->SignupDate;
    }

    /**
     * @param date $SignupDate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CustLoyaltyType
     */
    public function setSignupDate($SignupDate)
    {
      $this->SignupDate = $SignupDate;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CustLoyaltyType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CustLoyaltyType
     */
    public function setExpireDate($ExpireDate)
    {
      $this->ExpireDate = $ExpireDate;
      return $this;
    }

}
