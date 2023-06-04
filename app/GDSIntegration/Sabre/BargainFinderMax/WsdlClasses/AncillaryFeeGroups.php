<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AncillaryFeeGroups
{

    /**
     * @var AncillaryFeeGroup $AncillaryFeeGroup
     */
    protected $AncillaryFeeGroup = null;

    /**
     * @var OrderStandardBag $OrderStandardBag
     */
    protected $OrderStandardBag = null;

    /**
     * @var UNKNOWN $Message
     */
    protected $Message = null;

    /**
     * @param AncillaryFeeGroup $AncillaryFeeGroup
     * @param OrderStandardBag $OrderStandardBag
     * @param UNKNOWN $Message
     */
    public function __construct($AncillaryFeeGroup = null, $OrderStandardBag = null, $Message = null)
    {
      $this->AncillaryFeeGroup = $AncillaryFeeGroup;
      $this->OrderStandardBag = $OrderStandardBag;
      $this->Message = $Message;
    }

    /**
     * @return AncillaryFeeGroup
     */
    public function getAncillaryFeeGroup()
    {
      return $this->AncillaryFeeGroup;
    }

    /**
     * @param AncillaryFeeGroup $AncillaryFeeGroup
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AncillaryFeeGroups
     */
    public function setAncillaryFeeGroup($AncillaryFeeGroup)
    {
      $this->AncillaryFeeGroup = $AncillaryFeeGroup;
      return $this;
    }

    /**
     * @return OrderStandardBag
     */
    public function getOrderStandardBag()
    {
      return $this->OrderStandardBag;
    }

    /**
     * @param OrderStandardBag $OrderStandardBag
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AncillaryFeeGroups
     */
    public function setOrderStandardBag($OrderStandardBag)
    {
      $this->OrderStandardBag = $OrderStandardBag;
      return $this;
    }

    /**
     * @return UNKNOWN
     */
    public function getMessage()
    {
      return $this->Message;
    }

    /**
     * @param UNKNOWN $Message
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AncillaryFeeGroups
     */
    public function setMessage($Message)
    {
      $this->Message = $Message;
      return $this;
    }

}
