<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class StopsNumber
{

    /**
     * @var SumWeight $Weight
     */
    protected $Weight = null;

    /**
     * @param SumWeight $Weight
     */
    public function __construct($Weight = null)
    {
      $this->Weight = $Weight;
    }

    /**
     * @return SumWeight
     */
    public function getWeight()
    {
      return $this->Weight;
    }

    /**
     * @param SumWeight $Weight
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StopsNumber
     */
    public function setWeight($Weight)
    {
      $this->Weight = $Weight;
      return $this;
    }

}
