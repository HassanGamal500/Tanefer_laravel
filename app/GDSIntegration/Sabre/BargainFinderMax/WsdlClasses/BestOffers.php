<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class BestOffers
{

    /**
     * @var Config $Config
     */
    protected $Config = null;

    /**
     * @var boolean $Active
     */
    protected $Active = null;

    /**
     * @param Config $Config
     * @param boolean $Active
     */
    public function __construct($Config = null, $Active = null)
    {
      $this->Config = $Config;
      $this->Active = $Active;
    }

    /**
     * @return Config
     */
    public function getConfig()
    {
      return $this->Config;
    }

    /**
     * @param Config $Config
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BestOffers
     */
    public function setConfig($Config)
    {
      $this->Config = $Config;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getActive()
    {
      return $this->Active;
    }

    /**
     * @param boolean $Active
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BestOffers
     */
    public function setActive($Active)
    {
      $this->Active = $Active;
      return $this;
    }

}
