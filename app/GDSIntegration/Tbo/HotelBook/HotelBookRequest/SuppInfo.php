<?php

namespace App\GDSIntegration\Tbo\HotelBook\HotelBookRequest;

class SuppInfo
{

    /**
     * @var int $SuppID
     * @access public
     */
    public $SuppID = null;

    /**
     * @var string $SuppChargeType
     * @access public
     */
    public $SuppChargeType = null;

    /**
     * @var float $Price
     * @access public
     */
    public $Price = null;

    /**
     * @var boolean $SuppIsSelected
     * @access public
     */
    public $SuppIsSelected = null;

    /**
     * @param int $SuppID
     * @param string $SuppChargeType
     * @param float $Price
     * @param boolean $SuppIsSelected
     * @access public
     */
    public function __construct($SuppID, $SuppChargeType, $Price, $SuppIsSelected)
    {
      $this->SuppID = $SuppID;
      $this->SuppChargeType = $SuppChargeType;
      $this->Price = $Price;
      $this->SuppIsSelected = $SuppIsSelected;
    }

}
