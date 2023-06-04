<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ValidatingCarrier
{

    /**
     * @var CarrierCodeOrEmpty $Code
     */
    protected $Code = null;

    /**
     * @param CarrierCodeOrEmpty $Code
     */
    public function __construct($Code = null)
    {
      $this->Code = $Code;
    }

    /**
     * @return CarrierCodeOrEmpty
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param CarrierCodeOrEmpty $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ValidatingCarrier
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

}
