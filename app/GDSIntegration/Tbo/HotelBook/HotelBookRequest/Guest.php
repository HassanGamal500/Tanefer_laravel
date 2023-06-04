<?php
namespace App\GDSIntegration\Tbo\HotelBook\HotelBookRequest;

class Guest
{

    /**
     * @var string $Title
     * @access public
     */
    public $Title = null;

    /**
     * @var string $FirstName
     * @access public
     */
    public $FirstName = null;

    /**
     * @var string $LastName
     * @access public
     */
    public $LastName = null;

    /**
     * @var int $Age
     * @access public
     */
    public $Age = null;

    /**
     * @var boolean $LeadGuest
     * @access public
     */
    public $LeadGuest = null;

    /**
     * @var string $GuestType
     * @access public
     */
    public $GuestType = null;

    /**
     * @var int $GuestInRoom
     * @access public
     */
    public $GuestInRoom = null;

    /**
     * @param string $Title
     * @param string $FirstName
     * @param string $LastName
     * @param int $Age
     * @param boolean $LeadGuest
     * @param string $GuestType
     * @param int $GuestInRoom
     * @access public
     */
    public function __construct($Title, $FirstName, $LastName, $LeadGuest, $GuestType, $GuestInRoom, $Age = 0)
    {
      $this->Title = $Title;
      $this->FirstName = $FirstName;
      $this->LastName = $LastName;
      $this->Age = (string)$Age;
      $this->LeadGuest = $LeadGuest;
      $this->GuestType = $GuestType;
      $this->GuestInRoom = (string)$GuestInRoom;
    }

}
