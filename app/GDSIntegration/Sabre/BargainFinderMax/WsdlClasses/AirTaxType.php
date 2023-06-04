<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AirTaxType
{

    /**
     * @var string $_
     */
    protected $_ = null;

    /**
     * @var StringLength1to16 $TaxCode
     */
    protected $TaxCode = null;

    /**
     * @var int $PointsAmount
     */
    protected $PointsAmount = null;

    /**
     * @var StringLength1to8 $CarrierCode
     */
    protected $CarrierCode = null;

    /**
     * @var float $RateUsed
     */
    protected $RateUsed = null;

    /**
     * @var string $StationCode
     */
    protected $StationCode = null;

    /**
     * @var ISO3166 $CountryCode
     */
    protected $CountryCode = null;

    /**
     * @var boolean $TaxOnChangeFee
     */
    protected $TaxOnChangeFee = null;

    /**
     * @var boolean $Refundable
     */
    protected $Refundable = null;

    /**
     * @var Money $Amount
     */
    protected $Amount = null;

    /**
     * @var CurrencyCodeType $CurrencyCode
     */
    protected $CurrencyCode = null;

    /**
     * @var int $DecimalPlaces
     */
    protected $DecimalPlaces = null;

    /**
     * @var float $MinAmount
     */
    protected $MinAmount = null;

    /**
     * @var float $MaxAmount
     */
    protected $MaxAmount = null;

    /**
     * @var CurrencyCodeType $MinMaxCurrency
     */
    protected $MinMaxCurrency = null;

    /**
     * @var anonymous626 $ReissueTaxType
     */
    protected $ReissueTaxType = null;

    /**
     * @var boolean $ReissueRestrictionApplies
     */
    protected $ReissueRestrictionApplies = null;

    /**
     * @var boolean $ReissueTaxRefundable
     */
    protected $ReissueTaxRefundable = null;

    /**
     * @var boolean $ApplyToReissue
     */
    protected $ApplyToReissue = null;

    /**
     * @var float $ReissueMaxAmount
     */
    protected $ReissueMaxAmount = null;

    /**
     * @var CurrencyCodeType $ReissueCurrency
     */
    protected $ReissueCurrency = null;

    /**
     * @var float $PublishedAmount
     */
    protected $PublishedAmount = null;

    /**
     * @var CurrencyCodeType $PublishedCurrency
     */
    protected $PublishedCurrency = null;

    /**
     * @param string $_
     * @param StringLength1to16 $TaxCode
     * @param int $PointsAmount
     * @param StringLength1to8 $CarrierCode
     * @param float $RateUsed
     * @param string $StationCode
     * @param ISO3166 $CountryCode
     * @param boolean $TaxOnChangeFee
     * @param boolean $Refundable
     * @param Money $Amount
     * @param CurrencyCodeType $CurrencyCode
     * @param int $DecimalPlaces
     * @param float $MinAmount
     * @param float $MaxAmount
     * @param CurrencyCodeType $MinMaxCurrency
     * @param anonymous626 $ReissueTaxType
     * @param boolean $ReissueRestrictionApplies
     * @param boolean $ReissueTaxRefundable
     * @param boolean $ApplyToReissue
     * @param float $ReissueMaxAmount
     * @param CurrencyCodeType $ReissueCurrency
     * @param float $PublishedAmount
     * @param CurrencyCodeType $PublishedCurrency
     */
    public function __construct($_ = null, $TaxCode = null, $PointsAmount = null, $CarrierCode = null, $RateUsed = null, $StationCode = null, $CountryCode = null, $TaxOnChangeFee = null, $Refundable = null, $Amount = null, $CurrencyCode = null, $DecimalPlaces = null, $MinAmount = null, $MaxAmount = null, $MinMaxCurrency = null, $ReissueTaxType = null, $ReissueRestrictionApplies = null, $ReissueTaxRefundable = null, $ApplyToReissue = null, $ReissueMaxAmount = null, $ReissueCurrency = null, $PublishedAmount = null, $PublishedCurrency = null)
    {
      $this->_ = $_;
      $this->TaxCode = $TaxCode;
      $this->PointsAmount = $PointsAmount;
      $this->CarrierCode = $CarrierCode;
      $this->RateUsed = $RateUsed;
      $this->StationCode = $StationCode;
      $this->CountryCode = $CountryCode;
      $this->TaxOnChangeFee = $TaxOnChangeFee;
      $this->Refundable = $Refundable;
      $this->Amount = $Amount;
      $this->CurrencyCode = $CurrencyCode;
      $this->DecimalPlaces = $DecimalPlaces;
      $this->MinAmount = $MinAmount;
      $this->MaxAmount = $MaxAmount;
      $this->MinMaxCurrency = $MinMaxCurrency;
      $this->ReissueTaxType = $ReissueTaxType;
      $this->ReissueRestrictionApplies = $ReissueRestrictionApplies;
      $this->ReissueTaxRefundable = $ReissueTaxRefundable;
      $this->ApplyToReissue = $ApplyToReissue;
      $this->ReissueMaxAmount = $ReissueMaxAmount;
      $this->ReissueCurrency = $ReissueCurrency;
      $this->PublishedAmount = $PublishedAmount;
      $this->PublishedCurrency = $PublishedCurrency;
    }

    /**
     * @return string
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param string $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return StringLength1to16
     */
    public function getTaxCode()
    {
      return $this->TaxCode;
    }

    /**
     * @param StringLength1to16 $TaxCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setTaxCode($TaxCode)
    {
      $this->TaxCode = $TaxCode;
      return $this;
    }

    /**
     * @return int
     */
    public function getPointsAmount()
    {
      return $this->PointsAmount;
    }

    /**
     * @param int $PointsAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setPointsAmount($PointsAmount)
    {
      $this->PointsAmount = $PointsAmount;
      return $this;
    }

    /**
     * @return StringLength1to8
     */
    public function getCarrierCode()
    {
      return $this->CarrierCode;
    }

    /**
     * @param StringLength1to8 $CarrierCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setCarrierCode($CarrierCode)
    {
      $this->CarrierCode = $CarrierCode;
      return $this;
    }

    /**
     * @return float
     */
    public function getRateUsed()
    {
      return $this->RateUsed;
    }

    /**
     * @param float $RateUsed
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setRateUsed($RateUsed)
    {
      $this->RateUsed = $RateUsed;
      return $this;
    }

    /**
     * @return string
     */
    public function getStationCode()
    {
      return $this->StationCode;
    }

    /**
     * @param string $StationCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setStationCode($StationCode)
    {
      $this->StationCode = $StationCode;
      return $this;
    }

    /**
     * @return ISO3166
     */
    public function getCountryCode()
    {
      return $this->CountryCode;
    }

    /**
     * @param ISO3166 $CountryCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setCountryCode($CountryCode)
    {
      $this->CountryCode = $CountryCode;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getTaxOnChangeFee()
    {
      return $this->TaxOnChangeFee;
    }

    /**
     * @param boolean $TaxOnChangeFee
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setTaxOnChangeFee($TaxOnChangeFee)
    {
      $this->TaxOnChangeFee = $TaxOnChangeFee;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getRefundable()
    {
      return $this->Refundable;
    }

    /**
     * @param boolean $Refundable
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setRefundable($Refundable)
    {
      $this->Refundable = $Refundable;
      return $this;
    }

    /**
     * @return Money
     */
    public function getAmount()
    {
      return $this->Amount;
    }

    /**
     * @param Money $Amount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setAmount($Amount)
    {
      $this->Amount = $Amount;
      return $this;
    }

    /**
     * @return CurrencyCodeType
     */
    public function getCurrencyCode()
    {
      return $this->CurrencyCode;
    }

    /**
     * @param CurrencyCodeType $CurrencyCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setCurrencyCode($CurrencyCode)
    {
      $this->CurrencyCode = $CurrencyCode;
      return $this;
    }

    /**
     * @return int
     */
    public function getDecimalPlaces()
    {
      return $this->DecimalPlaces;
    }

    /**
     * @param int $DecimalPlaces
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setDecimalPlaces($DecimalPlaces)
    {
      $this->DecimalPlaces = $DecimalPlaces;
      return $this;
    }

    /**
     * @return float
     */
    public function getMinAmount()
    {
      return $this->MinAmount;
    }

    /**
     * @param float $MinAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setMinAmount($MinAmount)
    {
      $this->MinAmount = $MinAmount;
      return $this;
    }

    /**
     * @return float
     */
    public function getMaxAmount()
    {
      return $this->MaxAmount;
    }

    /**
     * @param float $MaxAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setMaxAmount($MaxAmount)
    {
      $this->MaxAmount = $MaxAmount;
      return $this;
    }

    /**
     * @return CurrencyCodeType
     */
    public function getMinMaxCurrency()
    {
      return $this->MinMaxCurrency;
    }

    /**
     * @param CurrencyCodeType $MinMaxCurrency
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setMinMaxCurrency($MinMaxCurrency)
    {
      $this->MinMaxCurrency = $MinMaxCurrency;
      return $this;
    }

    /**
     * @return anonymous626
     */
    public function getReissueTaxType()
    {
      return $this->ReissueTaxType;
    }

    /**
     * @param anonymous626 $ReissueTaxType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setReissueTaxType($ReissueTaxType)
    {
      $this->ReissueTaxType = $ReissueTaxType;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getReissueRestrictionApplies()
    {
      return $this->ReissueRestrictionApplies;
    }

    /**
     * @param boolean $ReissueRestrictionApplies
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setReissueRestrictionApplies($ReissueRestrictionApplies)
    {
      $this->ReissueRestrictionApplies = $ReissueRestrictionApplies;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getReissueTaxRefundable()
    {
      return $this->ReissueTaxRefundable;
    }

    /**
     * @param boolean $ReissueTaxRefundable
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setReissueTaxRefundable($ReissueTaxRefundable)
    {
      $this->ReissueTaxRefundable = $ReissueTaxRefundable;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getApplyToReissue()
    {
      return $this->ApplyToReissue;
    }

    /**
     * @param boolean $ApplyToReissue
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setApplyToReissue($ApplyToReissue)
    {
      $this->ApplyToReissue = $ApplyToReissue;
      return $this;
    }

    /**
     * @return float
     */
    public function getReissueMaxAmount()
    {
      return $this->ReissueMaxAmount;
    }

    /**
     * @param float $ReissueMaxAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setReissueMaxAmount($ReissueMaxAmount)
    {
      $this->ReissueMaxAmount = $ReissueMaxAmount;
      return $this;
    }

    /**
     * @return CurrencyCodeType
     */
    public function getReissueCurrency()
    {
      return $this->ReissueCurrency;
    }

    /**
     * @param CurrencyCodeType $ReissueCurrency
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setReissueCurrency($ReissueCurrency)
    {
      $this->ReissueCurrency = $ReissueCurrency;
      return $this;
    }

    /**
     * @return float
     */
    public function getPublishedAmount()
    {
      return $this->PublishedAmount;
    }

    /**
     * @param float $PublishedAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setPublishedAmount($PublishedAmount)
    {
      $this->PublishedAmount = $PublishedAmount;
      return $this;
    }

    /**
     * @return CurrencyCodeType
     */
    public function getPublishedCurrency()
    {
      return $this->PublishedCurrency;
    }

    /**
     * @param CurrencyCodeType $PublishedCurrency
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxType
     */
    public function setPublishedCurrency($PublishedCurrency)
    {
      $this->PublishedCurrency = $PublishedCurrency;
      return $this;
    }

}
