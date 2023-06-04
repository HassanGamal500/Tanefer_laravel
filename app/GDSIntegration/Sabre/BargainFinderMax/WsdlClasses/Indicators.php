<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Indicators
{

    /**
     * @var RetainFare $RetainFare
     */
    protected $RetainFare = null;

    /**
     * @var MinMaxStay $MinMaxStay
     */
    protected $MinMaxStay = null;

    /**
     * @var RefundPenalty $RefundPenalty
     */
    protected $RefundPenalty = null;

    /**
     * @var ResTicketing $ResTicketing
     */
    protected $ResTicketing = null;

    /**
     * @var TravelPolicy $TravelPolicy
     */
    protected $TravelPolicy = null;

    /**
     * @param RetainFare $RetainFare
     * @param MinMaxStay $MinMaxStay
     * @param RefundPenalty $RefundPenalty
     * @param ResTicketing $ResTicketing
     * @param TravelPolicy $TravelPolicy
     */
    public function __construct($RetainFare = null, $MinMaxStay = null, $RefundPenalty = null, $ResTicketing = null, $TravelPolicy = null)
    {
      $this->RetainFare = $RetainFare;
      $this->MinMaxStay = $MinMaxStay;
      $this->RefundPenalty = $RefundPenalty;
      $this->ResTicketing = $ResTicketing;
      $this->TravelPolicy = $TravelPolicy;
    }

    /**
     * @return RetainFare
     */
    public function getRetainFare()
    {
      return $this->RetainFare;
    }

    /**
     * @param RetainFare $RetainFare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Indicators
     */
    public function setRetainFare($RetainFare)
    {
      $this->RetainFare = $RetainFare;
      return $this;
    }

    /**
     * @return MinMaxStay
     */
    public function getMinMaxStay()
    {
      return $this->MinMaxStay;
    }

    /**
     * @param MinMaxStay $MinMaxStay
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Indicators
     */
    public function setMinMaxStay($MinMaxStay)
    {
      $this->MinMaxStay = $MinMaxStay;
      return $this;
    }

    /**
     * @return RefundPenalty
     */
    public function getRefundPenalty()
    {
      return $this->RefundPenalty;
    }

    /**
     * @param RefundPenalty $RefundPenalty
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Indicators
     */
    public function setRefundPenalty($RefundPenalty)
    {
      $this->RefundPenalty = $RefundPenalty;
      return $this;
    }

    /**
     * @return ResTicketing
     */
    public function getResTicketing()
    {
      return $this->ResTicketing;
    }

    /**
     * @param ResTicketing $ResTicketing
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Indicators
     */
    public function setResTicketing($ResTicketing)
    {
      $this->ResTicketing = $ResTicketing;
      return $this;
    }

    /**
     * @return TravelPolicy
     */
    public function getTravelPolicy()
    {
      return $this->TravelPolicy;
    }

    /**
     * @param TravelPolicy $TravelPolicy
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Indicators
     */
    public function setTravelPolicy($TravelPolicy)
    {
      $this->TravelPolicy = $TravelPolicy;
      return $this;
    }

}
