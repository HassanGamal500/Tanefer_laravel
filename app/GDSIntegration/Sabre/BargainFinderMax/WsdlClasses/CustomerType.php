<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class CustomerType
{

    /**
     * @var anonymous149 $Value
     */
    protected $Value = null;

    /**
     * @param anonymous149 $Value
     */
    public function __construct($Value = null)
    {
      $this->Value = $Value;
    }

    /**
     * @return anonymous149
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param anonymous149 $Value
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CustomerType
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
