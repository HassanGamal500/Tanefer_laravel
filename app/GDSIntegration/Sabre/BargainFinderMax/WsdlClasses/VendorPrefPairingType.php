<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class VendorPrefPairingType
{

    /**
     * @var VendorPref[] $VendorPref
     */
    protected $VendorPref = null;

    /**
     * @var anonymous297 $PreferLevel
     */
    protected $PreferLevel = null;

    /**
     * @var ApplicabilityEnumType $Applicability
     */
    protected $Applicability = null;

    /**
     * @param VendorPref[] $VendorPref
     * @param anonymous297 $PreferLevel
     * @param ApplicabilityEnumType $Applicability
     */
    public function __construct(array $VendorPref = null, $PreferLevel = null, $Applicability = null)
    {
      $this->VendorPref = $VendorPref;
      $this->PreferLevel = $PreferLevel;
      $this->Applicability = $Applicability;
    }

    /**
     * @return VendorPref[]
     */
    public function getVendorPref()
    {
      return $this->VendorPref;
    }

    /**
     * @param VendorPref[] $VendorPref
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VendorPrefPairingType
     */
    public function setVendorPref(array $VendorPref)
    {
      $this->VendorPref = $VendorPref;
      return $this;
    }

    /**
     * @return anonymous297
     */
    public function getPreferLevel()
    {
      return $this->PreferLevel;
    }

    /**
     * @param anonymous297 $PreferLevel
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VendorPrefPairingType
     */
    public function setPreferLevel($PreferLevel)
    {
      $this->PreferLevel = $PreferLevel;
      return $this;
    }

    /**
     * @return ApplicabilityEnumType
     */
    public function getApplicability()
    {
      return $this->Applicability;
    }

    /**
     * @param ApplicabilityEnumType $Applicability
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VendorPrefPairingType
     */
    public function setApplicability($Applicability)
    {
      $this->Applicability = $Applicability;
      return $this;
    }

}
