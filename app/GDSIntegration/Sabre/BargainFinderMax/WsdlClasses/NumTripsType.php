<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class NumTripsType
{

    /**
     * @var anonymous448 $Number
     */
    protected $Number = null;

    /**
     * @var int $PerDateMin
     */
    protected $PerDateMin = null;

    /**
     * @var int $PerDateMax
     */
    protected $PerDateMax = null;

    /**
     * @var int $PerMarket
     */
    protected $PerMarket = null;

    /**
     * @var int $PerMonth
     */
    protected $PerMonth = null;

    /**
     * @param anonymous448 $Number
     * @param int $PerDateMin
     * @param int $PerDateMax
     * @param int $PerMarket
     * @param int $PerMonth
     */
    public function __construct($Number = null, $PerDateMin = null, $PerDateMax = null, $PerMarket = null, $PerMonth = null)
    {
      $this->Number = $Number;
      $this->PerDateMin = $PerDateMin;
      $this->PerDateMax = $PerDateMax;
      $this->PerMarket = $PerMarket;
      $this->PerMonth = $PerMonth;
    }

    /**
     * @return anonymous448
     */
    public function getNumber()
    {
      return $this->Number;
    }

    /**
     * @param anonymous448 $Number
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\NumTripsType
     */
    public function setNumber($Number)
    {
      $this->Number = $Number;
      return $this;
    }

    /**
     * @return int
     */
    public function getPerDateMin()
    {
      return $this->PerDateMin;
    }

    /**
     * @param int $PerDateMin
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\NumTripsType
     */
    public function setPerDateMin($PerDateMin)
    {
      $this->PerDateMin = $PerDateMin;
      return $this;
    }

    /**
     * @return int
     */
    public function getPerDateMax()
    {
      return $this->PerDateMax;
    }

    /**
     * @param int $PerDateMax
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\NumTripsType
     */
    public function setPerDateMax($PerDateMax)
    {
      $this->PerDateMax = $PerDateMax;
      return $this;
    }

    /**
     * @return int
     */
    public function getPerMarket()
    {
      return $this->PerMarket;
    }

    /**
     * @param int $PerMarket
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\NumTripsType
     */
    public function setPerMarket($PerMarket)
    {
      $this->PerMarket = $PerMarket;
      return $this;
    }

    /**
     * @return int
     */
    public function getPerMonth()
    {
      return $this->PerMonth;
    }

    /**
     * @param int $PerMonth
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\NumTripsType
     */
    public function setPerMonth($PerMonth)
    {
      $this->PerMonth = $PerMonth;
      return $this;
    }

}
