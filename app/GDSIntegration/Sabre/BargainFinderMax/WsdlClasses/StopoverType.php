<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class StopoverType
{

    /**
     * @var IntDateTime $DepartureDateTime
     */
    protected $DepartureDateTime = null;

    /**
     * @var TimeWindowType $DepartureWindow
     */
    protected $DepartureWindow = null;

    /**
     * @var StopoverPoint $StopoverPoint
     */
    protected $StopoverPoint = null;

    /**
     * @param IntDateTime $DepartureDateTime
     * @param StopoverPoint $StopoverPoint
     */
    public function __construct($DepartureDateTime = null, $StopoverPoint = null)
    {
      $this->DepartureDateTime = $DepartureDateTime;
      $this->StopoverPoint = $StopoverPoint;
    }

    /**
     * @return IntDateTime
     */
    public function getDepartureDateTime()
    {
      return $this->DepartureDateTime;
    }

    /**
     * @param IntDateTime $DepartureDateTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StopoverType
     */
    public function setDepartureDateTime($DepartureDateTime)
    {
      $this->DepartureDateTime = $DepartureDateTime;
      return $this;
    }

    /**
     * @return TimeWindowType
     */
    public function getDepartureWindow()
    {
      return $this->DepartureWindow;
    }

    /**
     * @param TimeWindowType $DepartureWindow
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StopoverType
     */
    public function setDepartureWindow($DepartureWindow)
    {
      $this->DepartureWindow = $DepartureWindow;
      return $this;
    }

    /**
     * @return StopoverPoint
     */
    public function getStopoverPoint()
    {
      return $this->StopoverPoint;
    }

    /**
     * @param StopoverPoint $StopoverPoint
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StopoverType
     */
    public function setStopoverPoint($StopoverPoint)
    {
      $this->StopoverPoint = $StopoverPoint;
      return $this;
    }

}
