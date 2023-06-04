<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class BrandFiltersType
{

    /**
     * @var NonBrandedFares $NonBrandedFares
     */
    protected $NonBrandedFares = null;

    /**
     * @var BrandCodePrefType[] $Brand
     */
    protected $Brand = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return NonBrandedFares
     */
    public function getNonBrandedFares()
    {
      return $this->NonBrandedFares;
    }

    /**
     * @param NonBrandedFares $NonBrandedFares
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandFiltersType
     */
    public function setNonBrandedFares($NonBrandedFares)
    {
      $this->NonBrandedFares = $NonBrandedFares;
      return $this;
    }

    /**
     * @return BrandCodePrefType[]
     */
    public function getBrand()
    {
      return $this->Brand;
    }

    /**
     * @param BrandCodePrefType[] $Brand
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandFiltersType
     */
    public function setBrand(array $Brand = null)
    {
      $this->Brand = $Brand;
      return $this;
    }

}
