<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Offer
{

    /**
     * @var string $OfferId
     */
    protected $OfferId = null;

    /**
     * @var int $TimeToLive
     */
    protected $TimeToLive = null;

    /**
     * @var anonymous590 $Source
     */
    protected $Source = null;

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
     * @param string $OfferId
     * @param int $TimeToLive
     * @param anonymous590 $Source
     * @param string $OfferItemId
     * @param boolean $MandatoryInd
     * @param string $ServiceId
     */
    public function __construct($OfferId = null, $TimeToLive = null, $Source = null, $OfferItemId = null, $MandatoryInd = null, $ServiceId = null)
    {
      $this->OfferId = $OfferId;
      $this->TimeToLive = $TimeToLive;
      $this->Source = $Source;
      $this->OfferItemId = $OfferItemId;
      $this->MandatoryInd = $MandatoryInd;
      $this->ServiceId = $ServiceId;
    }

    /**
     * @return string
     */
    public function getOfferId()
    {
      return $this->OfferId;
    }

    /**
     * @param string $OfferId
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Offer
     */
    public function setOfferId($OfferId)
    {
      $this->OfferId = $OfferId;
      return $this;
    }

    /**
     * @return int
     */
    public function getTimeToLive()
    {
      return $this->TimeToLive;
    }

    /**
     * @param int $TimeToLive
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Offer
     */
    public function setTimeToLive($TimeToLive)
    {
      $this->TimeToLive = $TimeToLive;
      return $this;
    }

    /**
     * @return anonymous590
     */
    public function getSource()
    {
      return $this->Source;
    }

    /**
     * @param anonymous590 $Source
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Offer
     */
    public function setSource($Source)
    {
      $this->Source = $Source;
      return $this;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Offer
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Offer
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Offer
     */
    public function setServiceId($ServiceId)
    {
      $this->ServiceId = $ServiceId;
      return $this;
    }

}
