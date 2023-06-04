<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class FreeTextCustom3
{

    /**
     * @var Amex $Amex
     */
    protected $Amex = null;

    /**
     * @var Airplus $Airplus
     */
    protected $Airplus = null;

    /**
     * @param Amex $Amex
     * @param Airplus $Airplus
     */
    public function __construct($Amex = null, $Airplus = null)
    {
      $this->Amex = $Amex;
      $this->Airplus = $Airplus;
    }

    /**
     * @return Amex
     */
    public function getAmex()
    {
      return $this->Amex;
    }

    /**
     * @param Amex $Amex
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\FreeTextCustom3
     */
    public function setAmex($Amex)
    {
      $this->Amex = $Amex;
      return $this;
    }

    /**
     * @return Airplus
     */
    public function getAirplus()
    {
      return $this->Airplus;
    }

    /**
     * @param Airplus $Airplus
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\FreeTextCustom3
     */
    public function setAirplus($Airplus)
    {
      $this->Airplus = $Airplus;
      return $this;
    }

}
