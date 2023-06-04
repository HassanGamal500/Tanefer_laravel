<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class Envelope
{

    /**
     * @var Header $Header
     */
    protected $Header = null;

    /**
     * @var Body $Body
     */
    protected $Body = null;

    /**
     * @var string $any
     */
    protected $any = null;

    /**
     * @param Header $Header
     * @param Body $Body
     * @param string $any
     */
    public function __construct($Header = null, $Body = null, $any = null)
    {
      $this->Header = $Header;
      $this->Body = $Body;
      $this->any = $any;
    }

    /**
     * @return Header
     */
    public function getHeader()
    {
      return $this->Header;
    }

    /**
     * @param Header $Header
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\Envelope
     */
    public function setHeader($Header)
    {
      $this->Header = $Header;
      return $this;
    }

    /**
     * @return Body
     */
    public function getBody()
    {
      return $this->Body;
    }

    /**
     * @param Body $Body
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\Envelope
     */
    public function setBody($Body)
    {
      $this->Body = $Body;
      return $this;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\Envelope
     */
    public function setAny($any)
    {
      $this->any = $any;
      return $this;
    }

}
