<?php

namespace App\GDSIntegration\Tbo\HotelCancel;

class HotelCancelRequest
{

    /**
     * @var int $BookingId
     */
    protected $BookingId = null;

    /**
     * @var CancelRequestType $RequestType
     */
    protected $RequestType = null;

    /**
     * @var string $Remarks
     */
    protected $Remarks = null;

    /**
     * @var string $ConfirmationNo
     */
    protected $ConfirmationNo = null;

    /**
     * @var string $ClientReferenceNumber
     */
    protected $ClientReferenceNumber = null;

    /**
     * @var RefundOption $RefundOption
     */
    protected $RefundOption = null;

    /**
     * @param int $BookingId
     * @param CancelRequestType $RequestType
     * @param string $Remarks
     * @param string $ConfirmationNo
     * @param string $ClientReferenceNumber
     * @param RefundOption $RefundOption
     */
    public function __construct($BookingId, $RequestType, $Remarks, $ConfirmationNo, $ClientReferenceNumber, $RefundOption)
    {
      $this->BookingId = $BookingId;
      $this->RequestType = $RequestType;
      $this->Remarks = $Remarks;
      $this->ConfirmationNo = $ConfirmationNo;
      $this->ClientReferenceNumber = $ClientReferenceNumber;
      $this->RefundOption = $RefundOption;
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
     * @return HotelCancelRequest
     */
    public function setBookingId($BookingId)
    {
      $this->BookingId = $BookingId;
      return $this;
    }

    /**
     * @return CancelRequestType
     */
    public function getRequestType()
    {
      return $this->RequestType;
    }

    /**
     * @param CancelRequestType $RequestType
     * @return HotelCancelRequest
     */
    public function setRequestType($RequestType)
    {
      $this->RequestType = $RequestType;
      return $this;
    }

    /**
     * @return string
     */
    public function getRemarks()
    {
      return $this->Remarks;
    }

    /**
     * @param string $Remarks
     * @return HotelCancelRequest
     */
    public function setRemarks($Remarks)
    {
      $this->Remarks = $Remarks;
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
     * @return HotelCancelRequest
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
     * @return HotelCancelRequest
     */
    public function setClientReferenceNumber($ClientReferenceNumber)
    {
      $this->ClientReferenceNumber = $ClientReferenceNumber;
      return $this;
    }

    /**
     * @return RefundOption
     */
    public function getRefundOption()
    {
      return $this->RefundOption;
    }

    /**
     * @param RefundOption $RefundOption
     * @return HotelCancelRequest
     */
    public function setRefundOption($RefundOption)
    {
      $this->RefundOption = $RefundOption;
      return $this;
    }

}
