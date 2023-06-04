<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class DepartureDaysType
{

    /**
     * @var anonymous435 $Value
     */
    protected $Value = null;

    /**
     * @param anonymous435 $Value
     */
    public function __construct($Value = null)
    {
      $this->Value = $Value;
    }

    /**
     * @return anonymous435
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param anonymous435 $Value
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DepartureDaysType
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
