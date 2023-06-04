<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class ErrorListCustom2
{

    /**
     * @var Error $Error
     */
    protected $Error = null;

    /**
     * @var string $any
     */
    protected $any = null;

    /**
     * @var severitytype $highestSeverity
     */
    protected $highestSeverity = null;

    /**
     * @var ID $id
     */
    protected $id = null;

    /**
     * @var nonemptystring $version
     */
    protected $version = null;

    /**
     * @param Error $Error
     * @param string $any
     * @param severitytype $highestSeverity
     * @param ID $id
     * @param nonemptystring $version
     */
    public function __construct($Error = null, $any = null, $highestSeverity = null, $id = null, $version = null)
    {
      $this->Error = $Error;
      $this->any = $any;
      $this->highestSeverity = $highestSeverity;
      $this->id = $id;
      $this->version = $version;
    }

    /**
     * @return Error
     */
    public function getError()
    {
      return $this->Error;
    }

    /**
     * @param Error $Error
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ErrorListCustom2
     */
    public function setError($Error)
    {
      $this->Error = $Error;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ErrorListCustom2
     */
    public function setAny($any)
    {
      $this->any = $any;
      return $this;
    }

    /**
     * @return severitytype
     */
    public function getHighestSeverity()
    {
      return $this->highestSeverity;
    }

    /**
     * @param severitytype $highestSeverity
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ErrorListCustom2
     */
    public function setHighestSeverity($highestSeverity)
    {
      $this->highestSeverity = $highestSeverity;
      return $this;
    }

    /**
     * @return ID
     */
    public function getId()
    {
      return $this->id;
    }

    /**
     * @param ID $id
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ErrorListCustom2
     */
    public function setId($id)
    {
      $this->id = $id;
      return $this;
    }

    /**
     * @return nonemptystring
     */
    public function getVersion()
    {
      return $this->version;
    }

    /**
     * @param nonemptystring $version
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ErrorListCustom2
     */
    public function setVersion($version)
    {
      $this->version = $version;
      return $this;
    }

}
