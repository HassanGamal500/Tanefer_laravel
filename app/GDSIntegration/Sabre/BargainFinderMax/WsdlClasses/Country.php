<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Country
{

    /**
     * @var ISO3166 $Code
     */
    protected $Code = null;

    /**
     * @param ISO3166 $Code
     */
    public function __construct($Code = null)
    {
      $this->Code = $Code;
    }

    /**
     * @return ISO3166
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param ISO3166 $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Country
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

}
