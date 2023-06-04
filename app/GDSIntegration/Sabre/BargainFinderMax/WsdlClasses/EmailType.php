<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class EmailType
{

    /**
     * @var StringLength1to128 $_
     */
    protected $_ = null;

    /**
     * @var OTA_CodeType $EmailType
     */
    protected $EmailType = null;

    /**
     * @var anonymous337 $ShareSynchInd
     */
    protected $ShareSynchInd = null;

    /**
     * @var anonymous338 $ShareMarketInd
     */
    protected $ShareMarketInd = null;

    /**
     * @var boolean $DefaultInd
     */
    protected $DefaultInd = null;

    /**
     * @param StringLength1to128 $_
     * @param OTA_CodeType $EmailType
     * @param anonymous337 $ShareSynchInd
     * @param anonymous338 $ShareMarketInd
     * @param boolean $DefaultInd
     */
    public function __construct($_ = null, $EmailType = null, $ShareSynchInd = null, $ShareMarketInd = null, $DefaultInd = null)
    {
      $this->_ = $_;
      $this->EmailType = $EmailType;
      $this->ShareSynchInd = $ShareSynchInd;
      $this->ShareMarketInd = $ShareMarketInd;
      $this->DefaultInd = $DefaultInd;
    }

    /**
     * @return StringLength1to128
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param StringLength1to128 $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\EmailType
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return OTA_CodeType
     */
    public function getEmailType()
    {
      return $this->EmailType;
    }

    /**
     * @param OTA_CodeType $EmailType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\EmailType
     */
    public function setEmailType($EmailType)
    {
      $this->EmailType = $EmailType;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\EmailType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\EmailType
     */
    public function setShareMarketInd($ShareMarketInd)
    {
      $this->ShareMarketInd = $ShareMarketInd;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getDefaultInd()
    {
      return $this->DefaultInd;
    }

    /**
     * @param boolean $DefaultInd
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\EmailType
     */
    public function setDefaultInd($DefaultInd)
    {
      $this->DefaultInd = $DefaultInd;
      return $this;
    }

}
