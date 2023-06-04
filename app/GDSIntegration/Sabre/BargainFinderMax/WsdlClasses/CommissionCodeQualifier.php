<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class CommissionCodeQualifier
{

    /**
     * @var CommissionCode $Code
     */
    protected $Code = null;

    /**
     * @param CommissionCode $Code
     */
    public function __construct($Code = null)
    {
      $this->Code = $Code;
    }

    /**
     * @return CommissionCode
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param CommissionCode $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CommissionCodeQualifier
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

}
