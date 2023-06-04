<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class VendorPrefApplicabilityType
{

    /**
     * @var ApplicabilityEnumType $Value
     */
    protected $Value = null;

    /**
     * @var CarrierType $Type
     */
    protected $Type = null;

    /**
     * @param ApplicabilityEnumType $Value
     * @param CarrierType $Type
     */
    public function __construct($Value = null, $Type = null)
    {
      $this->Value = $Value;
      $this->Type = $Type;
    }

    /**
     * @return ApplicabilityEnumType
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param ApplicabilityEnumType $Value
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VendorPrefApplicabilityType
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

    /**
     * @return CarrierType
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param CarrierType $Type
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VendorPrefApplicabilityType
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

}
