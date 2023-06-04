<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ShelvesIndicators
{

    /**
     * @var anonymous165 $Mode
     */
    protected $Mode = null;

    /**
     * @var anonymous166 $Limit
     */
    protected $Limit = null;

    /**
     * @param anonymous165 $Mode
     * @param anonymous166 $Limit
     */
    public function __construct($Mode = null, $Limit = null)
    {
      $this->Mode = $Mode;
      $this->Limit = $Limit;
    }

    /**
     * @return anonymous165
     */
    public function getMode()
    {
      return $this->Mode;
    }

    /**
     * @param anonymous165 $Mode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ShelvesIndicators
     */
    public function setMode($Mode)
    {
      $this->Mode = $Mode;
      return $this;
    }

    /**
     * @return anonymous166
     */
    public function getLimit()
    {
      return $this->Limit;
    }

    /**
     * @param anonymous166 $Limit
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ShelvesIndicators
     */
    public function setLimit($Limit)
    {
      $this->Limit = $Limit;
      return $this;
    }

}
