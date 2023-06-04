<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class IETCountryWOBSP
{

    /**
     * @var Country $Country
     */
    protected $Country = null;

    /**
     * @param Country $Country
     */
    public function __construct($Country = null)
    {
      $this->Country = $Country;
    }

    /**
     * @return Country
     */
    public function getCountry()
    {
      return $this->Country;
    }

    /**
     * @param Country $Country
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\IETCountryWOBSP
     */
    public function setCountry($Country)
    {
      $this->Country = $Country;
      return $this;
    }

}
