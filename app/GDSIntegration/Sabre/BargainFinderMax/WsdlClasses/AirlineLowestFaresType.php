<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AirlineLowestFaresType
{

    /**
     * @var CompanyNameType $Airline
     */
    protected $Airline = null;

    /**
     * @var int $NoStops
     */
    protected $NoStops = null;

    /**
     * @var CurrencyAmountType $LowestFare
     */
    protected $LowestFare = null;

    /**
     * @var anyType $ItineraryCount
     */
    protected $ItineraryCount = null;

    /**
     * @param CompanyNameType $Airline
     * @param int $NoStops
     * @param CurrencyAmountType $LowestFare
     * @param anyType $ItineraryCount
     */
    public function __construct($Airline = null, $NoStops = null, $LowestFare = null, $ItineraryCount = null)
    {
      $this->Airline = $Airline;
      $this->NoStops = $NoStops;
      $this->LowestFare = $LowestFare;
      $this->ItineraryCount = $ItineraryCount;
    }

    /**
     * @return CompanyNameType
     */
    public function getAirline()
    {
      return $this->Airline;
    }

    /**
     * @param CompanyNameType $Airline
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirlineLowestFaresType
     */
    public function setAirline($Airline)
    {
      $this->Airline = $Airline;
      return $this;
    }

    /**
     * @return int
     */
    public function getNoStops()
    {
      return $this->NoStops;
    }

    /**
     * @param int $NoStops
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirlineLowestFaresType
     */
    public function setNoStops($NoStops)
    {
      $this->NoStops = $NoStops;
      return $this;
    }

    /**
     * @return CurrencyAmountType
     */
    public function getLowestFare()
    {
      return $this->LowestFare;
    }

    /**
     * @param CurrencyAmountType $LowestFare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirlineLowestFaresType
     */
    public function setLowestFare($LowestFare)
    {
      $this->LowestFare = $LowestFare;
      return $this;
    }

    /**
     * @return anyType
     */
    public function getItineraryCount()
    {
      return $this->ItineraryCount;
    }

    /**
     * @param anyType $ItineraryCount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirlineLowestFaresType
     */
    public function setItineraryCount($ItineraryCount)
    {
      $this->ItineraryCount = $ItineraryCount;
      return $this;
    }

}
