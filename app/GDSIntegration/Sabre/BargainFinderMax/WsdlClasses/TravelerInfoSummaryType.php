<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TravelerInfoSummaryType
{

    /**
     * @var nonNegativeInteger[] $SeatsRequested
     */
    protected $SeatsRequested = null;

    /**
     * @var TravelerInformationType[] $AirTravelerAvail
     */
    protected $AirTravelerAvail = null;

    /**
     * @var PriceRequestInformationType $PriceRequestInformation
     */
    protected $PriceRequestInformation = null;

    /**
     * @var TravelerInfoSummary_TPA_ExtensionsType $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @var boolean $SpecificPTC_Indicator
     */
    protected $SpecificPTC_Indicator = null;

    /**
     * @param boolean $SpecificPTC_Indicator
     */
    public function __construct($SpecificPTC_Indicator = null)
    {
      $this->SpecificPTC_Indicator = $SpecificPTC_Indicator;
    }

    /**
     * @return nonNegativeInteger[]
     */
    public function getSeatsRequested()
    {
      return $this->SeatsRequested;
    }

    /**
     * @param int[] $SeatsRequested
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelerInfoSummaryType
     */
    public function setSeatsRequested(array $SeatsRequested = null)
    {
      $this->SeatsRequested = $SeatsRequested;
      return $this;
    }

    /**
     * @return TravelerInformationType[]
     */
    public function getAirTravelerAvail()
    {
      return $this->AirTravelerAvail;
    }

    /**
     * @param TravelerInformationType[] $AirTravelerAvail
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelerInfoSummaryType
     */
    public function setAirTravelerAvail(array $AirTravelerAvail = null)
    {
      $this->AirTravelerAvail = $AirTravelerAvail;
      return $this;
    }

    /**
     * @return PriceRequestInformationType
     */
    public function getPriceRequestInformation()
    {
      return $this->PriceRequestInformation;
    }

    /**
     * @param PriceRequestInformationType $PriceRequestInformation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelerInfoSummaryType
     */
    public function setPriceRequestInformation($PriceRequestInformation)
    {
      $this->PriceRequestInformation = $PriceRequestInformation;
      return $this;
    }

    /**
     * @return TravelerInfoSummary_TPA_ExtensionsType
     */
    public function getTPA_Extensions()
    {
      return $this->TPA_Extensions;
    }

    /**
     * @param TravelerInfoSummary_TPA_ExtensionsType $TPA_Extensions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelerInfoSummaryType
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getSpecificPTC_Indicator()
    {
      return $this->SpecificPTC_Indicator;
    }

    /**
     * @param boolean $SpecificPTC_Indicator
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelerInfoSummaryType
     */
    public function setSpecificPTC_Indicator($SpecificPTC_Indicator)
    {
      $this->SpecificPTC_Indicator = $SpecificPTC_Indicator;
      return $this;
    }

}
