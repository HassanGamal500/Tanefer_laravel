<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FlightPromotions
{

    /**
     * @var PromoCode $PromoCode
     */
    protected $PromoCode = null;

    /**
     * @var TrendIndicator $TrendIndicator
     */
    protected $TrendIndicator = null;

    /**
     * @param PromoCode $PromoCode
     * @param TrendIndicator $TrendIndicator
     */
    public function __construct($PromoCode = null, $TrendIndicator = null)
    {
      $this->PromoCode = $PromoCode;
      $this->TrendIndicator = $TrendIndicator;
    }

    /**
     * @return PromoCode
     */
    public function getPromoCode()
    {
      return $this->PromoCode;
    }

    /**
     * @param PromoCode $PromoCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FlightPromotions
     */
    public function setPromoCode($PromoCode)
    {
      $this->PromoCode = $PromoCode;
      return $this;
    }

    /**
     * @return TrendIndicator
     */
    public function getTrendIndicator()
    {
      return $this->TrendIndicator;
    }

    /**
     * @param TrendIndicator $TrendIndicator
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FlightPromotions
     */
    public function setTrendIndicator($TrendIndicator)
    {
      $this->TrendIndicator = $TrendIndicator;
      return $this;
    }

}
