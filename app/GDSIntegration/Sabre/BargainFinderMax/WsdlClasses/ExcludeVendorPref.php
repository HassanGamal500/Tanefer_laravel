<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ExcludeVendorPref
{

    /**
     * @var anonymous181 $Code
     */
    protected $Code = null;

    /**
     * @param anonymous181 $Code
     */
    public function __construct($Code = null)
    {
      $this->Code = $Code;
    }

    /**
     * @return anonymous181
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param anonymous181 $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExcludeVendorPref
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

}
