<?php
namespace App\GDSIntegration\Tbo\AvailabilityAndPricing;

class RoomCombination
{

    /**
     * @var int[] $RoomIndex
     * @access public
     */
    public $RoomIndex = null;


    /**
     * @param int[] $RoomIndex
     * @access public
     */
    public function __construct($RoomIndex)
    {
      $this->RoomIndex = $RoomIndex;
    }

}
