<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class OCFeeType
{

    /**
     * @var Money $Amount
     */
    protected $Amount = null;

    /**
     * @var string $Description
     */
    protected $Description = null;

    /**
     * @var StringLength1to8 $OriginAirport
     */
    protected $OriginAirport = null;

    /**
     * @var StringLength1to8 $DestinationAirport
     */
    protected $DestinationAirport = null;

    /**
     * @var StringLength1to8 $Carrier
     */
    protected $Carrier = null;

    /**
     * @var OCFeeCodeType $PassengerCode
     */
    protected $PassengerCode = null;

    /**
     * @var string $Date
     */
    protected $Date = null;

    /**
     * @var UNKNOWN $StartSegment
     */
    protected $StartSegment = null;

    /**
     * @var UNKNOWN $EndSegment
     */
    protected $EndSegment = null;

    /**
     * @var anonymous569 $AncillaryTypeCode
     */
    protected $AncillaryTypeCode = null;

    /**
     * @var anonymous570 $Subcode
     */
    protected $Subcode = null;

    /**
     * @var BaggageIDType $BaggageID
     */
    protected $BaggageID = null;

    /**
     * @var anonymous571 $Subgroup
     */
    protected $Subgroup = null;

    /**
     * @var string $Description1
     */
    protected $Description1 = null;

    /**
     * @var string $Description2
     */
    protected $Description2 = null;

    /**
     * @var int $FirstOccurrence
     */
    protected $FirstOccurrence = null;

    /**
     * @var int $LastOccurrence
     */
    protected $LastOccurrence = null;

    /**
     * @param Money $Amount
     * @param string $Description
     * @param StringLength1to8 $OriginAirport
     * @param StringLength1to8 $DestinationAirport
     * @param StringLength1to8 $Carrier
     * @param OCFeeCodeType $PassengerCode
     * @param string $Date
     * @param UNKNOWN $StartSegment
     * @param UNKNOWN $EndSegment
     * @param anonymous569 $AncillaryTypeCode
     * @param anonymous570 $Subcode
     * @param BaggageIDType $BaggageID
     * @param anonymous571 $Subgroup
     * @param string $Description1
     * @param string $Description2
     * @param int $FirstOccurrence
     * @param int $LastOccurrence
     */
    public function __construct($Amount = null, $Description = null, $OriginAirport = null, $DestinationAirport = null, $Carrier = null, $PassengerCode = null, $Date = null, $StartSegment = null, $EndSegment = null, $AncillaryTypeCode = null, $Subcode = null, $BaggageID = null, $Subgroup = null, $Description1 = null, $Description2 = null, $FirstOccurrence = null, $LastOccurrence = null)
    {
      $this->Amount = $Amount;
      $this->Description = $Description;
      $this->OriginAirport = $OriginAirport;
      $this->DestinationAirport = $DestinationAirport;
      $this->Carrier = $Carrier;
      $this->PassengerCode = $PassengerCode;
      $this->Date = $Date;
      $this->StartSegment = $StartSegment;
      $this->EndSegment = $EndSegment;
      $this->AncillaryTypeCode = $AncillaryTypeCode;
      $this->Subcode = $Subcode;
      $this->BaggageID = $BaggageID;
      $this->Subgroup = $Subgroup;
      $this->Description1 = $Description1;
      $this->Description2 = $Description2;
      $this->FirstOccurrence = $FirstOccurrence;
      $this->LastOccurrence = $LastOccurrence;
    }

    /**
     * @return Money
     */
    public function getAmount()
    {
      return $this->Amount;
    }

    /**
     * @param Money $Amount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OCFeeType
     */
    public function setAmount($Amount)
    {
      $this->Amount = $Amount;
      return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
      return $this->Description;
    }

    /**
     * @param string $Description
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OCFeeType
     */
    public function setDescription($Description)
    {
      $this->Description = $Description;
      return $this;
    }

    /**
     * @return StringLength1to8
     */
    public function getOriginAirport()
    {
      return $this->OriginAirport;
    }

    /**
     * @param StringLength1to8 $OriginAirport
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OCFeeType
     */
    public function setOriginAirport($OriginAirport)
    {
      $this->OriginAirport = $OriginAirport;
      return $this;
    }

    /**
     * @return StringLength1to8
     */
    public function getDestinationAirport()
    {
      return $this->DestinationAirport;
    }

    /**
     * @param StringLength1to8 $DestinationAirport
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OCFeeType
     */
    public function setDestinationAirport($DestinationAirport)
    {
      $this->DestinationAirport = $DestinationAirport;
      return $this;
    }

    /**
     * @return StringLength1to8
     */
    public function getCarrier()
    {
      return $this->Carrier;
    }

    /**
     * @param StringLength1to8 $Carrier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OCFeeType
     */
    public function setCarrier($Carrier)
    {
      $this->Carrier = $Carrier;
      return $this;
    }

    /**
     * @return OCFeeCodeType
     */
    public function getPassengerCode()
    {
      return $this->PassengerCode;
    }

    /**
     * @param OCFeeCodeType $PassengerCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OCFeeType
     */
    public function setPassengerCode($PassengerCode)
    {
      $this->PassengerCode = $PassengerCode;
      return $this;
    }

    /**
     * @return string
     */
    public function getDate()
    {
      return $this->Date;
    }

    /**
     * @param string $Date
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OCFeeType
     */
    public function setDate($Date)
    {
      $this->Date = $Date;
      return $this;
    }

    /**
     * @return UNKNOWN
     */
    public function getStartSegment()
    {
      return $this->StartSegment;
    }

    /**
     * @param UNKNOWN $StartSegment
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OCFeeType
     */
    public function setStartSegment($StartSegment)
    {
      $this->StartSegment = $StartSegment;
      return $this;
    }

    /**
     * @return UNKNOWN
     */
    public function getEndSegment()
    {
      return $this->EndSegment;
    }

    /**
     * @param UNKNOWN $EndSegment
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OCFeeType
     */
    public function setEndSegment($EndSegment)
    {
      $this->EndSegment = $EndSegment;
      return $this;
    }

    /**
     * @return anonymous569
     */
    public function getAncillaryTypeCode()
    {
      return $this->AncillaryTypeCode;
    }

    /**
     * @param anonymous569 $AncillaryTypeCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OCFeeType
     */
    public function setAncillaryTypeCode($AncillaryTypeCode)
    {
      $this->AncillaryTypeCode = $AncillaryTypeCode;
      return $this;
    }

    /**
     * @return anonymous570
     */
    public function getSubcode()
    {
      return $this->Subcode;
    }

    /**
     * @param anonymous570 $Subcode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OCFeeType
     */
    public function setSubcode($Subcode)
    {
      $this->Subcode = $Subcode;
      return $this;
    }

    /**
     * @return BaggageIDType
     */
    public function getBaggageID()
    {
      return $this->BaggageID;
    }

    /**
     * @param BaggageIDType $BaggageID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OCFeeType
     */
    public function setBaggageID($BaggageID)
    {
      $this->BaggageID = $BaggageID;
      return $this;
    }

    /**
     * @return anonymous571
     */
    public function getSubgroup()
    {
      return $this->Subgroup;
    }

    /**
     * @param anonymous571 $Subgroup
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OCFeeType
     */
    public function setSubgroup($Subgroup)
    {
      $this->Subgroup = $Subgroup;
      return $this;
    }

    /**
     * @return string
     */
    public function getDescription1()
    {
      return $this->Description1;
    }

    /**
     * @param string $Description1
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OCFeeType
     */
    public function setDescription1($Description1)
    {
      $this->Description1 = $Description1;
      return $this;
    }

    /**
     * @return string
     */
    public function getDescription2()
    {
      return $this->Description2;
    }

    /**
     * @param string $Description2
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OCFeeType
     */
    public function setDescription2($Description2)
    {
      $this->Description2 = $Description2;
      return $this;
    }

    /**
     * @return int
     */
    public function getFirstOccurrence()
    {
      return $this->FirstOccurrence;
    }

    /**
     * @param int $FirstOccurrence
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OCFeeType
     */
    public function setFirstOccurrence($FirstOccurrence)
    {
      $this->FirstOccurrence = $FirstOccurrence;
      return $this;
    }

    /**
     * @return int
     */
    public function getLastOccurrence()
    {
      return $this->LastOccurrence;
    }

    /**
     * @param int $LastOccurrence
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OCFeeType
     */
    public function setLastOccurrence($LastOccurrence)
    {
      $this->LastOccurrence = $LastOccurrence;
      return $this;
    }

}
