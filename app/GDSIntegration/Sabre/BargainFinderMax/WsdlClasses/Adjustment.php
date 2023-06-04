<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Adjustment
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
     * @var int $Group
     */
    protected $Group = null;

    /**
     * @param FloatSignedCountOrPercentage $Value
     * @param AlphaLength3 $Currency
     * @param int $Group
     */
    public function __construct($Value = null, $Currency = null, $Group = null)
    {
      $this->Value = $Value;
      $this->Currency = $Currency;
      $this->Group = $Group;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Adjustment
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Adjustment
     */
    public function setCurrency($Currency)
    {
      $this->Currency = $Currency;
      return $this;
    }

    /**
     * @return int
     */
    public function getGroup()
    {
      return $this->Group;
    }

    /**
     * @param int $Group
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Adjustment
     */
    public function setGroup($Group)
    {
      $this->Group = $Group;
      return $this;
    }

}
