<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Currency
{

    /**
     * @var AlphaLength3 $Dual
     */
    protected $Dual = null;

    /**
     * @var boolean $MOverride
     */
    protected $MOverride = null;

    /**
     * @param AlphaLength3 $Dual
     * @param boolean $MOverride
     */
    public function __construct($Dual = null, $MOverride = null)
    {
      $this->Dual = $Dual;
      $this->MOverride = $MOverride;
    }

    /**
     * @return AlphaLength3
     */
    public function getDual()
    {
      return $this->Dual;
    }

    /**
     * @param AlphaLength3 $Dual
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Currency
     */
    public function setDual($Dual)
    {
      $this->Dual = $Dual;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getMOverride()
    {
      return $this->MOverride;
    }

    /**
     * @param boolean $MOverride
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Currency
     */
    public function setMOverride($MOverride)
    {
      $this->MOverride = $MOverride;
      return $this;
    }

}
