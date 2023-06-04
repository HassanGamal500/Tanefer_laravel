<?php
namespace App\GDSIntegration\Tbo\HotelBook\HotelBookRequest;

use Carbon\Carbon;
use DateTime;

class HotelBookRequest
{

    /**
     * @var string $ClientReferenceNumber
     * @access public
     */
    public $ClientReferenceNumber = null;

    /**
     * @var string $GuestNationality
     * @access public
     */
    public $GuestNationality = null;

    /**
     * @var Guest[] $Guests
     * @access public
     */
    public $Guests = null;

    /**
     * @var AddressInfo $AddressInfo
     * @access public
     */
    public $AddressInfo = null;

    /**
     * @var PaymentInfo $PaymentInfo
     * @access public
     */
    public $PaymentInfo = null;

    /**
     * @var string $SessionId
     * @access public
     */
    public $SessionId = null;

    /**
     * @var FlightInfo $FlightInfo
     * @access public
     */
   // public $FlightInfo = null;

    /**
     * @var int $NoOfRooms
     * @access public
     */
    public $NoOfRooms = null;

    /**
     * @var int $ResultIndex
     * @access public
     */
    public $ResultIndex = null;

    /**
     * @var string $HotelCode
     * @access public
     */
    public $HotelCode = null;

    /**
     * @var string $HotelName
     * @access public
     */
    public $HotelName = null;

    /**
     * @var RequestedRooms[] $HotelRooms
     * @access public
     */
    public $HotelRooms = null;

    /**
     * @var SpecialRequest[] $SpecialRequests
     * @access public
     */
   // public $SpecialRequests = null;

    /**
     * @var string $AgencyReferenceNumber
     * @access public
     */
 //   public $AgencyReferenceNumber = null;

    /**
     * @var boolean $RestrictDuplicateBooking
     * @access public
     */
    public $RestrictDuplicateBooking = null;

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
     * @param string $ClientReferenceNumber
     * @param string $GuestNationality
     * @param Guest[] $Guests
     * @param AddressInfo $AddressInfo
     * @param PaymentInfo $PaymentInfo
     * @param string $SessionId
  //   * @param FlightInfo $FlightInfo
     * @param int $NoOfRooms
     * @param int $ResultIndex
     * @param string $HotelCode
     * @param string $HotelName
     * @param RequestedRooms[] $HotelRooms
   //  * @param SpecialRequest[] $SpecialRequests
     * @param string $AgencyReferenceNumber
     * @param boolean $RestrictDuplicateBooking
     * @param dateTime $CheckInDate
     * @param dateTime $CheckOutDate
     * @access public
     */
    public function __construct($ClientReferenceNumber, $GuestNationality, $Guests,$AddressInfo,
                                $PaymentInfo, $SessionId,
                                $NoOfRooms, $ResultIndex, $HotelCode, $HotelName,
                                $HotelRooms,$checkInDate,$checkOutDate)
    {
      $this->ClientReferenceNumber = $ClientReferenceNumber;
      $this->GuestNationality = $GuestNationality;
      $this->Guests = $Guests;
      $this->AddressInfo = $AddressInfo;
      $this->PaymentInfo = $PaymentInfo;
      $this->SessionId = $SessionId;
      $this->NoOfRooms = $NoOfRooms;
      $this->ResultIndex = $ResultIndex;
      $this->HotelCode = $HotelCode;
      $this->HotelName = $HotelName;
      $this->HotelRooms = $HotelRooms;
      $this->RestrictDuplicateBooking = false;
      $this->CheckInDate = $checkInDate;
      $this->CheckOutDate = $checkOutDate;
    }

}
