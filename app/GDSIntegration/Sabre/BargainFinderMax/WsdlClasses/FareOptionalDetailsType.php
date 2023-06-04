<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareOptionalDetailsType
{

    /**
     * @var int $ComponentNo
     */
    protected $ComponentNo = null;

    /**
     * @var FareBasisCodeType $BasisCode
     */
    protected $BasisCode = null;

    /**
     * @var Money $Amount
     */
    protected $Amount = null;

    /**
     * @var string $Vendor
     */
    protected $Vendor = null;

    /**
     * @var CarrierCode $SourceVendor
     */
    protected $SourceVendor = null;

    /**
     * @var string $Tariff
     */
    protected $Tariff = null;

    /**
     * @var string $RuleNumber
     */
    protected $RuleNumber = null;

    /**
     * @var anonymous483 $BrandID
     */
    protected $BrandID = null;

    /**
     * @var int $ProgramID
     */
    protected $ProgramID = null;

    /**
     * @param int $ComponentNo
     * @param FareBasisCodeType $BasisCode
     * @param Money $Amount
     * @param string $Vendor
     * @param CarrierCode $SourceVendor
     * @param string $Tariff
     * @param string $RuleNumber
     * @param anonymous483 $BrandID
     * @param int $ProgramID
     */
    public function __construct($ComponentNo = null, $BasisCode = null, $Amount = null, $Vendor = null, $SourceVendor = null, $Tariff = null, $RuleNumber = null, $BrandID = null, $ProgramID = null)
    {
      $this->ComponentNo = $ComponentNo;
      $this->BasisCode = $BasisCode;
      $this->Amount = $Amount;
      $this->Vendor = $Vendor;
      $this->SourceVendor = $SourceVendor;
      $this->Tariff = $Tariff;
      $this->RuleNumber = $RuleNumber;
      $this->BrandID = $BrandID;
      $this->ProgramID = $ProgramID;
    }

    /**
     * @return int
     */
    public function getComponentNo()
    {
      return $this->ComponentNo;
    }

    /**
     * @param int $ComponentNo
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareOptionalDetailsType
     */
    public function setComponentNo($ComponentNo)
    {
      $this->ComponentNo = $ComponentNo;
      return $this;
    }

    /**
     * @return FareBasisCodeType
     */
    public function getBasisCode()
    {
      return $this->BasisCode;
    }

    /**
     * @param FareBasisCodeType $BasisCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareOptionalDetailsType
     */
    public function setBasisCode($BasisCode)
    {
      $this->BasisCode = $BasisCode;
      return $this;
    }

    /**
     * @return Money
     */
    public function getAmount()
    {
      return $this->Amount;
    }

    /**
     * @param Money $Amount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareOptionalDetailsType
     */
    public function setAmount($Amount)
    {
      $this->Amount = $Amount;
      return $this;
    }

    /**
     * @return string
     */
    public function getVendor()
    {
      return $this->Vendor;
    }

    /**
     * @param string $Vendor
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareOptionalDetailsType
     */
    public function setVendor($Vendor)
    {
      $this->Vendor = $Vendor;
      return $this;
    }

    /**
     * @return CarrierCode
     */
    public function getSourceVendor()
    {
      return $this->SourceVendor;
    }

    /**
     * @param CarrierCode $SourceVendor
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareOptionalDetailsType
     */
    public function setSourceVendor($SourceVendor)
    {
      $this->SourceVendor = $SourceVendor;
      return $this;
    }

    /**
     * @return string
     */
    public function getTariff()
    {
      return $this->Tariff;
    }

    /**
     * @param string $Tariff
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareOptionalDetailsType
     */
    public function setTariff($Tariff)
    {
      $this->Tariff = $Tariff;
      return $this;
    }

    /**
     * @return string
     */
    public function getRuleNumber()
    {
      return $this->RuleNumber;
    }

    /**
     * @param string $RuleNumber
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareOptionalDetailsType
     */
    public function setRuleNumber($RuleNumber)
    {
      $this->RuleNumber = $RuleNumber;
      return $this;
    }

    /**
     * @return anonymous483
     */
    public function getBrandID()
    {
      return $this->BrandID;
    }

    /**
     * @param anonymous483 $BrandID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareOptionalDetailsType
     */
    public function setBrandID($BrandID)
    {
      $this->BrandID = $BrandID;
      return $this;
    }

    /**
     * @return int
     */
    public function getProgramID()
    {
      return $this->ProgramID;
    }

    /**
     * @param int $ProgramID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareOptionalDetailsType
     */
    public function setProgramID($ProgramID)
    {
      $this->ProgramID = $ProgramID;
      return $this;
    }

}
