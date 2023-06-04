<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Diagnostic
{

    /**
     * @var DiagnosticArgument $DiagnosticArgument
     */
    protected $DiagnosticArgument = null;

    /**
     * @var string $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @var string $Target
     */
    protected $Target = null;

    /**
     * @var DiagnosticName $Code
     */
    protected $Code = null;

    /**
     * @param DiagnosticArgument $DiagnosticArgument
     * @param string $TPA_Extensions
     * @param string $Target
     * @param DiagnosticName $Code
     */
    public function __construct($DiagnosticArgument = null, $TPA_Extensions = null, $Target = null, $Code = null)
    {
      $this->DiagnosticArgument = $DiagnosticArgument;
      $this->TPA_Extensions = $TPA_Extensions;
      $this->Target = $Target;
      $this->Code = $Code;
    }

    /**
     * @return DiagnosticArgument
     */
    public function getDiagnosticArgument()
    {
      return $this->DiagnosticArgument;
    }

    /**
     * @param DiagnosticArgument $DiagnosticArgument
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Diagnostic
     */
    public function setDiagnosticArgument($DiagnosticArgument)
    {
      $this->DiagnosticArgument = $DiagnosticArgument;
      return $this;
    }

    /**
     * @return string
     */
    public function getTPA_Extensions()
    {
      return $this->TPA_Extensions;
    }

    /**
     * @param string $TPA_Extensions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Diagnostic
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      return $this;
    }

    /**
     * @return string
     */
    public function getTarget()
    {
      return $this->Target;
    }

    /**
     * @param string $Target
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Diagnostic
     */
    public function setTarget($Target)
    {
      $this->Target = $Target;
      return $this;
    }

    /**
     * @return DiagnosticName
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param DiagnosticName $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Diagnostic
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

}
