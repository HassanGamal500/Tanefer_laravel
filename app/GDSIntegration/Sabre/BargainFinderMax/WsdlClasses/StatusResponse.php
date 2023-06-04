<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class StatusResponse
{

    /**
     * @var nonemptystring $RefToMessageId
     */
    protected $RefToMessageId = null;

    /**
     * @var string $Timestamp
     */
    protected $Timestamp = null;

    /**
     * @var string $any
     */
    protected $any = null;

    /**
     * @var messageStatustype $messageStatus
     */
    protected $messageStatus = null;

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
     * @param string $Timestamp
     * @param string $any
     * @param messageStatustype $messageStatus
     * @param ID $id
     * @param nonemptystring $version
     */
    public function __construct($RefToMessageId = null, $Timestamp = null, $any = null, $messageStatus = null, $id = null, $version = null)
    {
      $this->RefToMessageId = $RefToMessageId;
      $this->Timestamp = $Timestamp;
      $this->any = $any;
      $this->messageStatus = $messageStatus;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StatusResponse
     */
    public function setRefToMessageId($RefToMessageId)
    {
      $this->RefToMessageId = $RefToMessageId;
      return $this;
    }

    /**
     * @return string
     */
    public function getTimestamp()
    {
      return $this->Timestamp;
    }

    /**
     * @param string $Timestamp
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StatusResponse
     */
    public function setTimestamp($Timestamp)
    {
      $this->Timestamp = $Timestamp;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StatusResponse
     */
    public function setAny($any)
    {
      $this->any = $any;
      return $this;
    }

    /**
     * @return messageStatustype
     */
    public function getMessageStatus()
    {
      return $this->messageStatus;
    }

    /**
     * @param messageStatustype $messageStatus
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StatusResponse
     */
    public function setMessageStatus($messageStatus)
    {
      $this->messageStatus = $messageStatus;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StatusResponse
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StatusResponse
     */
    public function setVersion($version)
    {
      $this->version = $version;
      return $this;
    }

}
