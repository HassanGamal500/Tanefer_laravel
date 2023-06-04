<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class BrandFeatureListType
{

    /**
     * @var BrandFeatureType[] $BrandFeature
     */
    protected $BrandFeature = null;

    /**
     * @param BrandFeatureType[] $BrandFeature
     */
    public function __construct(array $BrandFeature = null)
    {
      $this->BrandFeature = $BrandFeature;
    }

    /**
     * @return BrandFeatureType[]
     */
    public function getBrandFeature()
    {
      return $this->BrandFeature;
    }

    /**
     * @param BrandFeatureType[] $BrandFeature
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandFeatureListType
     */
    public function setBrandFeature(array $BrandFeature)
    {
      $this->BrandFeature = $BrandFeature;
      return $this;
    }

}
