<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AirTaxSummaryType
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
     * @var string $StationCode
     */
    protected $StationCode = null;

    /**
     * @var ISO3166 $CountryCode
     */
    protected $CountryCode = null;

    /**
     * @var float $PublishedAmount
     */
    protected $PublishedAmount = null;

    /**
     * @var CurrencyCodeType $PublishedCurrency
     */
    protected $PublishedCurrency = null;

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
     * @param string $_
     * @param StringLength1to16 $TaxCode
     * @param int $PointsAmount
     * @param string $StationCode
     * @param ISO3166 $CountryCode
     * @param float $PublishedAmount
     * @param CurrencyCodeType $PublishedCurrency
     * @param Money $Amount
     * @param CurrencyCodeType $CurrencyCode
     * @param int $DecimalPlaces
     */
    public function __construct($_ = null, $TaxCode = null, $PointsAmount = null, $StationCode = null, $CountryCode = null, $PublishedAmount = null, $PublishedCurrency = null, $Amount = null, $CurrencyCode = null, $DecimalPlaces = null)
    {
      $this->_ = $_;
      $this->TaxCode = $TaxCode;
      $this->PointsAmount = $PointsAmount;
      $this->StationCode = $StationCode;
      $this->CountryCode = $CountryCode;
      $this->PublishedAmount = $PublishedAmount;
      $this->PublishedCurrency = $PublishedCurrency;
      $this->Amount = $Amount;
      $this->CurrencyCode = $CurrencyCode;
      $this->DecimalPlaces = $DecimalPlaces;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxSummaryType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxSummaryType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxSummaryType
     */
    public function setPointsAmount($PointsAmount)
    {
      $this->PointsAmount = $PointsAmount;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxSummaryType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxSummaryType
     */
    public function setCountryCode($CountryCode)
    {
      $this->CountryCode = $CountryCode;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxSummaryType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxSummaryType
     */
    public function setPublishedCurrency($PublishedCurrency)
    {
      $this->PublishedCurrency = $PublishedCurrency;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxSummaryType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxSummaryType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTaxSummaryType
     */
    public function setDecimalPlaces($DecimalPlaces)
    {
      $this->DecimalPlaces = $DecimalPlaces;
      return $this;
    }

}
