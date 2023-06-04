<?php
namespace App\GDSIntegration\Tbo\AvailableHotelRooms;

use App\GDSIntegration\Tbo\ResponseStatus;

class HotelRoomAvailabilityResponse
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
     * @var DayRate $daysRate
     * @access public
     */
    public $daysRate = null;

    /**
     * @var RoomRate $rateSummary
     * @access public
     */
    public $rateSummary;

    /**
     * @var string $promotion
     * @access public
     */
    public $promotion = null;

    /**
     * @var Supplement[] $supplements
     * @access public
     */
    public $supplements = null;

    /**
     * @var string $description
     * @access public
     */
    public $description = null;

    /**
     * @var CancelPolicies $cancelPolicies
     * @access public
     */
    public $cancelPolicies = null;

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
     * @var array $image
     *
     * @access public
     * */
    public $images = [];

    /**
     * @var array $roomCombination
     * @access public
     */
    public $roomCombination = [];

    /**
     * @param int $RoomIndex
     * @param string $RoomTypeName
     * @param string $Inclusion
     * @param string $RoomTypeCode
     * @param string $RatePlanCode
     * @param DayRate[] $RoomRate
     * @param RoomRate $rateSummary
     * @param string $RoomPromtion
     * @param Supplement[] $Supplements
     * @param string $description
     * @param CancelPolicies $CancelPolicies
     * @param string $Amenities
     * @param string $MealType
     *
     * @param array $roomCombination
     * @access public
     */
    public function __construct($RoomIndex,
                                $RoomTypeName, $Inclusion,
                                $RoomTypeCode, $RatePlanCode,
                                $RoomRate,$rateSummary, $RoomPromtion,
                                $Supplements, $description,
                                $CancelPolicies, $Amenities, $MealType,$roomImages,$roomCombination)
    {
        $this->roomIndex = $RoomIndex;
        $this->roomName = $RoomTypeName;
        $this->inclusion = $Inclusion;
        $this->roomCode = $RoomTypeCode;
        $this->ratePlanCode = $RatePlanCode;
        $this->daysRate = $RoomRate;
        $this->rateSummary = $rateSummary;
        $this->promotion = $RoomPromtion;
        $this->supplements = $Supplements;
        $this->description = $description;
        $this->cancelPolicies = $CancelPolicies;
        $this->amenities = $Amenities;
        $this->meal = $MealType;
        $this->images = $roomImages;
        $this->roomCombination = $this->roomCombination($roomCombination,$RoomIndex);
    }

    public function roomCombination($roomCombinations,$roomIndex)
    {
        $roomCombinationIndex = [];
        if(is_array($roomCombinations)){
            foreach ($roomCombinations as $roomCombination){
                if(is_array($roomCombination->RoomIndex)) {
                    $combinationIndices = $roomCombination->RoomIndex;
                    if (in_array($roomIndex, $combinationIndices)) {
                        $roomIndexKey = array_search($roomIndex, $combinationIndices);
                        unset($combinationIndices[$roomIndexKey]);
                        $roomCombinationIndex = array_values($combinationIndices);
                    }
                }
            }
        }else{

            if(is_array($roomCombinations->RoomIndex)) {
                $combinationIndices = $roomCombinations->RoomIndex;
                if (in_array($roomIndex, $combinationIndices)) {
                    $roomIndexKey = array_search($roomIndex, $combinationIndices);
                    unset($combinationIndices[$roomIndexKey]);
                    $roomCombinationIndex = array_values($combinationIndices);
                }
            }
        }


        return $roomCombinationIndex;
    }

}
