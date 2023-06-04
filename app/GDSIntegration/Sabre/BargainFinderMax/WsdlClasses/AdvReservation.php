<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AdvReservation
{

    /**
     * @var TimeOrDateTimeType $LatestTimeOfDay
     */
    protected $LatestTimeOfDay = null;

    /**
     * @var NumericStringLength1to3 $LatestPeriod
     */
    protected $LatestPeriod = null;

    /**
     * @var StayUnitType $LatestUnit
     */
    protected $LatestUnit = null;

    /**
     * @param TimeOrDateTimeType $LatestTimeOfDay
     * @param NumericStringLength1to3 $LatestPeriod
     * @param StayUnitType $LatestUnit
     */
    public function __construct($LatestTimeOfDay = null, $LatestPeriod = null, $LatestUnit = null)
    {
      $this->LatestTimeOfDay = $LatestTimeOfDay;
      $this->LatestPeriod = $LatestPeriod;
      $this->LatestUnit = $LatestUnit;
    }

    /**
     * @return TimeOrDateTimeType
     */
    public function getLatestTimeOfDay()
    {
      return $this->LatestTimeOfDay;
    }

    /**
     * @param TimeOrDateTimeType $LatestTimeOfDay
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AdvReservation
     */
    public function setLatestTimeOfDay($LatestTimeOfDay)
    {
      $this->LatestTimeOfDay = $LatestTimeOfDay;
      return $this;
    }

    /**
     * @return NumericStringLength1to3
     */
    public function getLatestPeriod()
    {
      return $this->LatestPeriod;
    }

    /**
     * @param NumericStringLength1to3 $LatestPeriod
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AdvReservation
     */
    public function setLatestPeriod($LatestPeriod)
    {
      $this->LatestPeriod = $LatestPeriod;
      return $this;
    }

    /**
     * @return StayUnitType
     */
    public function getLatestUnit()
    {
      return $this->LatestUnit;
    }

    /**
     * @param StayUnitType $LatestUnit
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AdvReservation
     */
    public function setLatestUnit($LatestUnit)
    {
      $this->LatestUnit = $LatestUnit;
      return $this;
    }

}
