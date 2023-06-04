<?php

namespace App\GDSIntegration\Tbo\HotelCodeList;

use App\GDSIntegration\Tbo\ResponseStatus;

class TBOHotelCodesResponse
{

    /**
     * @var ResponseStatus $Status
     * @access public
     */
    public $Status = null;

    /**
     * @var GiataHotels[] $Hotels
     * @access public
     */
    public $Hotels = null;

    /**
     * @var APIHotelDetails[] $HotelDetails
     * @access public
     */
    public $HotelDetails = null;

    /**
     * @param ResponseStatus $Status
     * @param GiataHotels[] $Hotels
     * @param APIHotelDetails[] $HotelDetails
     * @access public
     */
    public function __construct($Status, $Hotels, $HotelDetails)
    {
      $this->Status = $Status;
      $this->Hotels = $Hotels;
      $this->HotelDetails = $HotelDetails;
    }

}
