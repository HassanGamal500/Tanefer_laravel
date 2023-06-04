<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class DiagnosticsCustom2
{

    /**
     * @var DiagnosticLevels $Level
     */
    protected $Level = null;

    /**
     * @var TextLong $Data
     */
    protected $Data = null;

    /**
     * @var DiagnosticResults $Diagnostic
     */
    protected $Diagnostic = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return DiagnosticLevels
     */
    public function getLevel()
    {
      return $this->Level;
    }

    /**
     * @param DiagnosticLevels $Level
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\DiagnosticsCustom2
     */
    public function setLevel($Level)
    {
      $this->Level = $Level;
      return $this;
    }

    /**
     * @return TextLong
     */
    public function getData()
    {
      return $this->Data;
    }

    /**
     * @param TextLong $Data
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\DiagnosticsCustom2
     */
    public function setData($Data)
    {
      $this->Data = $Data;
      return $this;
    }

    /**
     * @return DiagnosticResults
     */
    public function getDiagnostic()
    {
      return $this->Diagnostic;
    }

    /**
     * @param DiagnosticResults $Diagnostic
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\DiagnosticsCustom2
     */
    public function setDiagnostic($Diagnostic)
    {
      $this->Diagnostic = $Diagnostic;
      return $this;
    }

}
