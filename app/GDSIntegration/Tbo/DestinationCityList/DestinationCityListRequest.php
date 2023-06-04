<?php

namespace App\GDSIntegration\Tbo\DestinationCityList;

class DestinationCityListRequest
{

    /**
     * @var string $CountryCode
     * @access public
     */
    public $CountryCode = null;

    /**
     * @var string $ReturnNewCityCodes
     * @access public
     */
    public $ReturnNewCityCodes = null;

    /**
     * @param string $CountryCode
     * @param string $ReturnNewCityCodes
     * @access public
     */
    public function __construct($CountryCode, $ReturnNewCityCodes)
    {
      $this->CountryCode = $CountryCode;
      $this->ReturnNewCityCodes = $ReturnNewCityCodes;
    }

}
