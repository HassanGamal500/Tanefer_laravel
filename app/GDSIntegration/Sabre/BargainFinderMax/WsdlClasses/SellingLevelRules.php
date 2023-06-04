<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class SellingLevelRules
{

    /**
     * @var boolean $Ignore
     */
    protected $Ignore = null;

    /**
     * @param boolean $Ignore
     */
    public function __construct($Ignore = null)
    {
      $this->Ignore = $Ignore;
    }

    /**
     * @return boolean
     */
    public function getIgnore()
    {
      return $this->Ignore;
    }

    /**
     * @param boolean $Ignore
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SellingLevelRules
     */
    public function setIgnore($Ignore)
    {
      $this->Ignore = $Ignore;
      return $this;
    }

}
