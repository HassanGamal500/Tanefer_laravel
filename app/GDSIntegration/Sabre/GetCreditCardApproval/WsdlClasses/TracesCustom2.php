<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class TracesCustom2
{

    /**
     * @var TraceRecord[] $Trace
     */
    protected $Trace = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return TraceRecord[]
     */
    public function getTrace()
    {
      return $this->Trace;
    }

    /**
     * @param TraceRecord[] $Trace
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\TracesCustom2
     */
    public function setTrace(array $Trace = null)
    {
      $this->Trace = $Trace;
      return $this;
    }

}
