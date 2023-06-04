<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PromoRedemption
{

    /**
     * @var string $PromoID
     */
    protected $PromoID = null;

    /**
     * @var boolean $Eligible
     */
    protected $Eligible = null;

    /**
     * @var string $ContentID
     */
    protected $ContentID = null;

    /**
     * @param string $PromoID
     * @param boolean $Eligible
     * @param string $ContentID
     */
    public function __construct($PromoID = null, $Eligible = null, $ContentID = null)
    {
      $this->PromoID = $PromoID;
      $this->Eligible = $Eligible;
      $this->ContentID = $ContentID;
    }

    /**
     * @return string
     */
    public function getPromoID()
    {
      return $this->PromoID;
    }

    /**
     * @param string $PromoID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PromoRedemption
     */
    public function setPromoID($PromoID)
    {
      $this->PromoID = $PromoID;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getEligible()
    {
      return $this->Eligible;
    }

    /**
     * @param boolean $Eligible
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PromoRedemption
     */
    public function setEligible($Eligible)
    {
      $this->Eligible = $Eligible;
      return $this;
    }

    /**
     * @return string
     */
    public function getContentID()
    {
      return $this->ContentID;
    }

    /**
     * @param string $ContentID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PromoRedemption
     */
    public function setContentID($ContentID)
    {
      $this->ContentID = $ContentID;
      return $this;
    }

}
