<?php
namespace App\GDSIntegration\Tbo\HotelSearch\HotelSearchRequest;

class RoomGuest
{

    /**
     * @var Int[] $ChildAge
     * @access public
     */
    public $ChildAge = null;

    /**
     * @var int $AdultCount
     * @access public
     */
    public $AdultCount = null;

    /**
     * @var int $ChildCount
     * @access public
     */
    public $ChildCount = null;

    /**
     * @param Int[] $ChildAge
     * @param int $AdultCount
     * @param int $ChildCount
     * @access public
     */
    public function __construct($ChildAge, $AdultCount, $ChildCount)
    {
      $this->ChildAge = $ChildAge;
      $this->AdultCount = $AdultCount;
      $this->ChildCount = $ChildCount;
    }

}
