<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TPA_Extensions
{

    /**
     * @var AdditionalFares $AdditionalFares
     */
    protected $AdditionalFares = null;

    /**
     * @var Ops $Ops
     */
    protected $Ops = null;

    /**
     * @var ItinSource $ItinSource
     */
    protected $ItinSource = null;

    /**
     * @var ValueBucket $ValueBucket
     */
    protected $ValueBucket = null;

    /**
     * @var ValidatingCarrier $ValidatingCarrier
     */
    protected $ValidatingCarrier = null;

    /**
     * @var UnflownPriceType $UnflownPrice
     */
    protected $UnflownPrice = null;

    /**
     * @var DiversitySwapper $DiversitySwapper
     */
    protected $DiversitySwapper = null;

    /**
     * @var Failed $Failed
     */
    protected $Failed = null;

    /**
     * @var SeatsRemaining $SeatsRemaining
     * */
    protected $SeatsRemaining = null;
    /**
     * @var Cabin $Cabin
     * */
    protected $Cabin = null;
    /**
     * @var Meal $Meal
     * */
    protected $Meal = null;


    /**
     * @param AdditionalFares $AdditionalFares
     * @param Ops $Ops
     * @param ItinSource $ItinSource
     * @param ValueBucket $ValueBucket
     * @param ValidatingCarrier $ValidatingCarrier
     * @param UnflownPriceType $UnflownPrice
     * @param DiversitySwapper $DiversitySwapper
     * @param Failed $Failed
     */
    public function __construct($AdditionalFares = null, $Ops = null, $ItinSource = null, $ValueBucket = null, $ValidatingCarrier = null, $UnflownPrice = null, $DiversitySwapper = null, $Failed = null)
    {
      $this->AdditionalFares = $AdditionalFares;
      $this->Ops = $Ops;
      $this->ItinSource = $ItinSource;
      $this->ValueBucket = $ValueBucket;
      $this->ValidatingCarrier = $ValidatingCarrier;
      $this->UnflownPrice = $UnflownPrice;
      $this->DiversitySwapper = $DiversitySwapper;
      $this->Failed = $Failed;
    }

    /**
     * @return AdditionalFares
     */
    public function getAdditionalFares()
    {
      return $this->AdditionalFares;
    }

    /**
     * @param AdditionalFares $AdditionalFares
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TPA_Extensions
     */
    public function setAdditionalFares($AdditionalFares)
    {
      $this->AdditionalFares = $AdditionalFares;
      return $this;
    }

    /**
     * @return Ops
     */
    public function getOps()
    {
      return $this->Ops;
    }

    /**
     * @param Ops $Ops
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TPA_Extensions
     */
    public function setOps($Ops)
    {
      $this->Ops = $Ops;
      return $this;
    }

    /**
     * @return ItinSource
     */
    public function getItinSource()
    {
      return $this->ItinSource;
    }

    /**
     * @param ItinSource $ItinSource
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TPA_Extensions
     */
    public function setItinSource($ItinSource)
    {
      $this->ItinSource = $ItinSource;
      return $this;
    }

    /**
     * @return ValueBucket
     */
    public function getValueBucket()
    {
      return $this->ValueBucket;
    }

    /**
     * @param ValueBucket $ValueBucket
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TPA_Extensions
     */
    public function setValueBucket($ValueBucket)
    {
      $this->ValueBucket = $ValueBucket;
      return $this;
    }

    /**
     * @return ValidatingCarrier
     */
    public function getValidatingCarrier()
    {
      return $this->ValidatingCarrier;
    }

    /**
     * @param ValidatingCarrier $ValidatingCarrier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TPA_Extensions
     */
    public function setValidatingCarrier($ValidatingCarrier)
    {
      $this->ValidatingCarrier = $ValidatingCarrier;
      return $this;
    }

    /**
     * @return UnflownPriceType
     */
    public function getUnflownPrice()
    {
      return $this->UnflownPrice;
    }

    /**
     * @param UnflownPriceType $UnflownPrice
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TPA_Extensions
     */
    public function setUnflownPrice($UnflownPrice)
    {
      $this->UnflownPrice = $UnflownPrice;
      return $this;
    }

    /**
     * @return DiversitySwapper
     */
    public function getDiversitySwapper()
    {
      return $this->DiversitySwapper;
    }

    /**
     * @param DiversitySwapper $DiversitySwapper
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TPA_Extensions
     */
    public function setDiversitySwapper($DiversitySwapper)
    {
      $this->DiversitySwapper = $DiversitySwapper;
      return $this;
    }

    /**
     * @return Failed
     */
    public function getFailed()
    {
      return $this->Failed;
    }

    /**
     * @param Failed $Failed
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TPA_Extensions
     */
    public function setFailed($Failed)
    {
      $this->Failed = $Failed;
      return $this;
    }

    /**
     * @return SeatsRemaining
     * */
    public function getSeatsRemaining()
    {
        return $this->SeatsRemaining;
    }

    /**
     * @return Cabin
     * */
    public function getCabin()
    {
        return $this->Cabin;
    }

    /**
     * @return Meal
     * */
    public function getMeal()
    {
        return $this->Meal;
    }

}
