<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TrendIndicator
{

    /**
     * @var anonymous123 $Value
     */
    protected $Value = null;

    /**
     * @param anonymous123 $Value
     */
    public function __construct($Value = null)
    {
      $this->Value = $Value;
    }

    /**
     * @return anonymous123
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param anonymous123 $Value
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TrendIndicator
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
