<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class AirplusCustom
{

    /**
     * @var string $PK
     */
    protected $PK = null;

    /**
     * @var string $KS
     */
    protected $KS = null;

    /**
     * @var string $IK
     */
    protected $IK = null;

    /**
     * @var string $PR
     */
    protected $PR = null;

    /**
     * @var string $AK
     */
    protected $AK = null;

    /**
     * @var string $DS
     */
    protected $DS = null;

    /**
     * @var string $AE
     */
    protected $AE = null;

    /**
     * @var string $BD
     */
    protected $BD = null;

    /**
     * @var string $RZ
     */
    protected $RZ = null;

    /**
     * @var string $AU
     */
    protected $AU = null;

    /**
     * @param string $PK
     * @param string $KS
     * @param string $IK
     * @param string $PR
     * @param string $AK
     * @param string $DS
     * @param string $AE
     * @param string $BD
     * @param string $RZ
     * @param string $AU
     */
    public function __construct($PK = null, $KS = null, $IK = null, $PR = null, $AK = null, $DS = null, $AE = null, $BD = null, $RZ = null, $AU = null)
    {
      $this->PK = $PK;
      $this->KS = $KS;
      $this->IK = $IK;
      $this->PR = $PR;
      $this->AK = $AK;
      $this->DS = $DS;
      $this->AE = $AE;
      $this->BD = $BD;
      $this->RZ = $RZ;
      $this->AU = $AU;
    }

    /**
     * @return string
     */
    public function getPK()
    {
      return $this->PK;
    }

    /**
     * @param string $PK
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\AirplusCustom
     */
    public function setPK($PK)
    {
      $this->PK = $PK;
      return $this;
    }

    /**
     * @return string
     */
    public function getKS()
    {
      return $this->KS;
    }

    /**
     * @param string $KS
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\AirplusCustom
     */
    public function setKS($KS)
    {
      $this->KS = $KS;
      return $this;
    }

    /**
     * @return string
     */
    public function getIK()
    {
      return $this->IK;
    }

    /**
     * @param string $IK
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\AirplusCustom
     */
    public function setIK($IK)
    {
      $this->IK = $IK;
      return $this;
    }

    /**
     * @return string
     */
    public function getPR()
    {
      return $this->PR;
    }

    /**
     * @param string $PR
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\AirplusCustom
     */
    public function setPR($PR)
    {
      $this->PR = $PR;
      return $this;
    }

    /**
     * @return string
     */
    public function getAK()
    {
      return $this->AK;
    }

    /**
     * @param string $AK
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\AirplusCustom
     */
    public function setAK($AK)
    {
      $this->AK = $AK;
      return $this;
    }

    /**
     * @return string
     */
    public function getDS()
    {
      return $this->DS;
    }

    /**
     * @param string $DS
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\AirplusCustom
     */
    public function setDS($DS)
    {
      $this->DS = $DS;
      return $this;
    }

    /**
     * @return string
     */
    public function getAE()
    {
      return $this->AE;
    }

    /**
     * @param string $AE
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\AirplusCustom
     */
    public function setAE($AE)
    {
      $this->AE = $AE;
      return $this;
    }

    /**
     * @return string
     */
    public function getBD()
    {
      return $this->BD;
    }

    /**
     * @param string $BD
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\AirplusCustom
     */
    public function setBD($BD)
    {
      $this->BD = $BD;
      return $this;
    }

    /**
     * @return string
     */
    public function getRZ()
    {
      return $this->RZ;
    }

    /**
     * @param string $RZ
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\AirplusCustom
     */
    public function setRZ($RZ)
    {
      $this->RZ = $RZ;
      return $this;
    }

    /**
     * @return string
     */
    public function getAU()
    {
      return $this->AU;
    }

    /**
     * @param string $AU
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\AirplusCustom
     */
    public function setAU($AU)
    {
      $this->AU = $AU;
      return $this;
    }

}
