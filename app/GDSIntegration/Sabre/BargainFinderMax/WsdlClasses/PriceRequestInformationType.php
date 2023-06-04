<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PriceRequestInformationType extends BrandedFareIndicatorsBase
{

    /**
     * @var NegotiatedFareCode $NegotiatedFareCode
     */
    protected $NegotiatedFareCode = null;

    /**
     * @var AccountCode $AccountCode
     */
    protected $AccountCode = null;

    /**
     * @var FlightPromotions $FlightPromotions
     */
    protected $FlightPromotions = null;

    /**
     * @var TPA_Extensions $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @var anonymous174 $FareQualifier
     */
    protected $FareQualifier = null;

    /**
     * @var boolean $NegotiatedFaresOnly
     */
    protected $NegotiatedFaresOnly = null;

    /**
     * @var AlphaLength3 $CurrencyCode
     */
    protected $CurrencyCode = null;

    /**
     * @var RequestPricingSourceType $PricingSource
     */
    protected $PricingSource = null;

    /**
     * @var boolean $Reprice
     */
    protected $Reprice = null;

    /**
     * @var boolean $ProcessThruFaresOnly
     */
    protected $ProcessThruFaresOnly = null;

    /**
     * @var date $PurchaseDate
     */
    protected $PurchaseDate = null;

    /**
     * @var string $PurchaseTime
     */
    protected $PurchaseTime = null;

    /**
     * @var boolean $NetFaresUsed
     */
    protected $NetFaresUsed = null;

    /**
     * @var BypassAdvancePurchaseType $BypassAdvancePurchase
     */
    protected $BypassAdvancePurchase = null;

    /**
     * @param boolean $SingleBrandedFare
     * @param anonymous286 $ParityModeForLowest
     * @param boolean $MultipleBrandedFares
     * @param anonymous287 $UpsellLimit
     * @param boolean $ItinParityBrandlessLeg
     * @param anonymous288 $ParityMode
     * @param anonymous289 $ItinParityFallbackMode
     * @param anonymous174 $FareQualifier
     * @param boolean $NegotiatedFaresOnly
     * @param AlphaLength3 $CurrencyCode
     * @param RequestPricingSourceType $PricingSource
     * @param boolean $Reprice
     * @param boolean $ProcessThruFaresOnly
     * @param date $PurchaseDate
     * @param string $PurchaseTime
     * @param boolean $NetFaresUsed
     * @param BypassAdvancePurchaseType $BypassAdvancePurchase
     */
    public function __construct($SingleBrandedFare = null, $ParityModeForLowest = null, $MultipleBrandedFares = null, $UpsellLimit = null, $ItinParityBrandlessLeg = null, $ParityMode = null, $ItinParityFallbackMode = null, $FareQualifier = null, $NegotiatedFaresOnly = null, $CurrencyCode = null, $PricingSource = null, $Reprice = null, $ProcessThruFaresOnly = null, $PurchaseDate = null, $PurchaseTime = null, $NetFaresUsed = null, $BypassAdvancePurchase = null)
    {
      parent::__construct($SingleBrandedFare, $ParityModeForLowest, $MultipleBrandedFares, $UpsellLimit, $ItinParityBrandlessLeg, $ParityMode, $ItinParityFallbackMode);
      $this->FareQualifier = $FareQualifier;
      $this->NegotiatedFaresOnly = $NegotiatedFaresOnly;
      $this->CurrencyCode = $CurrencyCode;
      $this->PricingSource = $PricingSource;
      $this->Reprice = $Reprice;
      $this->ProcessThruFaresOnly = $ProcessThruFaresOnly;
      $this->PurchaseDate = $PurchaseDate;
      $this->PurchaseTime = $PurchaseTime;
      $this->NetFaresUsed = $NetFaresUsed;
      $this->BypassAdvancePurchase = $BypassAdvancePurchase;
    }

    /**
     * @return NegotiatedFareCode
     */
    public function getNegotiatedFareCode()
    {
      return $this->NegotiatedFareCode;
    }

    /**
     * @param NegotiatedFareCode $NegotiatedFareCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PriceRequestInformationType
     */
    public function setNegotiatedFareCode($NegotiatedFareCode)
    {
      $this->NegotiatedFareCode = $NegotiatedFareCode;
      return $this;
    }

    /**
     * @return AccountCode
     */
    public function getAccountCode()
    {
      return $this->AccountCode;
    }

    /**
     * @param AccountCode $AccountCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PriceRequestInformationType
     */
    public function setAccountCode($AccountCode)
    {
      $this->AccountCode = $AccountCode;
      return $this;
    }

    /**
     * @return FlightPromotions
     */
    public function getFlightPromotions()
    {
      return $this->FlightPromotions;
    }

    /**
     * @param FlightPromotions $FlightPromotions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PriceRequestInformationType
     */
    public function setFlightPromotions($FlightPromotions)
    {
      $this->FlightPromotions = $FlightPromotions;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PriceRequestInformationType
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      return $this;
    }

    /**
     * @return anonymous174
     */
    public function getFareQualifier()
    {
      return $this->FareQualifier;
    }

    /**
     * @param anonymous174 $FareQualifier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PriceRequestInformationType
     */
    public function setFareQualifier($FareQualifier)
    {
      $this->FareQualifier = $FareQualifier;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getNegotiatedFaresOnly()
    {
      return $this->NegotiatedFaresOnly;
    }

    /**
     * @param boolean $NegotiatedFaresOnly
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PriceRequestInformationType
     */
    public function setNegotiatedFaresOnly($NegotiatedFaresOnly)
    {
      $this->NegotiatedFaresOnly = $NegotiatedFaresOnly;
      return $this;
    }

    /**
     * @return AlphaLength3
     */
    public function getCurrencyCode()
    {
      return $this->CurrencyCode;
    }

    /**
     * @param string $CurrencyCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PriceRequestInformationType
     */
    public function setCurrencyCode($CurrencyCode)
    {
      $this->CurrencyCode = $CurrencyCode;
      return $this;
    }

    /**
     * @return RequestPricingSourceType
     */
    public function getPricingSource()
    {
      return $this->PricingSource;
    }

    /**
     * @param RequestPricingSourceType $PricingSource
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PriceRequestInformationType
     */
    public function setPricingSource($PricingSource)
    {
      $this->PricingSource = $PricingSource;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getReprice()
    {
      return $this->Reprice;
    }

    /**
     * @param boolean $Reprice
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PriceRequestInformationType
     */
    public function setReprice($Reprice)
    {
      $this->Reprice = $Reprice;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getProcessThruFaresOnly()
    {
      return $this->ProcessThruFaresOnly;
    }

    /**
     * @param boolean $ProcessThruFaresOnly
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PriceRequestInformationType
     */
    public function setProcessThruFaresOnly($ProcessThruFaresOnly)
    {
      $this->ProcessThruFaresOnly = $ProcessThruFaresOnly;
      return $this;
    }

    /**
     * @return date
     */
    public function getPurchaseDate()
    {
      return $this->PurchaseDate;
    }

    /**
     * @param date $PurchaseDate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PriceRequestInformationType
     */
    public function setPurchaseDate($PurchaseDate)
    {
      $this->PurchaseDate = $PurchaseDate;
      return $this;
    }

    /**
     * @return string
     */
    public function getPurchaseTime()
    {
      return $this->PurchaseTime;
    }

    /**
     * @param string $PurchaseTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PriceRequestInformationType
     */
    public function setPurchaseTime($PurchaseTime)
    {
      $this->PurchaseTime = $PurchaseTime;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getNetFaresUsed()
    {
      return $this->NetFaresUsed;
    }

    /**
     * @param boolean $NetFaresUsed
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PriceRequestInformationType
     */
    public function setNetFaresUsed($NetFaresUsed)
    {
      $this->NetFaresUsed = $NetFaresUsed;
      return $this;
    }

    /**
     * @return BypassAdvancePurchaseType
     */
    public function getBypassAdvancePurchase()
    {
      return $this->BypassAdvancePurchase;
    }

    /**
     * @param BypassAdvancePurchaseType $BypassAdvancePurchase
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PriceRequestInformationType
     */
    public function setBypassAdvancePurchase($BypassAdvancePurchase)
    {
      $this->BypassAdvancePurchase = $BypassAdvancePurchase;
      return $this;
    }

}
