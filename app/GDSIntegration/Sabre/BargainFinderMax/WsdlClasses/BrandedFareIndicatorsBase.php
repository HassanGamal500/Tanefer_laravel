<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class BrandedFareIndicatorsBase
{

    /**
     * @var BrandFiltersType $BrandFilters
     */
    protected $BrandFilters = null;

    /**
     * @var boolean $SingleBrandedFare
     */
    protected $SingleBrandedFare = null;

    /**
     * @var anonymous286 $ParityModeForLowest
     */
    protected $ParityModeForLowest = null;

    /**
     * @var boolean $MultipleBrandedFares
     */
    protected $MultipleBrandedFares = null;

    /**
     * @var anonymous287 $UpsellLimit
     */
    protected $UpsellLimit = null;

    /**
     * @var boolean $ItinParityBrandlessLeg
     */
    protected $ItinParityBrandlessLeg = null;

    /**
     * @var anonymous288 $ParityMode
     */
    protected $ParityMode = null;

    /**
     * @var anonymous289 $ItinParityFallbackMode
     */
    protected $ItinParityFallbackMode = null;

    /**
     * @param boolean $SingleBrandedFare
     * @param anonymous286 $ParityModeForLowest
     * @param boolean $MultipleBrandedFares
     * @param anonymous287 $UpsellLimit
     * @param boolean $ItinParityBrandlessLeg
     * @param anonymous288 $ParityMode
     * @param anonymous289 $ItinParityFallbackMode
     */
    public function __construct($SingleBrandedFare = null, $ParityModeForLowest = null, $MultipleBrandedFares = null, $UpsellLimit = null, $ItinParityBrandlessLeg = null, $ParityMode = null, $ItinParityFallbackMode = null)
    {
      $this->SingleBrandedFare = $SingleBrandedFare;
      $this->ParityModeForLowest = $ParityModeForLowest;
      $this->MultipleBrandedFares = $MultipleBrandedFares;
      $this->UpsellLimit = $UpsellLimit;
      $this->ItinParityBrandlessLeg = $ItinParityBrandlessLeg;
      $this->ParityMode = $ParityMode;
      $this->ItinParityFallbackMode = $ItinParityFallbackMode;
    }

    /**
     * @return BrandFiltersType
     */
    public function getBrandFilters()
    {
      return $this->BrandFilters;
    }

    /**
     * @param BrandFiltersType $BrandFilters
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandedFareIndicatorsBase
     */
    public function setBrandFilters($BrandFilters)
    {
      $this->BrandFilters = $BrandFilters;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getSingleBrandedFare()
    {
      return $this->SingleBrandedFare;
    }

    /**
     * @param boolean $SingleBrandedFare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandedFareIndicatorsBase
     */
    public function setSingleBrandedFare($SingleBrandedFare)
    {
      $this->SingleBrandedFare = $SingleBrandedFare;
      return $this;
    }

    /**
     * @return anonymous286
     */
    public function getParityModeForLowest()
    {
      return $this->ParityModeForLowest;
    }

    /**
     * @param anonymous286 $ParityModeForLowest
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandedFareIndicatorsBase
     */
    public function setParityModeForLowest($ParityModeForLowest)
    {
      $this->ParityModeForLowest = $ParityModeForLowest;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getMultipleBrandedFares()
    {
      return $this->MultipleBrandedFares;
    }

    /**
     * @param boolean $MultipleBrandedFares
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandedFareIndicatorsBase
     */
    public function setMultipleBrandedFares($MultipleBrandedFares)
    {
      $this->MultipleBrandedFares = $MultipleBrandedFares;
      return $this;
    }

    /**
     * @return anonymous287
     */
    public function getUpsellLimit()
    {
      return $this->UpsellLimit;
    }

    /**
     * @param anonymous287 $UpsellLimit
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandedFareIndicatorsBase
     */
    public function setUpsellLimit($UpsellLimit)
    {
      $this->UpsellLimit = $UpsellLimit;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getItinParityBrandlessLeg()
    {
      return $this->ItinParityBrandlessLeg;
    }

    /**
     * @param boolean $ItinParityBrandlessLeg
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandedFareIndicatorsBase
     */
    public function setItinParityBrandlessLeg($ItinParityBrandlessLeg)
    {
      $this->ItinParityBrandlessLeg = $ItinParityBrandlessLeg;
      return $this;
    }

    /**
     * @return anonymous288
     */
    public function getParityMode()
    {
      return $this->ParityMode;
    }

    /**
     * @param anonymous288 $ParityMode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandedFareIndicatorsBase
     */
    public function setParityMode($ParityMode)
    {
      $this->ParityMode = $ParityMode;
      return $this;
    }

    /**
     * @return anonymous289
     */
    public function getItinParityFallbackMode()
    {
      return $this->ItinParityFallbackMode;
    }

    /**
     * @param anonymous289 $ItinParityFallbackMode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BrandedFareIndicatorsBase
     */
    public function setItinParityFallbackMode($ItinParityFallbackMode)
    {
      $this->ItinParityFallbackMode = $ItinParityFallbackMode;
      return $this;
    }

}
