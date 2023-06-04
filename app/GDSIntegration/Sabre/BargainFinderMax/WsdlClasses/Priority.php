<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Priority
{

    /**
     * @var Price $Price
     */
    protected $Price = null;

    /**
     * @var DirectFlights $DirectFlights
     */
    protected $DirectFlights = null;

    /**
     * @var Time $Time
     */
    protected $Time = null;

    /**
     * @var LegTime $LegTime
     */
    protected $LegTime = null;

    /**
     * @var Vendor $Vendor
     */
    protected $Vendor = null;

    /**
     * @var MarketingCarrier $MarketingCarrier
     */
    protected $MarketingCarrier = null;

    /**
     * @var OperatingCarrier $OperatingCarrier
     */
    protected $OperatingCarrier = null;

    /**
     * @var ElapsedTime $ElapsedTime
     */
    protected $ElapsedTime = null;

    /**
     * @var DepartureTime $DepartureTime
     */
    protected $DepartureTime = null;

    /**
     * @var ConnectionTime $ConnectionTime
     */
    protected $ConnectionTime = null;

    /**
     * @param Price $Price
     * @param DirectFlights $DirectFlights
     * @param Time $Time
     * @param LegTime $LegTime
     * @param Vendor $Vendor
     * @param MarketingCarrier $MarketingCarrier
     * @param OperatingCarrier $OperatingCarrier
     * @param ElapsedTime $ElapsedTime
     * @param DepartureTime $DepartureTime
     * @param ConnectionTime $ConnectionTime
     */
    public function __construct($Price = null, $DirectFlights = null, $Time = null, $LegTime = null, $Vendor = null, $MarketingCarrier = null, $OperatingCarrier = null, $ElapsedTime = null, $DepartureTime = null, $ConnectionTime = null)
    {
      $this->Price = $Price;
      $this->DirectFlights = $DirectFlights;
      $this->Time = $Time;
      $this->LegTime = $LegTime;
      $this->Vendor = $Vendor;
      $this->MarketingCarrier = $MarketingCarrier;
      $this->OperatingCarrier = $OperatingCarrier;
      $this->ElapsedTime = $ElapsedTime;
      $this->DepartureTime = $DepartureTime;
      $this->ConnectionTime = $ConnectionTime;
    }

    /**
     * @return Price
     */
    public function getPrice()
    {
      return $this->Price;
    }

    /**
     * @param Price $Price
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Priority
     */
    public function setPrice($Price)
    {
      $this->Price = $Price;
      return $this;
    }

    /**
     * @return DirectFlights
     */
    public function getDirectFlights()
    {
      return $this->DirectFlights;
    }

    /**
     * @param DirectFlights $DirectFlights
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Priority
     */
    public function setDirectFlights($DirectFlights)
    {
      $this->DirectFlights = $DirectFlights;
      return $this;
    }

    /**
     * @return Time
     */
    public function getTime()
    {
      return $this->Time;
    }

    /**
     * @param Time $Time
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Priority
     */
    public function setTime($Time)
    {
      $this->Time = $Time;
      return $this;
    }

    /**
     * @return LegTime
     */
    public function getLegTime()
    {
      return $this->LegTime;
    }

    /**
     * @param LegTime $LegTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Priority
     */
    public function setLegTime($LegTime)
    {
      $this->LegTime = $LegTime;
      return $this;
    }

    /**
     * @return Vendor
     */
    public function getVendor()
    {
      return $this->Vendor;
    }

    /**
     * @param Vendor $Vendor
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Priority
     */
    public function setVendor($Vendor)
    {
      $this->Vendor = $Vendor;
      return $this;
    }

    /**
     * @return MarketingCarrier
     */
    public function getMarketingCarrier()
    {
      return $this->MarketingCarrier;
    }

    /**
     * @param MarketingCarrier $MarketingCarrier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Priority
     */
    public function setMarketingCarrier($MarketingCarrier)
    {
      $this->MarketingCarrier = $MarketingCarrier;
      return $this;
    }

    /**
     * @return OperatingCarrier
     */
    public function getOperatingCarrier()
    {
      return $this->OperatingCarrier;
    }

    /**
     * @param OperatingCarrier $OperatingCarrier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Priority
     */
    public function setOperatingCarrier($OperatingCarrier)
    {
      $this->OperatingCarrier = $OperatingCarrier;
      return $this;
    }

    /**
     * @return ElapsedTime
     */
    public function getElapsedTime()
    {
      return $this->ElapsedTime;
    }

    /**
     * @param ElapsedTime $ElapsedTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Priority
     */
    public function setElapsedTime($ElapsedTime)
    {
      $this->ElapsedTime = $ElapsedTime;
      return $this;
    }

    /**
     * @return DepartureTime
     */
    public function getDepartureTime()
    {
      return $this->DepartureTime;
    }

    /**
     * @param DepartureTime $DepartureTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Priority
     */
    public function setDepartureTime($DepartureTime)
    {
      $this->DepartureTime = $DepartureTime;
      return $this;
    }

    /**
     * @return ConnectionTime
     */
    public function getConnectionTime()
    {
      return $this->ConnectionTime;
    }

    /**
     * @param ConnectionTime $ConnectionTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Priority
     */
    public function setConnectionTime($ConnectionTime)
    {
      $this->ConnectionTime = $ConnectionTime;
      return $this;
    }

}
