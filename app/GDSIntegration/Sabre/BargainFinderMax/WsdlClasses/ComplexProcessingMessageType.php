<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ComplexProcessingMessageType extends ProcessingMessageType
{

    /**
     * @var Leg[] $Leg
     */
    protected $Leg = null;

    /**
     * @param ResponsePricingSourceType $PricingSource
     * @param string $Message
     */
    public function __construct($PricingSource = null, $Message = null)
    {
      parent::__construct($PricingSource, $Message);
    }

    /**
     * @return Leg[]
     */
    public function getLeg()
    {
      return $this->Leg;
    }

    /**
     * @param Leg[] $Leg
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ComplexProcessingMessageType
     */
    public function setLeg(array $Leg = null)
    {
      $this->Leg = $Leg;
      return $this;
    }

}
