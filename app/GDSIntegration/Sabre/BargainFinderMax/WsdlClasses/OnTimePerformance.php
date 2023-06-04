<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class OnTimePerformance
{

    /**
     * @var string $Level
     */
    protected $Level = null;

    /**
     * @var string $Percentage
     */
    protected $Percentage = null;

    /**
     * @param string $Level
     * @param string $Percentage
     */
    public function __construct($Level = null, $Percentage = null)
    {
      $this->Level = $Level;
      $this->Percentage = $Percentage;
    }

    /**
     * @return string
     */
    public function getLevel()
    {
      return $this->Level;
    }

    /**
     * @param string $Level
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OnTimePerformance
     */
    public function setLevel($Level)
    {
      $this->Level = $Level;
      return $this;
    }

    /**
     * @return string
     */
    public function getPercentage()
    {
      return $this->Percentage;
    }

    /**
     * @param string $Percentage
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OnTimePerformance
     */
    public function setPercentage($Percentage)
    {
      $this->Percentage = $Percentage;
      return $this;
    }

}
