<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class DomesticLayoverTime
{

    /**
     * @var int $Hours
     */
    protected $Hours = null;

    /**
     * @param int $Hours
     */
    public function __construct($Hours = null)
    {
      $this->Hours = $Hours;
    }

    /**
     * @return int
     */
    public function getHours()
    {
      return $this->Hours;
    }

    /**
     * @param int $Hours
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DomesticLayoverTime
     */
    public function setHours($Hours)
    {
      $this->Hours = $Hours;
      return $this;
    }

}
