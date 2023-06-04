<?php
namespace App\GDSIntegration\Tbo\HotelDetails;

class HotelDetailsRequest
{

    /**
     * @var int $ResultIndex
     * @access public
     */
    public $ResultIndex = null;

    /**
     * @var string $SessionId
     * @access public
     */
    public $SessionId = null;

    /**
     * @var string $HotelCode
     * @access public
     */
    public $HotelCode = null;


    /**
     * @param int $ResultIndex
     * @param string $SessionId
     * @param string $HotelCode
     * @access public
     */
    public function __construct($ResultIndex, $SessionId, $HotelCode)
    {
      $this->ResultIndex = $ResultIndex;
      $this->SessionId = $SessionId;
      $this->HotelCode = $HotelCode;
    }

}
