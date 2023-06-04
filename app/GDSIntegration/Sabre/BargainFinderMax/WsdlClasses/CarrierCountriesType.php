<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class CarrierCountriesType
{

    /**
     * @var IETCountryWOBSP $IETCountryWOBSP
     */
    protected $IETCountryWOBSP = null;

    /**
     * @var CarrierCode $Code
     */
    protected $Code = null;

    /**
     * @param CarrierCode $Code
     */
    public function __construct($Code = null)
    {
      $this->Code = $Code;
    }

    /**
     * @return IETCountryWOBSP
     */
    public function getIETCountryWOBSP()
    {
      return $this->IETCountryWOBSP;
    }

    /**
     * @param IETCountryWOBSP $IETCountryWOBSP
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CarrierCountriesType
     */
    public function setIETCountryWOBSP($IETCountryWOBSP)
    {
      $this->IETCountryWOBSP = $IETCountryWOBSP;
      return $this;
    }

    /**
     * @return CarrierCode
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param CarrierCode $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CarrierCountriesType
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

}
