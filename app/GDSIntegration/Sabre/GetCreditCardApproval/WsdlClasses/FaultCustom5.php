<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class FaultCustom5
{

    /**
     * @var QName $faultcode
     */
    protected $faultcode = null;

    /**
     * @var string $faultstring
     */
    protected $faultstring = null;

    /**
     * @var anyURI $faultactor
     */
    protected $faultactor = null;

    /**
     * @var detail $detail
     */
    protected $detail = null;

    /**
     * @param QName $faultcode
     * @param string $faultstring
     */
    public function __construct($faultcode = null, $faultstring = null)
    {
      $this->faultcode = $faultcode;
      $this->faultstring = $faultstring;
    }

    /**
     * @return QName
     */
    public function getFaultcode()
    {
      return $this->faultcode;
    }

    /**
     * @param QName $faultcode
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\FaultCustom5
     */
    public function setFaultcode($faultcode)
    {
      $this->faultcode = $faultcode;
      return $this;
    }

    /**
     * @return string
     */
    public function getFaultstring()
    {
      return $this->faultstring;
    }

    /**
     * @param string $faultstring
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\FaultCustom5
     */
    public function setFaultstring($faultstring)
    {
      $this->faultstring = $faultstring;
      return $this;
    }

    /**
     * @return anyURI
     */
    public function getFaultactor()
    {
      return $this->faultactor;
    }

    /**
     * @param anyURI $faultactor
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\FaultCustom5
     */
    public function setFaultactor($faultactor)
    {
      $this->faultactor = $faultactor;
      return $this;
    }

    /**
     * @return detail
     */
    public function getDetail()
    {
      return $this->detail;
    }

    /**
     * @param detail $detail
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\FaultCustom5
     */
    public function setDetail($detail)
    {
      $this->detail = $detail;
      return $this;
    }

}
