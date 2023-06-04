<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class KeepSameCabinType
{

    /**
     * @var boolean $Enabled
     */
    protected $Enabled = null;

    /**
     * @param boolean $Enabled
     */
    public function __construct($Enabled = null)
    {
      $this->Enabled = $Enabled;
    }

    /**
     * @return boolean
     */
    public function getEnabled()
    {
      return $this->Enabled;
    }

    /**
     * @param boolean $Enabled
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\KeepSameCabinType
     */
    public function setEnabled($Enabled)
    {
      $this->Enabled = $Enabled;
      return $this;
    }

}
