<?php
namespace App\GDSIntegration\Tbo\HotelBook;

use App\GDSIntegration\Tbo\ResponseStatus;

class HotelBookResponse
{

    /**
     * @var string $BookingStatus
     * @access public
     */
    public $BookingStatus = null;

    /**
     * @var int $BookingId
     * @access public
     */
    public $BookingId = null;

    /**
     * @var string $BookingNo
     * @access public
     */
    public $BookingNo = null;

    /**
     * @var int $TripId
     * @access public
     */
    public $TripId = null;

    /**
     * @var string $SupplierReferenceNo
     * @access public
     */
 //   public $SupplierReferenceNo = null;

    /**
     * @var PriceChangeStatus $PriceChange
     * @access public
     */
  //  public $PriceChange = null;

    /**
     * @var string $SupplierConfirmationNo
     * @access public
     */
  //  public $SupplierConfirmationNo = null;

    public $NotBooked;

    public $clientNumber = '';
    public $lastCancellationDeadLine = '';

    /**
     * @param string $BookingStatus
     * @param int $BookingId
     * @param string $ConfirmationNo
     * @param int $TripId
     * @param PriceChangeStatus $PriceChange
     * @param array $notBook
     * @access public
     */
    public function __construct($PriceChange = null,$BookingStatus = null, $BookingId = null, $ConfirmationNo = null,
                                 $TripId = null,$clientNumber = null,$lastCancellationDeadLine = null )
    {
      $this->BookingStatus = $BookingStatus;
      $this->BookingId = $BookingId;
      $this->BookingNo = $ConfirmationNo;
      $this->TripId = $TripId;
      $this->PriceChange = $PriceChange;
      $this->clientNumber = $clientNumber;
      $this->lastCancellationDeadLine = $lastCancellationDeadLine;
      $this->NotBooked = $this->notBook($PriceChange);
    }


    private function notBook($changePrice)
    {
        if(is_null($changePrice)){
            return null;
        }
        $response['newPrice'] = $changePrice->NewPrice;
        $response['currency'] = $changePrice->Currency;
        $rooms = $changePrice->HotelRooms->HotelRoom;
        if(isset($rooms[0])){
            $roomsData = $rooms;
        }else{
            $roomsData[0] = $rooms;
        }
        for($i=0; $i<count($roomsData); $i++){
            $response['rooms'][$i]['roomIndex'] = $roomsData[$i]->RoomIndex;
            $response['rooms'][$i]['roomCode']  = $roomsData[$i]->RoomTypeCode;
            $response['rooms'][$i]['ratePlanCode'] = $roomsData[$i]->RatePlanCode;
            $response['rooms'][$i]['roomName'] = $roomsData[$i]->RoomTypeName;
            $response['rooms'][$i]['inclusion'] = $roomsData[$i]->Inclusion ?? '';
            $response['rooms'][$i]['description'] = $roomsData[$i]->RoomAdditionalInfo->Description ?? '';
            $response['rooms'][$i]['image']       = $roomsData[$i]->RoomAdditionalInfo->ImageURLs->URL ?? [];
            $response['rooms'][$i]['amenities'] = $roomsData[$i]->Amenities ?? '';
            $response['rooms'][$i]['rateSummary']['currency'] = $roomsData[$i]->RoomRate->Currency;
            $response['rooms'][$i]['rateSummary']['baseFare']     = round($roomsData[$i]->RoomRate->RoomFare,2);
            $response['rooms'][$i]['rateSummary']['tax']      = round($roomsData[$i]->RoomRate->RoomTax,2);
            $response['rooms'][$i]['rateSummary']['totalFare'] =   round($roomsData[$i]->RoomRate->TotalFare,2);

            $dayRate = $roomsData[$i]->RoomRate->DayRates->DayRate;
            if(isset($dayRate[0])){
                $dayRates = $dayRate;
            }else{
                $dayRates[0] = $dayRate;
            }

            for($d=0; $d < count($dayRates); $d++){
                $dayRate = $dayRates[$d];
                $response['rooms'][$i]['daysRate'][$d]['date'] = explode('T',$dayRate->Date)[0];
                $response[$i]['daysRate'][$d]['baseFare'] = (float)number_format((float)$dayRate->BaseFare,2,'.','');
            }
        }

        return $response;
    }

}
