<?php
namespace App\GDSIntegration\Tbo\AvailableHotelRooms;

class CancelPolicy
{

    /**
     * @var string $roomType
     * @access public
     */
    public $roomType = null;

    /**
     * @var string $roomIndex
     * @access public
     */
    public $roomIndex = null;

    /**
     * @var string $fromDate
     * @access public
     */
    public $fromDate = null;

    /**
     * @var string $toDate
     * @access public
     */
    public $toDate = null;

    /**
     * @var string $chargeType
     * @access public
     */
    public $chargeType = null;

    /**
     * @var float $cancellationCharge
     * @access public
     */
    public $cancellationCharge = null;

    /**
     * @var string $currency
     * @access public
     */
    public $currency = null;

    /**
     * @param string $RoomTypeName
     * @param string $RoomIndex
     * @param string $FromDate
     * @param string $ToDate
     * @param string $ChargeType
     * @param float $CancellationCharge
     * @param string $Currency
     * @access public
     */
    public function __construct($RoomTypeName, $RoomIndex, $FromDate, $ToDate, $ChargeType, $CancellationCharge, $Currency)
    {
      $this->roomType = $RoomTypeName;
      $this->roomIndex = $RoomIndex;
      $this->fromDate = $FromDate;
      $this->toDate = $ToDate;
      $this->chargeType = $ChargeType;
      $this->cancellationCharge = $CancellationCharge;
      $this->currency = $Currency;
    }

}
