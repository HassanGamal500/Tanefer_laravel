<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class MaximumStay
{

    /**
     * @var anonymous19 $ReturnType
     */
    protected $ReturnType = null;

    /**
     * @var TimeOrDateTimeType $ReturnTimeOfDay
     */
    protected $ReturnTimeOfDay = null;

    /**
     * @var Numeric1to99 $MaxStay
     */
    protected $MaxStay = null;

    /**
     * @var StayUnitType $StayUnit
     */
    protected $StayUnit = null;

    /**
     * @var TimeOrDateTimeType $MaxStayDate
     */
    protected $MaxStayDate = null;

    /**
     * @param anonymous19 $ReturnType
     * @param TimeOrDateTimeType $ReturnTimeOfDay
     * @param Numeric1to99 $MaxStay
     * @param StayUnitType $StayUnit
     * @param TimeOrDateTimeType $MaxStayDate
     */
    public function __construct($ReturnType = null, $ReturnTimeOfDay = null, $MaxStay = null, $StayUnit = null, $MaxStayDate = null)
    {
      $this->ReturnType = $ReturnType;
      $this->ReturnTimeOfDay = $ReturnTimeOfDay;
      $this->MaxStay = $MaxStay;
      $this->StayUnit = $StayUnit;
      $this->MaxStayDate = $MaxStayDate;
    }

    /**
     * @return anonymous19
     */
    public function getReturnType()
    {
      return $this->ReturnType;
    }

    /**
     * @param anonymous19 $ReturnType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MaximumStay
     */
    public function setReturnType($ReturnType)
    {
      $this->ReturnType = $ReturnType;
      return $this;
    }

    /**
     * @return TimeOrDateTimeType
     */
    public function getReturnTimeOfDay()
    {
      return $this->ReturnTimeOfDay;
    }

    /**
     * @param TimeOrDateTimeType $ReturnTimeOfDay
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MaximumStay
     */
    public function setReturnTimeOfDay($ReturnTimeOfDay)
    {
      $this->ReturnTimeOfDay = $ReturnTimeOfDay;
      return $this;
    }

    /**
     * @return Numeric1to99
     */
    public function getMaxStay()
    {
      return $this->MaxStay;
    }

    /**
     * @param Numeric1to99 $MaxStay
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MaximumStay
     */
    public function setMaxStay($MaxStay)
    {
      $this->MaxStay = $MaxStay;
      return $this;
    }

    /**
     * @return StayUnitType
     */
    public function getStayUnit()
    {
      return $this->StayUnit;
    }

    /**
     * @param StayUnitType $StayUnit
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MaximumStay
     */
    public function setStayUnit($StayUnit)
    {
      $this->StayUnit = $StayUnit;
      return $this;
    }

    /**
     * @return TimeOrDateTimeType
     */
    public function getMaxStayDate()
    {
      return $this->MaxStayDate;
    }

    /**
     * @param TimeOrDateTimeType $MaxStayDate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MaximumStay
     */
    public function setMaxStayDate($MaxStayDate)
    {
      $this->MaxStayDate = $MaxStayDate;
      return $this;
    }

}
