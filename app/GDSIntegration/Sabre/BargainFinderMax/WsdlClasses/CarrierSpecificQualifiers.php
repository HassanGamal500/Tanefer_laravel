<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class CarrierSpecificQualifiers
{

    /**
     * @var AccountCode $AccountCode
     */
    protected $AccountCode = null;

    /**
     * @var Qualifier $Qualifier
     */
    protected $Qualifier = null;

    /**
     * @var CarrierCode $CarrierCode
     */
    protected $CarrierCode = null;

    /**
     * @param AccountCode $AccountCode
     * @param Qualifier $Qualifier
     * @param CarrierCode $CarrierCode
     */
    public function __construct($AccountCode = null, $Qualifier = null, $CarrierCode = null)
    {
      $this->AccountCode = $AccountCode;
      $this->Qualifier = $Qualifier;
      $this->CarrierCode = $CarrierCode;
    }

    /**
     * @return AccountCode
     */
    public function getAccountCode()
    {
      return $this->AccountCode;
    }

    /**
     * @param AccountCode $AccountCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CarrierSpecificQualifiers
     */
    public function setAccountCode($AccountCode)
    {
      $this->AccountCode = $AccountCode;
      return $this;
    }

    /**
     * @return Qualifier
     */
    public function getQualifier()
    {
      return $this->Qualifier;
    }

    /**
     * @param Qualifier $Qualifier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CarrierSpecificQualifiers
     */
    public function setQualifier($Qualifier)
    {
      $this->Qualifier = $Qualifier;
      return $this;
    }

    /**
     * @return CarrierCode
     */
    public function getCarrierCode()
    {
      return $this->CarrierCode;
    }

    /**
     * @param CarrierCode $CarrierCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CarrierSpecificQualifiers
     */
    public function setCarrierCode($CarrierCode)
    {
      $this->CarrierCode = $CarrierCode;
      return $this;
    }

}
