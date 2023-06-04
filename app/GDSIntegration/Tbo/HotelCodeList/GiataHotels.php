<?php

namespace App\GDSIntegration\Tbo\HotelCodeList;

class GiataHotels
{

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
     * @var string $HotelAddress
     * @access public
     */
    public $HotelAddress = null;

    /**
     * @var string $Latitude
     * @access public
     */
    public $Latitude = null;

    /**
     * @var string $Longitude
     * @access public
     */
    public $Longitude = null;

    /**
     * @var HotelRating $StarRating
     * @access public
     */
    public $StarRating = null;

    /**
     * @var string $CountryName
     * @access public
     */
    public $CountryName = null;

    /**
     * @var string $CityName
     * @access public
     */
    public $CityName = null;

    /**
     * @var string $CountryCode
     * @access public
     */
    public $CountryCode = null;

    /**
     * @param string $HotelCode
     * @param string $HotelName
     * @param string $HotelAddress
     * @param string $Latitude
     * @param string $Longitude
     * @param HotelRating $StarRating
     * @param string $CountryName
     * @param string $CityName
     * @param string $CountryCode
     * @access public
     */
    public function __construct($HotelCode, $HotelName, $HotelAddress, $Latitude, $Longitude, $StarRating, $CountryName, $CityName, $CountryCode)
    {
      $this->HotelCode = $HotelCode;
      $this->HotelName = $HotelName;
      $this->HotelAddress = $HotelAddress;
      $this->Latitude = $Latitude;
      $this->Longitude = $Longitude;
      $this->StarRating = $StarRating;
      $this->CountryName = $CountryName;
      $this->CityName = $CityName;
      $this->CountryCode = $CountryCode;
    }

}
