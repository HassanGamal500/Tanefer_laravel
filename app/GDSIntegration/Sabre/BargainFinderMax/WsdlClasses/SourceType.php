<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class SourceType
{

    /**
     * @var UniqueID_Type $RequestorID
     */
    protected $RequestorID = null;

    /**
     * @var PositionType $Position
     */
    protected $Position = null;

    /**
     * @var SourceBookingChannelType $BookingChannel
     */
    protected $BookingChannel = null;

    /**
     * @var anonymous319 $Storefront
     */
    protected $Storefront = null;

    /**
     * @var StringLength1to16 $AgentSine
     */
    protected $AgentSine = null;

    /**
     * @var StringLength1to16 $PseudoCityCode
     */
    protected $PseudoCityCode = null;

    /**
     * @var ISO3166 $ISOCountry
     */
    protected $ISOCountry = null;

    /**
     * @var AlphaLength3 $ISOCurrency
     */
    protected $ISOCurrency = null;

    /**
     * @var StringLength1to16 $AgentDutyCode
     */
    protected $AgentDutyCode = null;

    /**
     * @var UpperCaseAlphaNumericLength2to3 $AirlineVendorID
     */
    protected $AirlineVendorID = null;

    /**
     * @var UpperCaseAlphaNumericLength3to5 $AirportCode
     */
    protected $AirportCode = null;

    /**
     * @var StringLength3 $FirstDepartPoint
     */
    protected $FirstDepartPoint = null;

    /**
     * @var StringLength1to16 $ERSP_UserID
     */
    protected $ERSP_UserID = null;

    /**
     * @var anonymous421 $PersonalCityCode
     */
    protected $PersonalCityCode = null;

    /**
     * @var anonymous422 $AccountingCode
     */
    protected $AccountingCode = null;

    /**
     * @var anonymous423 $OfficeCode
     */
    protected $OfficeCode = null;

    /**
     * @var anonymous424 $DefaultTicketingCarrier
     */
    protected $DefaultTicketingCarrier = null;

    /**
     * @var anonymous425 $AirlineChannelCode
     */
    protected $AirlineChannelCode = null;

    /**
     * @var AgentDepartmentCodeType $AgentDepartmentCode
     */
    protected $AgentDepartmentCode = null;

    /**
     * @var AgentFunctionType $AgentFunction
     */
    protected $AgentFunction = null;

    /**
     * @var ARCNumberType $TravelAgencyIATA
     */
    protected $TravelAgencyIATA = null;

    /**
     * @var ARCNumberType $HomeAgencyIATA
     */
    protected $HomeAgencyIATA = null;

    /**
     * @var ARCNumberType $AgentIATA
     */
    protected $AgentIATA = null;

    /**
     * @var string $VendorCRSCode
     */
    protected $VendorCRSCode = null;

    /**
     * @var CharacterType $AgentDuty
     */
    protected $AgentDuty = null;

    /**
     * @var boolean $AbacusUser
     */
    protected $AbacusUser = null;

    /**
     * @var AlphaLength3 $AgentCity
     */
    protected $AgentCity = null;

    /**
     * @var CarrierCode $Carrier
     */
    protected $Carrier = null;

    /**
     * @var StringLength1to16 $MainTravelAgencyPCC
     */
    protected $MainTravelAgencyPCC = null;

    /**
     * @var StringLength1to16 $HomePCC
     */
    protected $HomePCC = null;

    /**
     * @param UniqueID_Type $RequestorID
     * @param PositionType $Position
     * @param SourceBookingChannelType $BookingChannel
     * @param anonymous319 $Storefront
     * @param StringLength1to16 $AgentSine
     * @param StringLength1to16 $PseudoCityCode
     * @param ISO3166 $ISOCountry
     * @param AlphaLength3 $ISOCurrency
     * @param StringLength1to16 $AgentDutyCode
     * @param UpperCaseAlphaNumericLength2to3 $AirlineVendorID
     * @param UpperCaseAlphaNumericLength3to5 $AirportCode
     * @param StringLength3 $FirstDepartPoint
     * @param StringLength1to16 $ERSP_UserID
     * @param anonymous421 $PersonalCityCode
     * @param anonymous422 $AccountingCode
     * @param anonymous423 $OfficeCode
     * @param anonymous424 $DefaultTicketingCarrier
     * @param anonymous425 $AirlineChannelCode
     * @param AgentDepartmentCodeType $AgentDepartmentCode
     * @param AgentFunctionType $AgentFunction
     * @param ARCNumberType $TravelAgencyIATA
     * @param ARCNumberType $HomeAgencyIATA
     * @param ARCNumberType $AgentIATA
     * @param string $VendorCRSCode
     * @param CharacterType $AgentDuty
     * @param boolean $AbacusUser
     * @param AlphaLength3 $AgentCity
     * @param CarrierCode $Carrier
     * @param StringLength1to16 $MainTravelAgencyPCC
     * @param StringLength1to16 $HomePCC
     */
    public function __construct($RequestorID = null, $Position = null, $BookingChannel = null, $Storefront = null, $AgentSine = null, $PseudoCityCode = null, $ISOCountry = null, $ISOCurrency = null, $AgentDutyCode = null, $AirlineVendorID = null, $AirportCode = null, $FirstDepartPoint = null, $ERSP_UserID = null, $PersonalCityCode = null, $AccountingCode = null, $OfficeCode = null, $DefaultTicketingCarrier = null, $AirlineChannelCode = null, $AgentDepartmentCode = null, $AgentFunction = null, $TravelAgencyIATA = null, $HomeAgencyIATA = null, $AgentIATA = null, $VendorCRSCode = null, $AgentDuty = null, $AbacusUser = null, $AgentCity = null, $Carrier = null, $MainTravelAgencyPCC = null, $HomePCC = null)
    {
      $this->RequestorID = $RequestorID;
      $this->Position = $Position;
      $this->BookingChannel = $BookingChannel;
      $this->Storefront = $Storefront;
      $this->AgentSine = $AgentSine;
      $this->PseudoCityCode = $PseudoCityCode;
      $this->ISOCountry = $ISOCountry;
      $this->ISOCurrency = $ISOCurrency;
      $this->AgentDutyCode = $AgentDutyCode;
      $this->AirlineVendorID = $AirlineVendorID;
      $this->AirportCode = $AirportCode;
      $this->FirstDepartPoint = $FirstDepartPoint;
      $this->ERSP_UserID = $ERSP_UserID;
      $this->PersonalCityCode = $PersonalCityCode;
      $this->AccountingCode = $AccountingCode;
      $this->OfficeCode = $OfficeCode;
      $this->DefaultTicketingCarrier = $DefaultTicketingCarrier;
      $this->AirlineChannelCode = $AirlineChannelCode;
      $this->AgentDepartmentCode = $AgentDepartmentCode;
      $this->AgentFunction = $AgentFunction;
      $this->TravelAgencyIATA = $TravelAgencyIATA;
      $this->HomeAgencyIATA = $HomeAgencyIATA;
      $this->AgentIATA = $AgentIATA;
      $this->VendorCRSCode = $VendorCRSCode;
      $this->AgentDuty = $AgentDuty;
      $this->AbacusUser = $AbacusUser;
      $this->AgentCity = $AgentCity;
      $this->Carrier = $Carrier;
      $this->MainTravelAgencyPCC = $MainTravelAgencyPCC;
      $this->HomePCC = $HomePCC;
    }

    /**
     * @return UniqueID_Type
     */
    public function getRequestorID()
    {
      return $this->RequestorID;
    }

    /**
     * @param UniqueID_Type $RequestorID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setRequestorID($RequestorID)
    {
      $this->RequestorID = $RequestorID;
      return $this;
    }

    /**
     * @return PositionType
     */
    public function getPosition()
    {
      return $this->Position;
    }

    /**
     * @param PositionType $Position
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setPosition($Position)
    {
      $this->Position = $Position;
      return $this;
    }

    /**
     * @return SourceBookingChannelType
     */
    public function getBookingChannel()
    {
      return $this->BookingChannel;
    }

    /**
     * @param SourceBookingChannelType $BookingChannel
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setBookingChannel($BookingChannel)
    {
      $this->BookingChannel = $BookingChannel;
      return $this;
    }

    /**
     * @return anonymous319
     */
    public function getStorefront()
    {
      return $this->Storefront;
    }

    /**
     * @param anonymous319 $Storefront
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setStorefront($Storefront)
    {
      $this->Storefront = $Storefront;
      return $this;
    }

    /**
     * @return StringLength1to16
     */
    public function getAgentSine()
    {
      return $this->AgentSine;
    }

    /**
     * @param StringLength1to16 $AgentSine
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setAgentSine($AgentSine)
    {
      $this->AgentSine = $AgentSine;
      return $this;
    }

    /**
     * @return StringLength1to16
     */
    public function getPseudoCityCode()
    {
      return $this->PseudoCityCode;
    }

    /**
     * @param StringLength1to16 $PseudoCityCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setPseudoCityCode($PseudoCityCode)
    {
      $this->PseudoCityCode = $PseudoCityCode;
      return $this;
    }

    /**
     * @return ISO3166
     */
    public function getISOCountry()
    {
      return $this->ISOCountry;
    }

    /**
     * @param ISO3166 $ISOCountry
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setISOCountry($ISOCountry)
    {
      $this->ISOCountry = $ISOCountry;
      return $this;
    }

    /**
     * @return AlphaLength3
     */
    public function getISOCurrency()
    {
      return $this->ISOCurrency;
    }

    /**
     * @param AlphaLength3 $ISOCurrency
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setISOCurrency($ISOCurrency)
    {
      $this->ISOCurrency = $ISOCurrency;
      return $this;
    }

    /**
     * @return StringLength1to16
     */
    public function getAgentDutyCode()
    {
      return $this->AgentDutyCode;
    }

    /**
     * @param StringLength1to16 $AgentDutyCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setAgentDutyCode($AgentDutyCode)
    {
      $this->AgentDutyCode = $AgentDutyCode;
      return $this;
    }

    /**
     * @return UpperCaseAlphaNumericLength2to3
     */
    public function getAirlineVendorID()
    {
      return $this->AirlineVendorID;
    }

    /**
     * @param UpperCaseAlphaNumericLength2to3 $AirlineVendorID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setAirlineVendorID($AirlineVendorID)
    {
      $this->AirlineVendorID = $AirlineVendorID;
      return $this;
    }

    /**
     * @return UpperCaseAlphaNumericLength3to5
     */
    public function getAirportCode()
    {
      return $this->AirportCode;
    }

    /**
     * @param UpperCaseAlphaNumericLength3to5 $AirportCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setAirportCode($AirportCode)
    {
      $this->AirportCode = $AirportCode;
      return $this;
    }

    /**
     * @return StringLength3
     */
    public function getFirstDepartPoint()
    {
      return $this->FirstDepartPoint;
    }

    /**
     * @param StringLength3 $FirstDepartPoint
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setFirstDepartPoint($FirstDepartPoint)
    {
      $this->FirstDepartPoint = $FirstDepartPoint;
      return $this;
    }

    /**
     * @return StringLength1to16
     */
    public function getERSP_UserID()
    {
      return $this->ERSP_UserID;
    }

    /**
     * @param StringLength1to16 $ERSP_UserID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setERSP_UserID($ERSP_UserID)
    {
      $this->ERSP_UserID = $ERSP_UserID;
      return $this;
    }

    /**
     * @return anonymous421
     */
    public function getPersonalCityCode()
    {
      return $this->PersonalCityCode;
    }

    /**
     * @param anonymous421 $PersonalCityCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setPersonalCityCode($PersonalCityCode)
    {
      $this->PersonalCityCode = $PersonalCityCode;
      return $this;
    }

    /**
     * @return anonymous422
     */
    public function getAccountingCode()
    {
      return $this->AccountingCode;
    }

    /**
     * @param anonymous422 $AccountingCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setAccountingCode($AccountingCode)
    {
      $this->AccountingCode = $AccountingCode;
      return $this;
    }

    /**
     * @return anonymous423
     */
    public function getOfficeCode()
    {
      return $this->OfficeCode;
    }

    /**
     * @param anonymous423 $OfficeCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setOfficeCode($OfficeCode)
    {
      $this->OfficeCode = $OfficeCode;
      return $this;
    }

    /**
     * @return anonymous424
     */
    public function getDefaultTicketingCarrier()
    {
      return $this->DefaultTicketingCarrier;
    }

    /**
     * @param anonymous424 $DefaultTicketingCarrier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setDefaultTicketingCarrier($DefaultTicketingCarrier)
    {
      $this->DefaultTicketingCarrier = $DefaultTicketingCarrier;
      return $this;
    }

    /**
     * @return anonymous425
     */
    public function getAirlineChannelCode()
    {
      return $this->AirlineChannelCode;
    }

    /**
     * @param anonymous425 $AirlineChannelCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setAirlineChannelCode($AirlineChannelCode)
    {
      $this->AirlineChannelCode = $AirlineChannelCode;
      return $this;
    }

    /**
     * @return AgentDepartmentCodeType
     */
    public function getAgentDepartmentCode()
    {
      return $this->AgentDepartmentCode;
    }

    /**
     * @param AgentDepartmentCodeType $AgentDepartmentCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setAgentDepartmentCode($AgentDepartmentCode)
    {
      $this->AgentDepartmentCode = $AgentDepartmentCode;
      return $this;
    }

    /**
     * @return AgentFunctionType
     */
    public function getAgentFunction()
    {
      return $this->AgentFunction;
    }

    /**
     * @param AgentFunctionType $AgentFunction
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setAgentFunction($AgentFunction)
    {
      $this->AgentFunction = $AgentFunction;
      return $this;
    }

    /**
     * @return ARCNumberType
     */
    public function getTravelAgencyIATA()
    {
      return $this->TravelAgencyIATA;
    }

    /**
     * @param ARCNumberType $TravelAgencyIATA
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setTravelAgencyIATA($TravelAgencyIATA)
    {
      $this->TravelAgencyIATA = $TravelAgencyIATA;
      return $this;
    }

    /**
     * @return ARCNumberType
     */
    public function getHomeAgencyIATA()
    {
      return $this->HomeAgencyIATA;
    }

    /**
     * @param ARCNumberType $HomeAgencyIATA
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setHomeAgencyIATA($HomeAgencyIATA)
    {
      $this->HomeAgencyIATA = $HomeAgencyIATA;
      return $this;
    }

    /**
     * @return ARCNumberType
     */
    public function getAgentIATA()
    {
      return $this->AgentIATA;
    }

    /**
     * @param ARCNumberType $AgentIATA
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setAgentIATA($AgentIATA)
    {
      $this->AgentIATA = $AgentIATA;
      return $this;
    }

    /**
     * @return string
     */
    public function getVendorCRSCode()
    {
      return $this->VendorCRSCode;
    }

    /**
     * @param string $VendorCRSCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setVendorCRSCode($VendorCRSCode)
    {
      $this->VendorCRSCode = $VendorCRSCode;
      return $this;
    }

    /**
     * @return CharacterType
     */
    public function getAgentDuty()
    {
      return $this->AgentDuty;
    }

    /**
     * @param CharacterType $AgentDuty
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setAgentDuty($AgentDuty)
    {
      $this->AgentDuty = $AgentDuty;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getAbacusUser()
    {
      return $this->AbacusUser;
    }

    /**
     * @param boolean $AbacusUser
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setAbacusUser($AbacusUser)
    {
      $this->AbacusUser = $AbacusUser;
      return $this;
    }

    /**
     * @return AlphaLength3
     */
    public function getAgentCity()
    {
      return $this->AgentCity;
    }

    /**
     * @param AlphaLength3 $AgentCity
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setAgentCity($AgentCity)
    {
      $this->AgentCity = $AgentCity;
      return $this;
    }

    /**
     * @return CarrierCode
     */
    public function getCarrier()
    {
      return $this->Carrier;
    }

    /**
     * @param CarrierCode $Carrier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setCarrier($Carrier)
    {
      $this->Carrier = $Carrier;
      return $this;
    }

    /**
     * @return StringLength1to16
     */
    public function getMainTravelAgencyPCC()
    {
      return $this->MainTravelAgencyPCC;
    }

    /**
     * @param StringLength1to16 $MainTravelAgencyPCC
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setMainTravelAgencyPCC($MainTravelAgencyPCC)
    {
      $this->MainTravelAgencyPCC = $MainTravelAgencyPCC;
      return $this;
    }

    /**
     * @return StringLength1to16
     */
    public function getHomePCC()
    {
      return $this->HomePCC;
    }

    /**
     * @param StringLength1to16 $HomePCC
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceType
     */
    public function setHomePCC($HomePCC)
    {
      $this->HomePCC = $HomePCC;
      return $this;
    }

}
