<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class CreditVerificationRSCustom4
{

    /**
     * @var ApplicationResults $ApplicationResults
     */
    protected $ApplicationResults = null;

    /**
     * @var string $Text
     */
    protected $Text = null;

    /**
     * @var string $Version
     */
    protected $Version = null;

    /**
     * @param ApplicationResults $ApplicationResults
     * @param string $Text
     * @param string $Version
     */
    public function __construct($ApplicationResults = null, $Text = null, $Version = null)
    {
      $this->ApplicationResults = $ApplicationResults;
      $this->Text = $Text;
      $this->Version = $Version;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CreditVerificationRSCustom4
     */
    public function setApplicationResults($ApplicationResults)
    {
      $this->ApplicationResults = $ApplicationResults;
      return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
      return $this->Text;
    }

    /**
     * @param string $Text
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CreditVerificationRSCustom4
     */
    public function setText($Text)
    {
      $this->Text = $Text;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CreditVerificationRSCustom4
     */
    public function setVersion($Version)
    {
      $this->Version = $Version;
      return $this;
    }

}
