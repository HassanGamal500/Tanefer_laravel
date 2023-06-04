<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class LowCostCarriersProcessing
{

    /**
     * @var boolean $Disable
     */
    protected $Disable = null;

    /**
     * @param boolean $Disable
     */
    public function __construct($Disable = null)
    {
      $this->Disable = $Disable;
    }

    /**
     * @return boolean
     */
    public function getDisable()
    {
      return $this->Disable;
    }

    /**
     * @param boolean $Disable
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\LowCostCarriersProcessing
     */
    public function setDisable($Disable)
    {
      $this->Disable = $Disable;
      return $this;
    }

}
