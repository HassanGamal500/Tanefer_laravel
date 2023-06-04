<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class BuyerInformation
{

    /**
     * @var FrequentFlyer $FrequentFlyer
     */
    protected $FrequentFlyer = null;

    /**
     * @param FrequentFlyer $FrequentFlyer
     */
    public function __construct($FrequentFlyer = null)
    {
      $this->FrequentFlyer = $FrequentFlyer;
    }

    /**
     * @return FrequentFlyer
     */
    public function getFrequentFlyer()
    {
      return $this->FrequentFlyer;
    }

    /**
     * @param FrequentFlyer $FrequentFlyer
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BuyerInformation
     */
    public function setFrequentFlyer($FrequentFlyer)
    {
      $this->FrequentFlyer = $FrequentFlyer;
      return $this;
    }

}
