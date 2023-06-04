<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class BrandFeatureType
{

    /**
     * @var int $Id
     */
    protected $Id = null;

    /**
     * @var CharacterType $Application
     */
    protected $Application = null;

    /**
     * @var CharacterType $ServiceType
     */
    protected $ServiceType = null;

    /**
     * @var anonymous780 $ServiceGroup
     */
    protected $ServiceGroup = null;

    /**
     * @var anonymous781 $SubCode
     */
    protected $SubCode = null;

    /**
     * @var string $Vendor
     */
    protected $Vendor = null;

    /**
     * @var string $CommercialName
     */
    protected $CommercialName = null;

    /**
     * @param int $Id
     * @param CharacterType $Application
     * @param CharacterType $ServiceType
     * @param anonymous780 $ServiceGroup
     * @param anonymous781 $SubCode
     * @param string $Vendor
     * @param string $CommercialName
     */
    public function __construct($Id = null, $Application = null, $ServiceType = null, $ServiceGroup = null, $SubCode = null, $Vendor = null, $CommercialName = null)
    {
      $this->Id = $Id;
      $this->Application = $Application;
      $this->ServiceType = $ServiceType;
      $this->ServiceGroup = $ServiceGroup;
      $this->SubCode = $SubCode;
      $this->Vendor = $Vendor;
      $this->CommercialName = $CommercialName;
    }

    /**
     * @return int
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param int $Id
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandFeatureType
     */
    public function setId($Id)
    {
      $this->Id = $Id;
      return $this;
    }

    /**
     * @return CharacterType
     */
    public function getApplication()
    {
      return $this->Application;
    }

    /**
     * @param CharacterType $Application
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandFeatureType
     */
    public function setApplication($Application)
    {
      $this->Application = $Application;
      return $this;
    }

    /**
     * @return CharacterType
     */
    public function getServiceType()
    {
      return $this->ServiceType;
    }

    /**
     * @param CharacterType $ServiceType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandFeatureType
     */
    public function setServiceType($ServiceType)
    {
      $this->ServiceType = $ServiceType;
      return $this;
    }

    /**
     * @return anonymous780
     */
    public function getServiceGroup()
    {
      return $this->ServiceGroup;
    }

    /**
     * @param anonymous780 $ServiceGroup
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandFeatureType
     */
    public function setServiceGroup($ServiceGroup)
    {
      $this->ServiceGroup = $ServiceGroup;
      return $this;
    }

    /**
     * @return anonymous781
     */
    public function getSubCode()
    {
      return $this->SubCode;
    }

    /**
     * @param anonymous781 $SubCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandFeatureType
     */
    public function setSubCode($SubCode)
    {
      $this->SubCode = $SubCode;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandFeatureType
     */
    public function setVendor($Vendor)
    {
      $this->Vendor = $Vendor;
      return $this;
    }

    /**
     * @return string
     */
    public function getCommercialName()
    {
      return $this->CommercialName;
    }

    /**
     * @param string $CommercialName
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandFeatureType
     */
    public function setCommercialName($CommercialName)
    {
      $this->CommercialName = $CommercialName;
      return $this;
    }

}
