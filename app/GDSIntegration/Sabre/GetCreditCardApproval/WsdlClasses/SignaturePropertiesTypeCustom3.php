<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class SignaturePropertiesTypeCustom3
{

    /**
     * @var SignaturePropertyType $SignatureProperty
     */
    protected $SignatureProperty = null;

    /**
     * @var ID $Id
     */
    protected $Id = null;

    /**
     * @param SignaturePropertyType $SignatureProperty
     * @param ID $Id
     */
    public function __construct($SignatureProperty = null, $Id = null)
    {
      $this->SignatureProperty = $SignatureProperty;
      $this->Id = $Id;
    }

    /**
     * @return SignaturePropertyType
     */
    public function getSignatureProperty()
    {
      return $this->SignatureProperty;
    }

    /**
     * @param SignaturePropertyType $SignatureProperty
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SignaturePropertiesTypeCustom3
     */
    public function setSignatureProperty($SignatureProperty)
    {
      $this->SignatureProperty = $SignatureProperty;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SignaturePropertiesTypeCustom3
     */
    public function setId($Id)
    {
      $this->Id = $Id;
      return $this;
    }

}
