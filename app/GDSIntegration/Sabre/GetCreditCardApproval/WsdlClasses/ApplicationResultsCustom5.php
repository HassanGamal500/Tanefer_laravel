<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class ApplicationResultsCustom5 extends ResultsCustom5
{

    /**
     * @var ProblemInformation[] $Success
     */
    protected $Success = null;

    /**
     * @var ProblemInformation[] $Error
     */
    protected $Error = null;

    /**
     * @var ProblemInformation[] $Warning
     */
    protected $Warning = null;

    /**
     * @var CompletionCodes $status
     */
    protected $status = null;

    /**
     * @param CompletionCodes $status
     */
    public function __construct($status = null)
    {
      $this->status = $status;
    }

    /**
     * @return ProblemInformation[]
     */
    public function getSuccess()
    {
      return $this->Success;
    }

    /**
     * @param ProblemInformation[] $Success
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ApplicationResultsCustom5
     */
    public function setSuccess(array $Success = null)
    {
      $this->Success = $Success;
      return $this;
    }

    /**
     * @return ProblemInformation[]
     */
    public function getError()
    {
      return $this->Error;
    }

    /**
     * @param ProblemInformation[] $Error
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ApplicationResultsCustom5
     */
    public function setError(array $Error = null)
    {
      $this->Error = $Error;
      return $this;
    }

    /**
     * @return ProblemInformation[]
     */
    public function getWarning()
    {
      return $this->Warning;
    }

    /**
     * @param ProblemInformation[] $Warning
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ApplicationResultsCustom5
     */
    public function setWarning(array $Warning = null)
    {
      $this->Warning = $Warning;
      return $this;
    }

    /**
     * @return CompletionCodes
     */
    public function getStatus()
    {
      return $this->status;
    }

    /**
     * @param CompletionCodes $status
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ApplicationResultsCustom5
     */
    public function setStatus($status)
    {
      $this->status = $status;
      return $this;
    }

}
