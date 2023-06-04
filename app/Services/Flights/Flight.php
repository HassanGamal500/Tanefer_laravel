<?php


namespace App\Services\Flights;


use App\GDSIntegration\HttpClient\HttpClient;
use App\GDSIntegration\Sabre\BargainFinderMax;
use App\GDSIntegration\Sabre\GetReservation;
use App\GDSIntegration\Sabre\RevalidateItinerary;
use App\GDSIntegration\Sabre\Sabre;
use App\Http\Requests\GetOneFlightRequest;
use App\Http\Resources\FlightsPromotionResource;
use App\Jobs\PushFlightsToFireBase;
use App\Jobs\RemoveFlightsFromFireBase;
use App\Libs\FireBase\RealTimeNotification;
use App\Models\Airline;
use App\Models\Airport;
use App\Models\ExcludeAirline;
use App\Models\FlightsPromotion;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Flight
{
    public function search($request)
    {
       // $client = resolve('client');
     //   $mainClient = $client->parentClient ?? $client;

        //if($mainClient->thirdPartyAccounts()->where('third_party_type','amadeus')->first() != null){
            $httpClient = new HttpClient();
            $path = explode('?',$request->getRequestUri())[0];

            $response = $httpClient->executeGetCall(config('app.amadeus_base_url'),
                $path,$request->all(),'','747fb51b-6919-4fe7-a0e0-1ba17586f108');

            return json_decode($response,true);
  //      }

        $checkDomesticFlightsAndExcludeAirlinesCode = $this->excludeAirlinesCodesAndCheckDomestic($request->origin,$request->destination,
            $mainClient->country_code);

        $excludeAirlines = $checkDomesticFlightsAndExcludeAirlinesCode['excludeAirlinesCodes'];
        $isDomesticFlights = $checkDomesticFlightsAndExcludeAirlinesCode['isDomesticFlights'];

        $promotion = $mainClient->flightsPromotions()->where('origin_code',$request->origin)
            ->where('destination_code',$request->destination)->whereNotNull('lowest_fare')->first();
            //        if(! is_null($promotion)){
//            $promotionFlights =  $this->cachePromotionsSearchResults($promotion);
//            if($promotionFlights != null){
//                return apiResponse($promotionFlights,'Fetch Flights Successfully',true);
//            }
//        }
        $searchId = $request->search_id ?? Str::uuid()->toString().'-'.$client->name;

        if($request->method() == 'POST'){
            $search_id = Str::uuid()->toString();

            dispatch(new PushFlightsToFireBase($request->all(),$excludeAirlines,$promotion,$search_id));
            dispatch(new PushFlightsToFireBase($request->all(),$excludeAirlines,$promotion,$search_id,'alternateDates'))->delay(4);
            dispatch(new RemoveFlightsFromFireBase($search_id))->delay(60);

            return ['data' => ['search_id' => $search_id] , 'message' => 'Flights From Firebase','status' => 200];
        }

        $flight = new BargainFinderMax\Flight();

        $result = $flight
            ->searchResult($request->all(),
                $mainClient->currency,$searchId,$excludeAirlines,$promotion,$isDomesticFlights,$mainClient->profitSettings);

        if($result->errorMessage){
            return ['data' => $result, 'message' => $result->errorMessage, 'status' => 412];
        }

        return ['data' => $result,'message' => '','status' => 200];
    }


    public function show($request)
    {
     //   $client = resolve('client');
     //   $mainClient = $client->parentClient ?? $client;

      //  if($mainClient->thirdPartyAccounts()->where('third_party_type','amadeus')->first() != null){
            $httpClient = new HttpClient();
            $path = explode('?',$request->getRequestUri())[0];
            $response = $httpClient->executeGetCall(config('app.amadeus_base_url'),
                $path,$request->all(),'','747fb51b-6919-4fe7-a0e0-1ba17586f108');

            $flight = json_decode($response,true);

            if(! $flight['status']){
                return ['data' => new \stdClass(),'message' => $flight['message'],'status' => 500];
            }

            Cache::put($flight['data']['id'],$flight['data'],1200);

            return $flight;
     //   }

        if(Cache::has($request->search_id)){
            $flights = Cache::get($request->search_id);
        }else{
            return ['data' => new \stdClass(),'status' => 410,'message' => 'search session expired, please retry your search'];
        }

        $flight = current(Arr::where($flights,function ($value,$key) use ($request){
            return $value->id == $request->flight_id;
        }));

        $revalidateItinerary = new RevalidateItinerary();
        $reValidateResponse = $revalidateItinerary->revalidateResponse($flight,$mainClient->profitSettings);

        if(is_string($reValidateResponse)){
            return ['data' => new \stdClass() , 'status' => 422, 'message' => $reValidateResponse];
        }

        $flight = current($reValidateResponse);

        Cache::put($flight['id'],$flight,1200);

        $flight['search_id'] = $request->search_id;

        return ['data' => $flight , 'status' => 200];
    }

    public function flightsPromotions()
    {
        $client = resolve('client');
        $mainClient = $client->parentClient ?? $client;

        $flightsPromotions = $mainClient->flightsPromotions()->whereNotNull('lowest_fare')->get()->take(5);

        return FlightsPromotionResource::collection($flightsPromotions);
    }

    private function cachePromotionsSearchResults($promotion)
    {
        if(Cache::has($promotion->origin_code.'-'.$promotion->destination_code)){
            $promotionFlights = Cache::get(app()->environment().'-'.$promotion->origin_code.'-'.$promotion->destination_code);
            $cache_key = Str::uuid();
            Cache::put($cache_key,$promotionFlights['flights'],1200);
            $promotionFlights['search_id'] = $cache_key;
            return $promotionFlights;
        }
    }


    private function excludeAirlinesCodesAndCheckDomestic($origin,$destination,$countryCode)
    {
        //Exclude Airlines For Domestic flights
        $checkingDomesticAndExcludeAirlinesCodes =
            $this->checkDomesticFlightAndExcludeAirlinesForAllFlightsDirections($origin,$destination,$countryCode);
        $excludeAirlinesForDomesticFlights = $checkingDomesticAndExcludeAirlinesCodes['excludeAirlinesCodes'];
        $isDomesticFlights = $checkingDomesticAndExcludeAirlinesCodes['isDomesticFlights'];

        //Exclude Airlines from blacklisted
        $blacklistAirlines = Airline::select('airline_code')->where('blacklisted',1)->get();
        $blacklistAirlinesCodes = array_column($blacklistAirlines->toArray(),'airline_code');
        $excludeAirlinesCodesArray =  array_merge($excludeAirlinesForDomesticFlights,$blacklistAirlinesCodes);

        if(auth()->guard('api')->check()){
            $excludeAirlinesCodesArray = [];
        }

        return ['isDomesticFlights' => $isDomesticFlights, 'excludeAirlinesCodes' => $excludeAirlinesCodesArray];
    }

    private function checkDomesticFlightAndExcludeAirlinesForAllFlightsDirections($origin,$destination,$countryCode)
    {
        if (is_array($origin)) {
            $excludeAirlinesForDomesticFlights = [];
            $origins = array_map('strtoupper', $origin);
            $destinations = array_map('strtoupper', $destination);

            for ($i = 0; $i < count($origins); $i++) {
                $checkingDomestic = $this->getOriginAndDestinationObjects($origins[$i],$destinations[$i],$countryCode);
                $excludeAirlinesForDomesticFlights = $checkingDomestic['excludeAirlinesCodes'];
                $domesticFlights = $checkingDomestic['isDomesticFlights'];
            }
        } else {
            $airlinesAndDomestic = $this->getOriginAndDestinationObjects(strtoupper($origin),strtoupper($destination),$countryCode);
            $excludeAirlinesForDomesticFlights = $airlinesAndDomestic['excludeAirlinesCodes'];
            $domesticFlights = $airlinesAndDomestic['isDomesticFlights'];
        }

        return ['isDomesticFlights' => $domesticFlights, 'excludeAirlinesCodes' => $excludeAirlinesForDomesticFlights];
    }

    public function getOriginAndDestinationObjects(string $origin,string $destination,string $countryCode = null)
    {
        $originObject = $this->getAirportObject(strtoupper($origin));
        $destinationObject = $this->getAirportObject(strtoupper($destination));
        if (is_null($originObject) || is_null($destinationObject)) {
            $excludeAirlinesForDomesticFlights = [];
            $domesticFlights = false;
        } else {
            $checkingDomestic = $this->checkDomesticFlightAndExcludeAirlines($originObject, $destinationObject,$countryCode);
            $excludeAirlinesForDomesticFlights = $checkingDomestic['excludeAirlinesCodes'];
            $domesticFlights = $checkingDomestic['domesticFlights'];
        }
        return ['isDomesticFlights' => $domesticFlights, 'excludeAirlinesCodes' => $excludeAirlinesForDomesticFlights];
    }

    private function checkDomesticFlightAndExcludeAirlines($originObject,$destinationObject,$countryCode)
    {
        $originCountry = $originObject->country;
        $destinationCountry = $destinationObject->country;

        if($originCountry  == $destinationCountry){
            $excludeAirlines = ExcludeAirline::select('airline_code')->where('country_code',$originCountry)->get();
            if(count($excludeAirlines) != 0){
                $excludeAirlines = array_column($excludeAirlines->toArray(),'airline_code');
            }
            if($originCountry == $countryCode){
                $domesticFlights = true;
            }else{
                $domesticFlights = false;
            }

        }else{
            $domesticFlights = false;
        }

        $excludeAirlinesCodes =  (! isset($excludeAirlines))  || count($excludeAirlines) == 0 ? [] : $excludeAirlines;


        return ['domesticFlights' => $domesticFlights,'excludeAirlinesCodes' => $excludeAirlinesCodes];
    }

    private function getAirportObject($code)
    {
        if(Cache::has($code)){
            $airport = Cache::get($code);
        }else{
            $airport = Airport::where('code',$code)->first();
            Cache::forever($code,$airport);
        }

        return $airport;
    }
}
