<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class SignaturePropertiesType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SignaturePropertiesType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SignaturePropertiesType
     */
    public function setId($Id)
    {
      $this->Id = $Id;
      return $this;
    }

}
