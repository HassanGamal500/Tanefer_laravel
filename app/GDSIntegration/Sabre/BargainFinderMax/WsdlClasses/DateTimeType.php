<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

abstract class DateTimeType
{

    /**
     * @var TimeWindowBoundaryType $TimeWindowStart
     */
    protected $TimeWindowStart = null;

    /**
     * @var TimeWindowBoundaryType $TimeWindowEnd
     */
    protected $TimeWindowEnd = null;

    /**
     * @var int $TimeTolerance
     */
    protected $TimeTolerance = null;

    /**
     * @var int $DateFlexibility
     */
    protected $DateFlexibility = null;

    /**
     * @var int $MaxOptionsPerDate
     */
    protected $MaxOptionsPerDate = null;

    /**
     * @var int $ConnectionTimeMin
     */
    protected $ConnectionTimeMin = null;

    /**
     * @var int $ConnectionTimeMax
     */
    protected $ConnectionTimeMax = null;

    /**
     * @param TimeWindowBoundaryType $TimeWindowStart
     * @param TimeWindowBoundaryType $TimeWindowEnd
     * @param int $TimeTolerance
     * @param int $DateFlexibility
     * @param int $MaxOptionsPerDate
     * @param int $ConnectionTimeMin
     * @param int $ConnectionTimeMax
     */
    public function __construct($TimeWindowStart = null, $TimeWindowEnd = null, $TimeTolerance = null, $DateFlexibility = null, $MaxOptionsPerDate = null, $ConnectionTimeMin = null, $ConnectionTimeMax = null)
    {
      $this->TimeWindowStart = $TimeWindowStart;
      $this->TimeWindowEnd = $TimeWindowEnd;
      $this->TimeTolerance = $TimeTolerance;
      $this->DateFlexibility = $DateFlexibility;
      $this->MaxOptionsPerDate = $MaxOptionsPerDate;
      $this->ConnectionTimeMin = $ConnectionTimeMin;
      $this->ConnectionTimeMax = $ConnectionTimeMax;
    }

    /**
     * @return TimeWindowBoundaryType
     */
    public function getTimeWindowStart()
    {
      return $this->TimeWindowStart;
    }

    /**
     * @param TimeWindowBoundaryType $TimeWindowStart
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DateTimeType
     */
    public function setTimeWindowStart($TimeWindowStart)
    {
      $this->TimeWindowStart = $TimeWindowStart;
      return $this;
    }

    /**
     * @return TimeWindowBoundaryType
     */
    public function getTimeWindowEnd()
    {
      return $this->TimeWindowEnd;
    }

    /**
     * @param TimeWindowBoundaryType $TimeWindowEnd
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DateTimeType
     */
    public function setTimeWindowEnd($TimeWindowEnd)
    {
      $this->TimeWindowEnd = $TimeWindowEnd;
      return $this;
    }

    /**
     * @return int
     */
    public function getTimeTolerance()
    {
      return $this->TimeTolerance;
    }

    /**
     * @param int $TimeTolerance
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DateTimeType
     */
    public function setTimeTolerance($TimeTolerance)
    {
      $this->TimeTolerance = $TimeTolerance;
      return $this;
    }

    /**
     * @return int
     */
    public function getDateFlexibility()
    {
      return $this->DateFlexibility;
    }

    /**
     * @param int $DateFlexibility
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DateTimeType
     */
    public function setDateFlexibility($DateFlexibility)
    {
      $this->DateFlexibility = $DateFlexibility;
      return $this;
    }

    /**
     * @return int
     */
    public function getMaxOptionsPerDate()
    {
      return $this->MaxOptionsPerDate;
    }

    /**
     * @param int $MaxOptionsPerDate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DateTimeType
     */
    public function setMaxOptionsPerDate($MaxOptionsPerDate)
    {
      $this->MaxOptionsPerDate = $MaxOptionsPerDate;
      return $this;
    }

    /**
     * @return int
     */
    public function getConnectionTimeMin()
    {
      return $this->ConnectionTimeMin;
    }

    /**
     * @param int $ConnectionTimeMin
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DateTimeType
     */
    public function setConnectionTimeMin($ConnectionTimeMin)
    {
      $this->ConnectionTimeMin = $ConnectionTimeMin;
      return $this;
    }

    /**
     * @return int
     */
    public function getConnectionTimeMax()
    {
      return $this->ConnectionTimeMax;
    }

    /**
     * @param int $ConnectionTimeMax
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DateTimeType
     */
    public function setConnectionTimeMax($ConnectionTimeMax)
    {
      $this->ConnectionTimeMax = $ConnectionTimeMax;
      return $this;
    }

}
