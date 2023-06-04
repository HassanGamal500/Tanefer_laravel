<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PassengerBags
{

    /**
     * @var BaggageSequenceOrder $BaggageSequenceOrder
     */
    protected $BaggageSequenceOrder = null;

    /**
     * @var PassengerCodeType $Code
     */
    protected $Code = null;

    /**
     * @param BaggageSequenceOrder $BaggageSequenceOrder
     * @param PassengerCodeType $Code
     */
    public function __construct($BaggageSequenceOrder = null, $Code = null)
    {
      $this->BaggageSequenceOrder = $BaggageSequenceOrder;
      $this->Code = $Code;
    }

    /**
     * @return BaggageSequenceOrder
     */
    public function getBaggageSequenceOrder()
    {
      return $this->BaggageSequenceOrder;
    }

    /**
     * @param BaggageSequenceOrder $BaggageSequenceOrder
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PassengerBags
     */
    public function setBaggageSequenceOrder($BaggageSequenceOrder)
    {
      $this->BaggageSequenceOrder = $BaggageSequenceOrder;
      return $this;
    }

    /**
     * @return PassengerCodeType
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param PassengerCodeType $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PassengerBags
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

}
