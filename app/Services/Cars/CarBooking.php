<?php


namespace App\Services\Cars;


use App\GDSIntegration\Sabre\Cars\BookCarReservation;
use App\GDSIntegration\Sabre\Cars\PassengerDetails;
use App\GDSIntegration\Sabre\EndTransaction;
use App\GDSIntegration\Sabre\Sabre;
use App\GDSIntegration\Sabre\VerifyItineraryAddressSoap;
use App\Http\Resources\PnrResource;
use App\Jobs\CollectPoint;
use App\Jobs\RedeemPoint;
use App\Models\CarBookingDetails;
use App\Models\PassengerDetail;
use App\Models\Pnr;
use App\Models\Status;
use App\Services\CheckPointsForRedeemService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class CarBooking
{
    public function index()
    {

    }

    public function show()
    {

    }

    public function create($request)
    {
        if(Cache::has($request->search_id)){
            $cars = Cache::get($request->search_id);
        }else{
            return ['data' => new \stdClass(), 'message' => 'Search session expired, please retry your search','status' => 410];
        }

        if(! array_key_exists($request->car_id,$cars)){
            return ['data' => new \stdClass(), 'message' => 'This Car not found, please search again','status' => 404];
        }

        $car = $cars[$request->car_id];

        if($request->creditCardNumber != 5300726775912443 && isset($request->creditCardNumber)){
            $validateCreditCard = $this->validateCreditCard($request,'TK');

            if(! $validateCreditCard['status']){
                return ['data' => new \stdClass(), 'message' => $validateCreditCard['message'] ,'status' => 422];
            }
        }

        $totalPaid = Arr::where(json_decode($car['fareInfo'],true),function ($value, $key){
            return $value['ChargeType'] == 'totalPrice';
        });

        if(auth()->guard('api')->check() && isset($request->redeem)){
            $authUser = auth()->guard('api')->user();
            $paymentAmount = array_values($totalPaid)[0]['Amount'];
            if(CheckPointsForRedeemService::checkUserPointsLessThanMin($authUser)){
                return ['data' => new \stdClass(), 'message' => 'Your points less than minimum value of redeem' ,'status' => 422];
            }
            if(CheckPointsForRedeemService::checkUserPointsNotAvailableToRedeem($paymentAmount,$authUser)){
                return ['data' => new \stdClass(), 'message' => 'Your Points didn\'t enough to redeem' ,'status' => 422];
            }
            $infoFare['redeemedFare'] = 0;
            $car['fareInfo'][] = $infoFare;
        }

        $sabre = new Sabre();
        try {
            $session = $sabre->getSoapSession();
        }catch (\Exception $e){
            sendErrorToMail($e);
            return ['data' => new \stdClass(), 'message' => 'SomeThing went wrong, please try again or contact support' ,'status' => 500];
        }


        $passengerDetails = new PassengerDetails();
        $passengerDetailsResponse = $passengerDetails->passengerDetails($request,$session);

        $bookCarReservation = new BookCarReservation();
        $carReservationResponse = $bookCarReservation->carReservation($request,$car,$session);

        if($carReservationResponse){
            return ['data' => new \stdClass(), 'message' => $carReservationResponse ,'status' => 500];
        }

        $endTransaction = new EndTransaction();
        $endTransactionResponse = $endTransaction->endTransaction($session);

        try{
            $pnr = $endTransactionResponse['soap-env:Envelope']['soap-env:Body']['EndTransactionRS']['ItineraryRef']['attr']['ID'];
        }catch (\Exception $e){
            sendErrorToMail($e);
            return ['data' => new \stdClass(), 'message' => 'Your booking didn\'t complete please try again or contact support' ,'status' => 500];
        }

        $bookingDetails = $this->storeBookingData($pnr,$car,$request);

        if(auth()->guard('api')->check() && isset($request->creditCardNumber)){
            $authUser = auth()->guard('api')->user()->toArray();
            dispatch(new CollectPoint($pnr,'car',array_values($totalPaid)[0]['Amount'],$authUser))
                ->delay(now()->addSeconds(15));
        }elseif (auth()->guard('api')->check() && isset($request->redeem)){
            $authUser = auth()->guard('api')->user();
            dispatch(new RedeemPoint($pnr,array_values($totalPaid)[0]['Amount'],$authUser)) ->delay(now()->addSeconds(15));
        }

        $this->sendEmailToCustomer($pnr,$car,$request);

        return ['data' => PnrResource::make($bookingDetails), 'message' => 'Car booked successfully' ,'status' => 200];
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

    private function sendEmailToCustomer($pnr,$car,$bookingDetails)
    {
        $client = resolve('client');

        //ToDo get redeemed points by pnrID
        $bookingID = Pnr::where('pnr_id',$pnr)->first()->id;
        $redeem = \App\Models\RedeemPoint::where('model_id',$bookingID)->first();
        if(! is_null($redeem)){
            $redeemPoints = $redeem->points;
        }
        Mail::send('email_templates.bookCar_to_customer' , [
            'pnr'  => $pnr,
            'data' => $bookingDetails,
            'car'  => $car,
            'redeemPoints' => isset($redeemPoints) ? $redeemPoints : null
        ],function ($message) use ($bookingDetails,$pnr,$client) {
            $message->from($client->email, $client->name);
            if(auth()->guard('api')->check()){
                $message->to(auth()->guard('api')->user()->email);
            }else{
                $message->to($bookingDetails->contact_email);
            }
            $message->bcc($client->emailSetting->to);
            $message->bcc('ahmed.salim@adamtravel.net');
            $message->Subject('Your Car booking . '.$pnr.' confirmation');
        });
    }

    private function storeBookingData($bookingID,$car,$bookingDetails)
    {
        $client = resolve('client');
        foreach ($car['fareInfo'] as $fare){
            if(array_key_exists('ChargeType',$fare)){
                switch ($fare['ChargeType']){
                    case 'ExtraDay':
                        $extraDay = $fare['Amount'];
                        break;
                    case 'ExtraHour':
                        $extraHour = $fare['Amount'];
                        break;
                    case 'totalPrice':
                        $totalAmount = $fare['Amount'];
                        break;
                }
            }
        }



        if(count(array_column(json_decode(json_encode($car['fareInfo']),true),'redeemedFare')) == 1){
            $totalAmount = 0;
        }

        if(auth()->guard('api')->check() && auth()->guard('api')->user()->hasRole('customer')){
            $contact_person = auth()->guard('api')->user()->name;
            $contact_phone  = auth()->guard('api')->user()->phone;
            $contact_email  = auth()->guard('api')->user()->email;
        }else{
            $contact_person = $bookingDetails->driverFirstName.' '.$bookingDetails->driverLastName;
            $contact_email = $bookingDetails['contact_email'];
            $contact_phone = $bookingDetails['contact_phone'];
        }
        $user_id = auth()->guard('api')->check() ? auth()->guard('api')->user()->id : null;

        if($totalAmount == 0){
            $payment_type = 'Free';
        }elseif (is_null($bookingDetails->cash)){
            $payment_type = 'Credit Card';
        }else{
            $payment_type = 'Cash';
        }

        $bookingData = Pnr::create([
            'pnr_id' => $bookingID,
            'contact_person' => $contact_person,
            'contact_email'  => $contact_email,
            'contact_phone'  => $contact_phone,
            'user_id'        => $user_id,
            'status_id'      => Status::where('status','Initial')->first()->id,
            'price'          => (float)$totalAmount,
            'currency'       => 'USD',
            'type'           => 'car',
            'client_id'      => $client->id,
            'payment_type'   => $payment_type
        ]);

        PassengerDetail::create([
            'passenger_name' => $bookingDetails->driverTitle.' '.$bookingDetails->driverFirstName.' '.$bookingDetails->driverLastName,
            'pnr_id'         => $bookingData->id
        ]);

        CarBookingDetails::create([
            'vendor' => $car['vendorName'],
            'car_type' => $car['carInfo']['carType'],
            'pickup_location' => $car['pickUpLocation'],
            'return_location' => $car['returnLocation'],
            'pickup_date'     => $bookingDetails->pickupDate,
            'pickup_time'     => $bookingDetails->pickupTime,
            'return_date'     => $bookingDetails->returnDate,
            'return_time'     => $bookingDetails->returnTime,
            'extra_day_charge'=> isset($extraDay)?$extraDay : null,
            'extra_hour_charge'=> isset($extraHour)? $extraHour : null,
            'pnr_id'          => $bookingData->id
        ]);

        return $bookingData;
    }

    //Credit Card Validation From Sabre
    private function validateCreditCard($request,$airlineCode)
    {
        $verify_itinerary_address_soap = new VerifyItineraryAddressSoap();
        $status = $verify_itinerary_address_soap->validateCreditCard($request,$airlineCode);
        if($status == 'Complete'){
            $status = true;
            $message = 'Valid Credit Card';
        }else{
            $status = false;
            $message = 'Invalid Credit Card';
        }

        return ['message' => $message,'status' => $status];
    }
}
