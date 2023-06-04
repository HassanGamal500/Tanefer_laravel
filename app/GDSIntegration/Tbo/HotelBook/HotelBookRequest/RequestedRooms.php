<?php

namespace App\GDSIntegration\Tbo\HotelBook\HotelBookRequest;

class RequestedRooms
{

    /**
     * @var int $RoomIndex
     * @access public
     */
    public $RoomIndex = null;

    /**
     * @var string $RoomTypeName
     * @access public
     */
    public $RoomTypeName = null;

    /**
     * @var string $RoomTypeCode
     * @access public
     */
    public $RoomTypeCode = null;

    /**
     * @var string $RatePlanCode
     * @access public
     */
    public $RatePlanCode = null;

    /**
     * @var Rate $RoomRate
     * @access public
     */
    public $RoomRate = null;

    /**
     * @var SuppInfo[] $Supplements
     * @access public
     */
    public $Supplements = null;

    /**
     * @param int $RoomIndex
     * @param string $RoomTypeName
     * @param string $RoomTypeCode
     * @param string $RatePlanCode
     * @param Rate $RoomRate
     * @param SuppInfo[] $Supplements
     * @access public
     */
    public function __construct($RoomIndex, $RoomTypeName, $RoomTypeCode, $RatePlanCode, $RoomRate, $Supplements)
    {
      $this->RoomIndex = $RoomIndex;
      $this->RoomTypeName = $RoomTypeName;
      $this->RoomTypeCode = $RoomTypeCode;
      $this->RatePlanCode = $RatePlanCode;
      $this->RoomRate = $RoomRate;
      $this->Supplements = $Supplements;
    }

}
