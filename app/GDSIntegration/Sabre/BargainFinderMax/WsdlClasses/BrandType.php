<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class BrandType
{

    /**
     * @var string $Code
     */
    protected $Code = null;

    /**
     * @param string $Code
     */
    public function __construct($Code = null)
    {
      $this->Code = $Code;
    }

    /**
     * @return string
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param string $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandType
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

}
