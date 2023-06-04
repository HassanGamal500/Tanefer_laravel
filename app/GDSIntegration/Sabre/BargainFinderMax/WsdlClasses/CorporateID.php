<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class CorporateID
{

    /**
     * @var CorporateIDType $Code
     */
    protected $Code = null;

    /**
     * @param CorporateIDType $Code
     */
    public function __construct($Code = null)
    {
      $this->Code = $Code;
    }

    /**
     * @return CorporateIDType
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param CorporateIDType $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CorporateID
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

}
