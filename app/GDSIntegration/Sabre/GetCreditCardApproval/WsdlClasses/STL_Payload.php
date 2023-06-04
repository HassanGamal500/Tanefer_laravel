<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class STL_Payload
{

    /**
     * @var ApplicationResults $ApplicationResults
     */
    protected $ApplicationResults = null;

    /**
     * @var anonymous45 $version
     */
    protected $version = null;

    /**
     * @param ApplicationResults $ApplicationResults
     * @param anonymous45 $version
     */
    public function __construct($ApplicationResults = null, $version = null)
    {
      $this->ApplicationResults = $ApplicationResults;
      $this->version = $version;
    }

    /**
     * @return ApplicationResults
     */
    public function getApplicationResults()
    {
      return $this->ApplicationResults;
    }

    /**
     * @param ApplicationResults $ApplicationResults
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\STL_Payload
     */
    public function setApplicationResults($ApplicationResults)
    {
      $this->ApplicationResults = $ApplicationResults;
      return $this;
    }

    /**
     * @return anonymous45
     */
    public function getVersion()
    {
      return $this->version;
    }

    /**
     * @param anonymous45 $version
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\STL_Payload
     */
    public function setVersion($version)
    {
      $this->version = $version;
      return $this;
    }

}
