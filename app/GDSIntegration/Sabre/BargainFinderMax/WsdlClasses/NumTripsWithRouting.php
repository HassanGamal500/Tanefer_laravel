<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class NumTripsWithRouting
{

    /**
     * @var anonymous183 $Number
     */
    protected $Number = null;

    /**
     * @param anonymous183 $Number
     */
    public function __construct($Number = null)
    {
      $this->Number = $Number;
    }

    /**
     * @return anonymous183
     */
    public function getNumber()
    {
      return $this->Number;
    }

    /**
     * @param anonymous183 $Number
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\NumTripsWithRouting
     */
    public function setNumber($Number)
    {
      $this->Number = $Number;
      return $this;
    }

}
