<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ConnectionOrientedResponse
{

    /**
     * @var boolean $Enabled
     */
    protected $Enabled = null;

    /**
     * @var boolean $ItineraryPrices
     */
    protected $ItineraryPrices = null;

    /**
     * @var boolean $AllLegs
     */
    protected $AllLegs = null;

    /**
     * @param boolean $Enabled
     * @param boolean $ItineraryPrices
     * @param boolean $AllLegs
     */
    public function __construct($Enabled = null, $ItineraryPrices = null, $AllLegs = null)
    {
      $this->Enabled = $Enabled;
      $this->ItineraryPrices = $ItineraryPrices;
      $this->AllLegs = $AllLegs;
    }

    /**
     * @return boolean
     */
    public function getEnabled()
    {
      return $this->Enabled;
    }

    /**
     * @param boolean $Enabled
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ConnectionOrientedResponse
     */
    public function setEnabled($Enabled)
    {
      $this->Enabled = $Enabled;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getItineraryPrices()
    {
      return $this->ItineraryPrices;
    }

    /**
     * @param boolean $ItineraryPrices
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ConnectionOrientedResponse
     */
    public function setItineraryPrices($ItineraryPrices)
    {
      $this->ItineraryPrices = $ItineraryPrices;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getAllLegs()
    {
      return $this->AllLegs;
    }

    /**
     * @param boolean $AllLegs
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ConnectionOrientedResponse
     */
    public function setAllLegs($AllLegs)
    {
      $this->AllLegs = $AllLegs;
      return $this;
    }

}
