<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AncillaryFeeGroup
{

    /**
     * @var AncillaryFeeItem $AncillaryFeeItem
     */
    protected $AncillaryFeeItem = null;

    /**
     * @var UNKNOWN $Code
     */
    protected $Code = null;

    /**
     * @var UNKNOWN $Name
     */
    protected $Name = null;

    /**
     * @var UNKNOWN $Message
     */
    protected $Message = null;

    /**
     * @param AncillaryFeeItem $AncillaryFeeItem
     * @param UNKNOWN $Code
     * @param UNKNOWN $Name
     * @param UNKNOWN $Message
     */
    public function __construct($AncillaryFeeItem = null, $Code = null, $Name = null, $Message = null)
    {
      $this->AncillaryFeeItem = $AncillaryFeeItem;
      $this->Code = $Code;
      $this->Name = $Name;
      $this->Message = $Message;
    }

    /**
     * @return AncillaryFeeItem
     */
    public function getAncillaryFeeItem()
    {
      return $this->AncillaryFeeItem;
    }

    /**
     * @param AncillaryFeeItem $AncillaryFeeItem
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AncillaryFeeGroup
     */
    public function setAncillaryFeeItem($AncillaryFeeItem)
    {
      $this->AncillaryFeeItem = $AncillaryFeeItem;
      return $this;
    }

    /**
     * @return UNKNOWN
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param UNKNOWN $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AncillaryFeeGroup
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

    /**
     * @return UNKNOWN
     */
    public function getName()
    {
      return $this->Name;
    }

    /**
     * @param UNKNOWN $Name
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AncillaryFeeGroup
     */
    public function setName($Name)
    {
      $this->Name = $Name;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AncillaryFeeGroup
     */
    public function setMessage($Message)
    {
      $this->Message = $Message;
      return $this;
    }

}
