<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class ProblemBaseCustom
{

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
     * @param ErrorType $type
     * @param CompletionCodes $status
     * @param \DateTime $timeStamp
     */
    public function __construct($type = null, $status = null, \DateTime $timeStamp = null)
    {
      $this->type = $type;
      $this->status = $status;
      $this->timeStamp = $timeStamp ? $timeStamp->format(\DateTime::ATOM) : null;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ProblemBaseCustom
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ProblemBaseCustom
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ProblemBaseCustom
     */
    public function setTimeStamp(\DateTime $timeStamp)
    {
      $this->timeStamp = $timeStamp->format(\DateTime::ATOM);
      return $this;
    }

}
