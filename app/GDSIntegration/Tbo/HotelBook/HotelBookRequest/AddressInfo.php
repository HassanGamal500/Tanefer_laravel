<?php

namespace App\GDSIntegration\Tbo\HotelBook\HotelBookRequest;

class AddressInfo
{

    /**
     * @var string $AddressLine1
     * @access public
     */
  //  public $AddressLine1 = null;

    /**
     * @var string $AddressLine2
     * @access public
     */
  //  public $AddressLine2 = null;

    /**
     * @var string $CountryCode
     * @access public
     */
   // public $CountryCode = null;

    /**
     * @var string $AreaCode
     * @access public
     */
   // public $AreaCode = null;

    /**
     * @var string $PhoneNo
     * @access public
     */
    public $PhoneNo = null;

    /**
     * @var string $Email
     * @access public
     */
    public $Email = null;

    /**
     * @var string $City
     * @access public
     */
   // public $City = null;

    /**
     * @var string $State
     * @access public
     */
  //  public $State = null;

    /**
     * @var string $Country
     * @access public
     */
  //  public $Country = null;

    /**
     * @var string $ZipCode
     * @access public
     */
  //  public $ZipCode = null;

    /**
   //  * @param string $AddressLine1
  //   * @param string $AddressLine2
  //   * @param string $CountryCode
    // * @param string $AreaCode
     * @param string $PhoneNo
     * @param string $Email
  //   * @param string $City
   //  * @param string $State
   //  * @param string $Country
  //   * @param string $ZipCode
     * @access public
     */
    public function __construct($PhoneNo, $Email)
    {
      //$this->AddressLine1 = $AddressLine1;
     // $this->AddressLine2 = $AddressLine2;
     // $this->CountryCode = $CountryCode;
     // $this->AreaCode = $AreaCode;
      $this->PhoneNo = $PhoneNo;
      $this->Email = $Email;
    //  $this->City = $City;
    //  $this->State = $State;
    //  $this->Country = $Country;
    //  $this->ZipCode = $ZipCode;
    }

}
