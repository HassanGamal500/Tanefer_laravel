<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class LengthOfStay
{

    /**
     * @var int $Days
     */
    protected $Days = null;

    /**
     * @param int $Days
     */
    public function __construct($Days = null)
    {
      $this->Days = $Days;
    }

    /**
     * @return int
     */
    public function getDays()
    {
      return $this->Days;
    }

    /**
     * @param int $Days
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\LengthOfStay
     */
    public function setDays($Days)
    {
      $this->Days = $Days;
      return $this;
    }

}
