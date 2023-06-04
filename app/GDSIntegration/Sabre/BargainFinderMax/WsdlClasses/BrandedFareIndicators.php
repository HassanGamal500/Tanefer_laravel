<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class BrandedFareIndicators
{

    /**
     * @var ReturnCheapestUnbrandedFare $ReturnCheapestUnbrandedFare
     */
    protected $ReturnCheapestUnbrandedFare = null;

    /**
     * @var boolean $ReturnBrandAncillaries
     */
    protected $ReturnBrandAncillaries = null;

    /**
     * @param ReturnCheapestUnbrandedFare $ReturnCheapestUnbrandedFare
     * @param boolean $ReturnBrandAncillaries
     */
    public function __construct($ReturnCheapestUnbrandedFare = null, $ReturnBrandAncillaries = null)
    {
      $this->ReturnCheapestUnbrandedFare = $ReturnCheapestUnbrandedFare;
      $this->ReturnBrandAncillaries = $ReturnBrandAncillaries;
    }

    /**
     * @return ReturnCheapestUnbrandedFare
     */
    public function getReturnCheapestUnbrandedFare()
    {
      return $this->ReturnCheapestUnbrandedFare;
    }

    /**
     * @param ReturnCheapestUnbrandedFare $ReturnCheapestUnbrandedFare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandedFareIndicators
     */
    public function setReturnCheapestUnbrandedFare($ReturnCheapestUnbrandedFare)
    {
      $this->ReturnCheapestUnbrandedFare = $ReturnCheapestUnbrandedFare;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getReturnBrandAncillaries()
    {
      return $this->ReturnBrandAncillaries;
    }

    /**
     * @param boolean $ReturnBrandAncillaries
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandedFareIndicators
     */
    public function setReturnBrandAncillaries($ReturnBrandAncillaries)
    {
      $this->ReturnBrandAncillaries = $ReturnBrandAncillaries;
      return $this;
    }

}
