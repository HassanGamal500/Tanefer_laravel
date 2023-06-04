<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Dimensions
{

    /**
     * @var TravelTime $TravelTime
     */
    protected $TravelTime = null;

    /**
     * @var Carrier $Carrier
     */
    protected $Carrier = null;

    /**
     * @var OperatingDuplicate $OperatingDuplicate
     */
    protected $OperatingDuplicate = null;

    /**
     * @var InboundOutboundPairing $InboundOutboundPairing
     */
    protected $InboundOutboundPairing = null;

    /**
     * @var TimeOfDay $TimeOfDay
     */
    protected $TimeOfDay = null;

    /**
     * @var StopsNumber $StopsNumber
     */
    protected $StopsNumber = null;

    /**
     * @var SumWeight $PriceWeight
     */
    protected $PriceWeight = null;

    /**
     * @param TravelTime $TravelTime
     * @param Carrier $Carrier
     * @param OperatingDuplicate $OperatingDuplicate
     * @param InboundOutboundPairing $InboundOutboundPairing
     * @param TimeOfDay $TimeOfDay
     * @param StopsNumber $StopsNumber
     * @param SumWeight $PriceWeight
     */
    public function __construct($TravelTime = null, $Carrier = null, $OperatingDuplicate = null, $InboundOutboundPairing = null, $TimeOfDay = null, $StopsNumber = null, $PriceWeight = null)
    {
      $this->TravelTime = $TravelTime;
      $this->Carrier = $Carrier;
      $this->OperatingDuplicate = $OperatingDuplicate;
      $this->InboundOutboundPairing = $InboundOutboundPairing;
      $this->TimeOfDay = $TimeOfDay;
      $this->StopsNumber = $StopsNumber;
      $this->PriceWeight = $PriceWeight;
    }

    /**
     * @return TravelTime
     */
    public function getTravelTime()
    {
      return $this->TravelTime;
    }

    /**
     * @param TravelTime $TravelTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Dimensions
     */
    public function setTravelTime($TravelTime)
    {
      $this->TravelTime = $TravelTime;
      return $this;
    }

    /**
     * @return Carrier
     */
    public function getCarrier()
    {
      return $this->Carrier;
    }

    /**
     * @param Carrier $Carrier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Dimensions
     */
    public function setCarrier($Carrier)
    {
      $this->Carrier = $Carrier;
      return $this;
    }

    /**
     * @return OperatingDuplicate
     */
    public function getOperatingDuplicate()
    {
      return $this->OperatingDuplicate;
    }

    /**
     * @param OperatingDuplicate $OperatingDuplicate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Dimensions
     */
    public function setOperatingDuplicate($OperatingDuplicate)
    {
      $this->OperatingDuplicate = $OperatingDuplicate;
      return $this;
    }

    /**
     * @return InboundOutboundPairing
     */
    public function getInboundOutboundPairing()
    {
      return $this->InboundOutboundPairing;
    }

    /**
     * @param InboundOutboundPairing $InboundOutboundPairing
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Dimensions
     */
    public function setInboundOutboundPairing($InboundOutboundPairing)
    {
      $this->InboundOutboundPairing = $InboundOutboundPairing;
      return $this;
    }

    /**
     * @return TimeOfDay
     */
    public function getTimeOfDay()
    {
      return $this->TimeOfDay;
    }

    /**
     * @param TimeOfDay $TimeOfDay
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Dimensions
     */
    public function setTimeOfDay($TimeOfDay)
    {
      $this->TimeOfDay = $TimeOfDay;
      return $this;
    }

    /**
     * @return StopsNumber
     */
    public function getStopsNumber()
    {
      return $this->StopsNumber;
    }

    /**
     * @param StopsNumber $StopsNumber
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Dimensions
     */
    public function setStopsNumber($StopsNumber)
    {
      $this->StopsNumber = $StopsNumber;
      return $this;
    }

    /**
     * @return SumWeight
     */
    public function getPriceWeight()
    {
      return $this->PriceWeight;
    }

    /**
     * @param SumWeight $PriceWeight
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Dimensions
     */
    public function setPriceWeight($PriceWeight)
    {
      $this->PriceWeight = $PriceWeight;
      return $this;
    }

}
