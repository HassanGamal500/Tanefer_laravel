<?php


namespace App\Services\Flights;


use App\GDSIntegration\HttpClient\HttpClient;
use App\GDSIntegration\Sabre\CreatePassengerNameRecord;
use App\GDSIntegration\Sabre\GetCreditCardApproval\CreditCardApproval;
use App\GDSIntegration\Sabre\VerifyItineraryAddressSoap;
use App\Jobs\CollectPoint;
use App\Jobs\EmailToAgentJob;
use App\Jobs\EmailToCustomerJob;
use App\Jobs\RedeemPoint;
use App\Jobs\SendMailOnlyFare;
use App\Jobs\SetLastDateToPurchaseFlight;
use App\Jobs\StorePNR;
use App\Models\Client;
use App\Models\Pnr;
use App\Services\CheckPointsForRedeemService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Propaganistas\LaravelPhone\PhoneNumber;

class FlightBooking
{
    public function index()
    {

    }

    public function create($request)
    {
      //  $client = resolve('client');
     //   $mainClient = $client->parentClient ?? $client;
        $mainClient = Client::find(21);
        //validate on number of passengers as in travel policy. // TODO Add custom validation for this
        $tempPassenger = '';
        foreach ($request->passengerDetails as $passengerDetail){
            // dd('request: '.strtotime($passengerDetail['date_of_birth']).' validate: '.now()->subYears(12)->timestamp);
            if($passengerDetail['passengerType'] == 'ADT' && strtotime($passengerDetail['date_of_birth']) > now()->subYears(12)->timestamp){
                return ['data' => new \stdClass(),'message' => 'Adult\'s age must be greater than 12 year','status' => 422];
            }
            if($passengerDetail['passengerType'] == 'CNN' && (strtotime($passengerDetail['date_of_birth']) > now()->subYears(2)->timestamp ||
                    strtotime($passengerDetail['date_of_birth']) <= now()->subYears(12)->timestamp)){
                return ['data' => new \stdClass(),'message' => 'Child\'s age must be between 2 and 12 year','status' => 422];
            }
            if($passengerDetail['passengerType'] == 'INF' &&
                strtotime($passengerDetail['date_of_birth']) <= now()->subYears(2)->timestamp
            || strtotime($passengerDetail['date_of_birth']) > now()->timestamp){
                return ['data' => new \stdClass(),'message' => 'Infant\'s age must be less than 2 year','status' => 422];
            }
            $passenger = strtoupper($passengerDetail['passengerFirstName'])
                .' '.strtoupper($passengerDetail['passengerLastName']);
            if($tempPassenger != '' && $passenger == $tempPassenger){
                return ['data' => new \stdClass(),'message' => 'Passenger '.$passenger.' repeated','status' => 422];
            }
            $tempPassenger = strtoupper($passengerDetail['passengerFirstName'])
                .' '.strtoupper($passengerDetail['passengerLastName']);
        }

        $requestInfo['contact_person_name'] = $request->contact_person_name;
        $requestInfo['contact_email']       = $request->contact_email;
        $requestInfo['contact_phone']       = $request->contact_phone;

     //   if($mainClient->thirdPartyAccounts()->where('third_party_type','amadeus')->first() != null){
            $httpClient = new HttpClient();
            $path = explode('?',$request->getRequestUri())[0];
            $response = $httpClient->executePostCall(config('app.amadeus_base_url'),
                $path,json_encode($request->all()),'','747fb51b-6919-4fe7-a0e0-1ba17586f108');

            $responseArray = json_decode($response,true);


            if(! $responseArray['status']){
                return ['data' => new \stdClass(),'message' => $responseArray['message'],'status' => 500];
            }

            $data = json_decode($response,true)['data'];

            $requestInfo['user_id'] = null;
            $requestInfo['passengerDetails'] = $request->passengerDetails;

            $flight = Cache::get($request->flight_id);

            dispatch(new StorePNR($data,$requestInfo,21,21,$request->cash))->delay(now()->addSeconds(10));
            dispatch(new EmailToCustomerJob($requestInfo,$data,$flight,$mainClient))->delay(now()->addSeconds(25));
            dispatch(new EmailToAgentJob($requestInfo,$data,$flight,$mainClient))->delay(now()->addSeconds(30));

            return json_decode($response,true);
      //  }

        if(Cache::has($request->flight_id)){
            $flight = Cache::get($request->flight_id);
        }else{
            return ['data' => new \stdClass(),'message' => 'search session expired, please retry your search','status' => 410];
        }

        if($flight['mailOnlyFare']){
            return ['data' => new \stdClass(),'message' => 'Cannot book this flight online','status' => 410];
        }

        //Prevent user has role customer to make booking without credit card
        if(isset($request->cash)){
            if(! auth()->guard('api')->check() || (auth()->guard('api')->check() && auth()->guard('api')->user()->hasRole('customer')) ){
                return ['data' => new \stdClass(),'message' => 'Customer Cannot make cash booking','status' => 422];
            }
        }

        $lastSegment = end(end($flight['flightSegments'])->Segments);
        $airlineCode = $lastSegment->MarketingAirlineCode;

        if(auth()->guard('api')->check() && auth()->guard('api')->user()->hasRole('customer')){
            $requestInfo['contact_person_name'] = auth()->guard('api')->user()->name;
            $requestInfo['contact_email']  = auth()->guard('api')->user()->email;
            $requestInfo['contact_phone']  = auth()->guard('api')->user()->phone;
        }else{
            $requestInfo['contact_phone']       = PhoneNumber::make($request->contact_phone)->ofCountry($request->countryIsoCode)->formatInternational();
        }
        $requestInfo['user_id'] = auth()->guard('api')->check() ? auth()->guard('api')->user()->id : null;
        $requestInfo['passengerDetails'] = $request->passengerDetails;


        if($request->creditCardNumber != 5300726775912443 && isset($request->creditCardNumber)){
            if($client->name = 'Adam Travel Egypt'){
                $creditCardApproval = new CreditCardApproval();

                if(! $creditCardApproval->approve($request,$airlineCode)){
                    return ['data' => new \stdClass(),'message' => 'Invalid Credit Card', 'status' => 410];
                }
            }else{
                $validateCreditCard = $this->validateCreditCard($request,$airlineCode,new HttpClient);

                if(! $validateCreditCard['status']){
                    return $validateCreditCard;
                }
            }
        }

        if(auth()->guard('api')->check() && isset($request->redeem)){
            $authUser = auth()->guard('api')->user();
            $paymentAmount = ($flight['pricingInfo']['newFare'] == 0)? $flight['pricingInfo']['TotalFare']:$flight['pricingInfo']['newFare'];
            if(CheckPointsForRedeemService::checkUserPointsLessThanMin($authUser)){
                return ['data' => new \stdClass(),'message' => 'Your points less than minimum value of redeem','status' => 422];
            }
            if(CheckPointsForRedeemService::checkUserPointsNotAvailableToRedeem($paymentAmount,$authUser)){
                return ['data' => new \stdClass(),'message' => 'Your Points didn\'t enough to redeem','status' => 422];
            }
            $flight['pricingInfo']['redeemedFare'] = 0;
        }


        $createPassengerNameRecord = new CreatePassengerNameRecord();
        $data = $createPassengerNameRecord->createPNRRequest($request,$flight);

        if(is_array($data)){
            dispatch(new StorePNR($data,$requestInfo,$client->id,$mainClient->id,$request->cash))->delay(now()->addSeconds(10));
            $totalPaid = ($flight['pricingInfo']['newFare'] == 0)? $flight['pricingInfo']['TotalFare']:$flight['pricingInfo']['newFare'];

            if(auth()->guard('api')->check()){
                $authUser = auth()->guard('api')->user()->toArray();
                if(isset($request->redeem)){
                    dispatch(new RedeemPoint($data['PNR'],$totalPaid,$authUser))->delay(now()->addSeconds(15));
                }else{
                    $numberOfPassengers = 0;
                    foreach ($flight['passengerQuantity'] as $passenger){
                        $numberOfPassengers += $passenger['Quantity'];
                    }
                    dispatch(new CollectPoint($data['PNR'],'flight',$totalPaid,$authUser,$numberOfPassengers))
                        ->delay(now()->addSeconds(15));
                }
            }
            if(! app()->environment('local')){

                dispatch(new EmailToCustomerJob($requestInfo,$data,$flight,$mainClient))->delay(now()->addSeconds(25));
                dispatch(new EmailToAgentJob($requestInfo,$data,$flight,$mainClient))->delay(now()->addSeconds(30));
            }

            dispatch(new SetLastDateToPurchaseFlight($data['PNR'],$mainClient))->delay(60);

            return ['data' => $data,'message' => 'PNR Created Successfully','status' => 200];
        }else{
            return ['data' => new \stdClass(),'message' => $data,'status' => 500];
        }
    }

    public function show($pnrId)
    {
        $pnr = Pnr::with(['status','flightSegments','passengerDetails'])
            ->where('pnr_id',$pnrId)->first();

        if(is_null($pnr)){
            return ['data' => new \stdClass(),'message' => 'Booking Not Found','status' => 404];
        }

        return ['data' => $pnr,'message' => 'Show Flight Booking Data','status' => 200];
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

    private function validateCreditCard($request,$airlineCode,$httpClient)
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

        return ['data' => new \stdClass(),'message' => $message, 'status' => $status];
    }

    public function sendMailToBook($request)
    {
        $client = resolve('client');

        if(Cache::has($request->search_id)){
            $flights = Cache::get($request->search_id);
        }else{
            return ['data' => new \stdClass(),'status' => 410,'message' => 'search session expired, please retry your search'];
        }

        $flight = current(Arr::where($flights,function ($value,$key) use ($request){
            return $value->id == $request->flight_id;
        }));

        if(! $flight){
            return ['data' => new \stdClass(),'message' => 'Flight Not found','status' => 404];
        }

        $requestData = array_merge($request->except('phone'),[
            'phone' => PhoneNumber::make($request->phone)->ofCountry($request->countryIsoCode)->formatInternational()
        ]);

        dispatch(new SendMailOnlyFare($requestData,$flight,$client))->delay(3);

        return ['data' => new \stdClass(),'message' => 'email send successfully','status' => 200];
    }
}
