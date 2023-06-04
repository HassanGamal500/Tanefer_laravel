<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareParameters
{

    /**
     * @var ExcludeRestricted $ExcludeRestricted
     */
    protected $ExcludeRestricted = null;

    /**
     * @var ResTicketing $ResTicketing
     */
    protected $ResTicketing = null;

    /**
     * @var MinMaxStay $MinMaxStay
     */
    protected $MinMaxStay = null;

    /**
     * @var RefundPenalty $RefundPenalty
     */
    protected $RefundPenalty = null;

    /**
     * @var PublicFare $PublicFare
     */
    protected $PublicFare = null;

    /**
     * @var PrivateFare $PrivateFare
     */
    protected $PrivateFare = null;

    /**
     * @var Cabin $Cabin
     */
    protected $Cabin = null;

    /**
     * @var NegotiatedFaresOnly $NegotiatedFaresOnly
     */
    protected $NegotiatedFaresOnly = null;

    /**
     * @var XOFares $XOFares
     */
    protected $XOFares = null;

    /**
     * @var UsePassengerFares $UsePassengerFares
     */
    protected $UsePassengerFares = null;

    /**
     * @var UseNegotiatedFares $UseNegotiatedFares
     */
    protected $UseNegotiatedFares = null;

    /**
     * @var PassengerTypeQuantityType $PassengerTypeQuantity
     */
    protected $PassengerTypeQuantity = null;

    /**
     * @var JumpCabinLogicType $JumpCabinLogic
     */
    protected $JumpCabinLogic = null;

    /**
     * @var KeepSameCabinType $KeepSameCabin
     */
    protected $KeepSameCabin = null;

    /**
     * @var VoluntaryChangesSMPType $VoluntaryChanges
     */
    protected $VoluntaryChanges = null;

    /**
     * @var CorporateID $CorporateID
     */
    protected $CorporateID = null;

    /**
     * @var AccountCode $AccountCode
     */
    protected $AccountCode = null;

    /**
     * @var ClassOfServiceElemType $ClassOfService
     */
    protected $ClassOfService = null;

    /**
     * @var FareBasisType $FareBasis
     */
    protected $FareBasis = null;

    /**
     * @var FareTypePrefType $FareType
     */
    protected $FareType = null;

    /**
     * @var BrandedFareIndicatorsBase $BrandedFareIndicators
     */
    protected $BrandedFareIndicators = null;

    /**
     * @var BaggageType $Baggage
     */
    protected $Baggage = null;

    /**
     * @var Leg $Leg
     */
    protected $Leg = null;

    /**
     * @param ExcludeRestricted $ExcludeRestricted
     * @param ResTicketing $ResTicketing
     * @param MinMaxStay $MinMaxStay
     * @param RefundPenalty $RefundPenalty
     * @param PublicFare $PublicFare
     * @param PrivateFare $PrivateFare
     * @param Cabin $Cabin
     * @param NegotiatedFaresOnly $NegotiatedFaresOnly
     * @param XOFares $XOFares
     * @param UsePassengerFares $UsePassengerFares
     * @param UseNegotiatedFares $UseNegotiatedFares
     * @param PassengerTypeQuantityType $PassengerTypeQuantity
     * @param JumpCabinLogicType $JumpCabinLogic
     * @param KeepSameCabinType $KeepSameCabin
     * @param VoluntaryChangesSMPType $VoluntaryChanges
     * @param CorporateID $CorporateID
     * @param AccountCode $AccountCode
     * @param ClassOfServiceElemType $ClassOfService
     * @param FareBasisType $FareBasis
     * @param FareTypePrefType $FareType
     * @param BrandedFareIndicatorsBase $BrandedFareIndicators
     * @param BaggageType $Baggage
     * @param Leg $Leg
     */
    public function __construct($ExcludeRestricted = null, $ResTicketing = null, $MinMaxStay = null, $RefundPenalty = null, $PublicFare = null, $PrivateFare = null, $Cabin = null, $NegotiatedFaresOnly = null, $XOFares = null, $UsePassengerFares = null, $UseNegotiatedFares = null, $PassengerTypeQuantity = null, $JumpCabinLogic = null, $KeepSameCabin = null, $VoluntaryChanges = null, $CorporateID = null, $AccountCode = null, $ClassOfService = null, $FareBasis = null, $FareType = null, $BrandedFareIndicators = null, $Baggage = null, $Leg = null)
    {
      $this->ExcludeRestricted = $ExcludeRestricted;
      $this->ResTicketing = $ResTicketing;
      $this->MinMaxStay = $MinMaxStay;
      $this->RefundPenalty = $RefundPenalty;
      $this->PublicFare = $PublicFare;
      $this->PrivateFare = $PrivateFare;
      $this->Cabin = $Cabin;
      $this->NegotiatedFaresOnly = $NegotiatedFaresOnly;
      $this->XOFares = $XOFares;
      $this->UsePassengerFares = $UsePassengerFares;
      $this->UseNegotiatedFares = $UseNegotiatedFares;
      $this->PassengerTypeQuantity = $PassengerTypeQuantity;
      $this->JumpCabinLogic = $JumpCabinLogic;
      $this->KeepSameCabin = $KeepSameCabin;
      $this->VoluntaryChanges = $VoluntaryChanges;
      $this->CorporateID = $CorporateID;
      $this->AccountCode = $AccountCode;
      $this->ClassOfService = $ClassOfService;
      $this->FareBasis = $FareBasis;
      $this->FareType = $FareType;
      $this->BrandedFareIndicators = $BrandedFareIndicators;
      $this->Baggage = $Baggage;
      $this->Leg = $Leg;
    }

    /**
     * @return ExcludeRestricted
     */
    public function getExcludeRestricted()
    {
      return $this->ExcludeRestricted;
    }

    /**
     * @param ExcludeRestricted $ExcludeRestricted
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setExcludeRestricted($ExcludeRestricted)
    {
      $this->ExcludeRestricted = $ExcludeRestricted;
      return $this;
    }

    /**
     * @return ResTicketing
     */
    public function getResTicketing()
    {
      return $this->ResTicketing;
    }

    /**
     * @param ResTicketing $ResTicketing
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setResTicketing($ResTicketing)
    {
      $this->ResTicketing = $ResTicketing;
      return $this;
    }

    /**
     * @return MinMaxStay
     */
    public function getMinMaxStay()
    {
      return $this->MinMaxStay;
    }

    /**
     * @param MinMaxStay $MinMaxStay
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setMinMaxStay($MinMaxStay)
    {
      $this->MinMaxStay = $MinMaxStay;
      return $this;
    }

    /**
     * @return RefundPenalty
     */
    public function getRefundPenalty()
    {
      return $this->RefundPenalty;
    }

    /**
     * @param RefundPenalty $RefundPenalty
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setRefundPenalty($RefundPenalty)
    {
      $this->RefundPenalty = $RefundPenalty;
      return $this;
    }

    /**
     * @return PublicFare
     */
    public function getPublicFare()
    {
      return $this->PublicFare;
    }

    /**
     * @param PublicFare $PublicFare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setPublicFare($PublicFare)
    {
      $this->PublicFare = $PublicFare;
      return $this;
    }

    /**
     * @return PrivateFare
     */
    public function getPrivateFare()
    {
      return $this->PrivateFare;
    }

    /**
     * @param PrivateFare $PrivateFare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setPrivateFare($PrivateFare)
    {
      $this->PrivateFare = $PrivateFare;
      return $this;
    }

    /**
     * @return Cabin
     */
    public function getCabin()
    {
      return $this->Cabin;
    }

    /**
     * @param Cabin $Cabin
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setCabin($Cabin)
    {
      $this->Cabin = $Cabin;
      return $this;
    }

    /**
     * @return NegotiatedFaresOnly
     */
    public function getNegotiatedFaresOnly()
    {
      return $this->NegotiatedFaresOnly;
    }

    /**
     * @param NegotiatedFaresOnly $NegotiatedFaresOnly
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setNegotiatedFaresOnly($NegotiatedFaresOnly)
    {
      $this->NegotiatedFaresOnly = $NegotiatedFaresOnly;
      return $this;
    }

    /**
     * @return XOFares
     */
    public function getXOFares()
    {
      return $this->XOFares;
    }

    /**
     * @param XOFares $XOFares
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setXOFares($XOFares)
    {
      $this->XOFares = $XOFares;
      return $this;
    }

    /**
     * @return UsePassengerFares
     */
    public function getUsePassengerFares()
    {
      return $this->UsePassengerFares;
    }

    /**
     * @param UsePassengerFares $UsePassengerFares
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setUsePassengerFares($UsePassengerFares)
    {
      $this->UsePassengerFares = $UsePassengerFares;
      return $this;
    }

    /**
     * @return UseNegotiatedFares
     */
    public function getUseNegotiatedFares()
    {
      return $this->UseNegotiatedFares;
    }

    /**
     * @param UseNegotiatedFares $UseNegotiatedFares
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setUseNegotiatedFares($UseNegotiatedFares)
    {
      $this->UseNegotiatedFares = $UseNegotiatedFares;
      return $this;
    }

    /**
     * @return PassengerTypeQuantityType
     */
    public function getPassengerTypeQuantity()
    {
      return $this->PassengerTypeQuantity;
    }

    /**
     * @param PassengerTypeQuantityType[] $PassengerTypeQuantity
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setPassengerTypeQuantity($PassengerTypeQuantity)
    {
      $this->PassengerTypeQuantity = $PassengerTypeQuantity;
      return $this;
    }

    /**
     * @return JumpCabinLogicType
     */
    public function getJumpCabinLogic()
    {
      return $this->JumpCabinLogic;
    }

    /**
     * @param JumpCabinLogicType $JumpCabinLogic
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setJumpCabinLogic($JumpCabinLogic)
    {
      $this->JumpCabinLogic = $JumpCabinLogic;
      return $this;
    }

    /**
     * @return KeepSameCabinType
     */
    public function getKeepSameCabin()
    {
      return $this->KeepSameCabin;
    }

    /**
     * @param KeepSameCabinType $KeepSameCabin
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setKeepSameCabin($KeepSameCabin)
    {
      $this->KeepSameCabin = $KeepSameCabin;
      return $this;
    }

    /**
     * @return VoluntaryChangesSMPType
     */
    public function getVoluntaryChanges()
    {
      return $this->VoluntaryChanges;
    }

    /**
     * @param VoluntaryChangesSMPType $VoluntaryChanges
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setVoluntaryChanges($VoluntaryChanges)
    {
      $this->VoluntaryChanges = $VoluntaryChanges;
      return $this;
    }

    /**
     * @return CorporateID
     */
    public function getCorporateID()
    {
      return $this->CorporateID;
    }

    /**
     * @param CorporateID $CorporateID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setCorporateID($CorporateID)
    {
      $this->CorporateID = $CorporateID;
      return $this;
    }

    /**
     * @return AccountCode
     */
    public function getAccountCode()
    {
      return $this->AccountCode;
    }

    /**
     * @param AccountCode $AccountCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setAccountCode($AccountCode)
    {
      $this->AccountCode = $AccountCode;
      return $this;
    }

    /**
     * @return ClassOfServiceElemType
     */
    public function getClassOfService()
    {
      return $this->ClassOfService;
    }

    /**
     * @param ClassOfServiceElemType $ClassOfService
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setClassOfService($ClassOfService)
    {
      $this->ClassOfService = $ClassOfService;
      return $this;
    }

    /**
     * @return FareBasisType
     */
    public function getFareBasis()
    {
      return $this->FareBasis;
    }

    /**
     * @param FareBasisType $FareBasis
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setFareBasis($FareBasis)
    {
      $this->FareBasis = $FareBasis;
      return $this;
    }

    /**
     * @return FareTypePrefType
     */
    public function getFareType()
    {
      return $this->FareType;
    }

    /**
     * @param FareTypePrefType $FareType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setFareType($FareType)
    {
      $this->FareType = $FareType;
      return $this;
    }

    /**
     * @return BrandedFareIndicatorsBase
     */
    public function getBrandedFareIndicators()
    {
      return $this->BrandedFareIndicators;
    }

    /**
     * @param BrandedFareIndicatorsBase $BrandedFareIndicators
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setBrandedFareIndicators($BrandedFareIndicators)
    {
      $this->BrandedFareIndicators = $BrandedFareIndicators;
      return $this;
    }

    /**
     * @return BaggageType
     */
    public function getBaggage()
    {
      return $this->Baggage;
    }

    /**
     * @param BaggageType $Baggage
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setBaggage($Baggage)
    {
      $this->Baggage = $Baggage;
      return $this;
    }

    /**
     * @return Leg
     */
    public function getLeg()
    {
      return $this->Leg;
    }

    /**
     * @param Leg $Leg
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareParameters
     */
    public function setLeg($Leg)
    {
      $this->Leg = $Leg;
      return $this;
    }

}
