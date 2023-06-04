<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class OTA_AirLowFareSearchRQ
{

    /**
     * @var POS_Type $POS
     */
    protected $POS = null;

    /**
     * @var OriginDestinationInformation $OriginDestinationInformation
     */
    protected $OriginDestinationInformation = null;

    /**
     * @var AirSearchPrefsType $TravelPreferences
     */
    protected $TravelPreferences = null;

    /**
     * @var TravelerInfoSummaryType $TravelerInfoSummary
     */
    protected $TravelerInfoSummary = null;

    /**
     * @var TPA_Extensions $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @var boolean $DirectFlightsOnly
     */
    protected $DirectFlightsOnly = null;

    /**
     * @var boolean $AvailableFlightsOnly
     */
    protected $AvailableFlightsOnly = null;

    /**
     * @var string $ResponseType
     */
    protected $ResponseType = null;

    /**
     * @var string $ResponseVersion
     */
    protected $ResponseVersion = null;

    /**
     * @var boolean $SeparateMessages
     */
    protected $SeparateMessages = null;

    /**
     * @var boolean $TruncateMessages
     */
    protected $TruncateMessages = null;

    /**
     * @var anonymous85 $EchoToken
     */
    protected $EchoToken = null;

    /**
     * @var string $TimeStamp
     */
    protected $TimeStamp = null;

    /**
     * @var anonymous86 $Target
     */
    protected $Target = null;

    /**
     * @var string $Version
     */
    protected $Version = null;

    /**
     * @var StringLength1to32 $TransactionIdentifier
     */
    protected $TransactionIdentifier = null;

    /**
     * @var NbrOrBooleanType $SequenceNmbr
     */
    protected $SequenceNmbr = null;

    /**
     * @var anonymous87 $TransactionStatusCode
     */
    protected $TransactionStatusCode = null;

    /**
     * @var language $PrimaryLangID
     */
    protected $PrimaryLangID = null;

    /**
     * @var language $AltLangID
     */
    protected $AltLangID = null;

    /**
     * @var anonymous336 $MaxResponses
     */
    protected $MaxResponses = null;

    /**
     * @param POS_Type $POS
     * @param OriginDestinationInformation $OriginDestinationInformation
     * @param AirSearchPrefsType $TravelPreferences
     * @param TravelerInfoSummaryType $TravelerInfoSummary
     * @param TPA_ExtensionsForTransactionType $TPA_Extensions
     * @param boolean $DirectFlightsOnly
     * @param boolean $AvailableFlightsOnly
     * @param string $ResponseType
     * @param string $ResponseVersion
     * @param boolean $SeparateMessages
     * @param boolean $TruncateMessages
     * @param anonymous85 $EchoToken
     * @param string $TimeStamp
     * @param anonymous86 $Target
     * @param string $Version
     * @param StringLength1to32 $TransactionIdentifier
     * @param NbrOrBooleanType $SequenceNmbr
     * @param anonymous87 $TransactionStatusCode
     * @param language $PrimaryLangID
     * @param language $AltLangID
     * @param anonymous336 $MaxResponses
     */
    public function __construct($POS = null, $OriginDestinationInformation = null, $TravelPreferences = null, $TravelerInfoSummary = null, $TPA_Extensions = null, $DirectFlightsOnly = null, $AvailableFlightsOnly = null, $ResponseType = null, $ResponseVersion = null, $SeparateMessages = null, $TruncateMessages = null, $EchoToken = null, $TimeStamp = null, $Target = null, $Version = null, $TransactionIdentifier = null, $SequenceNmbr = null, $TransactionStatusCode = null, $PrimaryLangID = null, $AltLangID = null, $MaxResponses = null)
    {
      $this->POS = $POS;
      $this->OriginDestinationInformation = $OriginDestinationInformation;
      $this->TravelPreferences = $TravelPreferences;
      $this->TravelerInfoSummary = $TravelerInfoSummary;
      $this->TPA_Extensions = $TPA_Extensions;
      $this->DirectFlightsOnly = $DirectFlightsOnly;
      $this->AvailableFlightsOnly = $AvailableFlightsOnly;
      $this->ResponseType = $ResponseType;
      $this->ResponseVersion = $ResponseVersion;
      $this->SeparateMessages = $SeparateMessages;
      $this->TruncateMessages = $TruncateMessages;
      $this->EchoToken = $EchoToken;
      $this->TimeStamp = $TimeStamp;
      $this->Target = $Target;
      $this->Version = $Version;
      $this->TransactionIdentifier = $TransactionIdentifier;
      $this->SequenceNmbr = $SequenceNmbr;
      $this->TransactionStatusCode = $TransactionStatusCode;
      $this->PrimaryLangID = $PrimaryLangID;
      $this->AltLangID = $AltLangID;
      $this->MaxResponses = $MaxResponses;
    }

    /**
     * @return POS_Type
     */
    public function getPOS()
    {
      return $this->POS;
    }

    /**
     * @param POS_Type $POS
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
     */
    public function setPOS($POS)
    {
      $this->POS = $POS;
      return $this;
    }

    /**
     * @return OriginDestinationInformation
     */
    public function getOriginDestinationInformation()
    {
      return $this->OriginDestinationInformation;
    }

    /**
     * @param OriginDestinationInformation $OriginDestinationInformation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
     */
    public function setOriginDestinationInformation($OriginDestinationInformation)
    {
      $this->OriginDestinationInformation = $OriginDestinationInformation;
      return $this;
    }

    /**
     * @return AirSearchPrefsType
     */
    public function getTravelPreferences()
    {
      return $this->TravelPreferences;
    }

    /**
     * @param AirSearchPrefsType $TravelPreferences
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
     */
    public function setTravelerInfoSummary($TravelerInfoSummary)
    {
      $this->TravelerInfoSummary = $TravelerInfoSummary;
      return $this;
    }

    /**
     * @return TPA_ExtensionsForTransactionType
     */
    public function getTPA_Extensions()
    {
      return $this->TPA_Extensions;
    }

    /**
     * @param TPA_ExtensionsForTransactionType $TPA_Extensions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getDirectFlightsOnly()
    {
      return $this->DirectFlightsOnly;
    }

    /**
     * @param boolean $DirectFlightsOnly
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
     */
    public function setDirectFlightsOnly($DirectFlightsOnly)
    {
      $this->DirectFlightsOnly = $DirectFlightsOnly;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getAvailableFlightsOnly()
    {
      return $this->AvailableFlightsOnly;
    }

    /**
     * @param boolean $AvailableFlightsOnly
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
     */
    public function setAvailableFlightsOnly($AvailableFlightsOnly)
    {
      $this->AvailableFlightsOnly = $AvailableFlightsOnly;
      return $this;
    }

    /**
     * @return string
     */
    public function getResponseType()
    {
      return $this->ResponseType;
    }

    /**
     * @param string $ResponseType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
     */
    public function setResponseType($ResponseType)
    {
      $this->ResponseType = $ResponseType;
      return $this;
    }

    /**
     * @return string
     */
    public function getResponseVersion()
    {
      return $this->ResponseVersion;
    }

    /**
     * @param string $ResponseVersion
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
     */
    public function setResponseVersion($ResponseVersion)
    {
      $this->ResponseVersion = $ResponseVersion;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getSeparateMessages()
    {
      return $this->SeparateMessages;
    }

    /**
     * @param boolean $SeparateMessages
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
     */
    public function setSeparateMessages($SeparateMessages)
    {
      $this->SeparateMessages = $SeparateMessages;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getTruncateMessages()
    {
      return $this->TruncateMessages;
    }

    /**
     * @param boolean $TruncateMessages
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
     */
    public function setTruncateMessages($TruncateMessages)
    {
      $this->TruncateMessages = $TruncateMessages;
      return $this;
    }

    /**
     * @return anonymous85
     */
    public function getEchoToken()
    {
      return $this->EchoToken;
    }

    /**
     * @param anonymous85 $EchoToken
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
     */
    public function setEchoToken($EchoToken)
    {
      $this->EchoToken = $EchoToken;
      return $this;
    }

    /**
     * @return string
     */
    public function getTimeStamp()
    {
      return $this->TimeStamp;
    }

    /**
     * @param string $TimeStamp
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
     */
    public function setTimeStamp($TimeStamp)
    {
      $this->TimeStamp = $TimeStamp;
      return $this;
    }

    /**
     * @return anonymous86
     */
    public function getTarget()
    {
      return $this->Target;
    }

    /**
     * @param anonymous86 $Target
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
     */
    public function setTarget($Target)
    {
      $this->Target = $Target;
      return $this;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
      return $this->Version;
    }

    /**
     * @param string $Version
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
     */
    public function setVersion($Version)
    {
      $this->Version = $Version;
      return $this;
    }

    /**
     * @return StringLength1to32
     */
    public function getTransactionIdentifier()
    {
      return $this->TransactionIdentifier;
    }

    /**
     * @param StringLength1to32 $TransactionIdentifier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
     */
    public function setTransactionIdentifier($TransactionIdentifier)
    {
      $this->TransactionIdentifier = $TransactionIdentifier;
      return $this;
    }

    /**
     * @return NbrOrBooleanType
     */
    public function getSequenceNmbr()
    {
      return $this->SequenceNmbr;
    }

    /**
     * @param NbrOrBooleanType $SequenceNmbr
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
     */
    public function setSequenceNmbr($SequenceNmbr)
    {
      $this->SequenceNmbr = $SequenceNmbr;
      return $this;
    }

    /**
     * @return anonymous87
     */
    public function getTransactionStatusCode()
    {
      return $this->TransactionStatusCode;
    }

    /**
     * @param anonymous87 $TransactionStatusCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
     */
    public function setTransactionStatusCode($TransactionStatusCode)
    {
      $this->TransactionStatusCode = $TransactionStatusCode;
      return $this;
    }

    /**
     * @return language
     */
    public function getPrimaryLangID()
    {
      return $this->PrimaryLangID;
    }

    /**
     * @param language $PrimaryLangID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
     */
    public function setPrimaryLangID($PrimaryLangID)
    {
      $this->PrimaryLangID = $PrimaryLangID;
      return $this;
    }

    /**
     * @return language
     */
    public function getAltLangID()
    {
      return $this->AltLangID;
    }

    /**
     * @param language $AltLangID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
     */
    public function setAltLangID($AltLangID)
    {
      $this->AltLangID = $AltLangID;
      return $this;
    }

    /**
     * @return anonymous336
     */
    public function getMaxResponses()
    {
      return $this->MaxResponses;
    }

    /**
     * @param anonymous336 $MaxResponses
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRQ
     */
    public function setMaxResponses($MaxResponses)
    {
      $this->MaxResponses = $MaxResponses;
      return $this;
    }

}
