<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Day
{

    /**
     * @var ISellDateType $Date
     */
    protected $Date = null;

    /**
     * @param ISellDateType $Date
     */
    public function __construct($Date = null)
    {
      $this->Date = $Date;
    }

    /**
     * @return ISellDateType
     */
    public function getDate()
    {
      return $this->Date;
    }

    /**
     * @param ISellDateType $Date
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Day
     */
    public function setDate($Date)
    {
      $this->Date = $Date;
      return $this;
    }

}
