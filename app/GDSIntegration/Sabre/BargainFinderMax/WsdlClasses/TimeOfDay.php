<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TimeOfDay
{

    /**
     * @var Distribution $Distribution
     */
    protected $Distribution = null;

    /**
     * @var SumWeight $Weight
     */
    protected $Weight = null;

    /**
     * @param Distribution $Distribution
     * @param SumWeight $Weight
     */
    public function __construct($Distribution = null, $Weight = null)
    {
      $this->Distribution = $Distribution;
      $this->Weight = $Weight;
    }

    /**
     * @return Distribution
     */
    public function getDistribution()
    {
      return $this->Distribution;
    }

    /**
     * @param Distribution $Distribution
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TimeOfDay
     */
    public function setDistribution($Distribution)
    {
      $this->Distribution = $Distribution;
      return $this;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TimeOfDay
     */
    public function setWeight($Weight)
    {
      $this->Weight = $Weight;
      return $this;
    }

}
