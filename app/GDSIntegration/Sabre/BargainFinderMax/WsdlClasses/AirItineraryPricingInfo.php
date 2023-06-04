<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AirItineraryPricingInfo
{
    /**
     * @var Shelf $Shelf
     */
    protected $Shelf = null;

    /**
     * @var Offer $Offer
     */
    protected $Offer = null;

    /**
     * @var ItinTotalFareType $ItinTotalFare
     */
    protected $ItinTotalFare = null;

    /**
     * @var PTC_FareBreakdowns $PTC_FareBreakdowns
     */
    protected $PTC_FareBreakdowns = null;

    /**
     * @var FareInfos $FareInfos
     */
    protected $FareInfos = null;

    /**
     * @var TPA_Extensions $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @var TimeOrDateTimeType $LastTicketDate
     */
    protected $LastTicketDate = null;

    /**
     * @var HH_MM $LastTicketTime
     */
    protected $LastTicketTime = null;

    /**
     * @var anonymous617 $PrivateFareType
     */
    protected $PrivateFareType = null;

    /**
     * @var anonymous618 $SpanishFamilyDiscountIndicator
     */
    protected $SpanishFamilyDiscountIndicator = null;

    /**
     * @var int $FlexibleFareID
     */
    protected $FlexibleFareID = null;

    /**
     * @var ResponsePricingSourceType $PricingSource
     */
    protected $PricingSource = null;

    /**
     * @var PricingSubSourceType $PricingSubSource
     */
    protected $PricingSubSource = null;

    /**
     * @var string $PseudoCityCode
     */
    protected $PseudoCityCode = null;

    /**
     * @var string $BrandID
     */
    protected $BrandID = null;

    /**
     * @var boolean $FareReturned
     */
    protected $FareReturned = null;

    /**
     * @var string $FareStatus
     */
    protected $FareStatus = null;

    /**
     * @var boolean $CachedItin
     */
    protected $CachedItin = null;

    /**
     * @var string $CachePartition
     */
    protected $CachePartition = null;

    /**
     * @var int $CachePartitionPriority
     */
    protected $CachePartitionPriority = null;

    /**
     * @var string $CacheVersion
     */
    protected $CacheVersion = null;

    /**
     * @var int $TimeToLive
     */
    protected $TimeToLive = null;

    /**
     * @var int $HoursSinceCreation
     */
    protected $HoursSinceCreation = null;

    /**
     * @var boolean $AlternateCityOption
     */
    protected $AlternateCityOption = null;

    /**
     * @var boolean $BrandsOnAnyMarket
     */
    protected $BrandsOnAnyMarket = null;

    /**
     * @var boolean $Revalidated
     */
    protected $Revalidated = null;

    /**
     * @var date $PreviousExchangeDate
     */
    protected $PreviousExchangeDate = null;

    /**
     * @var anonymous619 $ReissueExchange
     */
    protected $ReissueExchange = null;

    /**
     * @var date $AdvancedPurchaseDate
     */
    protected $AdvancedPurchaseDate = null;

    /**
     * @var date $PurchaseByDate
     */
    protected $PurchaseByDate = null;

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
     */
    public function __construct($Amount = null, $Description = null, $OriginAirport = null, $DestinationAirport = null, $Carrier = null, $PassengerCode = null, $Date = null, $StartSegment = null, $EndSegment = null, $AncillaryTypeCode = null, $Subcode = null, $BaggageID = null, $Subgroup = null, $Description1 = null, $Description2 = null, $FirstOccurrence = null, $LastOccurrence = null, $LastTicketDate = null, $LastTicketTime = null, $PrivateFareType = null, $SpanishFamilyDiscountIndicator = null, $FlexibleFareID = null, $PricingSource = null, $PricingSubSource = null, $PseudoCityCode = null, $BrandID = null, $FareReturned = null, $FareStatus = null, $CachedItin = null, $CachePartition = null, $CachePartitionPriority = null, $CacheVersion = null, $TimeToLive = null, $HoursSinceCreation = null, $AlternateCityOption = null, $BrandsOnAnyMarket = null, $Revalidated = null, $PreviousExchangeDate = null, $ReissueExchange = null, $AdvancedPurchaseDate = null, $PurchaseByDate = null)
    {
        $this->LastTicketDate = $LastTicketDate;
        $this->LastTicketTime = $LastTicketTime;
        $this->PrivateFareType = $PrivateFareType;
        $this->SpanishFamilyDiscountIndicator = $SpanishFamilyDiscountIndicator;
        $this->FlexibleFareID = $FlexibleFareID;
        $this->PricingSource = $PricingSource;
        $this->PricingSubSource = $PricingSubSource;
        $this->PseudoCityCode = $PseudoCityCode;
        $this->BrandID = $BrandID;
        $this->FareReturned = $FareReturned;
        $this->FareStatus = $FareStatus;
        $this->CachedItin = $CachedItin;
        $this->CachePartition = $CachePartition;
        $this->CachePartitionPriority = $CachePartitionPriority;
        $this->CacheVersion = $CacheVersion;
        $this->TimeToLive = $TimeToLive;
        $this->HoursSinceCreation = $HoursSinceCreation;
        $this->AlternateCityOption = $AlternateCityOption;
        $this->BrandsOnAnyMarket = $BrandsOnAnyMarket;
        $this->Revalidated = $Revalidated;
        $this->PreviousExchangeDate = $PreviousExchangeDate;
        $this->ReissueExchange = $ReissueExchange;
        $this->AdvancedPurchaseDate = $AdvancedPurchaseDate;
        $this->PurchaseByDate = $PurchaseByDate;
    }

    /**
     * @return Shelf
     */
    public function getShelf()
    {
        return $this->Shelf;
    }

    /**
     * @param Shelf $Shelf
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setShelf($Shelf)
    {
        $this->Shelf = $Shelf;
        return $this;
    }

    /**
     * @return Offer
     */
    public function getOffer()
    {
        return $this->Offer;
    }

    /**
     * @param Offer $Offer
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setOffer($Offer)
    {
        $this->Offer = $Offer;
        return $this;
    }

    /**
     * @return ItinTotalFareType
     */
    public function getItinTotalFare()
    {
        return $this->ItinTotalFare;
    }

    /**
     * @param ItinTotalFareType $ItinTotalFare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setItinTotalFare($ItinTotalFare)
    {
        $this->ItinTotalFare = $ItinTotalFare;
        return $this;
    }

    /**
     * @return PTC_FareBreakdowns
     */
    public function getPTC_FareBreakdowns()
    {
        return $this->PTC_FareBreakdowns;
    }

    /**
     * @param PTC_FareBreakdowns $PTC_FareBreakdowns
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setPTC_FareBreakdowns($PTC_FareBreakdowns)
    {
        $this->PTC_FareBreakdowns = $PTC_FareBreakdowns;
        return $this;
    }

    /**
     * @return FareInfos
     */
    public function getFareInfos()
    {
        return $this->FareInfos;
    }

    /**
     * @param FareInfos $FareInfos
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setFareInfos($FareInfos)
    {
        $this->FareInfos = $FareInfos;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
        $this->TPA_Extensions = $TPA_Extensions;
        return $this;
    }

    /**
     * @return TimeOrDateTimeType
     */
    public function getLastTicketDate()
    {
        return $this->LastTicketDate;
    }

    /**
     * @param TimeOrDateTimeType $LastTicketDate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setLastTicketDate($LastTicketDate)
    {
        $this->LastTicketDate = $LastTicketDate;
        return $this;
    }

    /**
     * @return HH_MM
     */
    public function getLastTicketTime()
    {
        return $this->LastTicketTime;
    }

    /**
     * @param HH_MM $LastTicketTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setLastTicketTime($LastTicketTime)
    {
        $this->LastTicketTime = $LastTicketTime;
        return $this;
    }

    /**
     * @return anonymous617
     */
    public function getPrivateFareType()
    {
        return $this->PrivateFareType;
    }

    /**
     * @param anonymous617 $PrivateFareType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setPrivateFareType($PrivateFareType)
    {
        $this->PrivateFareType = $PrivateFareType;
        return $this;
    }

    /**
     * @return anonymous618
     */
    public function getSpanishFamilyDiscountIndicator()
    {
        return $this->SpanishFamilyDiscountIndicator;
    }

    /**
     * @param anonymous618 $SpanishFamilyDiscountIndicator
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setSpanishFamilyDiscountIndicator($SpanishFamilyDiscountIndicator)
    {
        $this->SpanishFamilyDiscountIndicator = $SpanishFamilyDiscountIndicator;
        return $this;
    }

    /**
     * @return int
     */
    public function getFlexibleFareID()
    {
        return $this->FlexibleFareID;
    }

    /**
     * @param int $FlexibleFareID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setFlexibleFareID($FlexibleFareID)
    {
        $this->FlexibleFareID = $FlexibleFareID;
        return $this;
    }

    /**
     * @return ResponsePricingSourceType
     */
    public function getPricingSource()
    {
        return $this->PricingSource;
    }

    /**
     * @param ResponsePricingSourceType $PricingSource
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setPricingSource($PricingSource)
    {
        $this->PricingSource = $PricingSource;
        return $this;
    }

    /**
     * @return PricingSubSourceType
     */
    public function getPricingSubSource()
    {
        return $this->PricingSubSource;
    }

    /**
     * @param PricingSubSourceType $PricingSubSource
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setPricingSubSource($PricingSubSource)
    {
        $this->PricingSubSource = $PricingSubSource;
        return $this;
    }

    /**
     * @return string
     */
    public function getPseudoCityCode()
    {
        return $this->PseudoCityCode;
    }

    /**
     * @param string $PseudoCityCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setPseudoCityCode($PseudoCityCode)
    {
        $this->PseudoCityCode = $PseudoCityCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getBrandID()
    {
        return $this->BrandID;
    }

    /**
     * @param string $BrandID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setBrandID($BrandID)
    {
        $this->BrandID = $BrandID;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getFareReturned()
    {
        return $this->FareReturned;
    }

    /**
     * @param boolean $FareReturned
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setFareReturned($FareReturned)
    {
        $this->FareReturned = $FareReturned;
        return $this;
    }

    /**
     * @return string
     */
    public function getFareStatus()
    {
        return $this->FareStatus;
    }

    /**
     * @param string $FareStatus
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setFareStatus($FareStatus)
    {
        $this->FareStatus = $FareStatus;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getCachedItin()
    {
        return $this->CachedItin;
    }

    /**
     * @param boolean $CachedItin
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setCachedItin($CachedItin)
    {
        $this->CachedItin = $CachedItin;
        return $this;
    }

    /**
     * @return string
     */
    public function getCachePartition()
    {
        return $this->CachePartition;
    }

    /**
     * @param string $CachePartition
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setCachePartition($CachePartition)
    {
        $this->CachePartition = $CachePartition;
        return $this;
    }

    /**
     * @return int
     */
    public function getCachePartitionPriority()
    {
        return $this->CachePartitionPriority;
    }

    /**
     * @param int $CachePartitionPriority
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setCachePartitionPriority($CachePartitionPriority)
    {
        $this->CachePartitionPriority = $CachePartitionPriority;
        return $this;
    }

    /**
     * @return string
     */
    public function getCacheVersion()
    {
        return $this->CacheVersion;
    }

    /**
     * @param string $CacheVersion
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setCacheVersion($CacheVersion)
    {
        $this->CacheVersion = $CacheVersion;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimeToLive()
    {
        return $this->TimeToLive;
    }

    /**
     * @param int $TimeToLive
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setTimeToLive($TimeToLive)
    {
        $this->TimeToLive = $TimeToLive;
        return $this;
    }

    /**
     * @return int
     */
    public function getHoursSinceCreation()
    {
        return $this->HoursSinceCreation;
    }

    /**
     * @param int $HoursSinceCreation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setHoursSinceCreation($HoursSinceCreation)
    {
        $this->HoursSinceCreation = $HoursSinceCreation;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getAlternateCityOption()
    {
        return $this->AlternateCityOption;
    }

    /**
     * @param boolean $AlternateCityOption
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setAlternateCityOption($AlternateCityOption)
    {
        $this->AlternateCityOption = $AlternateCityOption;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getBrandsOnAnyMarket()
    {
        return $this->BrandsOnAnyMarket;
    }

    /**
     * @param boolean $BrandsOnAnyMarket
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setBrandsOnAnyMarket($BrandsOnAnyMarket)
    {
        $this->BrandsOnAnyMarket = $BrandsOnAnyMarket;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getRevalidated()
    {
        return $this->Revalidated;
    }

    /**
     * @param boolean $Revalidated
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setRevalidated($Revalidated)
    {
        $this->Revalidated = $Revalidated;
        return $this;
    }

    /**
     * @return date
     */
    public function getPreviousExchangeDate()
    {
        return $this->PreviousExchangeDate;
    }

    /**
     * @param date $PreviousExchangeDate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setPreviousExchangeDate($PreviousExchangeDate)
    {
        $this->PreviousExchangeDate = $PreviousExchangeDate;
        return $this;
    }

    /**
     * @return anonymous619
     */
    public function getReissueExchange()
    {
        return $this->ReissueExchange;
    }

    /**
     * @param anonymous619 $ReissueExchange
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setReissueExchange($ReissueExchange)
    {
        $this->ReissueExchange = $ReissueExchange;
        return $this;
    }

    /**
     * @return date
     */
    public function getAdvancedPurchaseDate()
    {
        return $this->AdvancedPurchaseDate;
    }

    /**
     * @param date $AdvancedPurchaseDate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setAdvancedPurchaseDate($AdvancedPurchaseDate)
    {
        $this->AdvancedPurchaseDate = $AdvancedPurchaseDate;
        return $this;
    }

    /**
     * @return date
     */
    public function getPurchaseByDate()
    {
        return $this->PurchaseByDate;
    }

    /**
     * @param date $PurchaseByDate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirItineraryPricingInfoType
     */
    public function setPurchaseByDate($PurchaseByDate)
    {
        $this->PurchaseByDate = $PurchaseByDate;
        return $this;
    }


}
