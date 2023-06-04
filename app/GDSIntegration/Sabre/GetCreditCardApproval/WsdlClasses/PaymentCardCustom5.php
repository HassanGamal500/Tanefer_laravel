<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class PaymentCardCustom5
{

    /**
     * @var string $Code
     */
    protected $Code = null;

    /**
     * @var string $NameNumber
     */
    protected $NameNumber = null;

    /**
     * @var string $Number
     */
    protected $Number = null;

    /**
     * @param string $Code
     * @param string $NameNumber
     * @param string $Number
     */
    public function __construct($Code = null, $NameNumber = null, $Number = null)
    {
      $this->Code = $Code;
      $this->NameNumber = $NameNumber;
      $this->Number = $Number;
    }

    /**
     * @return string
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param string $Code
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\PaymentCardCustom5
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

    /**
     * @return string
     */
    public function getNameNumber()
    {
      return $this->NameNumber;
    }

    /**
     * @param string $NameNumber
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\PaymentCardCustom5
     */
    public function setNameNumber($NameNumber)
    {
      $this->NameNumber = $NameNumber;
      return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
      return $this->Number;
    }

    /**
     * @param string $Number
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\PaymentCardCustom5
     */
    public function setNumber($Number)
    {
      $this->Number = $Number;
      return $this;
    }

}
