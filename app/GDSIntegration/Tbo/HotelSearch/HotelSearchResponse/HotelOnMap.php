<?php


namespace App\GDSIntegration\Tbo\HotelSearch\HotelSearchResponse;


class HotelOnMap
{

    /**
     * @var float $Latitude
     * @access public
     */
    public $Latitude = 0;


    /**
     * @var float $Longitude
     * @access public
     */
    public $Longitude = 0;

    /**
     * @param  double $Latitude
     * @param double $Longitude
     * @access public
     */
    public function __construct($lat, $long)
    {
        $this->Latitude = (float) $lat;
        $this->Longitude = (float) $long;
    }


}
