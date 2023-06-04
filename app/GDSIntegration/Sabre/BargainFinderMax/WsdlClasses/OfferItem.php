<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class OfferItem
{

    /**
     * @var string $OfferItemId
     */
    protected $OfferItemId = null;

    /**
     * @var boolean $MandatoryInd
     */
    protected $MandatoryInd = null;

    /**
     * @var string $ServiceId
     */
    protected $ServiceId = null;

    /**
     * @param string $OfferItemId
     * @param boolean $MandatoryInd
     * @param string $ServiceId
     */
    public function __construct($OfferItemId = null, $MandatoryInd = null, $ServiceId = null)
    {
      $this->OfferItemId = $OfferItemId;
      $this->MandatoryInd = $MandatoryInd;
      $this->ServiceId = $ServiceId;
    }

    /**
     * @return string
     */
    public function getOfferItemId()
    {
      return $this->OfferItemId;
    }

    /**
     * @param string $OfferItemId
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OfferItem
     */
    public function setOfferItemId($OfferItemId)
    {
      $this->OfferItemId = $OfferItemId;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getMandatoryInd()
    {
      return $this->MandatoryInd;
    }

    /**
     * @param boolean $MandatoryInd
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OfferItem
     */
    public function setMandatoryInd($MandatoryInd)
    {
      $this->MandatoryInd = $MandatoryInd;
      return $this;
    }

    /**
     * @return string
     */
    public function getServiceId()
    {
      return $this->ServiceId;
    }

    /**
     * @param string $ServiceId
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OfferItem
     */
    public function setServiceId($ServiceId)
    {
      $this->ServiceId = $ServiceId;
      return $this;
    }

}
