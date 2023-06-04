<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareComponentTaxesType
{

    /**
     * @var FlightSegment[] $FlightSegment
     */
    protected $FlightSegment = null;

    /**
     * @var AirTaxType[] $Tax
     */
    protected $Tax = null;

    /**
     * @var AirTaxSummaryType[] $TaxSummary
     */
    protected $TaxSummary = null;

    /**
     * @param FlightSegment[] $FlightSegment
     */
    public function __construct(array $FlightSegment = null)
    {
      $this->FlightSegment = $FlightSegment;
    }

    /**
     * @return FlightSegment[]
     */
    public function getFlightSegment()
    {
      return $this->FlightSegment;
    }

    /**
     * @param FlightSegment[] $FlightSegment
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponentTaxesType
     */
    public function setFlightSegment(array $FlightSegment)
    {
      $this->FlightSegment = $FlightSegment;
      return $this;
    }

    /**
     * @return AirTaxType[]
     */
    public function getTax()
    {
      return $this->Tax;
    }

    /**
     * @param AirTaxType[] $Tax
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponentTaxesType
     */
    public function setTax(array $Tax = null)
    {
      $this->Tax = $Tax;
      return $this;
    }

    /**
     * @return AirTaxSummaryType[]
     */
    public function getTaxSummary()
    {
      return $this->TaxSummary;
    }

    /**
     * @param AirTaxSummaryType[] $TaxSummary
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponentTaxesType
     */
    public function setTaxSummary(array $TaxSummary = null)
    {
      $this->TaxSummary = $TaxSummary;
      return $this;
    }

}
