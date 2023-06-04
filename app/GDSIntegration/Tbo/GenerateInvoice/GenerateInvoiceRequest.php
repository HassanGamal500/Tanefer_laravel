<?php

namespace App\GDSIntegration\Tbo\GenerateInvoice;

class GenerateInvoiceRequest
{
    /**
     * @var string $BookingId
     * @access public
     * */
    public $BookingId;
    /**
     * @var string $ConfirmationNo
     * @access public
     */
    public $ConfirmationNo = null;

    /**
     * @var PaymentInfo $PaymentInfo
     * @access public
     */
    public $PaymentInfo = null;

    /**
     * @param string $ConfirmationNo
     * @param PaymentInfo $PaymentInfo
     * @access public
     */
    public function __construct( $ConfirmationNo, $PaymentInfo)
    {
      $this->BookingId = '';
      $this->ConfirmationNo = $ConfirmationNo;
      $this->PaymentInfo = $PaymentInfo;
    }

}
