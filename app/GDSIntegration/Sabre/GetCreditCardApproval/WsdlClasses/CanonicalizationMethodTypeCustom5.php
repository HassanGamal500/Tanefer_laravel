<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class CanonicalizationMethodTypeCustom5
{

    /**
     * @var string $any
     */
    protected $any = null;

    /**
     * @var anyURI $Algorithm
     */
    protected $Algorithm = null;

    /**
     * @param string $any
     * @param anyURI $Algorithm
     */
    public function __construct($any = null, $Algorithm = null)
    {
      $this->any = $any;
      $this->Algorithm = $Algorithm;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CanonicalizationMethodTypeCustom5
     */
    public function setAny($any)
    {
      $this->any = $any;
      return $this;
    }

    /**
     * @return anyURI
     */
    public function getAlgorithm()
    {
      return $this->Algorithm;
    }

    /**
     * @param anyURI $Algorithm
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CanonicalizationMethodTypeCustom5
     */
    public function setAlgorithm($Algorithm)
    {
      $this->Algorithm = $Algorithm;
      return $this;
    }

}
