<?php
namespace App\GDSIntegration\Tbo\HotelSearch\HotelSearchRequest;

class Filters
{

    /**
     * @var string $HotelName
     * @access public
     */
    public $HotelName = null;

    /**
     * @var HotelRatingInput $StarRating
     * @access public
     */
    public $StarRating = null;

    /**
     * @var OrderByFilter $OrderBy
     * @access public
     */
    public $OrderBy = null;

    /**
     * @var string $HotelCodeList
     * @access public
     */
    public $HotelCodeList = null;

    /**
     * @param string $HotelName
     * @param string $StarRating
     * @param string $OrderBy
     * @param string $HotelCodeList
     * @access public
     */
    public function __construct($HotelName, $StarRating, $OrderBy, $HotelCodeList)
    {
      $this->HotelName = $HotelName;
      $this->StarRating = $StarRating;
      $this->OrderBy = $OrderBy;
      $this->HotelCodeList = $HotelCodeList;
    }

}
