<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class InterlineBrandsType
{

    /**
     * @var BrandType[] $Brand
     */
    protected $Brand = null;

    /**
     * @var boolean $ChangeBrandForSoldout
     */
    protected $ChangeBrandForSoldout = null;

    /**
     * @param boolean $ChangeBrandForSoldout
     */
    public function __construct($ChangeBrandForSoldout = null)
    {
      $this->ChangeBrandForSoldout = $ChangeBrandForSoldout;
    }

    /**
     * @return BrandType[]
     */
    public function getBrand()
    {
      return $this->Brand;
    }

    /**
     * @param BrandType[] $Brand
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\InterlineBrandsType
     */
    public function setBrand(array $Brand = null)
    {
      $this->Brand = $Brand;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getChangeBrandForSoldout()
    {
      return $this->ChangeBrandForSoldout;
    }

    /**
     * @param boolean $ChangeBrandForSoldout
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\InterlineBrandsType
     */
    public function setChangeBrandForSoldout($ChangeBrandForSoldout)
    {
      $this->ChangeBrandForSoldout = $ChangeBrandForSoldout;
      return $this;
    }

}
