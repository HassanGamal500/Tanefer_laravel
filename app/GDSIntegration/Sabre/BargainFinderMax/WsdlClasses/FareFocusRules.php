<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareFocusRules
{

    /**
     * @var boolean $Exclude
     */
    protected $Exclude = null;

    /**
     * @param boolean $Exclude
     */
    public function __construct($Exclude = null)
    {
      $this->Exclude = $Exclude;
    }

    /**
     * @return boolean
     */
    public function getExclude()
    {
      return $this->Exclude;
    }

    /**
     * @param boolean $Exclude
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareFocusRules
     */
    public function setExclude($Exclude)
    {
      $this->Exclude = $Exclude;
      return $this;
    }

}
