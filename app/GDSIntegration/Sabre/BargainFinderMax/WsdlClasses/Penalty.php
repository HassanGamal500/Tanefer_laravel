<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Penalty
{

    /**
     * @var Cat16TextOnly $Cat16TextOnly
     */
    protected $Cat16TextOnly = null;

    /**
     * @var anonymous670 $Type
     */
    protected $Type = null;

    /**
     * @var anonymous671 $Applicability
     */
    protected $Applicability = null;

    /**
     * @var boolean $Refundable
     */
    protected $Refundable = null;

    /**
     * @var boolean $Changeable
     */
    protected $Changeable = null;

    /**
     * @var boolean $ConditionsApply
     */
    protected $ConditionsApply = null;

    /**
     * @var boolean $Cat16Info
     */
    protected $Cat16Info = null;

    /**
     * @var Money $Amount
     */
    protected $Amount = null;

    /**
     * @var CurrencyCodeType $CurrencyCode
     */
    protected $CurrencyCode = null;

    /**
     * @var int $DecimalPlaces
     */
    protected $DecimalPlaces = null;

    /**
     * @param Cat16TextOnly $Cat16TextOnly
     * @param anonymous670 $Type
     * @param anonymous671 $Applicability
     * @param boolean $Refundable
     * @param boolean $Changeable
     * @param boolean $ConditionsApply
     * @param boolean $Cat16Info
     * @param Money $Amount
     * @param CurrencyCodeType $CurrencyCode
     * @param int $DecimalPlaces
     */
    public function __construct($Cat16TextOnly = null, $Type = null, $Applicability = null, $Refundable = null, $Changeable = null, $ConditionsApply = null, $Cat16Info = null, $Amount = null, $CurrencyCode = null, $DecimalPlaces = null)
    {
      $this->Cat16TextOnly = $Cat16TextOnly;
      $this->Type = $Type;
      $this->Applicability = $Applicability;
      $this->Refundable = $Refundable;
      $this->Changeable = $Changeable;
      $this->ConditionsApply = $ConditionsApply;
      $this->Cat16Info = $Cat16Info;
      $this->Amount = $Amount;
      $this->CurrencyCode = $CurrencyCode;
      $this->DecimalPlaces = $DecimalPlaces;
    }

    /**
     * @return Cat16TextOnly
     */
    public function getCat16TextOnly()
    {
      return $this->Cat16TextOnly;
    }

    /**
     * @param Cat16TextOnly $Cat16TextOnly
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Penalty
     */
    public function setCat16TextOnly($Cat16TextOnly)
    {
      $this->Cat16TextOnly = $Cat16TextOnly;
      return $this;
    }

    /**
     * @return anonymous670
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param anonymous670 $Type
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Penalty
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

    /**
     * @return anonymous671
     */
    public function getApplicability()
    {
      return $this->Applicability;
    }

    /**
     * @param anonymous671 $Applicability
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Penalty
     */
    public function setApplicability($Applicability)
    {
      $this->Applicability = $Applicability;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getRefundable()
    {
      return $this->Refundable;
    }

    /**
     * @param boolean $Refundable
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Penalty
     */
    public function setRefundable($Refundable)
    {
      $this->Refundable = $Refundable;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getChangeable()
    {
      return $this->Changeable;
    }

    /**
     * @param boolean $Changeable
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Penalty
     */
    public function setChangeable($Changeable)
    {
      $this->Changeable = $Changeable;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getConditionsApply()
    {
      return $this->ConditionsApply;
    }

    /**
     * @param boolean $ConditionsApply
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Penalty
     */
    public function setConditionsApply($ConditionsApply)
    {
      $this->ConditionsApply = $ConditionsApply;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getCat16Info()
    {
      return $this->Cat16Info;
    }

    /**
     * @param boolean $Cat16Info
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Penalty
     */
    public function setCat16Info($Cat16Info)
    {
      $this->Cat16Info = $Cat16Info;
      return $this;
    }

    /**
     * @return Money
     */
    public function getAmount()
    {
      return $this->Amount;
    }

    /**
     * @param Money $Amount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Penalty
     */
    public function setAmount($Amount)
    {
      $this->Amount = $Amount;
      return $this;
    }

    /**
     * @return CurrencyCodeType
     */
    public function getCurrencyCode()
    {
      return $this->CurrencyCode;
    }

    /**
     * @param CurrencyCodeType $CurrencyCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Penalty
     */
    public function setCurrencyCode($CurrencyCode)
    {
      $this->CurrencyCode = $CurrencyCode;
      return $this;
    }

    /**
     * @return int
     */
    public function getDecimalPlaces()
    {
      return $this->DecimalPlaces;
    }

    /**
     * @param int $DecimalPlaces
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Penalty
     */
    public function setDecimalPlaces($DecimalPlaces)
    {
      $this->DecimalPlaces = $DecimalPlaces;
      return $this;
    }

}
