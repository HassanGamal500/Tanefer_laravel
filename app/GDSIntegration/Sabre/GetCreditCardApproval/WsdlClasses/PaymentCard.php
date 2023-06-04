<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class PaymentCard
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
     * @var string $ExpireDate
     */
    protected $ExpireDate = null;

    /**
     * @var string $AirlineCode
     */
    protected $AirlineCode = null;

    /**
     * @param string $Code
     * @param string $NameNumber
     * @param string $Number
     */
    public function __construct($Code = null, $NameNumber = null, $Number = null,$ExpireDate = null,$AirlineCode = null)
    {
      $this->Code = $Code;
      $this->NameNumber = $NameNumber;
      $this->Number = $Number;
      $this->ExpireDate = $ExpireDate;
      $this->AirlineCode = $AirlineCode;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\PaymentCard
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\PaymentCard
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\PaymentCard
     */
    public function setNumber($Number)
    {
      $this->Number = $Number;
      return $this;
    }

}
