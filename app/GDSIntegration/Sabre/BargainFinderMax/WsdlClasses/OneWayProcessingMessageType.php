<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class OneWayProcessingMessageType extends ProcessingMessageType
{

    /**
     * @var date $DepartureDate
     */
    protected $DepartureDate = null;

    /**
     * @var StringLength1to8 $DepartureAirport
     */
    protected $DepartureAirport = null;

    /**
     * @var StringLength1to8 $ArrivalAirport
     */
    protected $ArrivalAirport = null;

    /**
     * @param ResponsePricingSourceType $PricingSource
     * @param string $Message
     * @param date $DepartureDate
     * @param StringLength1to8 $DepartureAirport
     * @param StringLength1to8 $ArrivalAirport
     */
    public function __construct($PricingSource = null, $Message = null, $DepartureDate = null, $DepartureAirport = null, $ArrivalAirport = null)
    {
      parent::__construct($PricingSource, $Message);
      $this->DepartureDate = $DepartureDate;
      $this->DepartureAirport = $DepartureAirport;
      $this->ArrivalAirport = $ArrivalAirport;
    }

    /**
     * @return date
     */
    public function getDepartureDate()
    {
      return $this->DepartureDate;
    }

    /**
     * @param date $DepartureDate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OneWayProcessingMessageType
     */
    public function setDepartureDate($DepartureDate)
    {
      $this->DepartureDate = $DepartureDate;
      return $this;
    }

    /**
     * @return StringLength1to8
     */
    public function getDepartureAirport()
    {
      return $this->DepartureAirport;
    }

    /**
     * @param StringLength1to8 $DepartureAirport
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OneWayProcessingMessageType
     */
    public function setDepartureAirport($DepartureAirport)
    {
      $this->DepartureAirport = $DepartureAirport;
      return $this;
    }

    /**
     * @return StringLength1to8
     */
    public function getArrivalAirport()
    {
      return $this->ArrivalAirport;
    }

    /**
     * @param StringLength1to8 $ArrivalAirport
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OneWayProcessingMessageType
     */
    public function setArrivalAirport($ArrivalAirport)
    {
      $this->ArrivalAirport = $ArrivalAirport;
      return $this;
    }

}
