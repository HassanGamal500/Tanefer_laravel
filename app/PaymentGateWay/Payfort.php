<?php


namespace App\PaymentGateway;
use Carbon\Carbon;
use App\Traits\PayfortTrait;

use App\Models\ThirdPartyAccount;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use App\PaymentGateway\PaymentGatewayInterface;
use Illuminate\Http\Exceptions\HttpResponseException;

use App\Enum\HotelBookingStatus;
use App\Enum\PaymentStatus;
use App\GDSIntegration\Tbo\HotelBook\HotelBook;
use App\Jobs\SaveHotelBooking;
use App\Jobs\SendHotelBookMailToCustomerJob;



use Illuminate\Support\Facades\Mail;


class Payfort implements PaymentGatewayInterface
{
    use PayfortTrait;

    // private $SHAType  = 'sha256';
    // private $SHARequestPhrase   = '*tanefar123RQ';
    // private $SHAResponsePhrase = '*tanefar123RQ';
    // private $language           = 'en';
    // private $merchantIdentifier;
    // private $accessCode;
    // private $currency           = 'USD';
    // private $sandboxMode        = true;
    // private $payfortEndpoint;
    // private $refId;
    // private $tokenUrl;
    // public $sessionId;
    private $SHAType = 'sha256';
    private $SHARequestPhrase;
    private $SHAResponsePhrase;
    private $language = 'en';
    private $merchantIdentifier;
    private $accessCode;
    private $currency = 'USD';
    private $sandboxMode = true;
    private $payfortEndpoint;
    private $refId;
    private $tokenUrl;
    public $sessionId;

    public function __construct()
    {
//        $payfortGateWay = ThirdPartyAccount::paymentGateway()->paymentMethod('Payfort')->first();
//        $this->merchantIdentifier = $payfortGateWay->username;
//        $this->accessCode = decrypt($payfortGateWay->password);
//        $this->payfortEndpoint = $payfortGateWay->rest_url;
//        $this->tokenUrl = $payfortGateWay->soap_url;
//        $this->merchant_reference = $this->generateMerchantReference();
          // Load values from config/services.php
          $this->SHARequestPhrase = config('services.payfort.sha_request_phrase');
          $this->SHAResponsePhrase = config('services.payfort.sha_response_phrase');
          $this->merchantIdentifier = config('services.payfort.merchant_identifier');
          $this->accessCode = config('services.payfort.access_code');
          $this->payfortEndpoint = config('services.payfort.redirect_url');
    }
    //tokenization + authorization
    public function holdAndApproveTransaction($creditCardInfo,$amount,$sessionId)
    {
        return $this->_tokenization($creditCardInfo,$amount,$sessionId); //view
    }



    private function _tokenization($creditCardInfo,$amount,$sessionId){

        $expiry_date = $this->formateDate($creditCardInfo['card_expiry_date']);
        $requestParams = [
            'service_command' => 'TOKENIZATION',
            'access_code' => $this->accessCode,
            'merchant_identifier' => $this->merchantIdentifier,
            'merchant_reference' => $this->merchant_reference,
            'language' => $this->language,
            'return_url' => url('/api/PayfortAPI'),
            'expiry_date' => $expiry_date,
            'card_number' => $creditCardInfo['card_number'],
            'card_security_code' => $creditCardInfo['card_code'],
            'amount' => $amount,
        ];
        return $this->displayPayfortPage($requestParams);
    }

    private function displayPayfortPage($requestParams)
    {
        $redirectUrl = $this->tokenUrl.'/FortAPI/paymentPage';
        # Add signature parameter
        $requestParams['signature'] = $this->calcPayfortSignature($requestParams, 'request');
       // return ['redirectUrl' => $redirectUrl,'requestParams'=>$requestParams];
        return ['data' => ['redirectUrl' => $redirectUrl,'requestParams'=>$requestParams], 'message' => 'Form Data' ,'status' => 200];
        //echo view('merchant-page', compact('requestParams', 'redirectUrl'));
    }

    public function authApi($data,$amount){

        $params = [
            'command' => 'AUTHORIZATION',
            'access_code' => $this->accessCode,
            'merchant_identifier' => $this->merchantIdentifier,
            'merchant_reference' => $data['merchant_reference'],
            'amount' => $this->getPayfortAmount($amount, $this->currency),
            'currency' =>  $this->currency,
            'language' => $this->language,
            'customer_email' => "example@example.com",
            'return_url' => url('/api/callback'),
            'token_name' => $data['token_name'],
            'check_3ds' => 'NO'
        ];
        $response = $this->callPayfortAPI($params);

        if ($response->response_code == '20064' && $response->{'3ds_url'}) {

            echo "<html><body onLoad=\"javascript: window.top.location.href='" . $response->{'3ds_url'} . "'\"></body></html>";
            exit;
        }
        elseif ($response->status != '02') {
            throw new HttpResponseException(
                 apiResponse([],$response->response_message,false)
            );
        }
        return $response;

    }

    public function makeTransaction($transactionId,$amount) //capture
    {
        $params = [
            'command' => 'CAPTURE',
            'access_code' => $this->accessCode,
            'merchant_identifier' => $this->merchantIdentifier,
            'merchant_reference' => $this->merchant_reference,
            'amount' => $this->getPayfortAmount($amount, $this->currency),
            'currency' => $this->currency,
            'language' => $this->language,
            'fort_id' => $transactionId
        ];


        $response = $this->callPayfortAPI($params);
        if ($response->status != '04') {
            throw new HttpResponseException(
                 apiResponse([],$response->response_message,false)
            );
        }
        return $response;
    }

    public function cancelHoldTransaction($transactionId) //void
    {
        $params = [
            'command' =>'VOID_AUTHORIZATION',
            'access_code' => $this->accessCode,
            'merchant_identifier' => $this->merchantIdentifier,
            'merchant_reference' => $this->merchant_reference,
            'language' => $this->language,
            'fort_id' => $transactionId,
        ];

        $response = $this->callPayfortAPI($params);
        if ($response->status != '08') {
            throw new HttpResponseException(
                apiResponse([],$response->response_message,false)
           );
        }
        return $response;
    }

    public function refundTransaction($creditCardInfo,$amount,$transactionId) //refund
    {
        $params = [
            'command' => 'REFUND',
            'access_code' => $this->accessCode,
            'merchant_identifier' => $this->merchantIdentifier,
            'merchant_reference' => $this->merchant_reference,//from AUTHORIZATION response
            'amount' => $this->getPayfortAmount($amount, $this->currency),
            'currency' => $this->currency,
            'language' => $this->language,
            'fort_id' => $transactionId,
        ];

        $response = $this->callPayfortAPI($params);

        if ($response->status != '06') {
            throw new HttpResponseException(
                apiResponse([],$response->response_message,false)
               //response()->json(['message'=> $response->response_message])
           );
        }
        return $response;

    }

    public function responseStatusAndMessage($response)
    {
        //dd($response);
        if ($response != null)
        {
            if($response->response_message == "Success")
            {
                Storage::disk('public')->put('paymentGateway/Payfort/'.date("H-i-s").'responseStatusAndMessage.json',json_encode($response)."\n");
                $authCode = ($response->authorization_code) ?? $response->merchant_reference;
                $transactionId = $response->fort_id;
                 return apiResponse(['authCode' => $authCode,'transactionId'=>$transactionId],'Success',true);

            }
            else
            {
                Storage::disk('public')->put('paymentGateway/Payfort/'.date("H-i-s").'responseStatusAndMessage.json',json_encode($response)."\n");
                return apiResponse([],$response->response_message,false);
            }
        }
        else
        {
            return apiResponse([], "No response returned",false);
        }

    }

    public function completeBookng($returnResponseContent){
        $data = Cache::get('HotelBookingData');
        $request = $data['request'];
        $totalAmount = $data['totalAmount'];
        $client = $data['client'];
        $mainClient = $data['mainClient'];
        $hotelBookDetails = $data['hotelBookDetails'];
        $contact_person = $data['contact_person'];
        $customerEmail = $data['customerEmail'];

        if($returnResponseContent->status == true){

            $authUser = auth()->guard('api')->user();

            //success hold money
            $authCode = $returnResponseContent->data->authCode;
            $transactionId = $returnResponseContent->data->transactionId;
            //dd($transactionId);
            //save success hold transaction

            dispatch(new SaveHotelBooking($request,HotelBookingStatus::Pending,PaymentStatus::Hold,
            $authCode,$transactionId,$totalAmount,null,null,null,
            'Credit Card',
                null,$client,
                $mainClient,
                $authUser,
                $hotelBookDetails['HotelRooms']))->delay(20);

            $clientReference = Carbon::now()->format('dmyHisv').'#'.$this->generateRandomString(4);
            $hotelBook = new HotelBook();
            $hotelBookResponse = $hotelBook->bookResponse($request,$clientReference,$hotelBookDetails);

            //return error message when booking not completed
            if(is_string($hotelBookResponse)){
                //cancel hold money
                $cancelHoldResponse = $this->cancelHoldTransaction($transactionId);
                $returnCancelResponse = $this->responseStatusAndMessage($cancelHoldResponse);
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
                    $cancelHoldResponse = $this->cancelHoldTransaction($transactionId);
                    $returnCancelResponse = $this->responseStatusAndMessage($cancelHoldResponse);
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
            $makeTransactionResponse = $this->makeTransaction($transactionId,$totalAmount);
            $returnMakeTransactionResponseContent = json_decode($this->responseStatusAndMessage($makeTransactionResponse)->content());

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
