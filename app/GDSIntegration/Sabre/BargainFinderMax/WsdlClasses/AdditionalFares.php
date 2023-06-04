<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AdditionalFares
{

    /**
     * @var AirItineraryPricingInfo $AirItineraryPricingInfo
     */
    protected $AirItineraryPricingInfo = null;

    /**
     * @var FreeTextType $Notes
     */
    protected $Notes = null;

    /**
     * @var TicketingInfoRS_Type $TicketingInfo
     */
    protected $TicketingInfo = null;

    /**
     * @var boolean $MultipleTickets
     */
    protected $MultipleTickets = null;

    /**
     * @param AirItineraryPricingInfo $AirItineraryPricingInfo
     * @param FreeTextType $Notes
     * @param TicketingInfoRS_Type $TicketingInfo
     * @param boolean $MultipleTickets
     */
    public function __construct($AirItineraryPricingInfo = null, $Notes = null, $TicketingInfo = null, $MultipleTickets = null)
    {
      $this->AirItineraryPricingInfo = $AirItineraryPricingInfo;
      $this->Notes = $Notes;
      $this->TicketingInfo = $TicketingInfo;
      $this->MultipleTickets = $MultipleTickets;
    }

    /**
     * @return AirItineraryPricingInfo
     */
    public function getAirItineraryPricingInfo()
    {
      return $this->AirItineraryPricingInfo;
    }

    /**
     * @param AirItineraryPricingInfo $AirItineraryPricingInfo
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AdditionalFares
     */
    public function setAirItineraryPricingInfo($AirItineraryPricingInfo)
    {
      $this->AirItineraryPricingInfo = $AirItineraryPricingInfo;
      return $this;
    }

    /**
     * @return FreeTextType
     */
    public function getNotes()
    {
      return $this->Notes;
    }

    /**
     * @param FreeTextType $Notes
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AdditionalFares
     */
    public function setNotes($Notes)
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AdditionalFares
     */
    public function setTicketingInfo($TicketingInfo)
    {
      $this->TicketingInfo = $TicketingInfo;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getMultipleTickets()
    {
      return $this->MultipleTickets;
    }

    /**
     * @param boolean $MultipleTickets
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AdditionalFares
     */
    public function setMultipleTickets($MultipleTickets)
    {
      $this->MultipleTickets = $MultipleTickets;
      return $this;
    }

}
