<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AirTravelerType
{

    /**
     * @var ProfileRef $ProfileRef
     */
    protected $ProfileRef = null;

    /**
     * @var PersonNameType $PersonName
     */
    protected $PersonName = null;

    /**
     * @var TelephoneType[] $Telephone
     */
    protected $Telephone = null;

    /**
     * @var EmailType[] $Email
     */
    protected $Email = null;

    /**
     * @var AddressType[] $Address
     */
    protected $Address = null;

    /**
     * @var CustLoyaltyType[] $CustLoyalty
     */
    protected $CustLoyalty = null;

    /**
     * @var DocumentType[] $Document
     */
    protected $Document = null;

    /**
     * @var PassengerTypeQuantityType $PassengerTypeQuantity
     */
    protected $PassengerTypeQuantity = null;

    /**
     * @var TravelerRefNumberType $TravelerRefNumber
     */
    protected $TravelerRefNumber = null;

    /**
     * @var FlightSegmentRPHs $FlightSegmentRPHs
     */
    protected $FlightSegmentRPHs = null;

    /**
     * @var date $BirthDate
     */
    protected $BirthDate = null;

    /**
     * @var AlphaLength3 $CurrencyCode
     */
    protected $CurrencyCode = null;

    /**
     * @var AlphaLength3 $PassengerTypeCode
     */
    protected $PassengerTypeCode = null;

    /**
     * @var boolean $AccompaniedByInfant
     */
    protected $AccompaniedByInfant = null;

    /**
     * @var anonymous335 $Gender
     */
    protected $Gender = null;

    /**
     * @var anonymous337 $ShareSynchInd
     */
    protected $ShareSynchInd = null;

    /**
     * @var anonymous338 $ShareMarketInd
     */
    protected $ShareMarketInd = null;

    /**
     * @param PersonNameType $PersonName
     * @param TravelerRefNumberType $TravelerRefNumber
     * @param date $BirthDate
     * @param AlphaLength3 $CurrencyCode
     * @param AlphaLength3 $PassengerTypeCode
     * @param boolean $AccompaniedByInfant
     * @param anonymous335 $Gender
     * @param anonymous337 $ShareSynchInd
     * @param anonymous338 $ShareMarketInd
     */
    public function __construct($PersonName = null, $TravelerRefNumber = null, $BirthDate = null, $CurrencyCode = null, $PassengerTypeCode = null, $AccompaniedByInfant = null, $Gender = null, $ShareSynchInd = null, $ShareMarketInd = null)
    {
      $this->PersonName = $PersonName;
      $this->TravelerRefNumber = $TravelerRefNumber;
      $this->BirthDate = $BirthDate;
      $this->CurrencyCode = $CurrencyCode;
      $this->PassengerTypeCode = $PassengerTypeCode;
      $this->AccompaniedByInfant = $AccompaniedByInfant;
      $this->Gender = $Gender;
      $this->ShareSynchInd = $ShareSynchInd;
      $this->ShareMarketInd = $ShareMarketInd;
    }

    /**
     * @return ProfileRef
     */
    public function getProfileRef()
    {
      return $this->ProfileRef;
    }

    /**
     * @param ProfileRef $ProfileRef
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTravelerType
     */
    public function setProfileRef($ProfileRef)
    {
      $this->ProfileRef = $ProfileRef;
      return $this;
    }

    /**
     * @return PersonNameType
     */
    public function getPersonName()
    {
      return $this->PersonName;
    }

    /**
     * @param PersonNameType $PersonName
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTravelerType
     */
    public function setPersonName($PersonName)
    {
      $this->PersonName = $PersonName;
      return $this;
    }

    /**
     * @return TelephoneType[]
     */
    public function getTelephone()
    {
      return $this->Telephone;
    }

    /**
     * @param TelephoneType[] $Telephone
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTravelerType
     */
    public function setTelephone(array $Telephone = null)
    {
      $this->Telephone = $Telephone;
      return $this;
    }

    /**
     * @return EmailType[]
     */
    public function getEmail()
    {
      return $this->Email;
    }

    /**
     * @param EmailType[] $Email
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTravelerType
     */
    public function setEmail(array $Email = null)
    {
      $this->Email = $Email;
      return $this;
    }

    /**
     * @return AddressType[]
     */
    public function getAddress()
    {
      return $this->Address;
    }

    /**
     * @param AddressType[] $Address
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTravelerType
     */
    public function setAddress(array $Address = null)
    {
      $this->Address = $Address;
      return $this;
    }

    /**
     * @return CustLoyaltyType[]
     */
    public function getCustLoyalty()
    {
      return $this->CustLoyalty;
    }

    /**
     * @param CustLoyaltyType[] $CustLoyalty
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTravelerType
     */
    public function setCustLoyalty(array $CustLoyalty = null)
    {
      $this->CustLoyalty = $CustLoyalty;
      return $this;
    }

    /**
     * @return DocumentType[]
     */
    public function getDocument()
    {
      return $this->Document;
    }

    /**
     * @param DocumentType[] $Document
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTravelerType
     */
    public function setDocument(array $Document = null)
    {
      $this->Document = $Document;
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
     * @param PassengerTypeQuantityType $PassengerTypeQuantity
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTravelerType
     */
    public function setPassengerTypeQuantity($PassengerTypeQuantity)
    {
      $this->PassengerTypeQuantity = $PassengerTypeQuantity;
      return $this;
    }

    /**
     * @return TravelerRefNumberType
     */
    public function getTravelerRefNumber()
    {
      return $this->TravelerRefNumber;
    }

    /**
     * @param TravelerRefNumberType $TravelerRefNumber
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTravelerType
     */
    public function setTravelerRefNumber($TravelerRefNumber)
    {
      $this->TravelerRefNumber = $TravelerRefNumber;
      return $this;
    }

    /**
     * @return FlightSegmentRPHs
     */
    public function getFlightSegmentRPHs()
    {
      return $this->FlightSegmentRPHs;
    }

    /**
     * @param FlightSegmentRPHs $FlightSegmentRPHs
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTravelerType
     */
    public function setFlightSegmentRPHs($FlightSegmentRPHs)
    {
      $this->FlightSegmentRPHs = $FlightSegmentRPHs;
      return $this;
    }

    /**
     * @return date
     */
    public function getBirthDate()
    {
      return $this->BirthDate;
    }

    /**
     * @param date $BirthDate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTravelerType
     */
    public function setBirthDate($BirthDate)
    {
      $this->BirthDate = $BirthDate;
      return $this;
    }

    /**
     * @return AlphaLength3
     */
    public function getCurrencyCode()
    {
      return $this->CurrencyCode;
    }

    /**
     * @param AlphaLength3 $CurrencyCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTravelerType
     */
    public function setCurrencyCode($CurrencyCode)
    {
      $this->CurrencyCode = $CurrencyCode;
      return $this;
    }

    /**
     * @return AlphaLength3
     */
    public function getPassengerTypeCode()
    {
      return $this->PassengerTypeCode;
    }

    /**
     * @param AlphaLength3 $PassengerTypeCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTravelerType
     */
    public function setPassengerTypeCode($PassengerTypeCode)
    {
      $this->PassengerTypeCode = $PassengerTypeCode;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getAccompaniedByInfant()
    {
      return $this->AccompaniedByInfant;
    }

    /**
     * @param boolean $AccompaniedByInfant
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTravelerType
     */
    public function setAccompaniedByInfant($AccompaniedByInfant)
    {
      $this->AccompaniedByInfant = $AccompaniedByInfant;
      return $this;
    }

    /**
     * @return anonymous335
     */
    public function getGender()
    {
      return $this->Gender;
    }

    /**
     * @param anonymous335 $Gender
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTravelerType
     */
    public function setGender($Gender)
    {
      $this->Gender = $Gender;
      return $this;
    }

    /**
     * @return anonymous337
     */
    public function getShareSynchInd()
    {
      return $this->ShareSynchInd;
    }

    /**
     * @param anonymous337 $ShareSynchInd
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTravelerType
     */
    public function setShareSynchInd($ShareSynchInd)
    {
      $this->ShareSynchInd = $ShareSynchInd;
      return $this;
    }

    /**
     * @return anonymous338
     */
    public function getShareMarketInd()
    {
      return $this->ShareMarketInd;
    }

    /**
     * @param anonymous338 $ShareMarketInd
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirTravelerType
     */
    public function setShareMarketInd($ShareMarketInd)
    {
      $this->ShareMarketInd = $ShareMarketInd;
      return $this;
    }

}
