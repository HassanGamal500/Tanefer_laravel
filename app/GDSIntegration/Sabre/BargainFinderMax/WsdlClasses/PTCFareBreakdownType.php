<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PTCFareBreakdownType
{

    /**
     * @var OfferItem $OfferItem
     */
    protected $OfferItem = null;

    /**
     * @var PassengerTypeQuantityType $PassengerTypeQuantity
     */
    protected $PassengerTypeQuantity = null;

    /**
     * @var FareBasisCodes $FareBasisCodes
     */
    protected $FareBasisCodes = null;

    /**
     * @var FareType $PassengerFare
     */
    protected $PassengerFare = null;

    /**
     * @var Endorsements $Endorsements
     */
    protected $Endorsements = null;

    /**
     * @var TPA_Extensions $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @var FareInfos $FareInfos
     */
    protected $FareInfos = null;

    /**
     * @var ResponsePricingSourceType $PricingSource
     */
    protected $PricingSource = null;

    /**
     * @var anonymous722 $PrivateFareType
     */
    protected $PrivateFareType = null;

    /**
     * @var TimeOrDateTimeType $LastTicketDate
     */
    protected $LastTicketDate = null;

    /**
     * @var HH_MM $LastTicketTime
     */
    protected $LastTicketTime = null;

    /**
     * @var date $PreviousExchangeDate
     */
    protected $PreviousExchangeDate = null;

    /**
     * @var anonymous723 $ReissueExchange
     */
    protected $ReissueExchange = null;

    /**
     * @param PassengerTypeQuantityType $PassengerTypeQuantity
     * @param FareBasisCodes $FareBasisCodes
     * @param FareType $PassengerFare
     * @param ResponsePricingSourceType $PricingSource
     * @param anonymous722 $PrivateFareType
     * @param TimeOrDateTimeType $LastTicketDate
     * @param HH_MM $LastTicketTime
     * @param date $PreviousExchangeDate
     * @param anonymous723 $ReissueExchange
     */
    public function __construct($PassengerTypeQuantity = null, $FareBasisCodes = null, $PassengerFare = null, $PricingSource = null, $PrivateFareType = null, $LastTicketDate = null, $LastTicketTime = null, $PreviousExchangeDate = null, $ReissueExchange = null)
    {
      $this->PassengerTypeQuantity = $PassengerTypeQuantity;
      $this->FareBasisCodes = $FareBasisCodes;
      $this->PassengerFare = $PassengerFare;
      $this->PricingSource = $PricingSource;
      $this->PrivateFareType = $PrivateFareType;
      $this->LastTicketDate = $LastTicketDate;
      $this->LastTicketTime = $LastTicketTime;
      $this->PreviousExchangeDate = $PreviousExchangeDate;
      $this->ReissueExchange = $ReissueExchange;
    }

    /**
     * @return OfferItem
     */
    public function getOfferItem()
    {
      return $this->OfferItem;
    }

    /**
     * @param OfferItem $OfferItem
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PTCFareBreakdownType
     */
    public function setOfferItem($OfferItem)
    {
      $this->OfferItem = $OfferItem;
      return $this;
    }

    /**
     * @return PassengerTypeQuantityType
     */
    public function getPassengerTypeQuantity()
    {
      return $this->PassengerTypeQuantity;
    }

    /**
     * @param PassengerTypeQuantityType $PassengerTypeQuantity
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PTCFareBreakdownType
     */
    public function setPassengerTypeQuantity($PassengerTypeQuantity)
    {
      $this->PassengerTypeQuantity = $PassengerTypeQuantity;
      return $this;
    }

    /**
     * @return FareBasisCodes
     */
    public function getFareBasisCodes()
    {
      return $this->FareBasisCodes;
    }

    /**
     * @param FareBasisCodes $FareBasisCodes
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PTCFareBreakdownType
     */
    public function setFareBasisCodes($FareBasisCodes)
    {
      $this->FareBasisCodes = $FareBasisCodes;
      return $this;
    }

    /**
     * @return FareType
     */
    public function getPassengerFare()
    {
      return $this->PassengerFare;
    }

    /**
     * @param FareType $PassengerFare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PTCFareBreakdownType
     */
    public function setPassengerFare($PassengerFare)
    {
      $this->PassengerFare = $PassengerFare;
      return $this;
    }

    /**
     * @return Endorsements
     */
    public function getEndorsements()
    {
      return $this->Endorsements;
    }

    /**
     * @param Endorsements $Endorsements
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PTCFareBreakdownType
     */
    public function setEndorsements($Endorsements)
    {
      $this->Endorsements = $Endorsements;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PTCFareBreakdownType
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PTCFareBreakdownType
     */
    public function setFareInfos($FareInfos)
    {
      $this->FareInfos = $FareInfos;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PTCFareBreakdownType
     */
    public function setPricingSource($PricingSource)
    {
      $this->PricingSource = $PricingSource;
      return $this;
    }

    /**
     * @return anonymous722
     */
    public function getPrivateFareType()
    {
      return $this->PrivateFareType;
    }

    /**
     * @param anonymous722 $PrivateFareType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PTCFareBreakdownType
     */
    public function setPrivateFareType($PrivateFareType)
    {
      $this->PrivateFareType = $PrivateFareType;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PTCFareBreakdownType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PTCFareBreakdownType
     */
    public function setLastTicketTime($LastTicketTime)
    {
      $this->LastTicketTime = $LastTicketTime;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PTCFareBreakdownType
     */
    public function setPreviousExchangeDate($PreviousExchangeDate)
    {
      $this->PreviousExchangeDate = $PreviousExchangeDate;
      return $this;
    }

    /**
     * @return anonymous723
     */
    public function getReissueExchange()
    {
      return $this->ReissueExchange;
    }

    /**
     * @param anonymous723 $ReissueExchange
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PTCFareBreakdownType
     */
    public function setReissueExchange($ReissueExchange)
    {
      $this->ReissueExchange = $ReissueExchange;
      return $this;
    }

}
