<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ExchangeFareType
{

    /**
     * @var Money $BaseFareAmount
     */
    protected $BaseFareAmount = null;

    /**
     * @var Money $NonRefundableAmount
     */
    protected $NonRefundableAmount = null;

    /**
     * @var AlphaLength3 $BaseFareCurrency
     */
    protected $BaseFareCurrency = null;

    /**
     * @var AlphaLength3 $FareCalcCurrency
     */
    protected $FareCalcCurrency = null;

    /**
     * @var CarrierCode $ValidatingCarrier
     */
    protected $ValidatingCarrier = null;

    /**
     * @var float $ROE
     */
    protected $ROE = null;

    /**
     * @param Money $BaseFareAmount
     * @param Money $NonRefundableAmount
     * @param AlphaLength3 $BaseFareCurrency
     * @param AlphaLength3 $FareCalcCurrency
     * @param CarrierCode $ValidatingCarrier
     * @param float $ROE
     */
    public function __construct($BaseFareAmount = null, $NonRefundableAmount = null, $BaseFareCurrency = null, $FareCalcCurrency = null, $ValidatingCarrier = null, $ROE = null)
    {
      $this->BaseFareAmount = $BaseFareAmount;
      $this->NonRefundableAmount = $NonRefundableAmount;
      $this->BaseFareCurrency = $BaseFareCurrency;
      $this->FareCalcCurrency = $FareCalcCurrency;
      $this->ValidatingCarrier = $ValidatingCarrier;
      $this->ROE = $ROE;
    }

    /**
     * @return Money
     */
    public function getBaseFareAmount()
    {
      return $this->BaseFareAmount;
    }

    /**
     * @param Money $BaseFareAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeFareType
     */
    public function setBaseFareAmount($BaseFareAmount)
    {
      $this->BaseFareAmount = $BaseFareAmount;
      return $this;
    }

    /**
     * @return Money
     */
    public function getNonRefundableAmount()
    {
      return $this->NonRefundableAmount;
    }

    /**
     * @param Money $NonRefundableAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeFareType
     */
    public function setNonRefundableAmount($NonRefundableAmount)
    {
      $this->NonRefundableAmount = $NonRefundableAmount;
      return $this;
    }

    /**
     * @return AlphaLength3
     */
    public function getBaseFareCurrency()
    {
      return $this->BaseFareCurrency;
    }

    /**
     * @param AlphaLength3 $BaseFareCurrency
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeFareType
     */
    public function setBaseFareCurrency($BaseFareCurrency)
    {
      $this->BaseFareCurrency = $BaseFareCurrency;
      return $this;
    }

    /**
     * @return AlphaLength3
     */
    public function getFareCalcCurrency()
    {
      return $this->FareCalcCurrency;
    }

    /**
     * @param AlphaLength3 $FareCalcCurrency
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeFareType
     */
    public function setFareCalcCurrency($FareCalcCurrency)
    {
      $this->FareCalcCurrency = $FareCalcCurrency;
      return $this;
    }

    /**
     * @return CarrierCode
     */
    public function getValidatingCarrier()
    {
      return $this->ValidatingCarrier;
    }

    /**
     * @param CarrierCode $ValidatingCarrier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeFareType
     */
    public function setValidatingCarrier($ValidatingCarrier)
    {
      $this->ValidatingCarrier = $ValidatingCarrier;
      return $this;
    }

    /**
     * @return float
     */
    public function getROE()
    {
      return $this->ROE;
    }

    /**
     * @param float $ROE
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeFareType
     */
    public function setROE($ROE)
    {
      $this->ROE = $ROE;
      return $this;
    }

}
