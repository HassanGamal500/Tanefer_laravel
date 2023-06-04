<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class MessageOrderCustom5
{

    /**
     * @var sequenceNumbertype $SequenceNumber
     */
    protected $SequenceNumber = null;

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
     * @param sequenceNumbertype $SequenceNumber
     * @param string $any
     * @param ID $id
     * @param nonemptystring $version
     */
    public function __construct($SequenceNumber = null, $any = null, $id = null, $version = null)
    {
      $this->SequenceNumber = $SequenceNumber;
      $this->any = $any;
      $this->id = $id;
      $this->version = $version;
    }

    /**
     * @return sequenceNumbertype
     */
    public function getSequenceNumber()
    {
      return $this->SequenceNumber;
    }

    /**
     * @param sequenceNumbertype $SequenceNumber
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\MessageOrderCustom5
     */
    public function setSequenceNumber($SequenceNumber)
    {
      $this->SequenceNumber = $SequenceNumber;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\MessageOrderCustom5
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\MessageOrderCustom5
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\MessageOrderCustom5
     */
    public function setVersion($version)
    {
      $this->version = $version;
      return $this;
    }

}
