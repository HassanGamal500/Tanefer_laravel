<?php


namespace App\GDSIntegration\Tbo\HotelSearch\HotelSearchResponse;


class RoomGuestResponse
{


    /**
     * @var int $Adults
     * @access public
     */
    public $Adults = 0;

    /**
     * @var int $Children
     * @access public
     */
    public $Children = 0;

    /**
     * @param int $Adults
     * @param int $Children
     * @access public
     */
    public function __construct($AdultCount, $ChildCount)
    {
        $this->Adults = $AdultCount;
        $this->Children = $ChildCount;
    }

}
