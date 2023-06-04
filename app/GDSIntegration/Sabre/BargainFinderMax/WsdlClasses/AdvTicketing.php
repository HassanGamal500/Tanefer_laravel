<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AdvTicketing
{

    /**
     * @var TimeOrDateTimeType $FromResTimeOfDay
     */
    protected $FromResTimeOfDay = null;

    /**
     * @var NumericStringLength1to3 $FromResPeriod
     */
    protected $FromResPeriod = null;

    /**
     * @var StayUnitType $FromResUnit
     */
    protected $FromResUnit = null;

    /**
     * @var TimeOrDateTimeType $FromDepartTimeOfDay
     */
    protected $FromDepartTimeOfDay = null;

    /**
     * @var NumericStringLength1to3 $FromDepartPeriod
     */
    protected $FromDepartPeriod = null;

    /**
     * @var StayUnitType $FromDepartUnit
     */
    protected $FromDepartUnit = null;

    /**
     * @param TimeOrDateTimeType $FromResTimeOfDay
     * @param NumericStringLength1to3 $FromResPeriod
     * @param StayUnitType $FromResUnit
     * @param TimeOrDateTimeType $FromDepartTimeOfDay
     * @param NumericStringLength1to3 $FromDepartPeriod
     * @param StayUnitType $FromDepartUnit
     */
    public function __construct($FromResTimeOfDay = null, $FromResPeriod = null, $FromResUnit = null, $FromDepartTimeOfDay = null, $FromDepartPeriod = null, $FromDepartUnit = null)
    {
      $this->FromResTimeOfDay = $FromResTimeOfDay;
      $this->FromResPeriod = $FromResPeriod;
      $this->FromResUnit = $FromResUnit;
      $this->FromDepartTimeOfDay = $FromDepartTimeOfDay;
      $this->FromDepartPeriod = $FromDepartPeriod;
      $this->FromDepartUnit = $FromDepartUnit;
    }

    /**
     * @return TimeOrDateTimeType
     */
    public function getFromResTimeOfDay()
    {
      return $this->FromResTimeOfDay;
    }

    /**
     * @param TimeOrDateTimeType $FromResTimeOfDay
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AdvTicketing
     */
    public function setFromResTimeOfDay($FromResTimeOfDay)
    {
      $this->FromResTimeOfDay = $FromResTimeOfDay;
      return $this;
    }

    /**
     * @return NumericStringLength1to3
     */
    public function getFromResPeriod()
    {
      return $this->FromResPeriod;
    }

    /**
     * @param NumericStringLength1to3 $FromResPeriod
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AdvTicketing
     */
    public function setFromResPeriod($FromResPeriod)
    {
      $this->FromResPeriod = $FromResPeriod;
      return $this;
    }

    /**
     * @return StayUnitType
     */
    public function getFromResUnit()
    {
      return $this->FromResUnit;
    }

    /**
     * @param StayUnitType $FromResUnit
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AdvTicketing
     */
    public function setFromResUnit($FromResUnit)
    {
      $this->FromResUnit = $FromResUnit;
      return $this;
    }

    /**
     * @return TimeOrDateTimeType
     */
    public function getFromDepartTimeOfDay()
    {
      return $this->FromDepartTimeOfDay;
    }

    /**
     * @param TimeOrDateTimeType $FromDepartTimeOfDay
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AdvTicketing
     */
    public function setFromDepartTimeOfDay($FromDepartTimeOfDay)
    {
      $this->FromDepartTimeOfDay = $FromDepartTimeOfDay;
      return $this;
    }

    /**
     * @return NumericStringLength1to3
     */
    public function getFromDepartPeriod()
    {
      return $this->FromDepartPeriod;
    }

    /**
     * @param NumericStringLength1to3 $FromDepartPeriod
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AdvTicketing
     */
    public function setFromDepartPeriod($FromDepartPeriod)
    {
      $this->FromDepartPeriod = $FromDepartPeriod;
      return $this;
    }

    /**
     * @return StayUnitType
     */
    public function getFromDepartUnit()
    {
      return $this->FromDepartUnit;
    }

    /**
     * @param StayUnitType $FromDepartUnit
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AdvTicketing
     */
    public function setFromDepartUnit($FromDepartUnit)
    {
      $this->FromDepartUnit = $FromDepartUnit;
      return $this;
    }

}
