<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class OperatingDuplicate
{

    /**
     * @var PreferredCarrier $PreferredCarrier
     */
    protected $PreferredCarrier = null;

    /**
     * @var SumWeight $Weight
     */
    protected $Weight = null;

    /**
     * @param PreferredCarrier $PreferredCarrier
     * @param SumWeight $Weight
     */
    public function __construct($PreferredCarrier = null, $Weight = null)
    {
      $this->PreferredCarrier = $PreferredCarrier;
      $this->Weight = $Weight;
    }

    /**
     * @return PreferredCarrier
     */
    public function getPreferredCarrier()
    {
      return $this->PreferredCarrier;
    }

    /**
     * @param PreferredCarrier $PreferredCarrier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OperatingDuplicate
     */
    public function setPreferredCarrier($PreferredCarrier)
    {
      $this->PreferredCarrier = $PreferredCarrier;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OperatingDuplicate
     */
    public function setWeight($Weight)
    {
      $this->Weight = $Weight;
      return $this;
    }

}
