<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class SyncReplyCustom4
{

    /**
     * @var string $any
     */
    protected $any = null;

    /**
     * @var anyURI $actor
     */
    protected $actor = null;

    /**
     * @var ID $id
     */
    protected $id = null;

    /**
     * @var nonemptystring $version
     */
    protected $version = null;

    /**
     * @param string $any
     * @param anyURI $actor
     * @param ID $id
     * @param nonemptystring $version
     */
    public function __construct($any = null, $actor = null, $id = null, $version = null)
    {
      $this->any = $any;
      $this->actor = $actor;
      $this->id = $id;
      $this->version = $version;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SyncReplyCustom4
     */
    public function setAny($any)
    {
      $this->any = $any;
      return $this;
    }

    /**
     * @return anyURI
     */
    public function getActor()
    {
      return $this->actor;
    }

    /**
     * @param anyURI $actor
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SyncReplyCustom4
     */
    public function setActor($actor)
    {
      $this->actor = $actor;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SyncReplyCustom4
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SyncReplyCustom4
     */
    public function setVersion($version)
    {
      $this->version = $version;
      return $this;
    }

}
