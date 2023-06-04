<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ConnectionTime
{

    /**
     * @var int $Min
     */
    protected $Min = null;

    /**
     * @var int $Max
     */
    protected $Max = null;

    /**
     * @var TimeWindowBoundaryType $ExcludedConnectionBegin
     */
    protected $ExcludedConnectionBegin = null;

    /**
     * @var TimeWindowBoundaryType $ExcludedConnectionEnd
     */
    protected $ExcludedConnectionEnd = null;

    /**
     * @var boolean $EnableExcludedConnection
     */
    protected $EnableExcludedConnection = null;

    /**
     * @param int $Min
     * @param int $Max
     * @param TimeWindowBoundaryType $ExcludedConnectionBegin
     * @param TimeWindowBoundaryType $ExcludedConnectionEnd
     * @param boolean $EnableExcludedConnection
     */
    public function __construct($Min = null, $Max = null, $ExcludedConnectionBegin = null, $ExcludedConnectionEnd = null, $EnableExcludedConnection = null)
    {
      $this->Min = $Min;
      $this->Max = $Max;
      $this->ExcludedConnectionBegin = $ExcludedConnectionBegin;
      $this->ExcludedConnectionEnd = $ExcludedConnectionEnd;
      $this->EnableExcludedConnection = $EnableExcludedConnection;
    }

    /**
     * @return int
     */
    public function getMin()
    {
      return $this->Min;
    }

    /**
     * @param int $Min
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ConnectionTime
     */
    public function setMin($Min)
    {
      $this->Min = $Min;
      return $this;
    }

    /**
     * @return int
     */
    public function getMax()
    {
      return $this->Max;
    }

    /**
     * @param int $Max
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ConnectionTime
     */
    public function setMax($Max)
    {
      $this->Max = $Max;
      return $this;
    }

    /**
     * @return TimeWindowBoundaryType
     */
    public function getExcludedConnectionBegin()
    {
      return $this->ExcludedConnectionBegin;
    }

    /**
     * @param TimeWindowBoundaryType $ExcludedConnectionBegin
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ConnectionTime
     */
    public function setExcludedConnectionBegin($ExcludedConnectionBegin)
    {
      $this->ExcludedConnectionBegin = $ExcludedConnectionBegin;
      return $this;
    }

    /**
     * @return TimeWindowBoundaryType
     */
    public function getExcludedConnectionEnd()
    {
      return $this->ExcludedConnectionEnd;
    }

    /**
     * @param TimeWindowBoundaryType $ExcludedConnectionEnd
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ConnectionTime
     */
    public function setExcludedConnectionEnd($ExcludedConnectionEnd)
    {
      $this->ExcludedConnectionEnd = $ExcludedConnectionEnd;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getEnableExcludedConnection()
    {
      return $this->EnableExcludedConnection;
    }

    /**
     * @param boolean $EnableExcludedConnection
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ConnectionTime
     */
    public function setEnableExcludedConnection($EnableExcludedConnection)
    {
      $this->EnableExcludedConnection = $EnableExcludedConnection;
      return $this;
    }

}
