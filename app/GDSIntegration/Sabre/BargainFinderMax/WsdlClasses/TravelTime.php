<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TravelTime
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelTime
     */
    public function setWeight($Weight)
    {
      $this->Weight = $Weight;
      return $this;
    }

}
