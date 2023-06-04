<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AlternatePCCType
{

    /**
     * @var TravelPreferences $TravelPreferences
     */
    protected $TravelPreferences = null;

    /**
     * @var StringLength1to16 $PseudoCityCode
     */
    protected $PseudoCityCode = null;

    /**
     * @param StringLength1to16 $PseudoCityCode
     */
    public function __construct($PseudoCityCode = null)
    {
      $this->PseudoCityCode = $PseudoCityCode;
    }

    /**
     * @return TravelPreferences
     */
    public function getTravelPreferences()
    {
      return $this->TravelPreferences;
    }

    /**
     * @param TravelPreferences $TravelPreferences
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AlternatePCCType
     */
    public function setTravelPreferences($TravelPreferences)
    {
      $this->TravelPreferences = $TravelPreferences;
      return $this;
    }

    /**
     * @return StringLength1to16
     */
    public function getPseudoCityCode()
    {
      return $this->PseudoCityCode;
    }

    /**
     * @param StringLength1to16 $PseudoCityCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AlternatePCCType
     */
    public function setPseudoCityCode($PseudoCityCode)
    {
      $this->PseudoCityCode = $PseudoCityCode;
      return $this;
    }

}
