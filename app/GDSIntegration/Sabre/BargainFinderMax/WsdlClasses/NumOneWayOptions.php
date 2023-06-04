<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class NumOneWayOptions
{

    /**
     * @var int $Number
     */
    protected $Number = null;

    /**
     * @param int $Number
     */
    public function __construct($Number = null)
    {
      $this->Number = $Number;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
      return $this->Number;
    }

    /**
     * @param int $Number
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\NumOneWayOptions
     */
    public function setNumber($Number)
    {
      $this->Number = $Number;
      return $this;
    }

}
