<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ProcessingMessageType
{

    /**
     * @var ResponsePricingSourceType $PricingSource
     */
    protected $PricingSource = null;

    /**
     * @var string $Message
     */
    protected $Message = null;

    /**
     * @param ResponsePricingSourceType $PricingSource
     * @param string $Message
     */
    public function __construct($PricingSource = null, $Message = null)
    {
      $this->PricingSource = $PricingSource;
      $this->Message = $Message;
    }

    /**
     * @return ResponsePricingSourceType
     */
    public function getPricingSource()
    {
      return $this->PricingSource;
    }

    /**
     * @param ResponsePricingSourceType $PricingSource
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ProcessingMessageType
     */
    public function setPricingSource($PricingSource)
    {
      $this->PricingSource = $PricingSource;
      return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
      return $this->Message;
    }

    /**
     * @param string $Message
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ProcessingMessageType
     */
    public function setMessage($Message)
    {
      $this->Message = $Message;
      return $this;
    }

}
