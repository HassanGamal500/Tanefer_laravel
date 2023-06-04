<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ValidatingCarrierCheck
{

    /**
     * @var SettlementValidation $SettlementValidation
     */
    protected $SettlementValidation = null;

    /**
     * @var IETValidation $IETValidation
     */
    protected $IETValidation = null;

    /**
     * @var Carrier $Carrier
     */
    protected $Carrier = null;

    /**
     * @var Country $Country
     */
    protected $Country = null;

    /**
     * @param SettlementValidation $SettlementValidation
     * @param IETValidation $IETValidation
     * @param Carrier $Carrier
     * @param Country $Country
     */
    public function __construct($SettlementValidation = null, $IETValidation = null, $Carrier = null, $Country = null)
    {
      $this->SettlementValidation = $SettlementValidation;
      $this->IETValidation = $IETValidation;
      $this->Carrier = $Carrier;
      $this->Country = $Country;
    }

    /**
     * @return SettlementValidation
     */
    public function getSettlementValidation()
    {
      return $this->SettlementValidation;
    }

    /**
     * @param SettlementValidation $SettlementValidation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ValidatingCarrierCheck
     */
    public function setSettlementValidation($SettlementValidation)
    {
      $this->SettlementValidation = $SettlementValidation;
      return $this;
    }

    /**
     * @return IETValidation
     */
    public function getIETValidation()
    {
      return $this->IETValidation;
    }

    /**
     * @param IETValidation $IETValidation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ValidatingCarrierCheck
     */
    public function setIETValidation($IETValidation)
    {
      $this->IETValidation = $IETValidation;
      return $this;
    }

    /**
     * @return Carrier
     */
    public function getCarrier()
    {
      return $this->Carrier;
    }

    /**
     * @param Carrier $Carrier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ValidatingCarrierCheck
     */
    public function setCarrier($Carrier)
    {
      $this->Carrier = $Carrier;
      return $this;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ValidatingCarrierCheck
     */
    public function setCountry($Country)
    {
      $this->Country = $Country;
      return $this;
    }

}
