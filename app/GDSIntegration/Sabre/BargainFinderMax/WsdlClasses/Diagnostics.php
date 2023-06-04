<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Diagnostics
{

    /**
     * @var Diagnostic $Diagnostic
     */
    protected $Diagnostic = null;

    /**
     * @param Diagnostic $Diagnostic
     */
    public function __construct($Diagnostic = null)
    {
      $this->Diagnostic = $Diagnostic;
    }

    /**
     * @return Diagnostic
     */
    public function getDiagnostic()
    {
      return $this->Diagnostic;
    }

    /**
     * @param Diagnostic $Diagnostic
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Diagnostics
     */
    public function setDiagnostic($Diagnostic)
    {
      $this->Diagnostic = $Diagnostic;
      return $this;
    }

}
