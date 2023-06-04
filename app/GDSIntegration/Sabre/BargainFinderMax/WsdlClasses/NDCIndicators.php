<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class NDCIndicators
{

    /**
     * @var MaxNumberOfUpsells $MaxNumberOfUpsells
     */
    protected $MaxNumberOfUpsells = null;

    /**
     * @var CarrierSpecificQualifiers $CarrierSpecificQualifiers
     */
    protected $CarrierSpecificQualifiers = null;

    /**
     * @var Qualifier $Qualifier
     */
    protected $Qualifier = null;

    /**
     * @param MaxNumberOfUpsells $MaxNumberOfUpsells
     * @param CarrierSpecificQualifiers $CarrierSpecificQualifiers
     * @param Qualifier $Qualifier
     */
    public function __construct($MaxNumberOfUpsells = null, $CarrierSpecificQualifiers = null, $Qualifier = null)
    {
      $this->MaxNumberOfUpsells = $MaxNumberOfUpsells;
      $this->CarrierSpecificQualifiers = $CarrierSpecificQualifiers;
      $this->Qualifier = $Qualifier;
    }

    /**
     * @return MaxNumberOfUpsells
     */
    public function getMaxNumberOfUpsells()
    {
      return $this->MaxNumberOfUpsells;
    }

    /**
     * @param MaxNumberOfUpsells $MaxNumberOfUpsells
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\NDCIndicators
     */
    public function setMaxNumberOfUpsells($MaxNumberOfUpsells)
    {
      $this->MaxNumberOfUpsells = $MaxNumberOfUpsells;
      return $this;
    }

    /**
     * @return CarrierSpecificQualifiers
     */
    public function getCarrierSpecificQualifiers()
    {
      return $this->CarrierSpecificQualifiers;
    }

    /**
     * @param CarrierSpecificQualifiers $CarrierSpecificQualifiers
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\NDCIndicators
     */
    public function setCarrierSpecificQualifiers($CarrierSpecificQualifiers)
    {
      $this->CarrierSpecificQualifiers = $CarrierSpecificQualifiers;
      return $this;
    }

    /**
     * @return Qualifier
     */
    public function getQualifier()
    {
      return $this->Qualifier;
    }

    /**
     * @param Qualifier $Qualifier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\NDCIndicators
     */
    public function setQualifier($Qualifier)
    {
      $this->Qualifier = $Qualifier;
      return $this;
    }

}
