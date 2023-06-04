<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class DescriptiveBillingCustom
{

    /**
     * @var CC_Info $CC_Info
     */
    protected $CC_Info = null;

    /**
     * @var boolean $Display
     */
    protected $Display = null;

    /**
     * @param CC_Info $CC_Info
     * @param boolean $Display
     */
    public function __construct($CC_Info = null, $Display = null)
    {
      $this->CC_Info = $CC_Info;
      $this->Display = $Display;
    }

    /**
     * @return CC_Info
     */
    public function getCC_Info()
    {
      return $this->CC_Info;
    }

    /**
     * @param CC_Info $CC_Info
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\DescriptiveBillingCustom
     */
    public function setCC_Info($CC_Info)
    {
      $this->CC_Info = $CC_Info;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getDisplay()
    {
      return $this->Display;
    }

    /**
     * @param boolean $Display
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\DescriptiveBillingCustom
     */
    public function setDisplay($Display)
    {
      $this->Display = $Display;
      return $this;
    }

}
