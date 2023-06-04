<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class BrandFeatureRefType
{

    /**
     * @var int $FeatureId
     */
    protected $FeatureId = null;

    /**
     * @var string $ServiceId
     */
    protected $ServiceId = null;

    /**
     * @param int $FeatureId
     * @param string $ServiceId
     */
    public function __construct($FeatureId = null, $ServiceId = null)
    {
      $this->FeatureId = $FeatureId;
      $this->ServiceId = $ServiceId;
    }

    /**
     * @return int
     */
    public function getFeatureId()
    {
      return $this->FeatureId;
    }

    /**
     * @param int $FeatureId
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandFeatureRefType
     */
    public function setFeatureId($FeatureId)
    {
      $this->FeatureId = $FeatureId;
      return $this;
    }

    /**
     * @return string
     */
    public function getServiceId()
    {
      return $this->ServiceId;
    }

    /**
     * @param string $ServiceId
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandFeatureRefType
     */
    public function setServiceId($ServiceId)
    {
      $this->ServiceId = $ServiceId;
      return $this;
    }

}
