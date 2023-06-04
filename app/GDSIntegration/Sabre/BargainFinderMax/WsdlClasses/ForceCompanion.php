<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ForceCompanion
{

    /**
     * @var Money $Value
     */
    protected $Value = null;

    /**
     * @param Money $Value
     */
    public function __construct($Value = null)
    {
      $this->Value = $Value;
    }

    /**
     * @return Money
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param Money $Value
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ForceCompanion
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
