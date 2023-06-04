<?php
namespace App\GDSIntegration\Tbo\HotelDetails;

use App\GDSIntegration\Tbo\HotelSearch\HotelSearchResponse\HotelOnMap;

class APIHotelDetails
{

    /**
     * @var string $HotelAddress
     * @access public
     */
    public $HotelAddress = null;

    /**
     * @var HotelOnMap $map
     * @access public
     */
    public $map = [];

    /**
     * @var String $nearByPlaces
     * @access public
     */
    public $nearByPlaces = '';

    /**
     * @var string $HotelCountry
     * @access public
     */
    public $HotelCountry = '';

    /**
     * @var string $CountryCode
     * @access public
     */
    public $CountryCode = null;

    /**
     * @var string $HotelDescription
     * @access public
     */
    public $HotelDescription = '';

    /**
     * @var string $Email
     * @access public
     */
    public $Email = null;

    /**
     * @var string $HotelFax
     * @access public
     */
    public $HotelFax = null;

    /**
     * @var array $HotelFacilities
     * @access public
     */
    public $HotelFacilities = [];

    /**
     * @var string $HotelPolicy
     * @access public
     */
    public $HotelPolicy = null;

    /**
     * @var string $Image
     * @access public
     */
    public $Image = null;

    /**
     * @var array $images
     * @access public
     */
    public $images = [];

    /**
     * @var string $Map
     * @access public
     */
    public $Map = null;

    /**
     * @var string $HotelPhone
     * @access public
     */
    public $HotelPhone = null;

    /**
     * @var string $HotelPinCode
     * @access public
     */
    public $HotelPinCode = null;

    /**
     * @var RoomInfo[] $RoomInfo
     * @access public
     */
    public $RoomInfo = null;

    /**
     * @var String6[] $RoomFacilities
     * @access public
     */
    public $RoomFacilities = null;

    /**
     * @var string $Services
     * @access public
     */
    public $Services = null;

    /**
     * @var string $HotelWebsiteUrl
     * @access public
     */
    public $HotelWebsiteUrl = null;

    /**
     * @var string $TripAdvisorRating
     * @access public
     */
    public $TripAdvisorRating = null;

    /**
     * @var string $TripAdvisorReviewURL
     * @access public
     */
    public $TripAdvisorReviewURL = null;

    /**
     * @var string $HotelCity
     * @access public
     */
    public $HotelCity = null;

    /**
     * @var string $HotelCode
     * @access public
     */
    public $HotelCode = null;

    /**
     * @var string $HotelName
     * @access public
     */
    public $HotelName = null;

    /**
     * @var string $HotelStars
     * @access public
     */
    public $HotelStars = null;

    /**
     * @param string $Address
     * @param string $HotelLocation
     * @param string $Attractions
     * @param string $CountryName
     * @param string $CountryCode
     * @param string $Description
     * @param string $Email
     * @param string $FaxNumber
     * @param array $HotelFacilities
     * @param string $HotelPolicy
     * @param string $Image
     * @param array $ImageUrls
     * @param string $Map
     * @param string $PhoneNumber
     * @param string $PinCode
     * @param RoomInfo[] $RoomInfo
     * @param String6[] $RoomFacilities
     * @param string $Services
     * @param string $HotelWebsiteUrl
     * @param string $TripAdvisorRating
     * @param string $TripAdvisorReviewURL
     * @param string $CityName
     * @param string $HotelCode
     * @param string $HotelName
     * @param string $HotelRating
     * @access public
     */
    public function __construct($Address, $map,
                                $Attractions, $CountryName,
                                $CountryCode, $Description,
                                $Email, $FaxNumber, $HotelFacilities,
                                $HotelPolicy, $Image, $ImageUrls,
                                $PhoneNumber, $PinCode, $TripAdvisorRating,
                                $CityName, $HotelCode, $HotelName, $HotelRating)
    {
      $this->HotelAddress = $Address;
      $this->map = $map;
      $this->nearByPlaces = $Attractions;
      $this->HotelCountry = $CountryName;
      $this->CountryCode = $CountryCode;
      $this->HotelDescription = $Description;
      $this->Email = $Email;
      $this->HotelFax = $FaxNumber;
      $this->HotelFacilities = $HotelFacilities;
      $this->HotelPolicy = $HotelPolicy;
      $this->Image = $Image;
      $this->images = $ImageUrls;
      $this->HotelPhone = $PhoneNumber;
      $this->HotelPinCode = $PinCode;
      $this->TripAdvisorRating = (float)$TripAdvisorRating;
      $this->HotelCity = $CityName;
      $this->HotelCode = $HotelCode;
      $this->HotelName = $HotelName;
      $this->HotelStars = $this->convertHotelStarsToInt($HotelRating);
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
