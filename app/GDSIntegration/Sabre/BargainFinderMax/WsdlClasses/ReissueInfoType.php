<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ReissueInfoType
{

    /**
     * @var ChangeFees $ChangeFees
     */
    protected $ChangeFees = null;

    /**
     * @var string $ResidualIdicator
     */
    protected $ResidualIdicator = null;

    /**
     * @var string $TypeOfServiceFee
     */
    protected $TypeOfServiceFee = null;

    /**
     * @var string $TypeOfReissueTransaction
     */
    protected $TypeOfReissueTransaction = null;

    /**
     * @var boolean $ReissueResultFromTag
     */
    protected $ReissueResultFromTag = null;

    /**
     * @var string $FormOfRefund
     */
    protected $FormOfRefund = null;

    /**
     * @var boolean $ReissueRequiresElectronicTicket
     */
    protected $ReissueRequiresElectronicTicket = null;

    /**
     * @var boolean $ReissueDoesNotAllowElectronicTicket
     */
    protected $ReissueDoesNotAllowElectronicTicket = null;

    /**
     * @var boolean $TaxRefundable
     */
    protected $TaxRefundable = null;

    /**
     * @param string $ResidualIdicator
     * @param string $TypeOfServiceFee
     * @param string $TypeOfReissueTransaction
     * @param boolean $ReissueResultFromTag
     * @param string $FormOfRefund
     * @param boolean $ReissueRequiresElectronicTicket
     * @param boolean $ReissueDoesNotAllowElectronicTicket
     * @param boolean $TaxRefundable
     */
    public function __construct($ResidualIdicator = null, $TypeOfServiceFee = null, $TypeOfReissueTransaction = null, $ReissueResultFromTag = null, $FormOfRefund = null, $ReissueRequiresElectronicTicket = null, $ReissueDoesNotAllowElectronicTicket = null, $TaxRefundable = null)
    {
      $this->ResidualIdicator = $ResidualIdicator;
      $this->TypeOfServiceFee = $TypeOfServiceFee;
      $this->TypeOfReissueTransaction = $TypeOfReissueTransaction;
      $this->ReissueResultFromTag = $ReissueResultFromTag;
      $this->FormOfRefund = $FormOfRefund;
      $this->ReissueRequiresElectronicTicket = $ReissueRequiresElectronicTicket;
      $this->ReissueDoesNotAllowElectronicTicket = $ReissueDoesNotAllowElectronicTicket;
      $this->TaxRefundable = $TaxRefundable;
    }

    /**
     * @return ChangeFees
     */
    public function getChangeFees()
    {
      return $this->ChangeFees;
    }

    /**
     * @param ChangeFees $ChangeFees
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ReissueInfoType
     */
    public function setChangeFees($ChangeFees)
    {
      $this->ChangeFees = $ChangeFees;
      return $this;
    }

    /**
     * @return string
     */
    public function getResidualIdicator()
    {
      return $this->ResidualIdicator;
    }

    /**
     * @param string $ResidualIdicator
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ReissueInfoType
     */
    public function setResidualIdicator($ResidualIdicator)
    {
      $this->ResidualIdicator = $ResidualIdicator;
      return $this;
    }

    /**
     * @return string
     */
    public function getTypeOfServiceFee()
    {
      return $this->TypeOfServiceFee;
    }

    /**
     * @param string $TypeOfServiceFee
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ReissueInfoType
     */
    public function setTypeOfServiceFee($TypeOfServiceFee)
    {
      $this->TypeOfServiceFee = $TypeOfServiceFee;
      return $this;
    }

    /**
     * @return string
     */
    public function getTypeOfReissueTransaction()
    {
      return $this->TypeOfReissueTransaction;
    }

    /**
     * @param string $TypeOfReissueTransaction
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ReissueInfoType
     */
    public function setTypeOfReissueTransaction($TypeOfReissueTransaction)
    {
      $this->TypeOfReissueTransaction = $TypeOfReissueTransaction;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getReissueResultFromTag()
    {
      return $this->ReissueResultFromTag;
    }

    /**
     * @param boolean $ReissueResultFromTag
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ReissueInfoType
     */
    public function setReissueResultFromTag($ReissueResultFromTag)
    {
      $this->ReissueResultFromTag = $ReissueResultFromTag;
      return $this;
    }

    /**
     * @return string
     */
    public function getFormOfRefund()
    {
      return $this->FormOfRefund;
    }

    /**
     * @param string $FormOfRefund
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ReissueInfoType
     */
    public function setFormOfRefund($FormOfRefund)
    {
      $this->FormOfRefund = $FormOfRefund;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getReissueRequiresElectronicTicket()
    {
      return $this->ReissueRequiresElectronicTicket;
    }

    /**
     * @param boolean $ReissueRequiresElectronicTicket
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ReissueInfoType
     */
    public function setReissueRequiresElectronicTicket($ReissueRequiresElectronicTicket)
    {
      $this->ReissueRequiresElectronicTicket = $ReissueRequiresElectronicTicket;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getReissueDoesNotAllowElectronicTicket()
    {
      return $this->ReissueDoesNotAllowElectronicTicket;
    }

    /**
     * @param boolean $ReissueDoesNotAllowElectronicTicket
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ReissueInfoType
     */
    public function setReissueDoesNotAllowElectronicTicket($ReissueDoesNotAllowElectronicTicket)
    {
      $this->ReissueDoesNotAllowElectronicTicket = $ReissueDoesNotAllowElectronicTicket;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getTaxRefundable()
    {
      return $this->TaxRefundable;
    }

    /**
     * @param boolean $TaxRefundable
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ReissueInfoType
     */
    public function setTaxRefundable($TaxRefundable)
    {
      $this->TaxRefundable = $TaxRefundable;
      return $this;
    }

}
