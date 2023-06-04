<?php
namespace App\GDSIntegration\Tbo\AvailabilityAndPricing;

use App\GDSIntegration\Tbo\AvailableHotelRooms\CancelPolicies;
use App\GDSIntegration\Tbo\AvailableHotelRooms\DayRate;
use App\GDSIntegration\Tbo\AvailableHotelRooms\RoomRate;
use App\GDSIntegration\Tbo\AvailableHotelRooms\Supplement;

class Hotel_Room
{

    /**
     * @var int $roomIndex
     * @access public
     */
    public $roomIndex = null;

    /**
     * @var string $roomName
     * @access public
     */
    public $roomName = null;

    /**
     * @var string $inclusion
     * @access public
     */
    public $inclusion = null;

    /**
     * @var string $roomCode
     * @access public
     */
    public $roomCode = null;

    /**
     * @var string $ratePlanCode
     * @access public
     */
    public $ratePlanCode = null;

    /**
     * @var RoomRate $rateSummary
     * @access public
     */
    public $rateSummary = null;

    /**
     * @var DayRate[] $daysRate
     * @access public
     * */
    public $daysRate = [];


    /**
     * @var string $description
     * @access public
     */
    public $description = null;

    /**
     * @var string $amenities
     * @access public
     */
    public $amenities = null;

    /**
     * @var string $meal
     * @access public
     */
    public $meal = null;

    /**
     * @param int $RoomIndex
     * @param string $RoomTypeName
     * @param string $Inclusion
     * @param string $RoomTypeCode
     * @param string $RatePlanCode
     * @param RoomRate $RoomRate
     * @param string $description
     * @param DayRate[] $daysRate
     * @param string $Amenities
     * @param string $MealType
     * @access public
     */
    public function __construct($RoomIndex, $RoomTypeName,
                                $Inclusion, $RoomTypeCode,
                                $RatePlanCode, $RoomRate,
                                $description, $daysRate,
                                $Amenities, $MealType)
    {
      $this->roomIndex = $RoomIndex;
      $this->roomName = $RoomTypeName;
      $this->inclusion = $Inclusion;
      $this->roomCode = $RoomTypeCode;
      $this->ratePlanCode = $RatePlanCode;
      $this->rateSummary = $RoomRate;
      $this->description = $description;
      $this->daysRate = $daysRate;
      $this->amenities = $Amenities;
      $this->meal = $MealType;
    }

}
