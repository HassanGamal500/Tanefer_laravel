<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Conversion
{

    /**
     * @var CurrencyCodeType $From
     */
    protected $From = null;

    /**
     * @var CurrencyCodeType $To
     */
    protected $To = null;

    /**
     * @var float $RateOfExchange
     */
    protected $RateOfExchange = null;

    /**
     * @param CurrencyCodeType $From
     * @param CurrencyCodeType $To
     * @param float $RateOfExchange
     */
    public function __construct($From = null, $To = null, $RateOfExchange = null)
    {
      $this->From = $From;
      $this->To = $To;
      $this->RateOfExchange = $RateOfExchange;
    }

    /**
     * @return CurrencyCodeType
     */
    public function getFrom()
    {
      return $this->From;
    }

    /**
     * @param CurrencyCodeType $From
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Conversion
     */
    public function setFrom($From)
    {
      $this->From = $From;
      return $this;
    }

    /**
     * @return CurrencyCodeType
     */
    public function getTo()
    {
      return $this->To;
    }

    /**
     * @param CurrencyCodeType $To
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Conversion
     */
    public function setTo($To)
    {
      $this->To = $To;
      return $this;
    }

    /**
     * @return float
     */
    public function getRateOfExchange()
    {
      return $this->RateOfExchange;
    }

    /**
     * @param float $RateOfExchange
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Conversion
     */
    public function setRateOfExchange($RateOfExchange)
    {
      $this->RateOfExchange = $RateOfExchange;
      return $this;
    }

}
