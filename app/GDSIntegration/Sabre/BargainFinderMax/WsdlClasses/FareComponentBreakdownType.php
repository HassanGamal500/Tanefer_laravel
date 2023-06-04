<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareComponentBreakdownType
{

    /**
     * @var int $FareComponentReferenceID
     */
    protected $FareComponentReferenceID = null;

    /**
     * @var Money $FareComponentCommission
     */
    protected $FareComponentCommission = null;

    /**
     * @var Money $EarnedFareComponentCommission
     */
    protected $EarnedFareComponentCommission = null;

    /**
     * @var int $MethodID
     */
    protected $MethodID = null;

    /**
     * @var int $RuleID
     */
    protected $RuleID = null;

    /**
     * @var int $RuleFamilyID
     */
    protected $RuleFamilyID = null;

    /**
     * @var int $ContractID
     */
    protected $ContractID = null;

    /**
     * @var int $ContractFamilyID
     */
    protected $ContractFamilyID = null;

    /**
     * @param int $FareComponentReferenceID
     * @param Money $FareComponentCommission
     * @param Money $EarnedFareComponentCommission
     * @param int $MethodID
     * @param int $RuleID
     * @param int $RuleFamilyID
     * @param int $ContractID
     * @param int $ContractFamilyID
     */
    public function __construct($FareComponentReferenceID = null, $FareComponentCommission = null, $EarnedFareComponentCommission = null, $MethodID = null, $RuleID = null, $RuleFamilyID = null, $ContractID = null, $ContractFamilyID = null)
    {
      $this->FareComponentReferenceID = $FareComponentReferenceID;
      $this->FareComponentCommission = $FareComponentCommission;
      $this->EarnedFareComponentCommission = $EarnedFareComponentCommission;
      $this->MethodID = $MethodID;
      $this->RuleID = $RuleID;
      $this->RuleFamilyID = $RuleFamilyID;
      $this->ContractID = $ContractID;
      $this->ContractFamilyID = $ContractFamilyID;
    }

    /**
     * @return int
     */
    public function getFareComponentReferenceID()
    {
      return $this->FareComponentReferenceID;
    }

    /**
     * @param int $FareComponentReferenceID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponentBreakdownType
     */
    public function setFareComponentReferenceID($FareComponentReferenceID)
    {
      $this->FareComponentReferenceID = $FareComponentReferenceID;
      return $this;
    }

    /**
     * @return Money
     */
    public function getFareComponentCommission()
    {
      return $this->FareComponentCommission;
    }

    /**
     * @param Money $FareComponentCommission
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponentBreakdownType
     */
    public function setFareComponentCommission($FareComponentCommission)
    {
      $this->FareComponentCommission = $FareComponentCommission;
      return $this;
    }

    /**
     * @return Money
     */
    public function getEarnedFareComponentCommission()
    {
      return $this->EarnedFareComponentCommission;
    }

    /**
     * @param Money $EarnedFareComponentCommission
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponentBreakdownType
     */
    public function setEarnedFareComponentCommission($EarnedFareComponentCommission)
    {
      $this->EarnedFareComponentCommission = $EarnedFareComponentCommission;
      return $this;
    }

    /**
     * @return int
     */
    public function getMethodID()
    {
      return $this->MethodID;
    }

    /**
     * @param int $MethodID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponentBreakdownType
     */
    public function setMethodID($MethodID)
    {
      $this->MethodID = $MethodID;
      return $this;
    }

    /**
     * @return int
     */
    public function getRuleID()
    {
      return $this->RuleID;
    }

    /**
     * @param int $RuleID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponentBreakdownType
     */
    public function setRuleID($RuleID)
    {
      $this->RuleID = $RuleID;
      return $this;
    }

    /**
     * @return int
     */
    public function getRuleFamilyID()
    {
      return $this->RuleFamilyID;
    }

    /**
     * @param int $RuleFamilyID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponentBreakdownType
     */
    public function setRuleFamilyID($RuleFamilyID)
    {
      $this->RuleFamilyID = $RuleFamilyID;
      return $this;
    }

    /**
     * @return int
     */
    public function getContractID()
    {
      return $this->ContractID;
    }

    /**
     * @param int $ContractID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponentBreakdownType
     */
    public function setContractID($ContractID)
    {
      $this->ContractID = $ContractID;
      return $this;
    }

    /**
     * @return int
     */
    public function getContractFamilyID()
    {
      return $this->ContractFamilyID;
    }

    /**
     * @param int $ContractFamilyID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponentBreakdownType
     */
    public function setContractFamilyID($ContractFamilyID)
    {
      $this->ContractFamilyID = $ContractFamilyID;
      return $this;
    }

}
