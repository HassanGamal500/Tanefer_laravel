<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class StatusRequestCustom4
{

    /**
     * @var nonemptystring $RefToMessageId
     */
    protected $RefToMessageId = null;

    /**
     * @var string $any
     */
    protected $any = null;

    /**
     * @var ID $id
     */
    protected $id = null;

    /**
     * @var nonemptystring $version
     */
    protected $version = null;

    /**
     * @param nonemptystring $RefToMessageId
     * @param string $any
     * @param ID $id
     * @param nonemptystring $version
     */
    public function __construct($RefToMessageId = null, $any = null, $id = null, $version = null)
    {
      $this->RefToMessageId = $RefToMessageId;
      $this->any = $any;
      $this->id = $id;
      $this->version = $version;
    }

    /**
     * @return nonemptystring
     */
    public function getRefToMessageId()
    {
      return $this->RefToMessageId;
    }

    /**
     * @param nonemptystring $RefToMessageId
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\StatusRequestCustom4
     */
    public function setRefToMessageId($RefToMessageId)
    {
      $this->RefToMessageId = $RefToMessageId;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\StatusRequestCustom4
     */
    public function setAny($any)
    {
      $this->any = $any;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\StatusRequestCustom4
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\StatusRequestCustom4
     */
    public function setVersion($version)
    {
      $this->version = $version;
      return $this;
    }

}
