<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class AmexCustom3
{

    /**
     * @var string $R1
     */
    protected $R1 = null;

    /**
     * @var string $R2
     */
    protected $R2 = null;

    /**
     * @var string $R3
     */
    protected $R3 = null;

    /**
     * @var string $R4
     */
    protected $R4 = null;

    /**
     * @var string $R5
     */
    protected $R5 = null;

    /**
     * @var string $R6
     */
    protected $R6 = null;

    /**
     * @var string $OI
     */
    protected $OI = null;

    /**
     * @var string $Vat
     */
    protected $Vat = null;

    /**
     * @param string $R1
     * @param string $R2
     * @param string $R3
     * @param string $R4
     * @param string $R5
     * @param string $R6
     * @param string $OI
     * @param string $Vat
     */
    public function __construct($R1 = null, $R2 = null, $R3 = null, $R4 = null, $R5 = null, $R6 = null, $OI = null, $Vat = null)
    {
      $this->R1 = $R1;
      $this->R2 = $R2;
      $this->R3 = $R3;
      $this->R4 = $R4;
      $this->R5 = $R5;
      $this->R6 = $R6;
      $this->OI = $OI;
      $this->Vat = $Vat;
    }

    /**
     * @return string
     */
    public function getR1()
    {
      return $this->R1;
    }

    /**
     * @param string $R1
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\AmexCustom3
     */
    public function setR1($R1)
    {
      $this->R1 = $R1;
      return $this;
    }

    /**
     * @return string
     */
    public function getR2()
    {
      return $this->R2;
    }

    /**
     * @param string $R2
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\AmexCustom3
     */
    public function setR2($R2)
    {
      $this->R2 = $R2;
      return $this;
    }

    /**
     * @return string
     */
    public function getR3()
    {
      return $this->R3;
    }

    /**
     * @param string $R3
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\AmexCustom3
     */
    public function setR3($R3)
    {
      $this->R3 = $R3;
      return $this;
    }

    /**
     * @return string
     */
    public function getR4()
    {
      return $this->R4;
    }

    /**
     * @param string $R4
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\AmexCustom3
     */
    public function setR4($R4)
    {
      $this->R4 = $R4;
      return $this;
    }

    /**
     * @return string
     */
    public function getR5()
    {
      return $this->R5;
    }

    /**
     * @param string $R5
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\AmexCustom3
     */
    public function setR5($R5)
    {
      $this->R5 = $R5;
      return $this;
    }

    /**
     * @return string
     */
    public function getR6()
    {
      return $this->R6;
    }

    /**
     * @param string $R6
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\AmexCustom3
     */
    public function setR6($R6)
    {
      $this->R6 = $R6;
      return $this;
    }

    /**
     * @return string
     */
    public function getOI()
    {
      return $this->OI;
    }

    /**
     * @param string $OI
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\AmexCustom3
     */
    public function setOI($OI)
    {
      $this->OI = $OI;
      return $this;
    }

    /**
     * @return string
     */
    public function getVat()
    {
      return $this->Vat;
    }

    /**
     * @param string $Vat
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\AmexCustom3
     */
    public function setVat($Vat)
    {
      $this->Vat = $Vat;
      return $this;
    }

}
