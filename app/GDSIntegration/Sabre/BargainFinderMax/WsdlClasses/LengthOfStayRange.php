<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class LengthOfStayRange
{

    /**
     * @var int $MinDays
     */
    protected $MinDays = null;

    /**
     * @var int $MaxDays
     */
    protected $MaxDays = null;

    /**
     * @param int $MinDays
     * @param int $MaxDays
     */
    public function __construct($MinDays = null, $MaxDays = null)
    {
      $this->MinDays = $MinDays;
      $this->MaxDays = $MaxDays;
    }

    /**
     * @return int
     */
    public function getMinDays()
    {
      return $this->MinDays;
    }

    /**
     * @param int $MinDays
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\LengthOfStayRange
     */
    public function setMinDays($MinDays)
    {
      $this->MinDays = $MinDays;
      return $this;
    }

    /**
     * @return int
     */
    public function getMaxDays()
    {
      return $this->MaxDays;
    }

    /**
     * @param int $MaxDays
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\LengthOfStayRange
     */
    public function setMaxDays($MaxDays)
    {
      $this->MaxDays = $MaxDays;
      return $this;
    }

}
