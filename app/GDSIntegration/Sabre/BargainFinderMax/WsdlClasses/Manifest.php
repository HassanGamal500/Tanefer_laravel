<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Manifest
{

    /**
     * @var Reference $Reference
     */
    protected $Reference = null;

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
     * @param Reference $Reference
     * @param string $any
     * @param ID $id
     * @param nonemptystring $version
     */
    public function __construct($Reference = null, $any = null, $id = null, $version = null)
    {
      $this->Reference = $Reference;
      $this->any = $any;
      $this->id = $id;
      $this->version = $version;
    }

    /**
     * @return Reference
     */
    public function getReference()
    {
      return $this->Reference;
    }

    /**
     * @param Reference $Reference
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Manifest
     */
    public function setReference($Reference)
    {
      $this->Reference = $Reference;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Manifest
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Manifest
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Manifest
     */
    public function setVersion($version)
    {
      $this->version = $version;
      return $this;
    }

}
