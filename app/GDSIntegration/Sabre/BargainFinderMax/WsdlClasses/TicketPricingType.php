<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TicketPricingType
{

    /**
     * @var OriginDestinationOptions $OriginDestinationOptions
     */
    protected $OriginDestinationOptions = null;

    /**
     * @var AirItineraryPricingInfoType $AirItineraryPricingInfo
     */
    protected $AirItineraryPricingInfo = null;

    /**
     * @var FreeTextType[] $Notes
     */
    protected $Notes = null;

    /**
     * @var TicketingInfoRS_Type $TicketingInfo
     */
    protected $TicketingInfo = null;

    /**
     * @var TPA_Extensions $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @var int $Number
     */
    protected $Number = null;

    /**
     * @param OriginDestinationOptions $OriginDestinationOptions
     * @param AirItineraryPricingInfoType $AirItineraryPricingInfo
     * @param int $Number
     */
    public function __construct($OriginDestinationOptions = null, $AirItineraryPricingInfo = null, $Number = null)
    {
      $this->OriginDestinationOptions = $OriginDestinationOptions;
      $this->AirItineraryPricingInfo = $AirItineraryPricingInfo;
      $this->Number = $Number;
    }

    /**
     * @return OriginDestinationOptions
     */
    public function getOriginDestinationOptions()
    {
      return $this->OriginDestinationOptions;
    }

    /**
     * @param OriginDestinationOptions $OriginDestinationOptions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TicketPricingType
     */
    public function setOriginDestinationOptions($OriginDestinationOptions)
    {
      $this->OriginDestinationOptions = $OriginDestinationOptions;
      return $this;
    }

    /**
     * @return AirItineraryPricingInfoType
     */
    public function getAirItineraryPricingInfo()
    {
      return $this->AirItineraryPricingInfo;
    }

    /**
     * @param AirItineraryPricingInfoType $AirItineraryPricingInfo
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TicketPricingType
     */
    public function setAirItineraryPricingInfo($AirItineraryPricingInfo)
    {
      $this->AirItineraryPricingInfo = $AirItineraryPricingInfo;
      return $this;
    }

    /**
     * @return FreeTextType[]
     */
    public function getNotes()
    {
      return $this->Notes;
    }

    /**
     * @param FreeTextType[] $Notes
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TicketPricingType
     */
    public function setNotes(array $Notes = null)
    {
      $this->Notes = $Notes;
      return $this;
    }

    /**
     * @return TicketingInfoRS_Type
     */
    public function getTicketingInfo()
    {
      return $this->TicketingInfo;
    }

    /**
     * @param TicketingInfoRS_Type $TicketingInfo
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TicketPricingType
     */
    public function setTicketingInfo($TicketingInfo)
    {
      $this->TicketingInfo = $TicketingInfo;
      return $this;
    }

    /**
     * @return TPA_Extensions
     */
    public function getTPA_Extensions()
    {
      return $this->TPA_Extensions;
    }

    /**
     * @param TPA_Extensions $TPA_Extensions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TicketPricingType
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      return $this;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
      return $this->Number;
    }

    /**
     * @param int $Number
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TicketPricingType
     */
    public function setNumber($Number)
    {
      $this->Number = $Number;
      return $this;
    }

}
