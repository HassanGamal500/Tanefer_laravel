<?php
namespace App\GDSIntegration\Tbo\AvailableHotelRooms;

class HotelRoomAvailabilityRequest
{

    /**
     * @var string $SessionId
     * @access public
     */
    public $SessionId = null;

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
     * @var int $ResponseTime
     * @access public
     */
    public $ResponseTime = null;

    /**
     * @var boolean $IsCancellationPolicyRequired
     * @access public
     */
    public $IsCancellationPolicyRequired = null;

    /**
     * @param string $SessionId
     * @param int $ResultIndex
     * @param string $HotelCode
     * @param int $ResponseTime
     * @param boolean $IsCancellationPolicyRequired
     * @access public
     */
    public function __construct($SessionId, $ResultIndex, $HotelCode, $ResponseTime, $IsCancellationPolicyRequired)
    {
      $this->SessionId = $SessionId;
      $this->ResultIndex = $ResultIndex;
      $this->HotelCode = $HotelCode;
      $this->ResponseTime = $ResponseTime;
      $this->IsCancellationPolicyRequired = $IsCancellationPolicyRequired;
    }

}
