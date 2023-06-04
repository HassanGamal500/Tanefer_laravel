<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ItineraryCache
{

    /**
     * @var int $PublicTimeToLive
     */
    protected $PublicTimeToLive = null;

    /**
     * @var boolean $RemovePreviousOnUpdate
     */
    protected $RemovePreviousOnUpdate = null;

    /**
     * @param int $PublicTimeToLive
     * @param boolean $RemovePreviousOnUpdate
     */
    public function __construct($PublicTimeToLive = null, $RemovePreviousOnUpdate = null)
    {
      $this->PublicTimeToLive = $PublicTimeToLive;
      $this->RemovePreviousOnUpdate = $RemovePreviousOnUpdate;
    }

    /**
     * @return int
     */
    public function getPublicTimeToLive()
    {
      return $this->PublicTimeToLive;
    }

    /**
     * @param int $PublicTimeToLive
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ItineraryCache
     */
    public function setPublicTimeToLive($PublicTimeToLive)
    {
      $this->PublicTimeToLive = $PublicTimeToLive;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getRemovePreviousOnUpdate()
    {
      return $this->RemovePreviousOnUpdate;
    }

    /**
     * @param boolean $RemovePreviousOnUpdate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ItineraryCache
     */
    public function setRemovePreviousOnUpdate($RemovePreviousOnUpdate)
    {
      $this->RemovePreviousOnUpdate = $RemovePreviousOnUpdate;
      return $this;
    }

}
