<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class CouponOfferType
{

    /**
     * @var UNKNOWN $promo_id
     */
    protected $promo_id = null;

    /**
     * @var UNKNOWN $corp_id
     */
    protected $corp_id = null;

    /**
     * @var UNKNOWN $headline
     */
    protected $headline = null;

    /**
     * @var UNKNOWN $discount_pctg
     */
    protected $discount_pctg = null;

    /**
     * @param UNKNOWN $promo_id
     * @param UNKNOWN $corp_id
     * @param UNKNOWN $headline
     * @param UNKNOWN $discount_pctg
     */
    public function __construct($promo_id = null, $corp_id = null, $headline = null, $discount_pctg = null)
    {
      $this->promo_id = $promo_id;
      $this->corp_id = $corp_id;
      $this->headline = $headline;
      $this->discount_pctg = $discount_pctg;
    }

    /**
     * @return UNKNOWN
     */
    public function getPromo_id()
    {
      return $this->promo_id;
    }

    /**
     * @param UNKNOWN $promo_id
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CouponOfferType
     */
    public function setPromo_id($promo_id)
    {
      $this->promo_id = $promo_id;
      return $this;
    }

    /**
     * @return UNKNOWN
     */
    public function getCorp_id()
    {
      return $this->corp_id;
    }

    /**
     * @param UNKNOWN $corp_id
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CouponOfferType
     */
    public function setCorp_id($corp_id)
    {
      $this->corp_id = $corp_id;
      return $this;
    }

    /**
     * @return UNKNOWN
     */
    public function getHeadline()
    {
      return $this->headline;
    }

    /**
     * @param UNKNOWN $headline
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CouponOfferType
     */
    public function setHeadline($headline)
    {
      $this->headline = $headline;
      return $this;
    }

    /**
     * @return UNKNOWN
     */
    public function getDiscount_pctg()
    {
      return $this->discount_pctg;
    }

    /**
     * @param UNKNOWN $discount_pctg
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CouponOfferType
     */
    public function setDiscount_pctg($discount_pctg)
    {
      $this->discount_pctg = $discount_pctg;
      return $this;
    }

}
