<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FrequentFlyer
{

    /**
     * @var int $Tier
     */
    protected $Tier = null;

    /**
     * @var CarrierCode $Carrier
     */
    protected $Carrier = null;

    /**
     * @param int $Tier
     * @param CarrierCode $Carrier
     */
    public function __construct($Tier = null, $Carrier = null)
    {
      $this->Tier = $Tier;
      $this->Carrier = $Carrier;
    }

    /**
     * @return int
     */
    public function getTier()
    {
      return $this->Tier;
    }

    /**
     * @param int $Tier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FrequentFlyer
     */
    public function setTier($Tier)
    {
      $this->Tier = $Tier;
      return $this;
    }

    /**
     * @return CarrierCode
     */
    public function getCarrier()
    {
      return $this->Carrier;
    }

    /**
     * @param CarrierCode $Carrier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FrequentFlyer
     */
    public function setCarrier($Carrier)
    {
      $this->Carrier = $Carrier;
      return $this;
    }

}
