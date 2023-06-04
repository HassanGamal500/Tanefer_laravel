<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TicketDistribPrefType
{

    /**
     * @var StringLength0to64 $_
     */
    protected $_ = null;

    /**
     * @var OTA_CodeType $DistribType
     */
    protected $DistribType = null;

    /**
     * @var duration $TicketTime
     */
    protected $TicketTime = null;

    /**
     * @var PreferLevelType $PreferLevel
     */
    protected $PreferLevel = null;

    /**
     * @param StringLength0to64 $_
     * @param OTA_CodeType $DistribType
     * @param duration $TicketTime
     * @param PreferLevelType $PreferLevel
     */
    public function __construct($_ = null, $DistribType = null, $TicketTime = null, $PreferLevel = null)
    {
      $this->_ = $_;
      $this->DistribType = $DistribType;
      $this->TicketTime = $TicketTime;
      $this->PreferLevel = $PreferLevel;
    }

    /**
     * @return StringLength0to64
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param StringLength0to64 $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TicketDistribPrefType
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return OTA_CodeType
     */
    public function getDistribType()
    {
      return $this->DistribType;
    }

    /**
     * @param OTA_CodeType $DistribType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TicketDistribPrefType
     */
    public function setDistribType($DistribType)
    {
      $this->DistribType = $DistribType;
      return $this;
    }

    /**
     * @return duration
     */
    public function getTicketTime()
    {
      return $this->TicketTime;
    }

    /**
     * @param duration $TicketTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TicketDistribPrefType
     */
    public function setTicketTime($TicketTime)
    {
      $this->TicketTime = $TicketTime;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TicketDistribPrefType
     */
    public function setPreferLevel($PreferLevel)
    {
      $this->PreferLevel = $PreferLevel;
      return $this;
    }

}
