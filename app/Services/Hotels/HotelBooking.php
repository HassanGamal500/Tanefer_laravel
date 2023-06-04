<?php


namespace App\Services\Hotels;


use Carbon\Carbon;
use App\Jobs\RedeemPoint;
use App\Enum\PaymentStatus;
use App\Jobs\SaveHotelBooking;
use App\PaymentGateway\Payfort;
use App\Enum\HotelBookingStatus;
use App\PaymentGateway\AuthorizeNet;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Jobs\SendHotelBookMailToCustomerJob;
use App\Services\CheckPointsForRedeemService;
use App\GDSIntegration\Tbo\HotelBook\HotelBook;

class HotelBooking
{
    public function index()
    {

    }

    public function create($request)
    {
        $client = resolve('client');
        $mainClient = $client->parentClient ?? $client;
        $paymentMethod = resolve('paymentMethod');
        //TODO custom validation rule
        $tempGuest = '';
        foreach ($request->guests as $guest){
            $isLead = $guest['isLead'];

            if($isLead){
                $contact_person = $guest['firstName']. ' '.$guest['lastName'];
            }
            $guestName = strtoupper($guest['firstName']).' '.strtoupper($guest['lastName']);

            if($tempGuest != '' && $guestName == $tempGuest){
                return ['data' => new \stdClass(), 'message' => 'Guest '.$guestName.' repeated' ,'status' => 422];
            }
            $tempGuest = $guestName;
        }

        if(Cache::has($request->sessionId)){
            $hotelBookDetails = Cache::get($request->sessionId);
        }else{
            return ['data' => new \stdClass(), 'message' => 'Session Expired' ,'status' => 410];
        }

        if(auth()->guard('api')->check()){
            $customerEmail = auth()->guard('api')->user()->email;
        }else{
            $customerEmail = $request->email;
        }


        $totalAmountT = 0;
        foreach ($hotelBookDetails['HotelRooms'] as $room){
            $totalAmountT += $room->rateSummary->totalFare;
        }

        $totalAmount = round($totalAmountT,2);


        //if user want to redeem points
        if(auth()->guard('api')->check() && isset($request->redeem)){
            $authUser = auth()->guard('api')->user();
            if(CheckPointsForRedeemService::checkUserPointsLessThanMin($authUser)){
                return ['data' => new \stdClass(), 'message' => 'Your points less than minimum value of redeem' ,'status' => 422];
            }
            if(CheckPointsForRedeemService::checkUserPointsNotAvailableToRedeem($totalAmount,$authUser)){
                return ['data' => new \stdClass(), 'message' => 'Your Points didn\'t enough to redeem' ,'status' => 422];
            }

            $clientReference = Carbon::now()->format('dmyHisv').'#'.$this->generateRandomString(4);
            $hotelBook = new HotelBook();
            $hotelBookResponse = $hotelBook->bookResponse($request,$clientReference,$hotelBookDetails);

            if(is_string($hotelBookResponse)){
                return ['data' => new \stdClass(), 'message' => $hotelBookResponse ,'status' => 500];
            }
            switch ($hotelBookResponse->BookingStatus){
                case 'Confirmed':
                    $bookingStatus = HotelBookingStatus::Confirmed;
                    break;
                case 'Vouchered':
                    $bookingStatus = HotelBookingStatus::Vouchered;
                    break;
                default:
                    $bookingStatus = null;
            }

            dispatch(new SaveHotelBooking($request->all(),$bookingStatus,PaymentStatus::Released,
            null,null,0,$request->lastCancellationDeadLine,$clientReference,
                $hotelBookResponse->BookingNo,'Free',
                '',$client,$mainClient,$authUser,$hotelBookDetails['HotelRooms']))->delay(20);

            dispatch(new RedeemPoint($hotelBookResponse->BookingNo,$totalAmount,$authUser))->delay(now()->addSeconds(23));

            dispatch(new SendHotelBookMailToCustomerJob($contact_person,
                $hotelBookDetails,$customerEmail,$hotelBookResponse->BookingNo,$totalAmount,$client))->delay(25);

            return ['data' => $hotelBookResponse, 'message' => 'Hotel Booked Successfully' ,'status' => 200];
        }
        // end redeem process and return

        //Payment Gateway call
        $data['request'] = $request->all();
        $data['totalAmount'] = $totalAmount;
        $data['client'] = $client;
        $data['mainClient'] = $mainClient;
        $data['hotelBookDetails'] = $hotelBookDetails;
        $data['contact_person'] = $contact_person;
        $data['customerEmail'] = $customerEmail;
        Cache::put('HotelBookingData', $data, now()->addMinutes(60));

        //$authorizeNet = new AuthorizeNet();
        
        $holdResponse = $paymentMethod->holdAndApproveTransaction($request->creditCardInfo,$totalAmount,$request->sessionId);
        if($paymentMethod instanceof Payfort){
            return $holdResponse;
        }
        

        $returnResponse = $paymentMethod->responseStatusAndMessage($holdResponse);

        $returnResponseContent = json_decode($returnResponse->content());

        if($returnResponseContent->status == true){

            $authUser = auth()->guard('api')->user();

            //success hold money
            $authCode = $returnResponseContent->data->authCode;
            $transactionId = $returnResponseContent->data->transactionId;

            //save success hold transaction

            dispatch(new SaveHotelBooking($request->all(),HotelBookingStatus::Pending,PaymentStatus::Hold,
            $authCode,$transactionId,$totalAmount,null,null,null,
            'Credit Card',
                null,$client,
                $mainClient,
                $authUser,
                $hotelBookDetails['HotelRooms']))->delay(20);

            $clientReference = Carbon::now()->format('dmyHisv').'#'.$this->generateRandomString(4);
            $hotelBook = new HotelBook();
            $hotelBookResponse = $hotelBook->bookResponse($request->all(),$clientReference,$hotelBookDetails);

            //return error message when booking not completed
            if(is_string($hotelBookResponse)){
                //cancel hold money
                $cancelHoldResponse = $paymentMethod->cancelHoldTransaction($transactionId);
                $returnCancelResponse = $paymentMethod->responseStatusAndMessage($cancelHoldResponse);
                $returnCancelResponseContent = json_decode($returnCancelResponse->content());

                if($returnCancelResponseContent->status == true){
                    $authCode = $returnCancelResponseContent->data->authCode;
                    $transactionId = $returnCancelResponseContent->data->transactionId;
                    dispatch(new SaveHotelBooking([],HotelBookingStatus::Pending,PaymentStatus::Released,
                    $authCode,$transactionId))->delay(25);
                }else{
                    return ['data' => new \stdClass(), 'message' => $returnCancelResponseContent->message ,'status' => 402];
                }

                return ['data' => new \stdClass(), 'message' => $hotelBookResponse ,'status' => 500];
            }


                if($hotelBookResponse->NotBooked != null){
                    //cancel hold money
                    $cancelHoldResponse = $paymentMethod->cancelHoldTransaction($transactionId);
                    $returnCancelResponse = $paymentMethod->responseStatusAndMessage($cancelHoldResponse);
                    $returnCancelResponseContent = json_decode($returnCancelResponse->content());

                    if($returnCancelResponseContent->status == true){
                        $authCode = $returnCancelResponseContent->data->authCode;
                        $transactionId = $returnCancelResponseContent->data->transactionId;

                        dispatch(new SaveHotelBooking([],HotelBookingStatus::Pending,PaymentStatus::Released,
                        $authCode,$transactionId))->delay(30);

                    }else{
                        return ['data' => new \stdClass(),'message' => $returnCancelResponseContent->message,'status '=> 500];
                    }

                    return ['data' => $hotelBookResponse, 'message' => 'Booking Not Completed','status' => 406];
                }



            //when book hotel success confirm transaction
            $makeTransactionResponse = $paymentMethod->makeTransaction($transactionId,$totalAmount);
            $returnMakeTransactionResponseContent = json_decode($paymentMethod->responseStatusAndMessage($makeTransactionResponse)->content());

            if($returnMakeTransactionResponseContent->status == true){

                $authCode = $returnMakeTransactionResponseContent->data->authCode;
                $transactionId = $returnMakeTransactionResponseContent->data->transactionId;

                switch ($hotelBookResponse->BookingStatus){
                    case 'Confirmed':
                        $bookingStatus = HotelBookingStatus::Confirmed;
                        break;
                    case 'Vouchered':
                        $bookingStatus = HotelBookingStatus::Vouchered;
                        break;
                    default:
                        $bookingStatus = null;
                }
                //update hotel booking with booking reference number when booking and transaction success

                dispatch(new SaveHotelBooking([],$bookingStatus,PaymentStatus::Done,$authCode,
                $transactionId,null,$request->lastCancellationDeadLine,$clientReference,$hotelBookResponse->BookingNo,
                null, $hotelBookResponse->TripId))->delay(35);

                dispatch(new SendHotelBookMailToCustomerJob($contact_person,
                $hotelBookDetails,$customerEmail,$hotelBookResponse->BookingNo,$totalAmount,$client))->delay(40);


                return ['data' => $hotelBookResponse, 'message' => 'Hotel Booked Successfully' ,'status' => 200];
            }else{
                return ['data' => new \stdClass(), 'message' => $returnMakeTransactionResponseContent->message ,'status' => 402];
            }

        }else{
            return ['data' => new \stdClass(), 'message' => $returnResponseContent->message ,'status' => 402];
        }
    }

    public function show()
    {

    }

    public function update()
    {

    }

    public function updateStatus()
    {

    }

    public function cancel()
    {

    }


    private function generateRandomString($length)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
