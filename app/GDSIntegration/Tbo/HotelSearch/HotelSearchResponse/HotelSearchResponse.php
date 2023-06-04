<?php
namespace App\GDSIntegration\Tbo\HotelSearch\HotelSearchResponse;

class HotelSearchResponse
{

    /**
     * @var ResponseStatus $Status
     * @access public
     */
    public $Status = null;

    /**
     * @var string $ResponseTime
     * @access public
     */
    public $ResponseTime = null;

    /**
     * @var string $Language
     * @access public
     */
    public $Language = null;

    /**
     * @var string $SessionId
     * @access public
     */
    public $session_id = '';

    /**
     * @var string $NoOfRoomsRequested
     * @access public
     */
    public $numberOfRooms = 0;

    /**
     * @var string $numberOfHotels
     * @access public
     * */
    public $numberOfHotels = 0;

    /**
     * @var string $CityId
     * @access public
     */
    public $CityId = null;

    /**
     * @var string $CheckInDate
     * @access public
     */
    public $checkInDate = '';

    /**
     * @var string $CheckOutDate
     * @access public
     */
    public $CheckOutDate = '';

    /**
     * @var RoomGuest[] $RoomGuests
     * @access public
     */
    public $roomGuests = null;

    /**
     * @var Hotel_Result[] $Hotels
     * @access public
     */
    public $Hotels = [];

    /**
     * @var float $maxPrice
     * @access public
     * */
    public $maxPrice = 0;

    /**
     * @var float $minPrice
     * @access public
     * */
    public $minPrice = 0;

    /**
     * @var array $tripAdviserRatingFilter
     * @access public
     * */
    public $tripAdviserRatingFilter = [];

    /**
     * @var array $hotelNames
     * @access public
     * */
    public $hotelsNames = [];

    /**
     * @param ResponseStatus $Status
     * @param string $ResponseTime
     * @param string $SessionId
     * @param string $NoOfRoomsRequested
     * @param string $CityId
     * @param string $CheckInDate
     * @param string $CheckOutDate
     * @param RoomGuestResponse $RoomGuests
     * @param Hotel_Result[] $HotelResultList
     * @access public
     */
    public function __construct($Status, $ResponseTime, $SessionId, $NoOfRoomsRequested,$numberOfHotels, $CityId, $CheckInDate, $CheckOutDate, $RoomGuests, $HotelResultList)
    {
      $this->Status = $Status;
      $this->ResponseTime = $ResponseTime;
      $this->session_id = $SessionId;
      $this->numberOfRooms = (int)$NoOfRoomsRequested;
      $this->numberOfHotels = $numberOfHotels;
      $this->CityId = $CityId;
      $this->checkInDate = $this->reFormatDate($CheckInDate);
      $this->CheckOutDate = $this->reFormatDate($CheckOutDate);
      $this->roomGuests = $RoomGuests;
      $this->Hotels = $HotelResultList;
      $this->maxPrice = $this->maxPrice($HotelResultList);
      $this->minPrice = $this->minPrice($HotelResultList);
      $this->tripAdviserRatingFilter = $this->tripAdviserReviewsFilters($HotelResultList);
      $this->hotelsNames = $this->hotelsNames($HotelResultList);
    }

    public function reFormatDate($date)
    {
        $dateArray = explode(' ',$date);
        $splitDate = explode('/',$dateArray[0]);
        $newFormat = $splitDate[2].'-'.$splitDate[1].'-'.$splitDate[0];

        return $newFormat;
    }

    public function maxPrice($HotelResultList)
    {
        $price = (float)$HotelResultList[0]->pricingInfo->totalPrice;
        foreach ($HotelResultList as $hotel){
            if($price < $hotel->pricingInfo->totalPrice){
                $price = (float)$hotel->pricingInfo->totalPrice;
            }
        }
        $maxPrice = $price;

        return $maxPrice;
    }

    public function minPrice($HotelResultList)
    {
        $price = (float)$HotelResultList[0]->pricingInfo->totalPrice;
        foreach ($HotelResultList as $hotel){
            if($price > $hotel->pricingInfo->totalPrice){
                $price = (float)$hotel->pricingInfo->totalPrice;
            }
        }
        $minPrice = $price;

        return $minPrice;
    }

    public function tripAdviserReviewsFilters($HotelResultList)
    {
        foreach ($HotelResultList as $hotel){
            if(isset($hotel->TripAdviserRating)){
                $result[] = (string)$hotel->TripAdviserRating;
            }else{
                $result = [];
            }
        }
        $result = array_count_values($result);
        $finalResult = [];
        foreach ($result as $key => $item) {
            $finalResult[] = ['tripAdviserRating' => (float)$key, 'numberOfHotels' => $item];
        }

        return $finalResult;
    }

    public function hotelsNames($hotelResultList)
    {
        $result = [];
        foreach ($hotelResultList as $hotel){
            $result[] = (string)$hotel->HotelName;
        }

        return $result;
    }

}
