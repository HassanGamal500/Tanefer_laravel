<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class BillingInformationType
{

    /**
     * @var int $UserStation
     */
    protected $UserStation = null;

    /**
     * @var int $UserBranch
     */
    protected $UserBranch = null;

    /**
     * @var PartitionIDType $PartitionID
     */
    protected $PartitionID = null;

    /**
     * @var LnIATAType $UserSetAddress
     */
    protected $UserSetAddress = null;

    /**
     * @var StringLength1to16 $AAACity
     */
    protected $AAACity = null;

    /**
     * @var AgentFunctionType $AgentSineIn
     */
    protected $AgentSineIn = null;

    /**
     * @var ServiceNameType $ServiceName
     */
    protected $ServiceName = null;

    /**
     * @var BillingActionCodeType $ActionCode
     */
    protected $ActionCode = null;

    /**
     * @param int $UserStation
     * @param int $UserBranch
     * @param PartitionIDType $PartitionID
     * @param LnIATAType $UserSetAddress
     * @param StringLength1to16 $AAACity
     * @param AgentFunctionType $AgentSineIn
     * @param ServiceNameType $ServiceName
     * @param BillingActionCodeType $ActionCode
     */
    public function __construct($UserStation = null, $UserBranch = null, $PartitionID = null, $UserSetAddress = null, $AAACity = null, $AgentSineIn = null, $ServiceName = null, $ActionCode = null)
    {
      $this->UserStation = $UserStation;
      $this->UserBranch = $UserBranch;
      $this->PartitionID = $PartitionID;
      $this->UserSetAddress = $UserSetAddress;
      $this->AAACity = $AAACity;
      $this->AgentSineIn = $AgentSineIn;
      $this->ServiceName = $ServiceName;
      $this->ActionCode = $ActionCode;
    }

    /**
     * @return int
     */
    public function getUserStation()
    {
      return $this->UserStation;
    }

    /**
     * @param int $UserStation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BillingInformationType
     */
    public function setUserStation($UserStation)
    {
      $this->UserStation = $UserStation;
      return $this;
    }

    /**
     * @return int
     */
    public function getUserBranch()
    {
      return $this->UserBranch;
    }

    /**
     * @param int $UserBranch
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BillingInformationType
     */
    public function setUserBranch($UserBranch)
    {
      $this->UserBranch = $UserBranch;
      return $this;
    }

    /**
     * @return PartitionIDType
     */
    public function getPartitionID()
    {
      return $this->PartitionID;
    }

    /**
     * @param PartitionIDType $PartitionID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BillingInformationType
     */
    public function setPartitionID($PartitionID)
    {
      $this->PartitionID = $PartitionID;
      return $this;
    }

    /**
     * @return LnIATAType
     */
    public function getUserSetAddress()
    {
      return $this->UserSetAddress;
    }

    /**
     * @param LnIATAType $UserSetAddress
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BillingInformationType
     */
    public function setUserSetAddress($UserSetAddress)
    {
      $this->UserSetAddress = $UserSetAddress;
      return $this;
    }

    /**
     * @return StringLength1to16
     */
    public function getAAACity()
    {
      return $this->AAACity;
    }

    /**
     * @param StringLength1to16 $AAACity
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BillingInformationType
     */
    public function setAAACity($AAACity)
    {
      $this->AAACity = $AAACity;
      return $this;
    }

    /**
     * @return AgentFunctionType
     */
    public function getAgentSineIn()
    {
      return $this->AgentSineIn;
    }

    /**
     * @param AgentFunctionType $AgentSineIn
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BillingInformationType
     */
    public function setAgentSineIn($AgentSineIn)
    {
      $this->AgentSineIn = $AgentSineIn;
      return $this;
    }

    /**
     * @return ServiceNameType
     */
    public function getServiceName()
    {
      return $this->ServiceName;
    }

    /**
     * @param ServiceNameType $ServiceName
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BillingInformationType
     */
    public function setServiceName($ServiceName)
    {
      $this->ServiceName = $ServiceName;
      return $this;
    }

    /**
     * @return BillingActionCodeType
     */
    public function getActionCode()
    {
      return $this->ActionCode;
    }

    /**
     * @param BillingActionCodeType $ActionCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BillingInformationType
     */
    public function setActionCode($ActionCode)
    {
      $this->ActionCode = $ActionCode;
      return $this;
    }

}
