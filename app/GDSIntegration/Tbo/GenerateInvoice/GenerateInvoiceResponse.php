<?php
namespace App\GDSIntegration\Tbo\GenerateInvoice;

use App\GDSIntegration\Tbo\ResponseStatus;

class GenerateInvoiceResponse
{

    /**
     * @var ResponseStatus $Status
     * @access public
     */
    public $Status = null;

    /**
     * @var string $BookingId
     * @access public
     */
    public $BookingId = null;

    /**
     * @var string $InvoiceNo
     * @access public
     */
    public $InvoiceNo = null;

    /**
     * @param ResponseStatus $Status
     * @param string $BookingId
     * @param string $InvoiceNo
     * @access public
     */
    public function __construct($Status, $BookingId, $InvoiceNo)
    {
      $this->Status = $Status;
      $this->BookingId = $BookingId;
      $this->InvoiceNo = $InvoiceNo;
    }

}
