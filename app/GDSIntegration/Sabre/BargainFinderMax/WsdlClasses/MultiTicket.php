<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class MultiTicket
{

    /**
     * @var anonymous105 $DisplayPolicy
     */
    protected $DisplayPolicy = null;

    /**
     * @var int $RequestedOneWays
     */
    protected $RequestedOneWays = null;

    /**
     * @param anonymous105 $DisplayPolicy
     * @param int $RequestedOneWays
     */
    public function __construct($DisplayPolicy = null, $RequestedOneWays = null)
    {
      $this->DisplayPolicy = $DisplayPolicy;
      $this->RequestedOneWays = $RequestedOneWays;
    }

    /**
     * @return anonymous105
     */
    public function getDisplayPolicy()
    {
      return $this->DisplayPolicy;
    }

    /**
     * @param string $DisplayPolicy
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MultiTicket
     */
    public function setDisplayPolicy($DisplayPolicy)
    {
      $this->DisplayPolicy = $DisplayPolicy;
      return $this;
    }

    /**
     * @return int
     */
    public function getRequestedOneWays()
    {
      return $this->RequestedOneWays;
    }

    /**
     * @param int $RequestedOneWays
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MultiTicket
     */
    public function setRequestedOneWays($RequestedOneWays)
    {
      $this->RequestedOneWays = $RequestedOneWays;
      return $this;
    }

}
