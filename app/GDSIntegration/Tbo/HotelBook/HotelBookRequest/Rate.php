<?php

namespace App\GDSIntegration\Tbo\HotelBook\HotelBookRequest;

class Rate
{

    /**
     * @var float $RoomFare
     * @access public
     */
    public $RoomFare = null;

    /**
     * @var float $RoomTax
     * @access public
     */
    public $RoomTax = null;

    /**
     * @var float $TotalFare
     * @access public
     */
    public $TotalFare = null;

    /**
     * @param float $RoomFare
     * @param float $RoomTax
     * @param float $TotalFare
     * @access public
     */
    public function __construct($RoomFare, $RoomTax, $TotalFare)
    {
      $this->RoomFare = $RoomFare;
      $this->RoomTax = $RoomTax;
      $this->TotalFare = $TotalFare;
    }

}
