<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class X509DataType
{

    /**
     * @var X509IssuerSerialType $X509IssuerSerial
     */
    protected $X509IssuerSerial = null;

    /**
     * @var base64Binary $X509SKI
     */
    protected $X509SKI = null;

    /**
     * @var string $X509SubjectName
     */
    protected $X509SubjectName = null;

    /**
     * @var base64Binary $X509Certificate
     */
    protected $X509Certificate = null;

    /**
     * @var base64Binary $X509CRL
     */
    protected $X509CRL = null;

    /**
     * @var string $any
     */
    protected $any = null;

    /**
     * @param X509IssuerSerialType $X509IssuerSerial
     * @param base64Binary $X509SKI
     * @param string $X509SubjectName
     * @param base64Binary $X509Certificate
     * @param base64Binary $X509CRL
     * @param string $any
     */
    public function __construct($X509IssuerSerial = null, $X509SKI = null, $X509SubjectName = null, $X509Certificate = null, $X509CRL = null, $any = null)
    {
      $this->X509IssuerSerial = $X509IssuerSerial;
      $this->X509SKI = $X509SKI;
      $this->X509SubjectName = $X509SubjectName;
      $this->X509Certificate = $X509Certificate;
      $this->X509CRL = $X509CRL;
      $this->any = $any;
    }

    /**
     * @return X509IssuerSerialType
     */
    public function getX509IssuerSerial()
    {
      return $this->X509IssuerSerial;
    }

    /**
     * @param X509IssuerSerialType $X509IssuerSerial
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\X509DataType
     */
    public function setX509IssuerSerial($X509IssuerSerial)
    {
      $this->X509IssuerSerial = $X509IssuerSerial;
      return $this;
    }

    /**
     * @return base64Binary
     */
    public function getX509SKI()
    {
      return $this->X509SKI;
    }

    /**
     * @param base64Binary $X509SKI
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\X509DataType
     */
    public function setX509SKI($X509SKI)
    {
      $this->X509SKI = $X509SKI;
      return $this;
    }

    /**
     * @return string
     */
    public function getX509SubjectName()
    {
      return $this->X509SubjectName;
    }

    /**
     * @param string $X509SubjectName
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\X509DataType
     */
    public function setX509SubjectName($X509SubjectName)
    {
      $this->X509SubjectName = $X509SubjectName;
      return $this;
    }

    /**
     * @return base64Binary
     */
    public function getX509Certificate()
    {
      return $this->X509Certificate;
    }

    /**
     * @param base64Binary $X509Certificate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\X509DataType
     */
    public function setX509Certificate($X509Certificate)
    {
      $this->X509Certificate = $X509Certificate;
      return $this;
    }

    /**
     * @return base64Binary
     */
    public function getX509CRL()
    {
      return $this->X509CRL;
    }

    /**
     * @param base64Binary $X509CRL
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\X509DataType
     */
    public function setX509CRL($X509CRL)
    {
      $this->X509CRL = $X509CRL;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\X509DataType
     */
    public function setAny($any)
    {
      $this->any = $any;
      return $this;
    }

}
