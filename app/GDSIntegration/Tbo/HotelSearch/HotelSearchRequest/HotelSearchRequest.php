<?php

namespace App\GDSIntegration\Tbo\HotelSearch\HotelSearchRequest;

class HotelSearchRequest
{

    /**
     * @var dateTime $CheckInDate
     * @access public
     */
    public $CheckInDate = null;

    /**
     * @var dateTime $CheckOutDate
     * @access public
     */
    public $CheckOutDate = null;

    /**
     * @var string $CountryName
     * @access public
     */
    public $CountryName = null;

    /**
     * @var string $CityName
     * @access public
     */
    public $CityName = null;

    /**
     * @var int $CityId
     * @access public
     */
    public $CityId = null;

    /**
     * @var boolean $IsNearBySearchAllowed
     * @access public
     */
    public $IsNearBySearchAllowed = null;

    /**
     * @var int $NoOfRooms
     * @access public
     */
    public $NoOfRooms = null;

    /**
     * @var string $GuestNationality
     * @access public
     */
    public $GuestNationality = null;

    /**
     * @var RoomGuest[] $RoomGuests
     * @access public
     */
    public $RoomGuests = null;

    /**
     * @var string $PreferredCurrencyCode
     * @access public
     */
    public $PreferredCurrencyCode = null;

    /**
     * @var int $ResultCount
     * @access public
     */
    public $ResultCount = null;

    /**
     * @var Filters $Filters
     * @access public
     */
    public $Filters = null;

    /**
     * @var string $IsRoomInfoRequired
     * @access public
     */
    public $IsRoomInfoRequired = null;

    /**
     * @var GeoCodes $GeoCodes
     * @access public
     */
    public $GeoCodes = null;

    /**
     * @var int $ResponseTime
     * @access public
     */
    public $ResponseTime = null;

    /**
     * @param dateTime $CheckInDate
     * @param dateTime $CheckOutDate
     * @param string $CountryName
     * @param string $CityName
     * @param int $CityId
     * @param boolean $IsNearBySearchAllowed
     * @param int $NoOfRooms
     * @param string $GuestNationality
     * @param RoomGuest[] $RoomGuests
     * @param string $PreferredCurrencyCode
     * @param int $ResultCount
     * @param Filters $Filters
     * @param string $IsRoomInfoRequired
     * @param GeoCodes $GeoCodes
     * @param int $ResponseTime
     * @access public
     */
    public function __construct($CheckInDate, $CheckOutDate, $CountryName, $CityName, $CityId, $IsNearBySearchAllowed, $NoOfRooms, $GuestNationality, $RoomGuests, $PreferredCurrencyCode, $ResultCount, $Filters, $IsRoomInfoRequired, $GeoCodes, $ResponseTime)
    {
      $this->CheckInDate = $CheckInDate;
      $this->CheckOutDate = $CheckOutDate;
      $this->CountryName = $CountryName;
      $this->CityName = $CityName;
      $this->CityId = $CityId;
      $this->IsNearBySearchAllowed = $IsNearBySearchAllowed;
      $this->NoOfRooms = $NoOfRooms;
      $this->GuestNationality = $GuestNationality;
      $this->RoomGuests = $RoomGuests;
      $this->PreferredCurrencyCode = $PreferredCurrencyCode;
      $this->ResultCount = $ResultCount;
      $this->Filters = $Filters;
      $this->IsRoomInfoRequired = $IsRoomInfoRequired;
      $this->GeoCodes = $GeoCodes;
      $this->ResponseTime = $ResponseTime;
    }

}
