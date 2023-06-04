<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class DiversityParameters
{

    /**
     * @var Weightings $Weightings
     */
    protected $Weightings = null;

    /**
     * @var TimeOfDayDistribution $TimeOfDayDistribution
     */
    protected $TimeOfDayDistribution = null;

    /**
     * @var anonymous244 $InboundOutboundPairing
     */
    protected $InboundOutboundPairing = null;

    /**
     * @var anonymous245 $AdditionalNonStopsNumber
     */
    protected $AdditionalNonStopsNumber = null;

    /**
     * @var PercentageType $AdditionalNonStopsPercentage
     */
    protected $AdditionalNonStopsPercentage = null;

    /**
     * @param Weightings $Weightings
     * @param TimeOfDayDistribution $TimeOfDayDistribution
     * @param anonymous244 $InboundOutboundPairing
     * @param anonymous245 $AdditionalNonStopsNumber
     * @param PercentageType $AdditionalNonStopsPercentage
     */
    public function __construct($Weightings = null, $TimeOfDayDistribution = null, $InboundOutboundPairing = null, $AdditionalNonStopsNumber = null, $AdditionalNonStopsPercentage = null)
    {
      $this->Weightings = $Weightings;
      $this->TimeOfDayDistribution = $TimeOfDayDistribution;
      $this->InboundOutboundPairing = $InboundOutboundPairing;
      $this->AdditionalNonStopsNumber = $AdditionalNonStopsNumber;
      $this->AdditionalNonStopsPercentage = $AdditionalNonStopsPercentage;
    }

    /**
     * @return Weightings
     */
    public function getWeightings()
    {
      return $this->Weightings;
    }

    /**
     * @param Weightings $Weightings
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DiversityParameters
     */
    public function setWeightings($Weightings)
    {
      $this->Weightings = $Weightings;
      return $this;
    }

    /**
     * @return TimeOfDayDistribution
     */
    public function getTimeOfDayDistribution()
    {
      return $this->TimeOfDayDistribution;
    }

    /**
     * @param TimeOfDayDistribution $TimeOfDayDistribution
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DiversityParameters
     */
    public function setTimeOfDayDistribution($TimeOfDayDistribution)
    {
      $this->TimeOfDayDistribution = $TimeOfDayDistribution;
      return $this;
    }

    /**
     * @return anonymous244
     */
    public function getInboundOutboundPairing()
    {
      return $this->InboundOutboundPairing;
    }

    /**
     * @param anonymous244 $InboundOutboundPairing
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DiversityParameters
     */
    public function setInboundOutboundPairing($InboundOutboundPairing)
    {
      $this->InboundOutboundPairing = $InboundOutboundPairing;
      return $this;
    }

    /**
     * @return anonymous245
     */
    public function getAdditionalNonStopsNumber()
    {
      return $this->AdditionalNonStopsNumber;
    }

    /**
     * @param anonymous245 $AdditionalNonStopsNumber
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DiversityParameters
     */
    public function setAdditionalNonStopsNumber($AdditionalNonStopsNumber)
    {
      $this->AdditionalNonStopsNumber = $AdditionalNonStopsNumber;
      return $this;
    }

    /**
     * @return PercentageType
     */
    public function getAdditionalNonStopsPercentage()
    {
      return $this->AdditionalNonStopsPercentage;
    }

    /**
     * @param PercentageType $AdditionalNonStopsPercentage
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DiversityParameters
     */
    public function setAdditionalNonStopsPercentage($AdditionalNonStopsPercentage)
    {
      $this->AdditionalNonStopsPercentage = $AdditionalNonStopsPercentage;
      return $this;
    }

}
