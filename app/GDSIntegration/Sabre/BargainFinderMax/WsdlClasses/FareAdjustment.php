<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareAdjustment
{

    /**
     * @var FloatSignedCountOrPercentage $Value
     */
    protected $Value = null;

    /**
     * @var AlphaLength3 $Currency
     */
    protected $Currency = null;

    /**
     * @param FloatSignedCountOrPercentage $Value
     * @param AlphaLength3 $Currency
     */
    public function __construct($Value = null, $Currency = null)
    {
      $this->Value = $Value;
      $this->Currency = $Currency;
    }

    /**
     * @return FloatSignedCountOrPercentage
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param FloatSignedCountOrPercentage $Value
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareAdjustment
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

    /**
     * @return AlphaLength3
     */
    public function getCurrency()
    {
      return $this->Currency;
    }

    /**
     * @param AlphaLength3 $Currency
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareAdjustment
     */
    public function setCurrency($Currency)
    {
      $this->Currency = $Currency;
      return $this;
    }

}
