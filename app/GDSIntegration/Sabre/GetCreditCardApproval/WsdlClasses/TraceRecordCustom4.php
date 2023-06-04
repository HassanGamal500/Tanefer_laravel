<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class TraceRecordCustom4
{

    /**
     * @var Identifier $_
     */
    protected $_ = null;

    /**
     * @var TextLong $key
     */
    protected $key = null;

    /**
     * @var \DateTime $start
     */
    protected $start = null;

    /**
     * @var \DateTime $end
     */
    protected $end = null;

    /**
     * @var Identifier $appInstance
     */
    protected $appInstance = null;

    /**
     * @var Identifier $cluster
     */
    protected $cluster = null;

    /**
     * @var Identifier $host
     */
    protected $host = null;

    /**
     * @var anyURI $targetURI
     */
    protected $targetURI = null;

    /**
     * @var TraceRole $role
     */
    protected $role = null;

    /**
     * @param Identifier $_
     * @param TextLong $key
     * @param \DateTime $start
     * @param \DateTime $end
     * @param Identifier $appInstance
     * @param Identifier $cluster
     * @param Identifier $host
     * @param anyURI $targetURI
     * @param TraceRole $role
     */
    public function __construct($_ = null, $key = null, \DateTime $start = null, \DateTime $end = null, $appInstance = null, $cluster = null, $host = null, $targetURI = null, $role = null)
    {
      $this->_ = $_;
      $this->key = $key;
      $this->start = $start ? $start->format(\DateTime::ATOM) : null;
      $this->end = $end ? $end->format(\DateTime::ATOM) : null;
      $this->appInstance = $appInstance;
      $this->cluster = $cluster;
      $this->host = $host;
      $this->targetURI = $targetURI;
      $this->role = $role;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\TraceRecordCustom4
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return TextLong
     */
    public function getKey()
    {
      return $this->key;
    }

    /**
     * @param TextLong $key
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\TraceRecordCustom4
     */
    public function setKey($key)
    {
      $this->key = $key;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStart()
    {
      if ($this->start == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->start);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $start
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\TraceRecordCustom4
     */
    public function setStart(\DateTime $start)
    {
      $this->start = $start->format(\DateTime::ATOM);
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEnd()
    {
      if ($this->end == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->end);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $end
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\TraceRecordCustom4
     */
    public function setEnd(\DateTime $end)
    {
      $this->end = $end->format(\DateTime::ATOM);
      return $this;
    }

    /**
     * @return Identifier
     */
    public function getAppInstance()
    {
      return $this->appInstance;
    }

    /**
     * @param Identifier $appInstance
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\TraceRecordCustom4
     */
    public function setAppInstance($appInstance)
    {
      $this->appInstance = $appInstance;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\TraceRecordCustom4
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\TraceRecordCustom4
     */
    public function setHost($host)
    {
      $this->host = $host;
      return $this;
    }

    /**
     * @return anyURI
     */
    public function getTargetURI()
    {
      return $this->targetURI;
    }

    /**
     * @param anyURI $targetURI
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\TraceRecordCustom4
     */
    public function setTargetURI($targetURI)
    {
      $this->targetURI = $targetURI;
      return $this;
    }

    /**
     * @return TraceRole
     */
    public function getRole()
    {
      return $this->role;
    }

    /**
     * @param TraceRole $role
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\TraceRecordCustom4
     */
    public function setRole($role)
    {
      $this->role = $role;
      return $this;
    }

}
