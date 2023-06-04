<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class VerificationItinCallLogic
{

    /**
     * @var VerificationItinCallLogicType $Value
     */
    protected $Value = null;

    /**
     * @var boolean $AlwaysCheckAvailability
     */
    protected $AlwaysCheckAvailability = null;

    /**
     * @param VerificationItinCallLogicType $Value
     * @param boolean $AlwaysCheckAvailability
     */
    public function __construct($Value = null, $AlwaysCheckAvailability = null)
    {
      $this->Value = $Value;
      $this->AlwaysCheckAvailability = $AlwaysCheckAvailability;
    }

    /**
     * @return VerificationItinCallLogicType
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param VerificationItinCallLogicType $Value
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VerificationItinCallLogic
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getAlwaysCheckAvailability()
    {
      return $this->AlwaysCheckAvailability;
    }

    /**
     * @param boolean $AlwaysCheckAvailability
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VerificationItinCallLogic
     */
    public function setAlwaysCheckAvailability($AlwaysCheckAvailability)
    {
      $this->AlwaysCheckAvailability = $AlwaysCheckAvailability;
      return $this;
    }

}
