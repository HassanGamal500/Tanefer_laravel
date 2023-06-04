<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class StopAirport
{

    /**
     * @var ResponseLocationType $_
     */
    protected $_ = null;

    /**
     * @var string $ArrivalDateTime
     */
    protected $ArrivalDateTime = null;

    /**
     * @var string $DepartureDateTime
     */
    protected $DepartureDateTime = null;

    /**
     * @var int $ElapsedTime
     */
    protected $ElapsedTime = null;

    /**
     * @var int $Duration
     */
    protected $Duration = null;

    /**
     * @var float $GMTOffset
     */
    protected $GMTOffset = null;

    /**
     * @var UNKNOWN $Equipment
     */
    protected $Equipment = null;

    /**
     * @param ResponseLocationType $_
     * @param string $ArrivalDateTime
     * @param string $DepartureDateTime
     * @param int $ElapsedTime
     * @param int $Duration
     * @param float $GMTOffset
     * @param UNKNOWN $Equipment
     */
    public function __construct($_ = null, $ArrivalDateTime = null, $DepartureDateTime = null, $ElapsedTime = null, $Duration = null, $GMTOffset = null, $Equipment = null)
    {
      $this->_ = $_;
      $this->ArrivalDateTime = $ArrivalDateTime;
      $this->DepartureDateTime = $DepartureDateTime;
      $this->ElapsedTime = $ElapsedTime;
      $this->Duration = $Duration;
      $this->GMTOffset = $GMTOffset;
      $this->Equipment = $Equipment;
    }

    /**
     * @return ResponseLocationType
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param ResponseLocationType $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StopAirport
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return string
     */
    public function getArrivalDateTime()
    {
      return $this->ArrivalDateTime;
    }

    /**
     * @param string $ArrivalDateTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StopAirport
     */
    public function setArrivalDateTime($ArrivalDateTime)
    {
      $this->ArrivalDateTime = $ArrivalDateTime;
      return $this;
    }

    /**
     * @return string
     */
    public function getDepartureDateTime()
    {
      return $this->DepartureDateTime;
    }

    /**
     * @param string $DepartureDateTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StopAirport
     */
    public function setDepartureDateTime($DepartureDateTime)
    {
      $this->DepartureDateTime = $DepartureDateTime;
      return $this;
    }

    /**
     * @return int
     */
    public function getElapsedTime()
    {
      return $this->ElapsedTime;
    }

    /**
     * @param int $ElapsedTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StopAirport
     */
    public function setElapsedTime($ElapsedTime)
    {
      $this->ElapsedTime = $ElapsedTime;
      return $this;
    }

    /**
     * @return int
     */
    public function getDuration()
    {
      return $this->Duration;
    }

    /**
     * @param int $Duration
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StopAirport
     */
    public function setDuration($Duration)
    {
      $this->Duration = $Duration;
      return $this;
    }

    /**
     * @return float
     */
    public function getGMTOffset()
    {
      return $this->GMTOffset;
    }

    /**
     * @param float $GMTOffset
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StopAirport
     */
    public function setGMTOffset($GMTOffset)
    {
      $this->GMTOffset = $GMTOffset;
      return $this;
    }

    /**
     * @return UNKNOWN
     */
    public function getEquipment()
    {
      return $this->Equipment;
    }

    /**
     * @param UNKNOWN $Equipment
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StopAirport
     */
    public function setEquipment($Equipment)
    {
      $this->Equipment = $Equipment;
      return $this;
    }

}
