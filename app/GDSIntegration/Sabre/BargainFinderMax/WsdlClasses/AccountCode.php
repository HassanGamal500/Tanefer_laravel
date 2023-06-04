<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AccountCode
{

    /**
     * @var StringLength1to20 $Code
     */
    protected $Code = null;

    /**
     * @param StringLength1to20 $Code
     */
    public function __construct($Code = null)
    {
      $this->Code = $Code;
    }

    /**
     * @return StringLength1to20
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param StringLength1to20 $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AccountCode
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

}
