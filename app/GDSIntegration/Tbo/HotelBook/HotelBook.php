<?php


namespace App\GDSIntegration\Tbo\HotelBook;


use App\GDSIntegration\HttpClient\HttpClient;
use App\GDSIntegration\Tbo\HotelBook\HotelBookRequest\AddressInfo;
use App\GDSIntegration\Tbo\HotelBook\HotelBookRequest\Guest;
use App\GDSIntegration\Tbo\HotelBook\HotelBookRequest\HotelBookRequest;
use App\GDSIntegration\Tbo\HotelBook\HotelBookRequest\PaymentInfo;
use App\GDSIntegration\Tbo\HotelBook\HotelBookRequest\Rate;
use App\GDSIntegration\Tbo\HotelBook\HotelBookRequest\RequestedRooms;
use App\GDSIntegration\Tbo\HotelBook\HotelBookRequest\SuppInfo;
use App\GDSIntegration\Tbo\ResponseStatus;
use App\GDSIntegration\Tbo\TBOIntegration;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HotelBook extends TBOIntegration
{
    public function __construct()
    {
        $actionHeader = new \SoapHeader('http://www.w3.org/2005/08/addressing',
            'Action','http://TekTravel/HotelBookingApi/HotelBook');
        parent::__construct($actionHeader);
    }

    public function bookResponse($request,$clientNumber,$hotelBook)
    {
        $guests = $this->guests($request['guests']);
        $tomorrow = Carbon::now()->addDays(1);
        if(array_key_exists('lastCancellationDeadLine',$request) && $tomorrow->gte(Carbon::parse($request['lastCancellationDeadLine']))){
            $voucher = true;
        }else{
            $voucher = false;
        }

        $paymentInfo = new PaymentInfo($voucher);

        $rooms = $this->hotelRooms($hotelBook['HotelRooms']);

        $address = $this->leadGuestAddressInfo($request);

        $hotelBookRequest = new HotelBookRequest($clientNumber,$request['guestNationality'],$guests,$address,$paymentInfo,$request['sessionId'],
        $request['numberOfRooms'],$request['hotelIndex'],$request['hotelCode'],str_replace(array(':', '-', '/', '*','&'), '', $request['hotelName']),
        $rooms,$hotelBook['Hotel']['checkInDate'],$hotelBook['Hotel']['CheckOutDate']);

        Storage::put('tboRequests/'.$this->nowDate.'/HotelBook/'.$this->nowTime.'hotelBookRQ.json',json_encode($hotelBookRequest));
        try {
            $response = $this->HotelBook($hotelBookRequest);
            $xmlRequest = $this->__getLastRequest();
            $xmlResponse = $this->__getLastResponse();
            Storage::put('tboRequests/'.$this->nowDate.'/HotelBook/'.$this->nowTime.'hotelBookRQ.xml',$xmlRequest);
            Storage::put('tboRequests/'.$this->nowDate.'/HotelBook/'.$this->nowTime.'hotelBookRS.json',json_encode($response));
           Storage::put('tboRequests/'.$this->nowDate.'/HotelBook/'.$this->nowTime.'hotelBookRS.xml',$xmlResponse);

        }catch (\Exception $exception){
            if(app()->environment('local')){
                 dd($exception->detail);
            }
            sendErrorToMail($exception);
            return 'You cannot complete this booking';
        }

        $status = new ResponseStatus($response->Status->StatusCode,$response->Status->Description,null);

        if($status->StatusCode != 1){
            $descArray = explode(':',$status->Description);
            unset($descArray[0]);

            return implode(' ',$descArray);
        }

        if(isset($response->PriceChange->Status) && $response->PriceChange->Status){
            $hotelBookResponse = new HotelBookResponse($response->PriceChange);
        }else{
            $lastCancellationDeadLine = array_key_exists('lastCancellationDeadLine',$request) ? $request['lastCancellationDeadLine'] : null;
            $hotelBookResponse = new HotelBookResponse(null,$response->BookingStatus,$response->BookingId,$response->ConfirmationNo,$response->TripId,
                $clientNumber,$lastCancellationDeadLine);
        }

        return $hotelBookResponse;
    }



    public function guests($guests)
    {
        foreach ($guests as $guest){
            if($guest['isLead'] == 1 || $guest['isLead'] == true) {
                $leadGuest[] = new Guest($guest['title'],$guest['firstName'],$guest['lastName'],(bool)$guest['isLead'],$guest['guestType'],$guest['InRoom']);
            }else{
                $allGuests[] = new Guest($guest['title'],$guest['firstName'],$guest['lastName'],(bool)$guest['isLead'],$guest['guestType'],
                    $guest['InRoom'],$guest['guestType'] == 'Child'?$guest['childAge']:0);
            }
        }

        return array_merge($leadGuest,$allGuests??[]);
    }

    public function hotelRooms($rooms)
    {
        foreach ($rooms as $room){
            $roomRate = new Rate($room->rateSummary->originalBaseFare,$room->rateSummary->tax,$room->rateSummary->originalTotalRate);

            foreach ($room->supplements as $supplement){
                $roomSupplement[] = new SuppInfo($supplement->id,$supplement->chargeType,$supplement->price,$supplement->isMandatory);
            }


            $hotelRooms[] = new RequestedRooms($room->roomIndex,$room->roomName,$room->roomCode,$room->ratePlanCode,
            $roomRate,$roomSupplement??null);
        }

        return $hotelRooms;
    }

    public function leadGuestAddressInfo($request)
    {
        if(isset($request['phoneNumber'])){
            $addressInfo = new AddressInfo($request['phoneNumber'],$request['email']);
        }else{
            $addressInfo = new \stdClass();
        }
      return $addressInfo;
    }

}
