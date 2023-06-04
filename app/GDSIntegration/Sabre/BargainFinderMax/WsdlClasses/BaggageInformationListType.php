<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class BaggageInformationListType
{

    /**
     * @var BaggageInformationType[] $BaggageInformation
     */
    protected $BaggageInformation = null;

    /**
     * @param BaggageInformationType[] $BaggageInformation
     */
    public function __construct(array $BaggageInformation = null)
    {
      $this->BaggageInformation = $BaggageInformation;
    }

    /**
     * @return BaggageInformationType[]
     */
    public function getBaggageInformation()
    {
      return $this->BaggageInformation;
    }

    /**
     * @param BaggageInformationType[] $BaggageInformation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BaggageInformationListType
     */
    public function setBaggageInformation(array $BaggageInformation)
    {
      $this->BaggageInformation = $BaggageInformation;
      return $this;
    }

}
