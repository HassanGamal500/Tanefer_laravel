<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class ProblemSummaryCustom5
{

    /**
     * @var IdentifierSystem $Source
     */
    protected $Source = null;

    /**
     * @var IdentifierSystem $ReportingSystem
     */
    protected $ReportingSystem = null;

    /**
     * @var MessageCondition $Message
     */
    protected $Message = null;

    /**
     * @var TextShort $ShortText
     */
    protected $ShortText = null;

    /**
     * @var ErrorType $type
     */
    protected $type = null;

    /**
     * @var CompletionCodes $status
     */
    protected $status = null;

    /**
     * @var \DateTime $timeStamp
     */
    protected $timeStamp = null;

    /**
     * @param IdentifierSystem $ReportingSystem
     * @param ErrorType $type
     * @param CompletionCodes $status
     * @param \DateTime $timeStamp
     */
    public function __construct($ReportingSystem = null, $type = null, $status = null, \DateTime $timeStamp = null)
    {
      $this->ReportingSystem = $ReportingSystem;
      $this->type = $type;
      $this->status = $status;
      $this->timeStamp = $timeStamp ? $timeStamp->format(\DateTime::ATOM) : null;
    }

    /**
     * @return IdentifierSystem
     */
    public function getSource()
    {
      return $this->Source;
    }

    /**
     * @param IdentifierSystem $Source
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ProblemSummaryCustom5
     */
    public function setSource($Source)
    {
      $this->Source = $Source;
      return $this;
    }

    /**
     * @return IdentifierSystem
     */
    public function getReportingSystem()
    {
      return $this->ReportingSystem;
    }

    /**
     * @param IdentifierSystem $ReportingSystem
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ProblemSummaryCustom5
     */
    public function setReportingSystem($ReportingSystem)
    {
      $this->ReportingSystem = $ReportingSystem;
      return $this;
    }

    /**
     * @return MessageCondition
     */
    public function getMessage()
    {
      return $this->Message;
    }

    /**
     * @param MessageCondition $Message
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ProblemSummaryCustom5
     */
    public function setMessage($Message)
    {
      $this->Message = $Message;
      return $this;
    }

    /**
     * @return TextShort
     */
    public function getShortText()
    {
      return $this->ShortText;
    }

    /**
     * @param TextShort $ShortText
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ProblemSummaryCustom5
     */
    public function setShortText($ShortText)
    {
      $this->ShortText = $ShortText;
      return $this;
    }

    /**
     * @return ErrorType
     */
    public function getType()
    {
      return $this->type;
    }

    /**
     * @param ErrorType $type
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ProblemSummaryCustom5
     */
    public function setType($type)
    {
      $this->type = $type;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ProblemSummaryCustom5
     */
    public function setStatus($status)
    {
      $this->status = $status;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTimeStamp()
    {
      if ($this->timeStamp == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->timeStamp);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $timeStamp
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ProblemSummaryCustom5
     */
    public function setTimeStamp(\DateTime $timeStamp)
    {
      $this->timeStamp = $timeStamp->format(\DateTime::ATOM);
      return $this;
    }

}
