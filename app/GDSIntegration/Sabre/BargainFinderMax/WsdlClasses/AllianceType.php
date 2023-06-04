<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AllianceType
{

    /**
     * @var anonymous433 $Code
     */
    protected $Code = null;

    /**
     * @param anonymous433 $Code
     */
    public function __construct($Code = null)
    {
      $this->Code = $Code;
    }

    /**
     * @return anonymous433
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param anonymous433 $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AllianceType
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

}
