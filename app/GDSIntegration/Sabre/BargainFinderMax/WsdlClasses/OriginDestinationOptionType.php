<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class OriginDestinationOptionType
{

    /**
     * @var BookFlightSegmentType[] $FlightSegment
     */
    protected $FlightSegment = null;

    /**
     * @var int $ElapsedTime
     */
    protected $ElapsedTime = null;

    /**
     * @var CountryCodeType $ArrivalCountry
     */
    protected $ArrivalCountry = null;

    /**
     * @var CountryCodeType $DepartureCountry
     */
    protected $DepartureCountry = null;

    /**
     * @param BookFlightSegmentType[] $FlightSegment
     * @param int $ElapsedTime
     * @param CountryCodeType $ArrivalCountry
     * @param CountryCodeType $DepartureCountry
     */
    public function __construct(array $FlightSegment = null, $ElapsedTime = null, $ArrivalCountry = null, $DepartureCountry = null)
    {
      $this->FlightSegment = $FlightSegment;
      $this->ElapsedTime = $ElapsedTime;
      $this->ArrivalCountry = $ArrivalCountry;
      $this->DepartureCountry = $DepartureCountry;
    }

    /**
     * @return BookFlightSegmentType[]
     */
    public function getFlightSegment()
    {
      return $this->FlightSegment;
    }

    /**
     * @param BookFlightSegmentType[] $FlightSegment
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationOptionType
     */
    public function setFlightSegment(array $FlightSegment)
    {
      $this->FlightSegment = $FlightSegment;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationOptionType
     */
    public function setElapsedTime($ElapsedTime)
    {
      $this->ElapsedTime = $ElapsedTime;
      return $this;
    }

    /**
     * @return CountryCodeType
     */
    public function getArrivalCountry()
    {
      return $this->ArrivalCountry;
    }

    /**
     * @param CountryCodeType $ArrivalCountry
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationOptionType
     */
    public function setArrivalCountry($ArrivalCountry)
    {
      $this->ArrivalCountry = $ArrivalCountry;
      return $this;
    }

    /**
     * @return CountryCodeType
     */
    public function getDepartureCountry()
    {
      return $this->DepartureCountry;
    }

    /**
     * @param CountryCodeType $DepartureCountry
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationOptionType
     */
    public function setDepartureCountry($DepartureCountry)
    {
      $this->DepartureCountry = $DepartureCountry;
      return $this;
    }

}
