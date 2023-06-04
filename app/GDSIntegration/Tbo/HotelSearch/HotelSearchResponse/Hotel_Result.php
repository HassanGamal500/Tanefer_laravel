<?php

namespace App\GDSIntegration\Tbo\HotelSearch\HotelSearchResponse;

class Hotel_Result
{

    /**
     * @var int $ResultIndex
     * @access public
     */
    public $HotelIndex = null;

    /**
     * @var string $HotelCode
     * @access public
     */
    public $HotelCode = null;

    /**
     * @var string $HotelName
     * @access public
     */
    public $HotelName = '';

    /**
     * @var string $HotelPicture
     * @access public
     * */
    public $HotelPicture = '';

    /**
     * @var string $HotelDescription
     * @access public
     * */
    public $HotelDescription = '';

    /**
     * @var string $HotelAddress
     * @access public
     * */
    public $HotelAddress = '';

    /**
     * @var PricingInfo $pricingInfo
     * @access public
     */
    public $pricingInfo = [];

    /**
     * @var HotelOnMap $HotelOnMap
     * @access public
     * */
    public $HotelOnMap = [];

    /**
     * @var float $TripAdviserRating
     * @access public
     * */
    public $TripAdviserRating = 0;

    /**
     * @var string TripAdviserUrl
     * @access public
     * */
    public $TripAdviserUrl = '';

    /**
     * @var int $stars
     * @access public
     * */
    public $stars = 0;

    /**
     * @var boolean $MappedHotel
     * @access public
     */
    public $MappedHotel = null;

    /**
     * @var boolean $IsHalal
     * @access public
     */
    public $IsHalal = null;

    /**
     * @param int $ResultIndex
     * @param string $hotelCode
     * @param string $hotelName
     * @param string $hotelPicture
     *
     * @param PricingInfo $pricingInfo
     * @param boolean $MappedHotel
     * @param boolean $IsHalal
     * @access public
     */
    public function __construct($ResultIndex, $hotelCode, $hotelName,$hotelPicture,$hotelDescription,
                                $hotelAddress,$hotelCoordinates,$rating, $pricingInfo, $IsHalal,$tripAdviserRating,$tripAdviserUrl)
    {
      $this->HotelIndex = $ResultIndex;
      $this->HotelCode = $hotelCode;
      $this->HotelName = $hotelName;
      $this->HotelPicture = $hotelPicture;
      $this->HotelDescription = $hotelDescription;
      $this->HotelAddress = $hotelAddress;
      $this->HotelOnMap = $hotelCoordinates;
      $this->TripAdviserRating = (float)$tripAdviserRating;
      $this->TripAdviserUrl  = $tripAdviserUrl;
      $this->stars = $this->convertHotelStarsToInt($rating);
      $this->pricingInfo = $pricingInfo;
      $this->IsHalal = $IsHalal;
    }


    public function convertHotelStarsToInt($starString)
    {
        switch ($starString){
            case 'OneStar':
                $star = 1;
                break;
            case 'TwoStar':
                $star = 2;
                break;
            case 'ThreeStar':
                $star = 3;
                break;
            case 'FourStar':
                $star = 4;
                break;
            case 'FiveStar':
                $star = 5;
                break;
            case 'All':
                $star = 5;
                break;
            default:
                $star = 0;
        }
        return $star;
    }

}
