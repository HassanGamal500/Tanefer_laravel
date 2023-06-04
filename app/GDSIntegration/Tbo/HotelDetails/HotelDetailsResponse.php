<?php
namespace App\GDSIntegration\Tbo\HotelDetails;

use App\GDSIntegration\Tbo\ResponseStatus;

class HotelDetailsResponse
{

    /**
     * @var ResponseStatus $Status
     * @access public
     */
    public $Status = null;

    /**
     * @var APIHotelDetails $Hotel
     * @access public
     */
    public $Hotel = null;

    /**
     * @param ResponseStatus $Status
     * @param APIHotelDetails $HotelDetails
     * @access public
     */
    public function __construct($Status, $HotelDetails)
    {
      $this->Status = $Status;
      $this->Hotel = $HotelDetails;
    }

}
