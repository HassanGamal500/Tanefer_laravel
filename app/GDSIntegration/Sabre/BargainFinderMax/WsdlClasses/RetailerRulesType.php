<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class RetailerRulesType
{

    /**
     * @var RetailerRule[] $RetailerRule
     */
    protected $RetailerRule = null;

    /**
     * @var boolean $Force
     */
    protected $Force = null;

    /**
     * @param RetailerRule[] $RetailerRule
     * @param boolean $Force
     */
    public function __construct(array $RetailerRule = null, $Force = null)
    {
      $this->RetailerRule = $RetailerRule;
      $this->Force = $Force;
    }

    /**
     * @return RetailerRule[]
     */
    public function getRetailerRule()
    {
      return $this->RetailerRule;
    }

    /**
     * @param RetailerRule[] $RetailerRule
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\RetailerRulesType
     */
    public function setRetailerRule(array $RetailerRule)
    {
      $this->RetailerRule = $RetailerRule;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getForce()
    {
      return $this->Force;
    }

    /**
     * @param boolean $Force
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\RetailerRulesType
     */
    public function setForce($Force)
    {
      $this->Force = $Force;
      return $this;
    }

}
