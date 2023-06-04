<?php

namespace App\GDSIntegration\Tbo\HotelBookingDetails;

class HotelBookingDetailRequest
{

    /**
     * @var int $BookingId
     */
    protected $BookingId = null;

    /**
     * @var string $ConfirmationNo
     */
    protected $ConfirmationNo = null;

    /**
     * @var string $ClientReferenceNumber
     */
    protected $ClientReferenceNumber = null;

    /**
     * @var PaymentModeType $PaymentModeType
     */
    protected $PaymentModeType = null;

    /**
     * @param int $BookingId
     * @param string $ConfirmationNo
     * @param string $ClientReferenceNumber
     */
    public function __construct($ClientReferenceNumber)
    {
      $this->ClientReferenceNumber = $ClientReferenceNumber;
    }

    /**
     * @return int
     */
    public function getBookingId()
    {
      return $this->BookingId;
    }

    /**
     * @param int $BookingId
     * @return HotelBookingDetailRequest
     */
    public function setBookingId($BookingId)
    {
      $this->BookingId = $BookingId;
      return $this;
    }

    /**
     * @return string
     */
    public function getConfirmationNo()
    {
      return $this->ConfirmationNo;
    }

    /**
     * @param string $ConfirmationNo
     * @return HotelBookingDetailRequest
     */
    public function setConfirmationNo($ConfirmationNo)
    {
      $this->ConfirmationNo = $ConfirmationNo;
      return $this;
    }

    /**
     * @return string
     */
    public function getClientReferenceNumber()
    {
      return $this->ClientReferenceNumber;
    }

    /**
     * @param string $ClientReferenceNumber
     * @return HotelBookingDetailRequest
     */
    public function setClientReferenceNumber($ClientReferenceNumber)
    {
      $this->ClientReferenceNumber = $ClientReferenceNumber;
      return $this;
    }

    /**
     * @return PaymentModeType
     */
    public function getPaymentModeType()
    {
      return $this->PaymentModeType;
    }

    /**
     * @param PaymentModeType $PaymentModeType
     * @return HotelBookingDetailRequest
     */
    public function setPaymentModeType($PaymentModeType)
    {
      $this->PaymentModeType = $PaymentModeType;
      return $this;
    }

}
