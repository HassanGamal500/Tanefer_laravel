<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TravelPreferences
{

    /**
     * @var VendorPref $VendorPref
     */
    protected $VendorPref = null;

    /**
     * @var TPA_Extensions $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @param VendorPref $VendorPref
     * @param TPA_Extensions $TPA_Extensions
     */
    public function __construct($VendorPref = null, $TPA_Extensions = null)
    {
      $this->VendorPref = $VendorPref;
      $this->TPA_Extensions = $TPA_Extensions;
    }

    /**
     * @return VendorPref
     */
    public function getVendorPref()
    {
      return $this->VendorPref;
    }

    /**
     * @param VendorPref $VendorPref
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelPreferences
     */
    public function setVendorPref($VendorPref)
    {
      $this->VendorPref = $VendorPref;
      return $this;
    }

    /**
     * @return TPA_Extensions
     */
    public function getTPA_Extensions()
    {
      return $this->TPA_Extensions;
    }

    /**
     * @param TPA_Extensions $TPA_Extensions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelPreferences
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      return $this;
    }

}
