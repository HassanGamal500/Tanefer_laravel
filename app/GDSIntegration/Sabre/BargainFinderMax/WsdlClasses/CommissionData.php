<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class CommissionData
{

    /**
     * @var VCCInformationType $VCCInformation
     */
    protected $VCCInformation = null;

    /**
     * @var float $Cat35CommissionPercentage
     */
    protected $Cat35CommissionPercentage = null;

    /**
     * @var float $Cat35CommissionAmount
     */
    protected $Cat35CommissionAmount = null;

    /**
     * @var float $Cat35MarkupAmount
     */
    protected $Cat35MarkupAmount = null;

    /**
     * @var float $CommissionAmountInEquivalent
     */
    protected $CommissionAmountInEquivalent = null;

    /**
     * @var CharacterType $CommissionSource
     */
    protected $CommissionSource = null;

    /**
     * @param VCCInformationType $VCCInformation
     * @param float $Cat35CommissionPercentage
     * @param float $Cat35CommissionAmount
     * @param float $Cat35MarkupAmount
     * @param float $CommissionAmountInEquivalent
     * @param CharacterType $CommissionSource
     */
    public function __construct($VCCInformation = null, $Cat35CommissionPercentage = null, $Cat35CommissionAmount = null, $Cat35MarkupAmount = null, $CommissionAmountInEquivalent = null, $CommissionSource = null)
    {
      $this->VCCInformation = $VCCInformation;
      $this->Cat35CommissionPercentage = $Cat35CommissionPercentage;
      $this->Cat35CommissionAmount = $Cat35CommissionAmount;
      $this->Cat35MarkupAmount = $Cat35MarkupAmount;
      $this->CommissionAmountInEquivalent = $CommissionAmountInEquivalent;
      $this->CommissionSource = $CommissionSource;
    }

    /**
     * @return VCCInformationType
     */
    public function getVCCInformation()
    {
      return $this->VCCInformation;
    }

    /**
     * @param VCCInformationType $VCCInformation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CommissionData
     */
    public function setVCCInformation($VCCInformation)
    {
      $this->VCCInformation = $VCCInformation;
      return $this;
    }

    /**
     * @return float
     */
    public function getCat35CommissionPercentage()
    {
      return $this->Cat35CommissionPercentage;
    }

    /**
     * @param float $Cat35CommissionPercentage
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CommissionData
     */
    public function setCat35CommissionPercentage($Cat35CommissionPercentage)
    {
      $this->Cat35CommissionPercentage = $Cat35CommissionPercentage;
      return $this;
    }

    /**
     * @return float
     */
    public function getCat35CommissionAmount()
    {
      return $this->Cat35CommissionAmount;
    }

    /**
     * @param float $Cat35CommissionAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CommissionData
     */
    public function setCat35CommissionAmount($Cat35CommissionAmount)
    {
      $this->Cat35CommissionAmount = $Cat35CommissionAmount;
      return $this;
    }

    /**
     * @return float
     */
    public function getCat35MarkupAmount()
    {
      return $this->Cat35MarkupAmount;
    }

    /**
     * @param float $Cat35MarkupAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CommissionData
     */
    public function setCat35MarkupAmount($Cat35MarkupAmount)
    {
      $this->Cat35MarkupAmount = $Cat35MarkupAmount;
      return $this;
    }

    /**
     * @return float
     */
    public function getCommissionAmountInEquivalent()
    {
      return $this->CommissionAmountInEquivalent;
    }

    /**
     * @param float $CommissionAmountInEquivalent
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CommissionData
     */
    public function setCommissionAmountInEquivalent($CommissionAmountInEquivalent)
    {
      $this->CommissionAmountInEquivalent = $CommissionAmountInEquivalent;
      return $this;
    }

    /**
     * @return CharacterType
     */
    public function getCommissionSource()
    {
      return $this->CommissionSource;
    }

    /**
     * @param CharacterType $CommissionSource
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CommissionData
     */
    public function setCommissionSource($CommissionSource)
    {
      $this->CommissionSource = $CommissionSource;
      return $this;
    }

}
