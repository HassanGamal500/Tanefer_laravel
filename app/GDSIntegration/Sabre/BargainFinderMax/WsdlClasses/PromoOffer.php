<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PromoOffer
{

    /**
     * @var string $PromoID
     */
    protected $PromoID = null;

    /**
     * @var string $CorpID
     */
    protected $CorpID = null;

    /**
     * @var string $ContentID
     */
    protected $ContentID = null;

    /**
     * @param string $PromoID
     * @param string $CorpID
     * @param string $ContentID
     */
    public function __construct($PromoID = null, $CorpID = null, $ContentID = null)
    {
      $this->PromoID = $PromoID;
      $this->CorpID = $CorpID;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PromoOffer
     */
    public function setPromoID($PromoID)
    {
      $this->PromoID = $PromoID;
      return $this;
    }

    /**
     * @return string
     */
    public function getCorpID()
    {
      return $this->CorpID;
    }

    /**
     * @param string $CorpID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PromoOffer
     */
    public function setCorpID($CorpID)
    {
      $this->CorpID = $CorpID;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PromoOffer
     */
    public function setContentID($ContentID)
    {
      $this->ContentID = $ContentID;
      return $this;
    }

}
