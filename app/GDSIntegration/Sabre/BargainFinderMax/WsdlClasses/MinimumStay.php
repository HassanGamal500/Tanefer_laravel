<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class MinimumStay
{

    /**
     * @var TimeOrDateTimeType $ReturnTimeOfDay
     */
    protected $ReturnTimeOfDay = null;

    /**
     * @var Numeric1to99 $MinStay
     */
    protected $MinStay = null;

    /**
     * @var StayUnitType $StayUnit
     */
    protected $StayUnit = null;

    /**
     * @var TimeOrDateTimeType $MinStayDate
     */
    protected $MinStayDate = null;

    /**
     * @param TimeOrDateTimeType $ReturnTimeOfDay
     * @param Numeric1to99 $MinStay
     * @param StayUnitType $StayUnit
     * @param TimeOrDateTimeType $MinStayDate
     */
    public function __construct($ReturnTimeOfDay = null, $MinStay = null, $StayUnit = null, $MinStayDate = null)
    {
      $this->ReturnTimeOfDay = $ReturnTimeOfDay;
      $this->MinStay = $MinStay;
      $this->StayUnit = $StayUnit;
      $this->MinStayDate = $MinStayDate;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MinimumStay
     */
    public function setReturnTimeOfDay($ReturnTimeOfDay)
    {
      $this->ReturnTimeOfDay = $ReturnTimeOfDay;
      return $this;
    }

    /**
     * @return Numeric1to99
     */
    public function getMinStay()
    {
      return $this->MinStay;
    }

    /**
     * @param Numeric1to99 $MinStay
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MinimumStay
     */
    public function setMinStay($MinStay)
    {
      $this->MinStay = $MinStay;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MinimumStay
     */
    public function setStayUnit($StayUnit)
    {
      $this->StayUnit = $StayUnit;
      return $this;
    }

    /**
     * @return TimeOrDateTimeType
     */
    public function getMinStayDate()
    {
      return $this->MinStayDate;
    }

    /**
     * @param TimeOrDateTimeType $MinStayDate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MinimumStay
     */
    public function setMinStayDate($MinStayDate)
    {
      $this->MinStayDate = $MinStayDate;
      return $this;
    }

}
