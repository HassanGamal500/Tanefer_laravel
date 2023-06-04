<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class SignatureTypeCustom5
{

    /**
     * @var SignedInfoType $SignedInfo
     */
    protected $SignedInfo = null;

    /**
     * @var SignatureValueType $SignatureValue
     */
    protected $SignatureValue = null;

    /**
     * @var KeyInfoType $KeyInfo
     */
    protected $KeyInfo = null;

    /**
     * @var ObjectType $Object
     */
    protected $Object = null;

    /**
     * @var ID $Id
     */
    protected $Id = null;

    /**
     * @param SignedInfoType $SignedInfo
     * @param SignatureValueType $SignatureValue
     * @param KeyInfoType $KeyInfo
     * @param ObjectType $Object
     * @param ID $Id
     */
    public function __construct($SignedInfo = null, $SignatureValue = null, $KeyInfo = null, $Object = null, $Id = null)
    {
      $this->SignedInfo = $SignedInfo;
      $this->SignatureValue = $SignatureValue;
      $this->KeyInfo = $KeyInfo;
      $this->Object = $Object;
      $this->Id = $Id;
    }

    /**
     * @return SignedInfoType
     */
    public function getSignedInfo()
    {
      return $this->SignedInfo;
    }

    /**
     * @param SignedInfoType $SignedInfo
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SignatureTypeCustom5
     */
    public function setSignedInfo($SignedInfo)
    {
      $this->SignedInfo = $SignedInfo;
      return $this;
    }

    /**
     * @return SignatureValueType
     */
    public function getSignatureValue()
    {
      return $this->SignatureValue;
    }

    /**
     * @param SignatureValueType $SignatureValue
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SignatureTypeCustom5
     */
    public function setSignatureValue($SignatureValue)
    {
      $this->SignatureValue = $SignatureValue;
      return $this;
    }

    /**
     * @return KeyInfoType
     */
    public function getKeyInfo()
    {
      return $this->KeyInfo;
    }

    /**
     * @param KeyInfoType $KeyInfo
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SignatureTypeCustom5
     */
    public function setKeyInfo($KeyInfo)
    {
      $this->KeyInfo = $KeyInfo;
      return $this;
    }

    /**
     * @return ObjectType
     */
    public function getObject()
    {
      return $this->Object;
    }

    /**
     * @param ObjectType $Object
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SignatureTypeCustom5
     */
    public function setObject($Object)
    {
      $this->Object = $Object;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SignatureTypeCustom5
     */
    public function setId($Id)
    {
      $this->Id = $Id;
      return $this;
    }

}
