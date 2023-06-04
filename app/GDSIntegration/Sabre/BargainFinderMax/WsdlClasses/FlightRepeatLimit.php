<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FlightRepeatLimit
{

    /**
     * @var int $Value
     */
    protected $Value = null;

    /**
     * @param int $Value
     */
    public function __construct($Value = null)
    {
      $this->Value = $Value;
    }

    /**
     * @return int
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param int $Value
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FlightRepeatLimit
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
