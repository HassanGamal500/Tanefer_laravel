<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ExchangeType
{

    /**
     * @var ExchangeFareType $Fare
     */
    protected $Fare = null;

    /**
     * @var ExchangePOSType $POS
     */
    protected $POS = null;

    /**
     * @var ExchangeOriginDestinationInformationType $OriginDestinationInformation
     */
    protected $OriginDestinationInformation = null;

    /**
     * @var ArunkType $Arunk
     */
    protected $Arunk = null;

    /**
     * @var ExchangeAirSearchPrefsType $TravelPreferences
     */
    protected $TravelPreferences = null;

    /**
     * @var TravelerInfoSummaryType $TravelerInfoSummary
     */
    protected $TravelerInfoSummary = null;

    /**
     * @var ExchangeTPA_ExtensionsType $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @var ISellDateOptTimeType $OriginalTktIssueDateTime
     */
    protected $OriginalTktIssueDateTime = null;

    /**
     * @var ISellDateOptTimeType $ExchangedTktIssueDateTime
     */
    protected $ExchangedTktIssueDateTime = null;

    /**
     * @var ISellDateOptTimeType $PreviousExchangeDateTime
     */
    protected $PreviousExchangeDateTime = null;

    /**
     * @var int $NumberOfTaxBoxes
     */
    protected $NumberOfTaxBoxes = null;

    /**
     * @var CharacterType $BypassAdvancePurchaseOption
     */
    protected $BypassAdvancePurchaseOption = null;

    /**
     * @param ExchangeFareType $Fare
     * @param ExchangePOSType $POS
     * @param ExchangeOriginDestinationInformationType $OriginDestinationInformation
     * @param ArunkType $Arunk
     * @param TravelerInfoSummaryType $TravelerInfoSummary
     * @param ISellDateOptTimeType $OriginalTktIssueDateTime
     * @param ISellDateOptTimeType $ExchangedTktIssueDateTime
     * @param ISellDateOptTimeType $PreviousExchangeDateTime
     * @param int $NumberOfTaxBoxes
     * @param CharacterType $BypassAdvancePurchaseOption
     */
    public function __construct($Fare = null, $POS = null, $OriginDestinationInformation = null, $Arunk = null, $TravelerInfoSummary = null, $OriginalTktIssueDateTime = null, $ExchangedTktIssueDateTime = null, $PreviousExchangeDateTime = null, $NumberOfTaxBoxes = null, $BypassAdvancePurchaseOption = null)
    {
      $this->Fare = $Fare;
      $this->POS = $POS;
      $this->OriginDestinationInformation = $OriginDestinationInformation;
      $this->Arunk = $Arunk;
      $this->TravelerInfoSummary = $TravelerInfoSummary;
      $this->OriginalTktIssueDateTime = $OriginalTktIssueDateTime;
      $this->ExchangedTktIssueDateTime = $ExchangedTktIssueDateTime;
      $this->PreviousExchangeDateTime = $PreviousExchangeDateTime;
      $this->NumberOfTaxBoxes = $NumberOfTaxBoxes;
      $this->BypassAdvancePurchaseOption = $BypassAdvancePurchaseOption;
    }

    /**
     * @return ExchangeFareType
     */
    public function getFare()
    {
      return $this->Fare;
    }

    /**
     * @param ExchangeFareType $Fare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeType
     */
    public function setFare($Fare)
    {
      $this->Fare = $Fare;
      return $this;
    }

    /**
     * @return ExchangePOSType
     */
    public function getPOS()
    {
      return $this->POS;
    }

    /**
     * @param ExchangePOSType $POS
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeType
     */
    public function setPOS($POS)
    {
      $this->POS = $POS;
      return $this;
    }

    /**
     * @return ExchangeOriginDestinationInformationType
     */
    public function getOriginDestinationInformation()
    {
      return $this->OriginDestinationInformation;
    }

    /**
     * @param ExchangeOriginDestinationInformationType $OriginDestinationInformation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeType
     */
    public function setOriginDestinationInformation($OriginDestinationInformation)
    {
      $this->OriginDestinationInformation = $OriginDestinationInformation;
      return $this;
    }

    /**
     * @return ArunkType
     */
    public function getArunk()
    {
      return $this->Arunk;
    }

    /**
     * @param ArunkType $Arunk
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeType
     */
    public function setArunk($Arunk)
    {
      $this->Arunk = $Arunk;
      return $this;
    }

    /**
     * @return ExchangeAirSearchPrefsType
     */
    public function getTravelPreferences()
    {
      return $this->TravelPreferences;
    }

    /**
     * @param ExchangeAirSearchPrefsType $TravelPreferences
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeType
     */
    public function setTravelPreferences($TravelPreferences)
    {
      $this->TravelPreferences = $TravelPreferences;
      return $this;
    }

    /**
     * @return TravelerInfoSummaryType
     */
    public function getTravelerInfoSummary()
    {
      return $this->TravelerInfoSummary;
    }

    /**
     * @param TravelerInfoSummaryType $TravelerInfoSummary
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeType
     */
    public function setTravelerInfoSummary($TravelerInfoSummary)
    {
      $this->TravelerInfoSummary = $TravelerInfoSummary;
      return $this;
    }

    /**
     * @return ExchangeTPA_ExtensionsType
     */
    public function getTPA_Extensions()
    {
      return $this->TPA_Extensions;
    }

    /**
     * @param ExchangeTPA_ExtensionsType $TPA_Extensions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeType
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      return $this;
    }

    /**
     * @return ISellDateOptTimeType
     */
    public function getOriginalTktIssueDateTime()
    {
      return $this->OriginalTktIssueDateTime;
    }

    /**
     * @param ISellDateOptTimeType $OriginalTktIssueDateTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeType
     */
    public function setOriginalTktIssueDateTime($OriginalTktIssueDateTime)
    {
      $this->OriginalTktIssueDateTime = $OriginalTktIssueDateTime;
      return $this;
    }

    /**
     * @return ISellDateOptTimeType
     */
    public function getExchangedTktIssueDateTime()
    {
      return $this->ExchangedTktIssueDateTime;
    }

    /**
     * @param ISellDateOptTimeType $ExchangedTktIssueDateTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeType
     */
    public function setExchangedTktIssueDateTime($ExchangedTktIssueDateTime)
    {
      $this->ExchangedTktIssueDateTime = $ExchangedTktIssueDateTime;
      return $this;
    }

    /**
     * @return ISellDateOptTimeType
     */
    public function getPreviousExchangeDateTime()
    {
      return $this->PreviousExchangeDateTime;
    }

    /**
     * @param ISellDateOptTimeType $PreviousExchangeDateTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeType
     */
    public function setPreviousExchangeDateTime($PreviousExchangeDateTime)
    {
      $this->PreviousExchangeDateTime = $PreviousExchangeDateTime;
      return $this;
    }

    /**
     * @return int
     */
    public function getNumberOfTaxBoxes()
    {
      return $this->NumberOfTaxBoxes;
    }

    /**
     * @param int $NumberOfTaxBoxes
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeType
     */
    public function setNumberOfTaxBoxes($NumberOfTaxBoxes)
    {
      $this->NumberOfTaxBoxes = $NumberOfTaxBoxes;
      return $this;
    }

    /**
     * @return CharacterType
     */
    public function getBypassAdvancePurchaseOption()
    {
      return $this->BypassAdvancePurchaseOption;
    }

    /**
     * @param CharacterType $BypassAdvancePurchaseOption
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeType
     */
    public function setBypassAdvancePurchaseOption($BypassAdvancePurchaseOption)
    {
      $this->BypassAdvancePurchaseOption = $BypassAdvancePurchaseOption;
      return $this;
    }

}
