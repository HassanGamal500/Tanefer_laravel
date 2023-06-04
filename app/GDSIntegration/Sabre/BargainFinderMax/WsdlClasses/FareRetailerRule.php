<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareRetailerRule
{

    /**
     * @var anonymous688 $TransactionType
     */
    protected $TransactionType = null;

    /**
     * @var anonymous689 $Code
     */
    protected $Code = null;

    /**
     * @param anonymous688 $TransactionType
     * @param anonymous689 $Code
     */
    public function __construct($TransactionType = null, $Code = null)
    {
      $this->TransactionType = $TransactionType;
      $this->Code = $Code;
    }

    /**
     * @return anonymous688
     */
    public function getTransactionType()
    {
      return $this->TransactionType;
    }

    /**
     * @param anonymous688 $TransactionType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareRetailerRule
     */
    public function setTransactionType($TransactionType)
    {
      $this->TransactionType = $TransactionType;
      return $this;
    }

    /**
     * @return anonymous689
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param anonymous689 $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareRetailerRule
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

}
