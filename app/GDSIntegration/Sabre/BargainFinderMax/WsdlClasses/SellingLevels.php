<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class SellingLevels
{

    /**
     * @var SellingLevelRules $SellingLevelRules
     */
    protected $SellingLevelRules = null;

    /**
     * @var ShowFareAmounts $ShowFareAmounts
     */
    protected $ShowFareAmounts = null;

    /**
     * @param SellingLevelRules $SellingLevelRules
     * @param ShowFareAmounts $ShowFareAmounts
     */
    public function __construct($SellingLevelRules = null, $ShowFareAmounts = null)
    {
      $this->SellingLevelRules = $SellingLevelRules;
      $this->ShowFareAmounts = $ShowFareAmounts;
    }

    /**
     * @return SellingLevelRules
     */
    public function getSellingLevelRules()
    {
      return $this->SellingLevelRules;
    }

    /**
     * @param SellingLevelRules $SellingLevelRules
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SellingLevels
     */
    public function setSellingLevelRules($SellingLevelRules)
    {
      $this->SellingLevelRules = $SellingLevelRules;
      return $this;
    }

    /**
     * @return ShowFareAmounts
     */
    public function getShowFareAmounts()
    {
      return $this->ShowFareAmounts;
    }

    /**
     * @param ShowFareAmounts $ShowFareAmounts
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SellingLevels
     */
    public function setShowFareAmounts($ShowFareAmounts)
    {
      $this->ShowFareAmounts = $ShowFareAmounts;
      return $this;
    }

}
