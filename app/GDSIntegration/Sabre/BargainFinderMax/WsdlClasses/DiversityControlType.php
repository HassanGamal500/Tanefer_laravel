<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class DiversityControlType
{

    /**
     * @var LowFareBucket $LowFareBucket
     */
    protected $LowFareBucket = null;

    /**
     * @var Dimensions $Dimensions
     */
    protected $Dimensions = null;

    /**
     * @param LowFareBucket $LowFareBucket
     * @param Dimensions $Dimensions
     */
    public function __construct($LowFareBucket = null, $Dimensions = null)
    {
      $this->LowFareBucket = $LowFareBucket;
      $this->Dimensions = $Dimensions;
    }

    /**
     * @return LowFareBucket
     */
    public function getLowFareBucket()
    {
      return $this->LowFareBucket;
    }

    /**
     * @param LowFareBucket $LowFareBucket
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DiversityControlType
     */
    public function setLowFareBucket($LowFareBucket)
    {
      $this->LowFareBucket = $LowFareBucket;
      return $this;
    }

    /**
     * @return Dimensions
     */
    public function getDimensions()
    {
      return $this->Dimensions;
    }

    /**
     * @param Dimensions $Dimensions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DiversityControlType
     */
    public function setDimensions($Dimensions)
    {
      $this->Dimensions = $Dimensions;
      return $this;
    }

}
