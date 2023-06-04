<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class OTA_AirLowFareSearchRS
{

    /**
     * @var ErrorsType $Errors
     */
    protected $Errors = null;

    /**
     * @var SuccessType $Success
     */
    protected $Success = null;

    /**
     * @var WarningsType $Warnings
     */
    protected $Warnings = null;

    /**
     * @var ShelvesDefinitionsType $ShelvesDefinitions
     */
    protected $ShelvesDefinitions = null;

    /**
     * @var BrandFeatureListType $BrandFeatures
     */
    protected $BrandFeatures = null;

    /**
     * @var PricedItineraries $PricedItineraries
     */
    protected $PricedItineraries = null;

    /**
     * @var OneWayItineraries $OneWayItineraries
     */
    protected $OneWayItineraries = null;

    /**
     * @var DepartedItineraries $DepartedItineraries
     */
    protected $DepartedItineraries = null;

    /**
     * @var SoldOutItineraries $SoldOutItineraries
     */
    protected $SoldOutItineraries = null;

    /**
     * @var AvailableItineraries $AvailableItineraries
     */
    protected $AvailableItineraries = null;

    /**
     * @var TPA_Extensions $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @var int $PricedItinCount
     */
    protected $PricedItinCount = 0;

    /**
     * @var int $BrandedOneWayItinCount
     */
    protected $BrandedOneWayItinCount = null;

    /**
     * @var int $SimpleOneWayItinCount
     */
    protected $SimpleOneWayItinCount = null;

    /**
     * @var int $DepartedItinCount
     */
    protected $DepartedItinCount = null;

    /**
     * @var int $SoldOutItinCount
     */
    protected $SoldOutItinCount = null;

    /**
     * @var int $AvailableItinCount
     */
    protected $AvailableItinCount = null;

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
     * @param ErrorsType $Errors
     * @param SuccessType $Success
     * @param WarningsType $Warnings
     * @param ShelvesDefinitionsType $ShelvesDefinitions
     * @param BrandFeatureListType $BrandFeatures
     * @param PricedItineraries $PricedItineraries
     * @param OneWayItineraries $OneWayItineraries
     * @param DepartedItineraries $DepartedItineraries
     * @param SoldOutItineraries $SoldOutItineraries
     * @param AvailableItineraries $AvailableItineraries
     * @param TPA_Extensions $TPA_Extensions
     * @param int $PricedItinCount
     * @param int $BrandedOneWayItinCount
     * @param int $SimpleOneWayItinCount
     * @param int $DepartedItinCount
     * @param int $SoldOutItinCount
     * @param int $AvailableItinCount
     * @param anonymous85 $EchoToken
     * @param string $TimeStamp
     * @param anonymous86 $Target
     * @param string $Version
     * @param StringLength1to32 $TransactionIdentifier
     * @param NbrOrBooleanType $SequenceNmbr
     * @param anonymous87 $TransactionStatusCode
     * @param language $PrimaryLangID
     * @param language $AltLangID
     */
    public function __construct($Errors = null, $Success = null, $Warnings = null, $ShelvesDefinitions = null, $BrandFeatures = null, $PricedItineraries = null, $OneWayItineraries = null, $DepartedItineraries = null, $SoldOutItineraries = null, $AvailableItineraries = null, $TPA_Extensions = null, $PricedItinCount = null, $BrandedOneWayItinCount = null, $SimpleOneWayItinCount = null, $DepartedItinCount = null, $SoldOutItinCount = null, $AvailableItinCount = null, $EchoToken = null, $TimeStamp = null, $Target = null, $Version = null, $TransactionIdentifier = null, $SequenceNmbr = null, $TransactionStatusCode = null, $PrimaryLangID = null, $AltLangID = null)
    {
      $this->Errors = $Errors;
      $this->Success = $Success;
      $this->Warnings = $Warnings;
      $this->ShelvesDefinitions = $ShelvesDefinitions;
      $this->BrandFeatures = $BrandFeatures;
      $this->PricedItineraries = $PricedItineraries;
      $this->OneWayItineraries = $OneWayItineraries;
      $this->DepartedItineraries = $DepartedItineraries;
      $this->SoldOutItineraries = $SoldOutItineraries;
      $this->AvailableItineraries = $AvailableItineraries;
      $this->TPA_Extensions = $TPA_Extensions;
      $this->PricedItinCount = $PricedItinCount;
      $this->BrandedOneWayItinCount = $BrandedOneWayItinCount;
      $this->SimpleOneWayItinCount = $SimpleOneWayItinCount;
      $this->DepartedItinCount = $DepartedItinCount;
      $this->SoldOutItinCount = $SoldOutItinCount;
      $this->AvailableItinCount = $AvailableItinCount;
      $this->EchoToken = $EchoToken;
      $this->TimeStamp = $TimeStamp;
      $this->Target = $Target;
      $this->Version = $Version;
      $this->TransactionIdentifier = $TransactionIdentifier;
      $this->SequenceNmbr = $SequenceNmbr;
      $this->TransactionStatusCode = $TransactionStatusCode;
      $this->PrimaryLangID = $PrimaryLangID;
      $this->AltLangID = $AltLangID;
    }

    /**
     * @return ErrorsType
     */
    public function getErrors()
    {
      return $this->Errors;
    }

    /**
     * @param ErrorsType $Errors
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
     */
    public function setErrors($Errors)
    {
      $this->Errors = $Errors;
      return $this;
    }

    /**
     * @return SuccessType
     */
    public function getSuccess()
    {
      return $this->Success;
    }

    /**
     * @param SuccessType $Success
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
     */
    public function setSuccess($Success)
    {
      $this->Success = $Success;
      return $this;
    }

    /**
     * @return WarningsType
     */
    public function getWarnings()
    {
      return $this->Warnings;
    }

    /**
     * @param WarningsType $Warnings
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
     */
    public function setWarnings($Warnings)
    {
      $this->Warnings = $Warnings;
      return $this;
    }

    /**
     * @return ShelvesDefinitionsType
     */
    public function getShelvesDefinitions()
    {
      return $this->ShelvesDefinitions;
    }

    /**
     * @param ShelvesDefinitionsType $ShelvesDefinitions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
     */
    public function setShelvesDefinitions($ShelvesDefinitions)
    {
      $this->ShelvesDefinitions = $ShelvesDefinitions;
      return $this;
    }

    /**
     * @return BrandFeatureListType
     */
    public function getBrandFeatures()
    {
      return $this->BrandFeatures;
    }

    /**
     * @param BrandFeatureListType $BrandFeatures
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
     */
    public function setBrandFeatures($BrandFeatures)
    {
      $this->BrandFeatures = $BrandFeatures;
      return $this;
    }

    /**
     * @return PricedItineraries
     */
    public function getPricedItineraries()
    {
      return $this->PricedItineraries;
    }

    /**
     * @param PricedItineraries $PricedItineraries
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
     */
    public function setPricedItineraries($PricedItineraries)
    {
      $this->PricedItineraries = $PricedItineraries;
      return $this;
    }

    /**
     * @return OneWayItineraries
     */
    public function getOneWayItineraries()
    {
      return $this->OneWayItineraries;
    }

    /**
     * @param OneWayItineraries $OneWayItineraries
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
     */
    public function setOneWayItineraries($OneWayItineraries)
    {
      $this->OneWayItineraries = $OneWayItineraries;
      return $this;
    }

    /**
     * @return DepartedItineraries
     */
    public function getDepartedItineraries()
    {
      return $this->DepartedItineraries;
    }

    /**
     * @param DepartedItineraries $DepartedItineraries
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
     */
    public function setDepartedItineraries($DepartedItineraries)
    {
      $this->DepartedItineraries = $DepartedItineraries;
      return $this;
    }

    /**
     * @return SoldOutItineraries
     */
    public function getSoldOutItineraries()
    {
      return $this->SoldOutItineraries;
    }

    /**
     * @param SoldOutItineraries $SoldOutItineraries
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
     */
    public function setSoldOutItineraries($SoldOutItineraries)
    {
      $this->SoldOutItineraries = $SoldOutItineraries;
      return $this;
    }

    /**
     * @return AvailableItineraries
     */
    public function getAvailableItineraries()
    {
      return $this->AvailableItineraries;
    }

    /**
     * @param AvailableItineraries $AvailableItineraries
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
     */
    public function setAvailableItineraries($AvailableItineraries)
    {
      $this->AvailableItineraries = $AvailableItineraries;
      return $this;
    }

    /**
     * @return TPA_Extensions
     */
    public function getTPA_Extensions()
    {
      return $this->TPA_Extensions;
    }

    /**
     * @param TPA_Extensions $TPA_Extensions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      return $this;
    }

    /**
     * @return int
     */
    public function getPricedItinCount()
    {
      return $this->PricedItinCount;
    }

    /**
     * @param int $PricedItinCount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
     */
    public function setPricedItinCount($PricedItinCount)
    {
      $this->PricedItinCount = $PricedItinCount;
      return $this;
    }

    /**
     * @return int
     */
    public function getBrandedOneWayItinCount()
    {
      return $this->BrandedOneWayItinCount;
    }

    /**
     * @param int $BrandedOneWayItinCount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
     */
    public function setBrandedOneWayItinCount($BrandedOneWayItinCount)
    {
      $this->BrandedOneWayItinCount = $BrandedOneWayItinCount;
      return $this;
    }

    /**
     * @return int
     */
    public function getSimpleOneWayItinCount()
    {
      return $this->SimpleOneWayItinCount;
    }

    /**
     * @param int $SimpleOneWayItinCount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
     */
    public function setSimpleOneWayItinCount($SimpleOneWayItinCount)
    {
      $this->SimpleOneWayItinCount = $SimpleOneWayItinCount;
      return $this;
    }

    /**
     * @return int
     */
    public function getDepartedItinCount()
    {
      return $this->DepartedItinCount;
    }

    /**
     * @param int $DepartedItinCount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
     */
    public function setDepartedItinCount($DepartedItinCount)
    {
      $this->DepartedItinCount = $DepartedItinCount;
      return $this;
    }

    /**
     * @return int
     */
    public function getSoldOutItinCount()
    {
      return $this->SoldOutItinCount;
    }

    /**
     * @param int $SoldOutItinCount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
     */
    public function setSoldOutItinCount($SoldOutItinCount)
    {
      $this->SoldOutItinCount = $SoldOutItinCount;
      return $this;
    }

    /**
     * @return int
     */
    public function getAvailableItinCount()
    {
      return $this->AvailableItinCount;
    }

    /**
     * @param int $AvailableItinCount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
     */
    public function setAvailableItinCount($AvailableItinCount)
    {
      $this->AvailableItinCount = $AvailableItinCount;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OTA_AirLowFareSearchRS
     */
    public function setAltLangID($AltLangID)
    {
      $this->AltLangID = $AltLangID;
      return $this;
    }

}
