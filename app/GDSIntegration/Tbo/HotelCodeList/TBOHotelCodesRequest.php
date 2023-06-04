<?php

namespace App\GDSIntegration\Tbo\HotelCodeList;

class TBOHotelCodesRequest
{

    /**
     * @var string $CityCode
     * @access public
     */
    public $CityCode = null;

    /**
     * @var string $IsDetailedResponse
     * @access public
     */
    public $IsDetailedResponse = null;

    /**
     * @param string $CityCode
     * @param string $IsDetailedResponse
     * @access public
     */
    public function __construct($CityCode, $IsDetailedResponse)
    {
      $this->CityCode = $CityCode;
      $this->IsDetailedResponse = $IsDetailedResponse;
    }

}
