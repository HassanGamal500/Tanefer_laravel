<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class CreditVerificationRQCustom2
{

    /**
     * @var Credit $Credit
     */
    protected $Credit = null;

    /**
     * @var DescriptiveBilling $DescriptiveBilling
     */
    protected $DescriptiveBilling = null;

    /**
     * @var boolean $ReturnHostCommand
     */
    protected $ReturnHostCommand = null;

    /**
     * @var \DateTime $TimeStamp
     */
    protected $TimeStamp = null;

    /**
     * @var string $Version
     */
    protected $Version = null;

    /**
     * @param Credit $Credit
     * @param DescriptiveBilling $DescriptiveBilling
     * @param boolean $ReturnHostCommand
     * @param \DateTime $TimeStamp
     * @param string $Version
     */
    public function __construct($Credit = null, $DescriptiveBilling = null, $ReturnHostCommand = null, \DateTime $TimeStamp = null, $Version = null)
    {
      $this->Credit = $Credit;
      $this->DescriptiveBilling = $DescriptiveBilling;
      $this->ReturnHostCommand = $ReturnHostCommand;
      $this->TimeStamp = $TimeStamp ? $TimeStamp->format(\DateTime::ATOM) : null;
      $this->Version = $Version;
    }

    /**
     * @return Credit
     */
    public function getCredit()
    {
      return $this->Credit;
    }

    /**
     * @param Credit $Credit
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CreditVerificationRQCustom2
     */
    public function setCredit($Credit)
    {
      $this->Credit = $Credit;
      return $this;
    }

    /**
     * @return DescriptiveBilling
     */
    public function getDescriptiveBilling()
    {
      return $this->DescriptiveBilling;
    }

    /**
     * @param DescriptiveBilling $DescriptiveBilling
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CreditVerificationRQCustom2
     */
    public function setDescriptiveBilling($DescriptiveBilling)
    {
      $this->DescriptiveBilling = $DescriptiveBilling;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getReturnHostCommand()
    {
      return $this->ReturnHostCommand;
    }

    /**
     * @param boolean $ReturnHostCommand
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CreditVerificationRQCustom2
     */
    public function setReturnHostCommand($ReturnHostCommand)
    {
      $this->ReturnHostCommand = $ReturnHostCommand;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTimeStamp()
    {
      if ($this->TimeStamp == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->TimeStamp);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $TimeStamp
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CreditVerificationRQCustom2
     */
    public function setTimeStamp(\DateTime $TimeStamp)
    {
      $this->TimeStamp = $TimeStamp->format(\DateTime::ATOM);
      return $this;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
      return $this->Version;
    }

    /**
     * @param string $Version
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CreditVerificationRQCustom2
     */
    public function setVersion($Version)
    {
      $this->Version = $Version;
      return $this;
    }

}
