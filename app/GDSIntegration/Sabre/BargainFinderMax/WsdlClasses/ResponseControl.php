<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ResponseControl
{

    /**
     * @var ConnectionOrientedResponse $ConnectionOrientedResponse
     */
    protected $ConnectionOrientedResponse = null;

    /**
     * @var boolean $TaxBreakdown
     */
    protected $TaxBreakdown = null;

    /**
     * @param ConnectionOrientedResponse $ConnectionOrientedResponse
     * @param boolean $TaxBreakdown
     */
    public function __construct($ConnectionOrientedResponse = null, $TaxBreakdown = null)
    {
      $this->ConnectionOrientedResponse = $ConnectionOrientedResponse;
      $this->TaxBreakdown = $TaxBreakdown;
    }

    /**
     * @return ConnectionOrientedResponse
     */
    public function getConnectionOrientedResponse()
    {
      return $this->ConnectionOrientedResponse;
    }

    /**
     * @param ConnectionOrientedResponse $ConnectionOrientedResponse
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ResponseControl
     */
    public function setConnectionOrientedResponse($ConnectionOrientedResponse)
    {
      $this->ConnectionOrientedResponse = $ConnectionOrientedResponse;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getTaxBreakdown()
    {
      return $this->TaxBreakdown;
    }

    /**
     * @param boolean $TaxBreakdown
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ResponseControl
     */
    public function setTaxBreakdown($TaxBreakdown)
    {
      $this->TaxBreakdown = $TaxBreakdown;
      return $this;
    }

}
