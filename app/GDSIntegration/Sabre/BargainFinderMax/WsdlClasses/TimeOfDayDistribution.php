<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TimeOfDayDistribution
{

    /**
     * @var TimeOfDayRange $TimeOfDayRange
     */
    protected $TimeOfDayRange = null;

    /**
     * @param TimeOfDayRange $TimeOfDayRange
     */
    public function __construct($TimeOfDayRange = null)
    {
      $this->TimeOfDayRange = $TimeOfDayRange;
    }

    /**
     * @return TimeOfDayRange
     */
    public function getTimeOfDayRange()
    {
      return $this->TimeOfDayRange;
    }

    /**
     * @param TimeOfDayRange $TimeOfDayRange
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TimeOfDayDistribution
     */
    public function setTimeOfDayRange($TimeOfDayRange)
    {
      $this->TimeOfDayRange = $TimeOfDayRange;
      return $this;
    }

}
