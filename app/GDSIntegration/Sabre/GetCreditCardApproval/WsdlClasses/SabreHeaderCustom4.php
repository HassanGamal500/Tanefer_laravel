<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class SabreHeaderCustom4
{

    /**
     * @var Service $Service
     */
    protected $Service = null;

    /**
     * @var Identification $Identification
     */
    protected $Identification = null;

    /**
     * @var ResultSummary $ResultSummary
     */
    protected $ResultSummary = null;

    /**
     * @var Security $Security
     */
    protected $Security = null;

    /**
     * @var Traces $Traces
     */
    protected $Traces = null;

    /**
     * @var Diagnostics $Diagnostics
     */
    protected $Diagnostics = null;

    /**
     * @param Service $Service
     * @param Identification $Identification
     * @param ResultSummary $ResultSummary
     * @param Security $Security
     * @param Traces $Traces
     * @param Diagnostics $Diagnostics
     */
    public function __construct($Service = null, $Identification = null, $ResultSummary = null, $Security = null, $Traces = null, $Diagnostics = null)
    {
      $this->Service = $Service;
      $this->Identification = $Identification;
      $this->ResultSummary = $ResultSummary;
      $this->Security = $Security;
      $this->Traces = $Traces;
      $this->Diagnostics = $Diagnostics;
    }

    /**
     * @return Service
     */
    public function getService()
    {
      return $this->Service;
    }

    /**
     * @param Service $Service
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SabreHeaderCustom4
     */
    public function setService($Service)
    {
      $this->Service = $Service;
      return $this;
    }

    /**
     * @return Identification
     */
    public function getIdentification()
    {
      return $this->Identification;
    }

    /**
     * @param Identification $Identification
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SabreHeaderCustom4
     */
    public function setIdentification($Identification)
    {
      $this->Identification = $Identification;
      return $this;
    }

    /**
     * @return ResultSummary
     */
    public function getResultSummary()
    {
      return $this->ResultSummary;
    }

    /**
     * @param ResultSummary $ResultSummary
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SabreHeaderCustom4
     */
    public function setResultSummary($ResultSummary)
    {
      $this->ResultSummary = $ResultSummary;
      return $this;
    }

    /**
     * @return Security
     */
    public function getSecurity()
    {
      return $this->Security;
    }

    /**
     * @param Security $Security
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SabreHeaderCustom4
     */
    public function setSecurity($Security)
    {
      $this->Security = $Security;
      return $this;
    }

    /**
     * @return Traces
     */
    public function getTraces()
    {
      return $this->Traces;
    }

    /**
     * @param Traces $Traces
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SabreHeaderCustom4
     */
    public function setTraces($Traces)
    {
      $this->Traces = $Traces;
      return $this;
    }

    /**
     * @return Diagnostics
     */
    public function getDiagnostics()
    {
      return $this->Diagnostics;
    }

    /**
     * @param Diagnostics $Diagnostics
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SabreHeaderCustom4
     */
    public function setDiagnostics($Diagnostics)
    {
      $this->Diagnostics = $Diagnostics;
      return $this;
    }

}
