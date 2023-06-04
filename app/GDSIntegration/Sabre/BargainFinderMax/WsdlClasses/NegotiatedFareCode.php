<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class NegotiatedFareCode
{

    /**
     * @var CompanyNameType $Supplier
     */
    protected $Supplier = null;

    /**
     * @var string $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @var StringLength1to16 $SecondaryCode
     */
    protected $SecondaryCode = null;

    /**
     * @var StringLength1to16 $SupplierCode
     */
    protected $SupplierCode = null;

    /**
     * @var CorporateIDType $Code
     */
    protected $Code = null;

    /**
     * @var StringLength1to32 $CodeContext
     */
    protected $CodeContext = null;

    /**
     * @var anyURI $URI
     */
    protected $URI = null;

    /**
     * @var Numeric1to999 $Quantity
     */
    protected $Quantity = null;

    /**
     * @param CompanyNameType $Supplier
     * @param string $TPA_Extensions
     * @param StringLength1to16 $SecondaryCode
     * @param StringLength1to16 $SupplierCode
     * @param CorporateIDType $Code
     * @param StringLength1to32 $CodeContext
     * @param anyURI $URI
     * @param Numeric1to999 $Quantity
     */
    public function __construct($Supplier = null, $TPA_Extensions = null, $SecondaryCode = null, $SupplierCode = null, $Code = null, $CodeContext = null, $URI = null, $Quantity = null)
    {
      $this->Supplier = $Supplier;
      $this->TPA_Extensions = $TPA_Extensions;
      $this->SecondaryCode = $SecondaryCode;
      $this->SupplierCode = $SupplierCode;
      $this->Code = $Code;
      $this->CodeContext = $CodeContext;
      $this->URI = $URI;
      $this->Quantity = $Quantity;
    }

    /**
     * @return CompanyNameType
     */
    public function getSupplier()
    {
      return $this->Supplier;
    }

    /**
     * @param CompanyNameType $Supplier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\NegotiatedFareCode
     */
    public function setSupplier($Supplier)
    {
      $this->Supplier = $Supplier;
      return $this;
    }

    /**
     * @return string
     */
    public function getTPA_Extensions()
    {
      return $this->TPA_Extensions;
    }

    /**
     * @param string $TPA_Extensions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\NegotiatedFareCode
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      return $this;
    }

    /**
     * @return StringLength1to16
     */
    public function getSecondaryCode()
    {
      return $this->SecondaryCode;
    }

    /**
     * @param StringLength1to16 $SecondaryCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\NegotiatedFareCode
     */
    public function setSecondaryCode($SecondaryCode)
    {
      $this->SecondaryCode = $SecondaryCode;
      return $this;
    }

    /**
     * @return StringLength1to16
     */
    public function getSupplierCode()
    {
      return $this->SupplierCode;
    }

    /**
     * @param StringLength1to16 $SupplierCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\NegotiatedFareCode
     */
    public function setSupplierCode($SupplierCode)
    {
      $this->SupplierCode = $SupplierCode;
      return $this;
    }

    /**
     * @return CorporateIDType
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param CorporateIDType $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\NegotiatedFareCode
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

    /**
     * @return StringLength1to32
     */
    public function getCodeContext()
    {
      return $this->CodeContext;
    }

    /**
     * @param StringLength1to32 $CodeContext
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\NegotiatedFareCode
     */
    public function setCodeContext($CodeContext)
    {
      $this->CodeContext = $CodeContext;
      return $this;
    }

    /**
     * @return anyURI
     */
    public function getURI()
    {
      return $this->URI;
    }

    /**
     * @param anyURI $URI
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\NegotiatedFareCode
     */
    public function setURI($URI)
    {
      $this->URI = $URI;
      return $this;
    }

    /**
     * @return Numeric1to999
     */
    public function getQuantity()
    {
      return $this->Quantity;
    }

    /**
     * @param Numeric1to999 $Quantity
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\NegotiatedFareCode
     */
    public function setQuantity($Quantity)
    {
      $this->Quantity = $Quantity;
      return $this;
    }

}
