<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class JumpCabinLogicType
{

    /**
     * @var boolean $Disabled
     */
    protected $Disabled = null;

    /**
     * @param boolean $Disabled
     */
    public function __construct($Disabled = null)
    {
      $this->Disabled = $Disabled;
    }

    /**
     * @return boolean
     */
    public function getDisabled()
    {
      return $this->Disabled;
    }

    /**
     * @param boolean $Disabled
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\JumpCabinLogicType
     */
    public function setDisabled($Disabled)
    {
      $this->Disabled = $Disabled;
      return $this;
    }

}
