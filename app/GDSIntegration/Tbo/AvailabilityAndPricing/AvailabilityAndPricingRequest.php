<?php
namespace App\GDSIntegration\Tbo\AvailabilityAndPricing;

class AvailabilityAndPricingRequest
{

    /**
     * @var int $ResultIndex
     * @access public
     */
    public $ResultIndex = null;

    /**
     * @var int $HotelCode
     * @access public
     */
    public $HotelCode = 0;

    /**
     * @var string $SessionId
     * @access public
     */
    public $SessionId = null;

    /**
     * @var BookingOptions $OptionsForBooking
     * @access public
     */
    public $OptionsForBooking = null;

    /**
     * @var boolean $IsRoomInformationRequired
     * @access public
     */
    public $IsRoomInformationRequired = null;


    /**
     * @param int $ResultIndex
     * @param string $SessionId
     * @param BookingOptions $OptionsForBooking
     * @access public
     */
    public function __construct($ResultIndex,$HotelCode, $SessionId, $OptionsForBooking)
    {
      $this->ResultIndex = $ResultIndex;
      $this->HotelCode = $HotelCode;
      $this->SessionId = $SessionId;
      $this->OptionsForBooking = $OptionsForBooking;
      $this->IsRoomInformationRequired = false;
      $this->PaymentModeType = 'Limit';
    }

}
