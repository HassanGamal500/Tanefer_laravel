<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AvailableLevel
{

    /**
     * @var string $Value
     */
    protected $Value = null;

    /**
     * @param string $Value
     */
    public function __construct($Value = null)
    {
      $this->Value = $Value;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AvailableLevel
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
