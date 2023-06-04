<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class SignedInfoType
{

    /**
     * @var CanonicalizationMethodType $CanonicalizationMethod
     */
    protected $CanonicalizationMethod = null;

    /**
     * @var SignatureMethodType $SignatureMethod
     */
    protected $SignatureMethod = null;

    /**
     * @var ReferenceType $Reference
     */
    protected $Reference = null;

    /**
     * @var ID $Id
     */
    protected $Id = null;

    /**
     * @param CanonicalizationMethodType $CanonicalizationMethod
     * @param SignatureMethodType $SignatureMethod
     * @param ReferenceType $Reference
     * @param ID $Id
     */
    public function __construct($CanonicalizationMethod = null, $SignatureMethod = null, $Reference = null, $Id = null)
    {
      $this->CanonicalizationMethod = $CanonicalizationMethod;
      $this->SignatureMethod = $SignatureMethod;
      $this->Reference = $Reference;
      $this->Id = $Id;
    }

    /**
     * @return CanonicalizationMethodType
     */
    public function getCanonicalizationMethod()
    {
      return $this->CanonicalizationMethod;
    }

    /**
     * @param CanonicalizationMethodType $CanonicalizationMethod
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SignedInfoType
     */
    public function setCanonicalizationMethod($CanonicalizationMethod)
    {
      $this->CanonicalizationMethod = $CanonicalizationMethod;
      return $this;
    }

    /**
     * @return SignatureMethodType
     */
    public function getSignatureMethod()
    {
      return $this->SignatureMethod;
    }

    /**
     * @param SignatureMethodType $SignatureMethod
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SignedInfoType
     */
    public function setSignatureMethod($SignatureMethod)
    {
      $this->SignatureMethod = $SignatureMethod;
      return $this;
    }

    /**
     * @return ReferenceType
     */
    public function getReference()
    {
      return $this->Reference;
    }

    /**
     * @param ReferenceType $Reference
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SignedInfoType
     */
    public function setReference($Reference)
    {
      $this->Reference = $Reference;
      return $this;
    }

    /**
     * @return ID
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param ID $Id
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SignedInfoType
     */
    public function setId($Id)
    {
      $this->Id = $Id;
      return $this;
    }

}
