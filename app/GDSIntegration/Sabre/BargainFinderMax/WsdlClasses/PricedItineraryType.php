<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PricedItineraryType
{

    /**
     * @var AirItineraryType $AirItinerary
     */
    protected $AirItinerary = null;

    /**
     * @var AirItineraryPricingInfo[] $AirItineraryPricingInfo
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
     * @var boolean $isFromCustomPath
     */
    protected $isFromCustomPath = null;

    /**
     * @var int $SequenceNumber
     */
    protected $SequenceNumber = null;

    /**
     * @var RPH_Type $OriginDestinationRPH
     */
    protected $OriginDestinationRPH = null;

    /**
     * @var string $CampaignID
     */
    protected $CampaignID = null;

    /**
     * @var boolean $AlternateAirport
     */
    protected $AlternateAirport = null;

    /**
     * @var boolean $MultipleTickets
     */
    protected $MultipleTickets = null;

    /**
     * @param Money $Amount
     * @param string $Description
     * @param StringLength1to8 $OriginAirport
     * @param StringLength1to8 $DestinationAirport
     * @param StringLength1to8 $Carrier
     * @param OCFeeCodeType $PassengerCode
     * @param string $Date
     * @param UNKNOWN $StartSegment
     * @param UNKNOWN $EndSegment
     * @param anonymous569 $AncillaryTypeCode
     * @param anonymous570 $Subcode
     * @param BaggageIDType $BaggageID
     * @param anonymous571 $Subgroup
     * @param string $Description1
     * @param string $Description2
     * @param int $FirstOccurrence
     * @param int $LastOccurrence
     * @param TimeOrDateTimeType $LastTicketDate
     * @param HH_MM $LastTicketTime
     * @param anonymous617 $PrivateFareType
     * @param anonymous618 $SpanishFamilyDiscountIndicator
     * @param int $FlexibleFareID
     * @param ResponsePricingSourceType $PricingSource
     * @param PricingSubSourceType $PricingSubSource
     * @param string $PseudoCityCode
     * @param string $BrandID
     * @param boolean $FareReturned
     * @param string $FareStatus
     * @param boolean $CachedItin
     * @param string $CachePartition
     * @param int $CachePartitionPriority
     * @param string $CacheVersion
     * @param int $TimeToLive
     * @param int $HoursSinceCreation
     * @param boolean $AlternateCityOption
     * @param boolean $BrandsOnAnyMarket
     * @param boolean $Revalidated
     * @param date $PreviousExchangeDate
     * @param anonymous619 $ReissueExchange
     * @param date $AdvancedPurchaseDate
     * @param date $PurchaseByDate
     * @param boolean $isFromCustomPath
     * @param int $SequenceNumber
     * @param RPH_Type $OriginDestinationRPH
     * @param string $CampaignID
     * @param boolean $AlternateAirport
     * @param boolean $MultipleTickets
     */
    public function __construct($Amount = null, $Description = null, $OriginAirport = null, $DestinationAirport = null, $Carrier = null, $PassengerCode = null, $Date = null, $StartSegment = null, $EndSegment = null, $AncillaryTypeCode = null, $Subcode = null, $BaggageID = null, $Subgroup = null, $Description1 = null, $Description2 = null, $FirstOccurrence = null, $LastOccurrence = null, $LastTicketDate = null, $LastTicketTime = null, $PrivateFareType = null, $SpanishFamilyDiscountIndicator = null, $FlexibleFareID = null, $PricingSource = null, $PricingSubSource = null, $PseudoCityCode = null, $BrandID = null, $FareReturned = null, $FareStatus = null, $CachedItin = null, $CachePartition = null, $CachePartitionPriority = null, $CacheVersion = null, $TimeToLive = null, $HoursSinceCreation = null, $AlternateCityOption = null, $BrandsOnAnyMarket = null, $Revalidated = null, $PreviousExchangeDate = null, $ReissueExchange = null, $AdvancedPurchaseDate = null, $PurchaseByDate = null, $isFromCustomPath = null, $SequenceNumber = null, $OriginDestinationRPH = null, $CampaignID = null, $AlternateAirport = null, $MultipleTickets = null)
    {
      //parent::__construct($Amount, $Description, $OriginAirport, $DestinationAirport, $Carrier, $PassengerCode, $Date, $StartSegment, $EndSegment, $AncillaryTypeCode, $Subcode, $BaggageID, $Subgroup, $Description1, $Description2, $FirstOccurrence, $LastOccurrence, $LastTicketDate, $LastTicketTime, $PrivateFareType, $SpanishFamilyDiscountIndicator, $FlexibleFareID, $PricingSource, $PricingSubSource, $PseudoCityCode, $BrandID, $FareReturned, $FareStatus, $CachedItin, $CachePartition, $CachePartitionPriority, $CacheVersion, $TimeToLive, $HoursSinceCreation, $AlternateCityOption, $BrandsOnAnyMarket, $Revalidated, $PreviousExchangeDate, $ReissueExchange, $AdvancedPurchaseDate, $PurchaseByDate);
      $this->isFromCustomPath = $isFromCustomPath;
      $this->SequenceNumber = $SequenceNumber;
      $this->OriginDestinationRPH = $OriginDestinationRPH;
      $this->CampaignID = $CampaignID;
      $this->AlternateAirport = $AlternateAirport;
      $this->MultipleTickets = $MultipleTickets;
    }

    /**
     * @return AirItineraryType
     */
    public function getAirItinerary()
    {
      return $this->AirItinerary;
    }

    /**
     * @param AirItineraryType $AirItinerary
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PricedItineraryType
     */
    public function setAirItinerary($AirItinerary)
    {
      $this->AirItinerary = $AirItinerary;
      return $this;
    }

    /**
     * @return AirItineraryPricingInfo[]
     */
    public function getAirItineraryPricingInfo()
    {
      return $this->AirItineraryPricingInfo;
    }

    /**
     * @param AirItineraryPricingInfo[] $AirItineraryPricingInfo
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PricedItineraryType
     */
    public function setAirItineraryPricingInfo(array $AirItineraryPricingInfo = null)
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PricedItineraryType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PricedItineraryType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PricedItineraryType
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getIsFromCustomPath()
    {
      return $this->isFromCustomPath;
    }

    /**
     * @param boolean $isFromCustomPath
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PricedItineraryType
     */
    public function setIsFromCustomPath($isFromCustomPath)
    {
      $this->isFromCustomPath = $isFromCustomPath;
      return $this;
    }

    /**
     * @return int
     */
    public function getSequenceNumber()
    {
      return $this->SequenceNumber;
    }

    /**
     * @param int $SequenceNumber
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PricedItineraryType
     */
    public function setSequenceNumber($SequenceNumber)
    {
      $this->SequenceNumber = $SequenceNumber;
      return $this;
    }

    /**
     * @return RPH_Type
     */
    public function getOriginDestinationRPH()
    {
      return $this->OriginDestinationRPH;
    }

    /**
     * @param RPH_Type $OriginDestinationRPH
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PricedItineraryType
     */
    public function setOriginDestinationRPH($OriginDestinationRPH)
    {
      $this->OriginDestinationRPH = $OriginDestinationRPH;
      return $this;
    }

    /**
     * @return string
     */
    public function getCampaignID()
    {
      return $this->CampaignID;
    }

    /**
     * @param string $CampaignID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PricedItineraryType
     */
    public function setCampaignID($CampaignID)
    {
      $this->CampaignID = $CampaignID;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getAlternateAirport()
    {
      return $this->AlternateAirport;
    }

    /**
     * @param boolean $AlternateAirport
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PricedItineraryType
     */
    public function setAlternateAirport($AlternateAirport)
    {
      $this->AlternateAirport = $AlternateAirport;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PricedItineraryType
     */
    public function setMultipleTickets($MultipleTickets)
    {
      $this->MultipleTickets = $MultipleTickets;
      return $this;
    }

}
