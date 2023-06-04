<?php
namespace App\GDSIntegration\Tbo\HotelBook\HotelBookRequest;

class PaymentInfo
{
    /**
     * @var boolean $VoucherBooking
     * @access public
     */
    public $VoucherBooking = null;

    /**
     * @var string $PaymentModeType
     * @access public
     */
    public $PaymentModeType = null;

    /**
     * @param boolean $VoucherBooking
     * @access public
     */
    public function __construct($VoucherBooking)
    {
      $this->VoucherBooking = $VoucherBooking;
      $this->PaymentModeType = 'Limit';
    }

}
