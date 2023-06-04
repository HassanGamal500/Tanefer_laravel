<?php
namespace App\GDSIntegration\Tbo\AvailabilityAndPricing;

class BookingOptions
{

    /**
     * @var boolean $FixedFormat
     * @access public
     */
    public $FixedFormat = null;

    /**
     * @var RoomCombination[] $RoomCombination
     * @access public
     */
    public $RoomCombination = null;

    /**
     * @param boolean $FixedFormat
     * @param RoomCombination[] $RoomCombination
     * @access public
     */
    public function __construct($RoomCombination)
    {
      $this->FixedFormat = true;
      $this->RoomCombination = $RoomCombination;
    }

}
