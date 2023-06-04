<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class DiagnosticArgument
{

    /**
     * @var string $Name
     */
    protected $Name = null;

    /**
     * @var string $Value
     */
    protected $Value = null;

    /**
     * @param string $Name
     * @param string $Value
     */
    public function __construct($Name = null, $Value = null)
    {
      $this->Name = $Name;
      $this->Value = $Value;
    }

    /**
     * @return string
     */
    public function getName()
    {
      return $this->Name;
    }

    /**
     * @param string $Name
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DiagnosticArgument
     */
    public function setName($Name)
    {
      $this->Name = $Name;
      return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param string $Value
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DiagnosticArgument
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
