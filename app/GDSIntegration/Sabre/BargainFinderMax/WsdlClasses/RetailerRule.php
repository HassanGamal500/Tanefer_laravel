<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class RetailerRule
{

    /**
     * @var anonymous460 $Code
     */
    protected $Code = null;

    /**
     * @param anonymous460 $Code
     */
    public function __construct($Code = null)
    {
      $this->Code = $Code;
    }

    /**
     * @return anonymous460
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param anonymous460 $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\RetailerRule
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

}
