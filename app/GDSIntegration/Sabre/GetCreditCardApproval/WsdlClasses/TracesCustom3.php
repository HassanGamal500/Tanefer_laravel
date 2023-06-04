<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class TracesCustom3
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\TracesCustom3
     */
    public function setTrace(array $Trace = null)
    {
      $this->Trace = $Trace;
      return $this;
    }

}
