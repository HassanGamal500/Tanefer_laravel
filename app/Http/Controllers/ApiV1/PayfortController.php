<?php

namespace App\Http\Controllers\ApiV1;
use App\Mail\BookingConfirmation;
use App\Models\Booking;
use Illuminate\Http\Request;

use App\PaymentGateway\Payfort;
use App\Http\Controllers\Controller;
use App\PaymentGateway\AuthorizeNet;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class PayfortController extends Controller
{
    private $payfort;

    public function __construct(Payfort $payfort)
    {

        $this->payfort = $payfort;
    }

    public function tokenizationResponse(Request $request){
        //dd($request->all());
        $amount = $request->amount;
        if($request->status == "18" && $request->response_message == "Success"){
            $response = $this->payfort->authApi($request->all(),$amount);
            $returnResponse =$this->payfort->responseStatusAndMessage($response);
            $returnResponseContent = json_decode($returnResponse->content());
            $this->payfort->completeBookng($returnResponseContent);
        }else{
            return apiResponse([],$request->response_message,false);

        }
    }

    public function processReturn(Request $request){
        return $request->all();
    }

    public function notifications()
    {
        $booking = Booking::find(\request()->merchant_extra);
        if($booking != null){
            if(\request()->response_message == 'Success'){
                if($booking->send_confirm_email != 1){
                    $booking->update([
                        'status' => 'Confirm Payment',
                        'transaction_id' => request()->fort_id,
                        'authorization_code' => request()->authorization_code
                    ]);
                    $url = 'https://tanefer.com/trip-booking/'.$booking->id;
                    Mail::to([$booking->bookingData->contact_email, 'online@tanefer.com'])
                        ->send(new BookingConfirmation($url,$booking->total_price,$booking->bookingData->contact_name));
                    $booking->update(['send_confirm_email' => 1]);
                }
            }
            if($booking->bookingPayment == null){
                $booking->bookingPayment()->create([
                    'card_number' => \request()->card_number ?? '',
                    'card_holder_name' => \request()->card_holder_name ?? '',
                    'card_expiry'      => \request()->expiry_date ?? '',
                    'customer_ip'      => \request()->customer_ip ?? '',
                    'payment_type'     => \request()->payment_option ?? '',
                    'payment_status_message' => \request()->response_message ?? '',
                    'transaction_id' => \request()->fort_id ?? '',
                    'authorization_code' => \request()->authorization_code ?? '',
                    'payment_response_code' => \request()->response_code ?? ''
                ]);
            }
        }

        return response()->json(\request()->all());
    }
}
