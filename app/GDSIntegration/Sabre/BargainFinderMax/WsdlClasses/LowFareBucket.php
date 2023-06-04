<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class LowFareBucket
{

    /**
     * @var CountOrPercentage $Options
     */
    protected $Options = null;

    /**
     * @var IntPercentage $FareCutOff
     */
    protected $FareCutOff = null;

    /**
     * @param CountOrPercentage $Options
     * @param IntPercentage $FareCutOff
     */
    public function __construct($Options = null, $FareCutOff = null)
    {
      $this->Options = $Options;
      $this->FareCutOff = $FareCutOff;
    }

    /**
     * @return CountOrPercentage
     */
    public function getOptions()
    {
      return $this->Options;
    }

    /**
     * @param CountOrPercentage $Options
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\LowFareBucket
     */
    public function setOptions($Options)
    {
      $this->Options = $Options;
      return $this;
    }

    /**
     * @return IntPercentage
     */
    public function getFareCutOff()
    {
      return $this->FareCutOff;
    }

    /**
     * @param IntPercentage $FareCutOff
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\LowFareBucket
     */
    public function setFareCutOff($FareCutOff)
    {
      $this->FareCutOff = $FareCutOff;
      return $this;
    }

}
