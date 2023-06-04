<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class IdentifierSystem
{

    /**
     * @var Identifier $_
     */
    protected $_ = null;

    /**
     * @var Identifier $instance
     */
    protected $instance = null;

    /**
     * @var Identifier $cluster
     */
    protected $cluster = null;

    /**
     * @var Identifier $host
     */
    protected $host = null;

    /**
     * @var Identifier $uri
     */
    protected $uri = null;

    /**
     * @param Identifier $_
     * @param Identifier $instance
     * @param Identifier $cluster
     * @param Identifier $host
     * @param Identifier $uri
     */
    public function __construct($_ = null, $instance = null, $cluster = null, $host = null, $uri = null)
    {
      $this->_ = $_;
      $this->instance = $instance;
      $this->cluster = $cluster;
      $this->host = $host;
      $this->uri = $uri;
    }

    /**
     * @return Identifier
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param Identifier $_
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\IdentifierSystem
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return Identifier
     */
    public function getInstance()
    {
      return $this->instance;
    }

    /**
     * @param Identifier $instance
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\IdentifierSystem
     */
    public function setInstance($instance)
    {
      $this->instance = $instance;
      return $this;
    }

    /**
     * @return Identifier
     */
    public function getCluster()
    {
      return $this->cluster;
    }

    /**
     * @param Identifier $cluster
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\IdentifierSystem
     */
    public function setCluster($cluster)
    {
      $this->cluster = $cluster;
      return $this;
    }

    /**
     * @return Identifier
     */
    public function getHost()
    {
      return $this->host;
    }

    /**
     * @param Identifier $host
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\IdentifierSystem
     */
    public function setHost($host)
    {
      $this->host = $host;
      return $this;
    }

    /**
     * @return Identifier
     */
    public function getUri()
    {
      return $this->uri;
    }

    /**
     * @param Identifier $uri
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\IdentifierSystem
     */
    public function setUri($uri)
    {
      $this->uri = $uri;
      return $this;
    }

}
