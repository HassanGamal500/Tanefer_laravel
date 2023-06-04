<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class BirthDate
{

    /**
     * @var date $Date
     */
    protected $Date = null;

    /**
     * @param date $Date
     */
    public function __construct($Date = null)
    {
      $this->Date = $Date;
    }

    /**
     * @return date
     */
    public function getDate()
    {
      return $this->Date;
    }

    /**
     * @param date $Date
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BirthDate
     */
    public function setDate($Date)
    {
      $this->Date = $Date;
      return $this;
    }

}
