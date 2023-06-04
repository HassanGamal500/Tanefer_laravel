<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class CreditCustom5
{

    /**
     * @var CC_Info $CC_Info
     */
    protected $CC_Info = null;

    /**
     * @var ItinTotalFare $ItinTotalFare
     */
    protected $ItinTotalFare = null;

    /**
     * @var boolean $AutoStore
     */
    protected $AutoStore = null;

    /**
     * @var boolean $DisplayReference
     */
    protected $DisplayReference = null;

    /**
     * @var int $RemarkNumber
     */
    protected $RemarkNumber = null;

    /**
     * @var boolean $ServiceFee
     */
    protected $ServiceFee = null;

    /**
     * @var boolean $TasaAdministrativa
     */
    protected $TasaAdministrativa = null;

    /**
     * @param CC_Info $CC_Info
     * @param ItinTotalFare $ItinTotalFare
     * @param boolean $AutoStore
     * @param boolean $DisplayReference
     * @param int $RemarkNumber
     * @param boolean $ServiceFee
     * @param boolean $TasaAdministrativa
     */
    public function __construct($CC_Info = null, $ItinTotalFare = null, $AutoStore = null, $DisplayReference = null, $RemarkNumber = null, $ServiceFee = null, $TasaAdministrativa = null)
    {
      $this->CC_Info = $CC_Info;
      $this->ItinTotalFare = $ItinTotalFare;
      $this->AutoStore = $AutoStore;
      $this->DisplayReference = $DisplayReference;
      $this->RemarkNumber = $RemarkNumber;
      $this->ServiceFee = $ServiceFee;
      $this->TasaAdministrativa = $TasaAdministrativa;
    }

    /**
     * @return CC_Info
     */
    public function getCC_Info()
    {
      return $this->CC_Info;
    }

    /**
     * @param CC_Info $CC_Info
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CreditCustom5
     */
    public function setCC_Info($CC_Info)
    {
      $this->CC_Info = $CC_Info;
      return $this;
    }

    /**
     * @return ItinTotalFare
     */
    public function getItinTotalFare()
    {
      return $this->ItinTotalFare;
    }

    /**
     * @param ItinTotalFare $ItinTotalFare
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CreditCustom5
     */
    public function setItinTotalFare($ItinTotalFare)
    {
      $this->ItinTotalFare = $ItinTotalFare;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getAutoStore()
    {
      return $this->AutoStore;
    }

    /**
     * @param boolean $AutoStore
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CreditCustom5
     */
    public function setAutoStore($AutoStore)
    {
      $this->AutoStore = $AutoStore;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getDisplayReference()
    {
      return $this->DisplayReference;
    }

    /**
     * @param boolean $DisplayReference
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CreditCustom5
     */
    public function setDisplayReference($DisplayReference)
    {
      $this->DisplayReference = $DisplayReference;
      return $this;
    }

    /**
     * @return int
     */
    public function getRemarkNumber()
    {
      return $this->RemarkNumber;
    }

    /**
     * @param int $RemarkNumber
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CreditCustom5
     */
    public function setRemarkNumber($RemarkNumber)
    {
      $this->RemarkNumber = $RemarkNumber;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getServiceFee()
    {
      return $this->ServiceFee;
    }

    /**
     * @param boolean $ServiceFee
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CreditCustom5
     */
    public function setServiceFee($ServiceFee)
    {
      $this->ServiceFee = $ServiceFee;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getTasaAdministrativa()
    {
      return $this->TasaAdministrativa;
    }

    /**
     * @param boolean $TasaAdministrativa
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CreditCustom5
     */
    public function setTasaAdministrativa($TasaAdministrativa)
    {
      $this->TasaAdministrativa = $TasaAdministrativa;
      return $this;
    }

}
