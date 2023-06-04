<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareOverride
{

    /**
     * @var CompanyNamePrefType $VendorPref
     */
    protected $VendorPref = null;

    /**
     * @var string $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @var string $FareType
     */
    protected $FareType = null;

    /**
     * @var string $PseudoCityCode
     */
    protected $PseudoCityCode = null;

    /**
     * @var string $CorporateID
     */
    protected $CorporateID = null;

    /**
     * @var string $Callable
     */
    protected $Callable = null;

    /**
     * @param CompanyNamePrefType $VendorPref
     * @param string $TPA_Extensions
     * @param string $FareType
     * @param string $PseudoCityCode
     * @param string $CorporateID
     * @param string $Callable
     */
    public function __construct($VendorPref = null, $TPA_Extensions = null, $FareType = null, $PseudoCityCode = null, $CorporateID = null, $Callable = null)
    {
      $this->VendorPref = $VendorPref;
      $this->TPA_Extensions = $TPA_Extensions;
      $this->FareType = $FareType;
      $this->PseudoCityCode = $PseudoCityCode;
      $this->CorporateID = $CorporateID;
      $this->Callable = $Callable;
    }

    /**
     * @return CompanyNamePrefType
     */
    public function getVendorPref()
    {
      return $this->VendorPref;
    }

    /**
     * @param CompanyNamePrefType $VendorPref
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareOverride
     */
    public function setVendorPref($VendorPref)
    {
      $this->VendorPref = $VendorPref;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareOverride
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      return $this;
    }

    /**
     * @return string
     */
    public function getFareType()
    {
      return $this->FareType;
    }

    /**
     * @param string $FareType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareOverride
     */
    public function setFareType($FareType)
    {
      $this->FareType = $FareType;
      return $this;
    }

    /**
     * @return string
     */
    public function getPseudoCityCode()
    {
      return $this->PseudoCityCode;
    }

    /**
     * @param string $PseudoCityCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareOverride
     */
    public function setPseudoCityCode($PseudoCityCode)
    {
      $this->PseudoCityCode = $PseudoCityCode;
      return $this;
    }

    /**
     * @return string
     */
    public function getCorporateID()
    {
      return $this->CorporateID;
    }

    /**
     * @param string $CorporateID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareOverride
     */
    public function setCorporateID($CorporateID)
    {
      $this->CorporateID = $CorporateID;
      return $this;
    }

    /**
     * @return string
     */
    public function getCallable()
    {
      return $this->Callable;
    }

    /**
     * @param string $Callable
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareOverride
     */
    public function setCallable($Callable)
    {
      $this->Callable = $Callable;
      return $this;
    }

}
