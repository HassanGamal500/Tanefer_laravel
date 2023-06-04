<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class OriginDestinationOptions
{

    /**
     * @var OriginDestinationOptionType $OriginDestinationOption
     */
    protected $OriginDestinationOption = null;

    /**
     * @param OriginDestinationOptionType $OriginDestinationOption
     */
    public function __construct($OriginDestinationOption = null)
    {
      $this->OriginDestinationOption = $OriginDestinationOption;
    }

    /**
     * @return OriginDestinationOptionType
     */
    public function getOriginDestinationOption()
    {
      return $this->OriginDestinationOption;
    }

    /**
     * @param OriginDestinationOptionType $OriginDestinationOption
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationOptions
     */
    public function setOriginDestinationOption($OriginDestinationOption)
    {
      $this->OriginDestinationOption = $OriginDestinationOption;
      return $this;
    }

}
