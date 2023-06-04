<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class ReferenceTypeCustom2
{

    /**
     * @var TransformsType $Transforms
     */
    protected $Transforms = null;

    /**
     * @var DigestMethodType $DigestMethod
     */
    protected $DigestMethod = null;

    /**
     * @var DigestValueType $DigestValue
     */
    protected $DigestValue = null;

    /**
     * @var ID $Id
     */
    protected $Id = null;

    /**
     * @var anyURI $URI
     */
    protected $URI = null;

    /**
     * @var anyURI $Type
     */
    protected $Type = null;

    /**
     * @param TransformsType $Transforms
     * @param DigestMethodType $DigestMethod
     * @param DigestValueType $DigestValue
     * @param ID $Id
     * @param anyURI $URI
     * @param anyURI $Type
     */
    public function __construct($Transforms = null, $DigestMethod = null, $DigestValue = null, $Id = null, $URI = null, $Type = null)
    {
      $this->Transforms = $Transforms;
      $this->DigestMethod = $DigestMethod;
      $this->DigestValue = $DigestValue;
      $this->Id = $Id;
      $this->URI = $URI;
      $this->Type = $Type;
    }

    /**
     * @return TransformsType
     */
    public function getTransforms()
    {
      return $this->Transforms;
    }

    /**
     * @param TransformsType $Transforms
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ReferenceTypeCustom2
     */
    public function setTransforms($Transforms)
    {
      $this->Transforms = $Transforms;
      return $this;
    }

    /**
     * @return DigestMethodType
     */
    public function getDigestMethod()
    {
      return $this->DigestMethod;
    }

    /**
     * @param DigestMethodType $DigestMethod
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ReferenceTypeCustom2
     */
    public function setDigestMethod($DigestMethod)
    {
      $this->DigestMethod = $DigestMethod;
      return $this;
    }

    /**
     * @return DigestValueType
     */
    public function getDigestValue()
    {
      return $this->DigestValue;
    }

    /**
     * @param DigestValueType $DigestValue
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ReferenceTypeCustom2
     */
    public function setDigestValue($DigestValue)
    {
      $this->DigestValue = $DigestValue;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ReferenceTypeCustom2
     */
    public function setId($Id)
    {
      $this->Id = $Id;
      return $this;
    }

    /**
     * @return anyURI
     */
    public function getURI()
    {
      return $this->URI;
    }

    /**
     * @param anyURI $URI
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ReferenceTypeCustom2
     */
    public function setURI($URI)
    {
      $this->URI = $URI;
      return $this;
    }

    /**
     * @return anyURI
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param anyURI $Type
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ReferenceTypeCustom2
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

}
