<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class SignaturePropertyType
{

    /**
     * @var string $any
     */
    protected $any = null;

    /**
     * @var anyURI $Target
     */
    protected $Target = null;

    /**
     * @var ID $Id
     */
    protected $Id = null;

    /**
     * @param string $any
     * @param anyURI $Target
     * @param ID $Id
     */
    public function __construct($any = null, $Target = null, $Id = null)
    {
      $this->any = $any;
      $this->Target = $Target;
      $this->Id = $Id;
    }

    /**
     * @return string
     */
    public function getAny()
    {
      return $this->any;
    }

    /**
     * @param string $any
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SignaturePropertyType
     */
    public function setAny($any)
    {
      $this->any = $any;
      return $this;
    }

    /**
     * @return anyURI
     */
    public function getTarget()
    {
      return $this->Target;
    }

    /**
     * @param anyURI $Target
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SignaturePropertyType
     */
    public function setTarget($Target)
    {
      $this->Target = $Target;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SignaturePropertyType
     */
    public function setId($Id)
    {
      $this->Id = $Id;
      return $this;
    }

}
