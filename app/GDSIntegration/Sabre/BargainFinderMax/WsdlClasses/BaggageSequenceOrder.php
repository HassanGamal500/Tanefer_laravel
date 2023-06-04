<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class BaggageSequenceOrder
{

    /**
     * @var BaggageIDType $BaggageID
     */
    protected $BaggageID = null;

    /**
     * @var anonymous613 $StandardBag
     */
    protected $StandardBag = null;

    /**
     * @param BaggageIDType $BaggageID
     * @param anonymous613 $StandardBag
     */
    public function __construct($BaggageID = null, $StandardBag = null)
    {
      $this->BaggageID = $BaggageID;
      $this->StandardBag = $StandardBag;
    }

    /**
     * @return BaggageIDType
     */
    public function getBaggageID()
    {
      return $this->BaggageID;
    }

    /**
     * @param BaggageIDType $BaggageID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BaggageSequenceOrder
     */
    public function setBaggageID($BaggageID)
    {
      $this->BaggageID = $BaggageID;
      return $this;
    }

    /**
     * @return anonymous613
     */
    public function getStandardBag()
    {
      return $this->StandardBag;
    }

    /**
     * @param anonymous613 $StandardBag
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BaggageSequenceOrder
     */
    public function setStandardBag($StandardBag)
    {
      $this->StandardBag = $StandardBag;
      return $this;
    }

}
