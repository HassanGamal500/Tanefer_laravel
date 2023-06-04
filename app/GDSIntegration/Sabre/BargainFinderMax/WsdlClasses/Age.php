<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Age
{

    /**
     * @var int $Years
     */
    protected $Years = null;

    /**
     * @param int $Years
     */
    public function __construct($Years = null)
    {
      $this->Years = $Years;
    }

    /**
     * @return int
     */
    public function getYears()
    {
      return $this->Years;
    }

    /**
     * @param int $Years
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Age
     */
    public function setYears($Years)
    {
      $this->Years = $Years;
      return $this;
    }

}
