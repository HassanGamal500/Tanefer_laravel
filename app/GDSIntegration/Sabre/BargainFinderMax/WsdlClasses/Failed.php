<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Failed
{

    /**
     * @var boolean $MinimumConnectTime
     */
    protected $MinimumConnectTime = null;

    /**
     * @param boolean $MinimumConnectTime
     */
    public function __construct($MinimumConnectTime = null)
    {
      $this->MinimumConnectTime = $MinimumConnectTime;
    }

    /**
     * @return boolean
     */
    public function getMinimumConnectTime()
    {
      return $this->MinimumConnectTime;
    }

    /**
     * @param boolean $MinimumConnectTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Failed
     */
    public function setMinimumConnectTime($MinimumConnectTime)
    {
      $this->MinimumConnectTime = $MinimumConnectTime;
      return $this;
    }

}
