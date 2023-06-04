<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class TransformTypeCustom2
{

    /**
     * @var string $any
     */
    protected $any = null;

    /**
     * @var string $XPath
     */
    protected $XPath = null;

    /**
     * @var anyURI $Algorithm
     */
    protected $Algorithm = null;

    /**
     * @param string $any
     * @param string $XPath
     * @param anyURI $Algorithm
     */
    public function __construct($any = null, $XPath = null, $Algorithm = null)
    {
      $this->any = $any;
      $this->XPath = $XPath;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\TransformTypeCustom2
     */
    public function setAny($any)
    {
      $this->any = $any;
      return $this;
    }

    /**
     * @return string
     */
    public function getXPath()
    {
      return $this->XPath;
    }

    /**
     * @param string $XPath
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\TransformTypeCustom2
     */
    public function setXPath($XPath)
    {
      $this->XPath = $XPath;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\TransformTypeCustom2
     */
    public function setAlgorithm($Algorithm)
    {
      $this->Algorithm = $Algorithm;
      return $this;
    }

}
