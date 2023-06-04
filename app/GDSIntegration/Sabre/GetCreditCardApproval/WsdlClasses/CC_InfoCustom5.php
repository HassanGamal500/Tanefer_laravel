<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class CC_InfoCustom5
{

    /**
     * @var PaymentCard $PaymentCard
     */
    protected $PaymentCard = null;

    /**
     * @var FreeText $FreeText
     */
    protected $FreeText = null;

    /**
     * @var boolean $Add
     */
    protected $Add = null;

    /**
     * @var boolean $Delete
     */
    protected $Delete = null;

    /**
     * @var boolean $Modify
     */
    protected $Modify = null;

    /**
     * @param PaymentCard $PaymentCard
     * @param FreeText $FreeText
     * @param boolean $Add
     * @param boolean $Delete
     * @param boolean $Modify
     */
    public function __construct($PaymentCard = null, $FreeText = null, $Add = null, $Delete = null, $Modify = null)
    {
      $this->PaymentCard = $PaymentCard;
      $this->FreeText = $FreeText;
      $this->Add = $Add;
      $this->Delete = $Delete;
      $this->Modify = $Modify;
    }

    /**
     * @return PaymentCard
     */
    public function getPaymentCard()
    {
      return $this->PaymentCard;
    }

    /**
     * @param PaymentCard $PaymentCard
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CC_InfoCustom5
     */
    public function setPaymentCard($PaymentCard)
    {
      $this->PaymentCard = $PaymentCard;
      return $this;
    }

    /**
     * @return FreeText
     */
    public function getFreeText()
    {
      return $this->FreeText;
    }

    /**
     * @param FreeText $FreeText
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CC_InfoCustom5
     */
    public function setFreeText($FreeText)
    {
      $this->FreeText = $FreeText;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getAdd()
    {
      return $this->Add;
    }

    /**
     * @param boolean $Add
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CC_InfoCustom5
     */
    public function setAdd($Add)
    {
      $this->Add = $Add;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getDelete()
    {
      return $this->Delete;
    }

    /**
     * @param boolean $Delete
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CC_InfoCustom5
     */
    public function setDelete($Delete)
    {
      $this->Delete = $Delete;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getModify()
    {
      return $this->Modify;
    }

    /**
     * @param boolean $Modify
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CC_InfoCustom5
     */
    public function setModify($Modify)
    {
      $this->Modify = $Modify;
      return $this;
    }

}
