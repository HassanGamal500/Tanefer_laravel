<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PreferNDCSourceOnTie
{

    /**
     * @var boolean $Value
     */
    protected $Value = null;

    /**
     * @param boolean $Value
     */
    public function __construct($Value = null)
    {
      $this->Value = $Value;
    }

    /**
     * @return boolean
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param boolean $Value
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PreferNDCSourceOnTie
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
