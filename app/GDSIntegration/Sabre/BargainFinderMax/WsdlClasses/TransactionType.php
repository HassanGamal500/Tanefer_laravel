<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TransactionType
{

    /**
     * @var RequestType $RequestType
     */
    protected $RequestType = null;

    /**
     * @var ServiceTag $ServiceTag
     */
    protected $ServiceTag = null;

    /**
     * @var TravelerPersona $TravelerPersona
     */
    protected $TravelerPersona = null;

    /**
     * @var PurchaseType $PurchaseType
     */
    protected $PurchaseType = null;

    /**
     * @var SabreAth $SabreAth
     */
    protected $SabreAth = null;

    /**
     * @var TranID $TranID
     */
    protected $TranID = null;

    /**
     * @var ClientSessionID $ClientSessionID
     */
    protected $ClientSessionID = null;

    /**
     * @var Branch $Branch
     */
    protected $Branch = null;

    /**
     * @var CompressResponse $CompressResponse
     */
    protected $CompressResponse = null;

    /**
     * @var FareOverrides $FareOverrides
     */
    protected $FareOverrides = null;

    /**
     * @var Diagnostics $Diagnostics
     */
    protected $Diagnostics = null;

    /**
     * @var SubagentData $SubagentData
     */
    protected $SubagentData = null;

    /**
     * @var ResponseSorting $ResponseSorting
     */
    protected $ResponseSorting = null;

    /**
     * @var SeatStatusSimType $SeatStatusSim
     */
    protected $SeatStatusSim = null;

    /**
     * @var AvailableLevel $AvailableLevel
     */
    protected $AvailableLevel = null;

    /**
     * @var ATSETest $ATSETest
     */
    protected $ATSETest = null;

    /**
     * @var AirStreaming $AirStreaming
     */
    protected $AirStreaming = null;

    /**
     * @var MultipleSourcePerItinerary $MultipleSourcePerItinerary
     */
    protected $MultipleSourcePerItinerary = null;

    /**
     * @var boolean $Debug
     */
    protected $Debug = null;

    /**
     * @var string $DebugKey
     */
    protected $DebugKey = null;

    /**
     * @var string $ConfigSet
     */
    protected $ConfigSet = null;

    /**
     * @var boolean $DisableCache
     */
    protected $DisableCache = null;

    /**
     * @var string $ChunkNumber
     */
    protected $ChunkNumber = null;

    /**
     * @var boolean $ShowItinSource
     */
    protected $ShowItinSource = null;

    /**
     * @param boolean $Debug
     * @param string $DebugKey
     * @param string $ConfigSet
     * @param boolean $DisableCache
     * @param string $ChunkNumber
     * @param boolean $ShowItinSource
     */
    public function __construct($Debug = null, $DebugKey = null, $ConfigSet = null, $DisableCache = null, $ChunkNumber = null, $ShowItinSource = null)
    {
      $this->Debug = $Debug;
      $this->DebugKey = $DebugKey;
      $this->ConfigSet = $ConfigSet;
      $this->DisableCache = $DisableCache;
      $this->ChunkNumber = $ChunkNumber;
      $this->ShowItinSource = $ShowItinSource;
    }

    /**
     * @return RequestType
     */
    public function getRequestType()
    {
      return $this->RequestType;
    }

    /**
     * @param RequestType $RequestType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setRequestType($RequestType)
    {
      $this->RequestType = $RequestType;
      return $this;
    }

    /**
     * @return ServiceTag
     */
    public function getServiceTag()
    {
      return $this->ServiceTag;
    }

    /**
     * @param ServiceTag $ServiceTag
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setServiceTag($ServiceTag)
    {
      $this->ServiceTag = $ServiceTag;
      return $this;
    }

    /**
     * @return TravelerPersona
     */
    public function getTravelerPersona()
    {
      return $this->TravelerPersona;
    }

    /**
     * @param TravelerPersona $TravelerPersona
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setTravelerPersona($TravelerPersona)
    {
      $this->TravelerPersona = $TravelerPersona;
      return $this;
    }

    /**
     * @return PurchaseType
     */
    public function getPurchaseType()
    {
      return $this->PurchaseType;
    }

    /**
     * @param PurchaseType $PurchaseType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setPurchaseType($PurchaseType)
    {
      $this->PurchaseType = $PurchaseType;
      return $this;
    }

    /**
     * @return SabreAth
     */
    public function getSabreAth()
    {
      return $this->SabreAth;
    }

    /**
     * @param SabreAth $SabreAth
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setSabreAth($SabreAth)
    {
      $this->SabreAth = $SabreAth;
      return $this;
    }

    /**
     * @return TranID
     */
    public function getTranID()
    {
      return $this->TranID;
    }

    /**
     * @param TranID $TranID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setTranID($TranID)
    {
      $this->TranID = $TranID;
      return $this;
    }

    /**
     * @return ClientSessionID
     */
    public function getClientSessionID()
    {
      return $this->ClientSessionID;
    }

    /**
     * @param ClientSessionID $ClientSessionID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setClientSessionID($ClientSessionID)
    {
      $this->ClientSessionID = $ClientSessionID;
      return $this;
    }

    /**
     * @return Branch
     */
    public function getBranch()
    {
      return $this->Branch;
    }

    /**
     * @param Branch $Branch
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setBranch($Branch)
    {
      $this->Branch = $Branch;
      return $this;
    }

    /**
     * @return CompressResponse
     */
    public function getCompressResponse()
    {
      return $this->CompressResponse;
    }

    /**
     * @param CompressResponse $CompressResponse
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setCompressResponse($CompressResponse)
    {
      $this->CompressResponse = $CompressResponse;
      return $this;
    }

    /**
     * @return FareOverrides
     */
    public function getFareOverrides()
    {
      return $this->FareOverrides;
    }

    /**
     * @param FareOverrides $FareOverrides
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setFareOverrides($FareOverrides)
    {
      $this->FareOverrides = $FareOverrides;
      return $this;
    }

    /**
     * @return Diagnostics
     */
    public function getDiagnostics()
    {
      return $this->Diagnostics;
    }

    /**
     * @param Diagnostics $Diagnostics
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setDiagnostics($Diagnostics)
    {
      $this->Diagnostics = $Diagnostics;
      return $this;
    }

    /**
     * @return SubagentData
     */
    public function getSubagentData()
    {
      return $this->SubagentData;
    }

    /**
     * @param SubagentData $SubagentData
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setSubagentData($SubagentData)
    {
      $this->SubagentData = $SubagentData;
      return $this;
    }

    /**
     * @return ResponseSorting
     */
    public function getResponseSorting()
    {
      return $this->ResponseSorting;
    }

    /**
     * @param ResponseSorting $ResponseSorting
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setResponseSorting($ResponseSorting)
    {
      $this->ResponseSorting = $ResponseSorting;
      return $this;
    }

    /**
     * @return SeatStatusSimType
     */
    public function getSeatStatusSim()
    {
      return $this->SeatStatusSim;
    }

    /**
     * @param SeatStatusSimType $SeatStatusSim
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setSeatStatusSim($SeatStatusSim)
    {
      $this->SeatStatusSim = $SeatStatusSim;
      return $this;
    }

    /**
     * @return AvailableLevel
     */
    public function getAvailableLevel()
    {
      return $this->AvailableLevel;
    }

    /**
     * @param AvailableLevel $AvailableLevel
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setAvailableLevel($AvailableLevel)
    {
      $this->AvailableLevel = $AvailableLevel;
      return $this;
    }

    /**
     * @return ATSETest
     */
    public function getATSETest()
    {
      return $this->ATSETest;
    }

    /**
     * @param ATSETest $ATSETest
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setATSETest($ATSETest)
    {
      $this->ATSETest = $ATSETest;
      return $this;
    }

    /**
     * @return AirStreaming
     */
    public function getAirStreaming()
    {
      return $this->AirStreaming;
    }

    /**
     * @param AirStreaming $AirStreaming
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setAirStreaming($AirStreaming)
    {
      $this->AirStreaming = $AirStreaming;
      return $this;
    }

    /**
     * @return MultipleSourcePerItinerary
     */
    public function getMultipleSourcePerItinerary()
    {
      return $this->MultipleSourcePerItinerary;
    }

    /**
     * @param MultipleSourcePerItinerary $MultipleSourcePerItinerary
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setMultipleSourcePerItinerary($MultipleSourcePerItinerary)
    {
      $this->MultipleSourcePerItinerary = $MultipleSourcePerItinerary;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getDebug()
    {
      return $this->Debug;
    }

    /**
     * @param boolean $Debug
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setDebug($Debug)
    {
      $this->Debug = $Debug;
      return $this;
    }

    /**
     * @return string
     */
    public function getDebugKey()
    {
      return $this->DebugKey;
    }

    /**
     * @param string $DebugKey
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setDebugKey($DebugKey)
    {
      $this->DebugKey = $DebugKey;
      return $this;
    }

    /**
     * @return string
     */
    public function getConfigSet()
    {
      return $this->ConfigSet;
    }

    /**
     * @param string $ConfigSet
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setConfigSet($ConfigSet)
    {
      $this->ConfigSet = $ConfigSet;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getDisableCache()
    {
      return $this->DisableCache;
    }

    /**
     * @param boolean $DisableCache
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setDisableCache($DisableCache)
    {
      $this->DisableCache = $DisableCache;
      return $this;
    }

    /**
     * @return string
     */
    public function getChunkNumber()
    {
      return $this->ChunkNumber;
    }

    /**
     * @param string $ChunkNumber
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setChunkNumber($ChunkNumber)
    {
      $this->ChunkNumber = $ChunkNumber;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getShowItinSource()
    {
      return $this->ShowItinSource;
    }

    /**
     * @param boolean $ShowItinSource
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransactionType
     */
    public function setShowItinSource($ShowItinSource)
    {
      $this->ShowItinSource = $ShowItinSource;
      return $this;
    }

}
