<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class ResultSummaryCustom
{

    /**
     * @var EmptyElement $Success
     */
    protected $Success = null;

    /**
     * @var ProblemSummary $Error
     */
    protected $Error = null;

    /**
     * @param EmptyElement $Success
     * @param ProblemSummary $Error
     */
    public function __construct($Success = null, $Error = null)
    {
      $this->Success = $Success;
      $this->Error = $Error;
    }

    /**
     * @return EmptyElement
     */
    public function getSuccess()
    {
      return $this->Success;
    }

    /**
     * @param EmptyElement $Success
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ResultSummaryCustom
     */
    public function setSuccess($Success)
    {
      $this->Success = $Success;
      return $this;
    }

    /**
     * @return ProblemSummary
     */
    public function getError()
    {
      return $this->Error;
    }

    /**
     * @param ProblemSummary $Error
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ResultSummaryCustom
     */
    public function setError($Error)
    {
      $this->Error = $Error;
      return $this;
    }

}
