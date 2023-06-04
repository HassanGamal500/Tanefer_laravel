<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class VCCInformationType
{

    /**
     * @var FareComponentBreakdownType[] $FareComponentBreakdown
     */
    protected $FareComponentBreakdown = null;

    /**
     * @var CarrierCode $ValidatingCarrier
     */
    protected $ValidatingCarrier = null;

    /**
     * @var Money $CommissionAmount
     */
    protected $CommissionAmount = null;

    /**
     * @var Money $EarnedCommissionAmount
     */
    protected $EarnedCommissionAmount = null;

    /**
     * @var Money $TotalAmountIncludingMarkUp
     */
    protected $TotalAmountIncludingMarkUp = null;

    /**
     * @var Money $CommissionPercent
     */
    protected $CommissionPercent = null;

    /**
     * @var CommissionContractQualifierType $CommissionContractQualifier
     */
    protected $CommissionContractQualifier = null;

    /**
     * @var string $SourcePCC
     */
    protected $SourcePCC = null;

    /**
     * @param CarrierCode $ValidatingCarrier
     * @param Money $CommissionAmount
     * @param Money $EarnedCommissionAmount
     * @param Money $TotalAmountIncludingMarkUp
     * @param Money $CommissionPercent
     * @param CommissionContractQualifierType $CommissionContractQualifier
     * @param string $SourcePCC
     */
    public function __construct($ValidatingCarrier = null, $CommissionAmount = null, $EarnedCommissionAmount = null, $TotalAmountIncludingMarkUp = null, $CommissionPercent = null, $CommissionContractQualifier = null, $SourcePCC = null)
    {
      $this->ValidatingCarrier = $ValidatingCarrier;
      $this->CommissionAmount = $CommissionAmount;
      $this->EarnedCommissionAmount = $EarnedCommissionAmount;
      $this->TotalAmountIncludingMarkUp = $TotalAmountIncludingMarkUp;
      $this->CommissionPercent = $CommissionPercent;
      $this->CommissionContractQualifier = $CommissionContractQualifier;
      $this->SourcePCC = $SourcePCC;
    }

    /**
     * @return FareComponentBreakdownType[]
     */
    public function getFareComponentBreakdown()
    {
      return $this->FareComponentBreakdown;
    }

    /**
     * @param FareComponentBreakdownType[] $FareComponentBreakdown
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VCCInformationType
     */
    public function setFareComponentBreakdown(array $FareComponentBreakdown = null)
    {
      $this->FareComponentBreakdown = $FareComponentBreakdown;
      return $this;
    }

    /**
     * @return CarrierCode
     */
    public function getValidatingCarrier()
    {
      return $this->ValidatingCarrier;
    }

    /**
     * @param CarrierCode $ValidatingCarrier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VCCInformationType
     */
    public function setValidatingCarrier($ValidatingCarrier)
    {
      $this->ValidatingCarrier = $ValidatingCarrier;
      return $this;
    }

    /**
     * @return Money
     */
    public function getCommissionAmount()
    {
      return $this->CommissionAmount;
    }

    /**
     * @param Money $CommissionAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VCCInformationType
     */
    public function setCommissionAmount($CommissionAmount)
    {
      $this->CommissionAmount = $CommissionAmount;
      return $this;
    }

    /**
     * @return Money
     */
    public function getEarnedCommissionAmount()
    {
      return $this->EarnedCommissionAmount;
    }

    /**
     * @param Money $EarnedCommissionAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VCCInformationType
     */
    public function setEarnedCommissionAmount($EarnedCommissionAmount)
    {
      $this->EarnedCommissionAmount = $EarnedCommissionAmount;
      return $this;
    }

    /**
     * @return Money
     */
    public function getTotalAmountIncludingMarkUp()
    {
      return $this->TotalAmountIncludingMarkUp;
    }

    /**
     * @param Money $TotalAmountIncludingMarkUp
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VCCInformationType
     */
    public function setTotalAmountIncludingMarkUp($TotalAmountIncludingMarkUp)
    {
      $this->TotalAmountIncludingMarkUp = $TotalAmountIncludingMarkUp;
      return $this;
    }

    /**
     * @return Money
     */
    public function getCommissionPercent()
    {
      return $this->CommissionPercent;
    }

    /**
     * @param Money $CommissionPercent
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VCCInformationType
     */
    public function setCommissionPercent($CommissionPercent)
    {
      $this->CommissionPercent = $CommissionPercent;
      return $this;
    }

    /**
     * @return CommissionContractQualifierType
     */
    public function getCommissionContractQualifier()
    {
      return $this->CommissionContractQualifier;
    }

    /**
     * @param CommissionContractQualifierType $CommissionContractQualifier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VCCInformationType
     */
    public function setCommissionContractQualifier($CommissionContractQualifier)
    {
      $this->CommissionContractQualifier = $CommissionContractQualifier;
      return $this;
    }

    /**
     * @return string
     */
    public function getSourcePCC()
    {
      return $this->SourcePCC;
    }

    /**
     * @param string $SourcePCC
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VCCInformationType
     */
    public function setSourcePCC($SourcePCC)
    {
      $this->SourcePCC = $SourcePCC;
      return $this;
    }

}
