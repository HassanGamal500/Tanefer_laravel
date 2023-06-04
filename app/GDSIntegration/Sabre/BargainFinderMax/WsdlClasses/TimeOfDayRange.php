<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TimeOfDayRange
{

    /**
     * @var TimeWindowBoundaryType $Begin
     */
    protected $Begin = null;

    /**
     * @var TimeWindowBoundaryType $End
     */
    protected $End = null;

    /**
     * @var PercentageType $Percentage
     */
    protected $Percentage = null;

    /**
     * @param TimeWindowBoundaryType $Begin
     * @param TimeWindowBoundaryType $End
     * @param PercentageType $Percentage
     */
    public function __construct($Begin = null, $End = null, $Percentage = null)
    {
      $this->Begin = $Begin;
      $this->End = $End;
      $this->Percentage = $Percentage;
    }

    /**
     * @return TimeWindowBoundaryType
     */
    public function getBegin()
    {
      return $this->Begin;
    }

    /**
     * @param TimeWindowBoundaryType $Begin
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TimeOfDayRange
     */
    public function setBegin($Begin)
    {
      $this->Begin = $Begin;
      return $this;
    }

    /**
     * @return TimeWindowBoundaryType
     */
    public function getEnd()
    {
      return $this->End;
    }

    /**
     * @param TimeWindowBoundaryType $End
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TimeOfDayRange
     */
    public function setEnd($End)
    {
      $this->End = $End;
      return $this;
    }

    /**
     * @return PercentageType
     */
    public function getPercentage()
    {
      return $this->Percentage;
    }

    /**
     * @param PercentageType $Percentage
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TimeOfDayRange
     */
    public function setPercentage($Percentage)
    {
      $this->Percentage = $Percentage;
      return $this;
    }

}
