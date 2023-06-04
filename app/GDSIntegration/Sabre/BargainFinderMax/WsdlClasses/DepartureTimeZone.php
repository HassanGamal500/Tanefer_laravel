<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class DepartureTimeZone
{

    /**
     * @var float $GMTOffset
     */
    protected $GMTOffset = null;

    /**
     * @param float $GMTOffset
     */
    public function __construct($GMTOffset = null)
    {
      $this->GMTOffset = $GMTOffset;
    }

    /**
     * @return float
     */
    public function getGMTOffset()
    {
      return $this->GMTOffset;
    }

    /**
     * @param float $GMTOffset
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DepartureTimeZone
     */
    public function setGMTOffset($GMTOffset)
    {
      $this->GMTOffset = $GMTOffset;
      return $this;
    }

}
