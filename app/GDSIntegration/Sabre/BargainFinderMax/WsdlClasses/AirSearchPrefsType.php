<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AirSearchPrefsType extends FareRestrictPrefType
{

    /**
     * @var CompanyNamePrefType[] $VendorPref
     */
    protected $VendorPref = null;

    /**
     * @var VendorPrefApplicabilityType[] $VendorPrefApplicability
     */
    protected $VendorPrefApplicability = null;

    /**
     * @var VendorPrefPairingType[] $VendorPrefPairing
     */
    protected $VendorPrefPairing = null;

    /**
     * @var FlightTypePrefType $FlightTypePref
     */
    protected $FlightTypePref = null;

    /**
     * @var FareRestrictPref[] $FareRestrictPref
     */
    protected $FareRestrictPref = null;

    /**
     * @var EquipmentTypePref[] $EquipPref
     */
    protected $EquipPref = null;

    /**
     * @var CabinPrefType[] $CabinPref
     */
    protected $CabinPref = null;

    /**
     * @var TicketDistribPrefType[] $TicketDistribPref
     */
    protected $TicketDistribPref = null;

    /**
     * @var TPA_ExtensionsForTravelPreference $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @var AncillaryFees $AncillaryFees
     */
    protected $AncillaryFees = null;

    /**
     * @var FrequentFlyer[] $FrequentFlyer
     */
    protected $FrequentFlyer = null;

    /**
     * @var SpanishFamilyDiscount $SpanishFamilyDiscount
     */
    protected $SpanishFamilyDiscount = null;

    /**
     * @var Baggage $Baggage
     */
    protected $Baggage = null;

    /**
     * @var InterlineBrandsType $InterlineBrands
     */
    protected $InterlineBrands = null;

    /**
     * @var CommissionCodeQualifiers $CommissionCodeQualifiers
     */
    protected $CommissionCodeQualifiers = null;

    /**
     * @var BuyerInformation $BuyerInformation
     */
    protected $BuyerInformation = null;

    /**
     * @var Percentage $OnTimeRate
     */
    protected $OnTimeRate = null;

    /**
     * @var boolean $ETicketDesired
     */
    protected $ETicketDesired = null;

    /**
     * @var boolean $ValidInterlineTicket
     */
    protected $ValidInterlineTicket = null;

    /**
     * @var Numeric0to999 $MaxStopsQuantity
     */
    protected $MaxStopsQuantity = null;

    /**
     * @var anonymous277 $UseAllFlights
     */
    protected $UseAllFlights = null;

    /**
     * @var boolean $AllFlightsData
     */
    protected $AllFlightsData = null;

    /**
     * @var boolean $Hybrid
     */
    protected $Hybrid = null;

    /**
     * @var boolean $LookForAlternatives
     */
    protected $LookForAlternatives = null;

    /**
     * @var boolean $SmokingAllowed
     */
    protected $SmokingAllowed = null;

    /**
     * @param OTA_CodeType $FareRestriction
     * @param PreferLevelType $PreferLevel
     * @param Percentage $OnTimeRate
     * @param boolean $ETicketDesired
     * @param boolean $ValidInterlineTicket
     * @param Numeric0to999 $MaxStopsQuantity
     * @param anonymous277 $UseAllFlights
     * @param boolean $AllFlightsData
     * @param boolean $Hybrid
     * @param boolean $LookForAlternatives
     * @param boolean $SmokingAllowed
     */
    public function __construct($FareRestriction = null, $PreferLevel = null, $OnTimeRate = null, $ETicketDesired = null, $ValidInterlineTicket = null, $MaxStopsQuantity = null, $UseAllFlights = null, $AllFlightsData = null, $Hybrid = null, $LookForAlternatives = null, $SmokingAllowed = null)
    {
      parent::__construct($FareRestriction, $PreferLevel);
      $this->OnTimeRate = $OnTimeRate;
      $this->ETicketDesired = $ETicketDesired;
      $this->ValidInterlineTicket = $ValidInterlineTicket;
      $this->MaxStopsQuantity = $MaxStopsQuantity;
      $this->UseAllFlights = $UseAllFlights;
      $this->AllFlightsData = $AllFlightsData;
      $this->Hybrid = $Hybrid;
      $this->LookForAlternatives = $LookForAlternatives;
      $this->SmokingAllowed = $SmokingAllowed;
    }

    /**
     * @return CompanyNamePrefType[]
     */
    public function getVendorPref()
    {
      return $this->VendorPref;
    }

    /**
     * @param CompanyNamePrefType[] $VendorPref
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setVendorPref(array $VendorPref = null)
    {
      $this->VendorPref = $VendorPref;
      return $this;
    }

    /**
     * @return VendorPrefApplicabilityType[]
     */
    public function getVendorPrefApplicability()
    {
      return $this->VendorPrefApplicability;
    }

    /**
     * @param VendorPrefApplicabilityType[] $VendorPrefApplicability
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setVendorPrefApplicability(array $VendorPrefApplicability = null)
    {
      $this->VendorPrefApplicability = $VendorPrefApplicability;
      return $this;
    }

    /**
     * @return VendorPrefPairingType[]
     */
    public function getVendorPrefPairing()
    {
      return $this->VendorPrefPairing;
    }

    /**
     * @param VendorPrefPairingType[] $VendorPrefPairing
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setVendorPrefPairing(array $VendorPrefPairing = null)
    {
      $this->VendorPrefPairing = $VendorPrefPairing;
      return $this;
    }

    /**
     * @return FlightTypePrefType
     */
    public function getFlightTypePref()
    {
      return $this->FlightTypePref;
    }

    /**
     * @param FlightTypePrefType $FlightTypePref
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setFlightTypePref($FlightTypePref)
    {
      $this->FlightTypePref = $FlightTypePref;
      return $this;
    }

    /**
     * @return FareRestrictPref[]
     */
    public function getFareRestrictPref()
    {
      return $this->FareRestrictPref;
    }

    /**
     * @param FareRestrictPref[] $FareRestrictPref
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setFareRestrictPref(array $FareRestrictPref = null)
    {
      $this->FareRestrictPref = $FareRestrictPref;
      return $this;
    }

    /**
     * @return EquipmentTypePref[]
     */
    public function getEquipPref()
    {
      return $this->EquipPref;
    }

    /**
     * @param EquipmentTypePref[] $EquipPref
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setEquipPref(array $EquipPref = null)
    {
      $this->EquipPref = $EquipPref;
      return $this;
    }

    /**
     * @return CabinPrefType[]
     */
    public function getCabinPref()
    {
      return $this->CabinPref;
    }

    /**
     * @param CabinPrefType[] $CabinPref
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setCabinPref(array $CabinPref = null)
    {
      $this->CabinPref = $CabinPref;
      return $this;
    }

    /**
     * @return TicketDistribPrefType[]
     */
    public function getTicketDistribPref()
    {
      return $this->TicketDistribPref;
    }

    /**
     * @param TicketDistribPrefType[] $TicketDistribPref
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setTicketDistribPref(array $TicketDistribPref = null)
    {
      $this->TicketDistribPref = $TicketDistribPref;
      return $this;
    }

    /**
     * @return TPA_ExtensionsForTravelPreference
     */
    public function getTPA_Extensions()
    {
      return $this->TPA_Extensions;
    }

    /**
     * @param TPA_ExtensionsForTravelPreference $TPA_Extensions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      return $this;
    }

    /**
     * @return AncillaryFees
     */
    public function getAncillaryFees()
    {
      return $this->AncillaryFees;
    }

    /**
     * @param AncillaryFees $AncillaryFees
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setAncillaryFees($AncillaryFees)
    {
      $this->AncillaryFees = $AncillaryFees;
      return $this;
    }

    /**
     * @return FrequentFlyer[]
     */
    public function getFrequentFlyer()
    {
      return $this->FrequentFlyer;
    }

    /**
     * @param FrequentFlyer[] $FrequentFlyer
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setFrequentFlyer(array $FrequentFlyer = null)
    {
      $this->FrequentFlyer = $FrequentFlyer;
      return $this;
    }

    /**
     * @return SpanishFamilyDiscount
     */
    public function getSpanishFamilyDiscount()
    {
      return $this->SpanishFamilyDiscount;
    }

    /**
     * @param SpanishFamilyDiscount $SpanishFamilyDiscount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setSpanishFamilyDiscount($SpanishFamilyDiscount)
    {
      $this->SpanishFamilyDiscount = $SpanishFamilyDiscount;
      return $this;
    }

    /**
     * @return Baggage
     */
    public function getBaggage()
    {
      return $this->Baggage;
    }

    /**
     * @param Baggage $Baggage
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setBaggage($Baggage)
    {
      $this->Baggage = $Baggage;
      return $this;
    }

    /**
     * @return InterlineBrandsType
     */
    public function getInterlineBrands()
    {
      return $this->InterlineBrands;
    }

    /**
     * @param InterlineBrandsType $InterlineBrands
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setInterlineBrands($InterlineBrands)
    {
      $this->InterlineBrands = $InterlineBrands;
      return $this;
    }

    /**
     * @return CommissionCodeQualifiers
     */
    public function getCommissionCodeQualifiers()
    {
      return $this->CommissionCodeQualifiers;
    }

    /**
     * @param CommissionCodeQualifiers $CommissionCodeQualifiers
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setCommissionCodeQualifiers($CommissionCodeQualifiers)
    {
      $this->CommissionCodeQualifiers = $CommissionCodeQualifiers;
      return $this;
    }

    /**
     * @return BuyerInformation
     */
    public function getBuyerInformation()
    {
      return $this->BuyerInformation;
    }

    /**
     * @param BuyerInformation $BuyerInformation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setBuyerInformation($BuyerInformation)
    {
      $this->BuyerInformation = $BuyerInformation;
      return $this;
    }

    /**
     * @return Percentage
     */
    public function getOnTimeRate()
    {
      return $this->OnTimeRate;
    }

    /**
     * @param Percentage $OnTimeRate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setOnTimeRate($OnTimeRate)
    {
      $this->OnTimeRate = $OnTimeRate;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getETicketDesired()
    {
      return $this->ETicketDesired;
    }

    /**
     * @param boolean $ETicketDesired
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setETicketDesired($ETicketDesired)
    {
      $this->ETicketDesired = $ETicketDesired;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getValidInterlineTicket()
    {
      return $this->ValidInterlineTicket;
    }

    /**
     * @param boolean $ValidInterlineTicket
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setValidInterlineTicket($ValidInterlineTicket)
    {
      $this->ValidInterlineTicket = $ValidInterlineTicket;
      return $this;
    }

    /**
     * @return Numeric0to999
     */
    public function getMaxStopsQuantity()
    {
      return $this->MaxStopsQuantity;
    }

    /**
     * @param Numeric0to999 $MaxStopsQuantity
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setMaxStopsQuantity($MaxStopsQuantity)
    {
      $this->MaxStopsQuantity = $MaxStopsQuantity;
      return $this;
    }

    /**
     * @return anonymous277
     */
    public function getUseAllFlights()
    {
      return $this->UseAllFlights;
    }

    /**
     * @param anonymous277 $UseAllFlights
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setUseAllFlights($UseAllFlights)
    {
      $this->UseAllFlights = $UseAllFlights;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getAllFlightsData()
    {
      return $this->AllFlightsData;
    }

    /**
     * @param boolean $AllFlightsData
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setAllFlightsData($AllFlightsData)
    {
      $this->AllFlightsData = $AllFlightsData;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getHybrid()
    {
      return $this->Hybrid;
    }

    /**
     * @param boolean $Hybrid
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setHybrid($Hybrid)
    {
      $this->Hybrid = $Hybrid;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getLookForAlternatives()
    {
      return $this->LookForAlternatives;
    }

    /**
     * @param boolean $LookForAlternatives
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setLookForAlternatives($LookForAlternatives)
    {
      $this->LookForAlternatives = $LookForAlternatives;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getSmokingAllowed()
    {
      return $this->SmokingAllowed;
    }

    /**
     * @param boolean $SmokingAllowed
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirSearchPrefsType
     */
    public function setSmokingAllowed($SmokingAllowed)
    {
      $this->SmokingAllowed = $SmokingAllowed;
      return $this;
    }

}
