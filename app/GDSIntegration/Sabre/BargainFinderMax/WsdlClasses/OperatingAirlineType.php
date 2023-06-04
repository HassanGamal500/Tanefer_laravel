<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class OperatingAirlineType extends CompanyNameType
{

    /**
     * @var CompanyNameType $_
     */
    protected $_ = null;

    /**
     * @var FlightNumberType $FlightNumber
     */
    protected $FlightNumber = null;

    /**
     * @param string $_
     * @param StringLength1to64 $CompanyShortName
     * @param OTA_CodeType $TravelSector
     * @param StringLength1to8 $Code
     * @param StringLength1to32 $CodeContext
     * @param CompanyNameType $_
     * @param FlightNumberType $FlightNumber
     */
    public function __construct($_ = null, $CompanyShortName = null, $TravelSector = null, $Code = null, $CodeContext = null, $FlightNumber = null)
    {
      parent::__construct($_, $CompanyShortName, $TravelSector, $Code, $CodeContext);
      $this->_ = $_;
      $this->FlightNumber = $FlightNumber;
    }

    /**
     * @return CompanyNameType
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param CompanyNameType $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OperatingAirlineType
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return FlightNumberType
     */
    public function getFlightNumber()
    {
      return $this->FlightNumber;
    }

    /**
     * @param FlightNumberType $FlightNumber
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OperatingAirlineType
     */
    public function setFlightNumber($FlightNumber)
    {
      $this->FlightNumber = $FlightNumber;
      return $this;
    }

}
