<?php


namespace App\Services\Hotels;


use AmadeusWsdl\expirationDate;
use App\GDSIntegration\Tbo\AvailabilityAndPricing\AvailabilityAndPricing;
use App\GDSIntegration\Tbo\AvailableHotelRooms\AvailableHotelRooms;
use App\GDSIntegration\Tbo\HotelDetails\HotelDetails;
use App\GDSIntegration\Tbo\HotelSearch\HotelSearch;
use App\HotelDetail;
use App\Http\Resources\HotelDetailsResource;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Hotel
{
    public function search($request)
    {
        //todo Make custom validation
        foreach ($request->roomGuests as $roomGuest){
            if(isset($roomGuest['children']) && !is_null($roomGuest['children'])){
                if((int)$roomGuest['children'] != count($roomGuest['childAge'])){
                    return ['data' => [], 'message' => 'Every child age should be entered','status'=> 422];
                }
            }
        }

        $requestData = $request->except('name');

        if((bool)$requestData['isHotel']){
            $requestData = array_merge($requestData,[
                'hotelName' => explode(',',$request->name)[0]
            ]);
        }else{
            $requestData = array_merge($requestData,[
               'cityName' => explode(',',$request->name)[0]
            ]);
        }

        $countryName = explode(',',$request->name);

        $requestData = array_merge($requestData,[
            'countryName' => end($countryName)
        ]);

        $hotelSearch = new HotelSearch();
        try{
            $response = $hotelSearch->searchResponse($requestData);
        }catch (\Exception $exception){
            sendErrorToMail($exception);
            if(app()->environment('local')){
                throw $exception;
            }
            return ['data' => [], 'message' => 'No Hotels Found','status'=> 500];
        }
        if(is_string($response)){
            return ['data' => [], 'message' => $response,'status'=> 500];
        }

        $hotel['Hotel']['checkInDate'] = $response->checkInDate;
        $hotel['Hotel']['CheckOutDate'] = $response->CheckOutDate;

         //Storage::put('hotelSearchResults/'.$response['session_id'].'.json', json_encode($hotel));
        Cache::put($response->session_id,$hotel,1200);

       return ['data' => $response, 'message' => 'Hotels fetched','status'=> 200];
    }

    public function show($request)
    {
        $hotelDetails = HotelDetail::where('code',$request->hotelCode)->first();

        if(is_null($hotelDetails)){
            $hotelDetails = new HotelDetails();
            $responseHotel = $hotelDetails->hotelResponse($request);
            $response['Hotel'] = json_decode(json_encode($responseHotel),true);

            if(is_string($responseHotel)){
                return ['data' => new \stdClass(),'message' => $responseHotel,'status' => 500];
            }

        }else{
            $response['Hotel'] = (new HotelDetailsResource($hotelDetails))->toArray(request());
        }

        $hotelRooms = new AvailableHotelRooms();
        $roomsResponse = $hotelRooms->roomsResponse($request);

        if(is_string($roomsResponse)){
            return ['data' => new \stdClass(),'message' => $roomsResponse,'status' => 500];
        }

        $response['HotelRooms'] = $roomsResponse['rooms'];
        $response['OptionsForBooking'] = $roomsResponse['OptionsForBooking'];

        if(Cache::has($request->sessionId)){
            $hotels = Cache::get($request->sessionId);
        }else{
            return ['data' => new \stdClass(),'message' => 'search session expired, please retry your search','status' => 410];
        }

        $response['Hotel']['checkInDate'] = $hotels['Hotel']['checkInDate'];
        $response['Hotel']['CheckOutDate'] = $hotels['Hotel']['CheckOutDate'];

        //save Hotel details
        Cache::put($request->sessionId,$response,1200);

        return ['data' => $response,'message' => 'Hotel Details listed successfully','status' => 200];
    }

    public function availabilityAndPricing($request)
    {
        $hotelData = $this->chooseHotelRooms($request);

        if(is_string($hotelData)){
            return ['data' => new \stdClass(),'message' => $hotelData,'status' => 422];
        }

        $availability = new AvailabilityAndPricing();
        $response = $availability->availability($request);

        if(is_string($response)){
            return ['data' => new \stdClass(),'message' => $response,'status' => 500];
        }

        $this->updateHotelData($hotelData,$response,$request->sessionId);

        return ['data' => $response,'message' => '','status' => 200];
    }


    private function chooseHotelRooms($request)
    {
        if(Cache::has($request->sessionId)){
            $hotelData = Cache::get($request->sessionId);
        }else{
            return 'Session Expired';
        }
        // $hotelData = json_decode(Storage::get('hotelSearchResults/'.$request->sessionId.'.json'),true);
        if(! array_key_exists('HotelRooms',$hotelData)){
            return 'You need to call Hotel Details API first';
        }

        if(is_array($request->roomIndex)){
            if(count($request->roomIndex) != count($hotelData['HotelRooms'])){
                foreach ($request->roomIndex as $index){
                    if(array_key_exists(($index-1),$hotelData['HotelRooms'])){
                        $rooms[] =  $hotelData['HotelRooms'][$index-1];
                        $hotelData['HotelRooms'][] = $hotelData['HotelRooms'][$index-1];
                    }
                }
                $hotelData['HotelRooms'] = [];
                $hotelData['HotelRooms'] = $rooms;
            }
        }else{
            if(count($hotelData['HotelRooms']) != 1){
                $roomIndex = $request->roomIndex - 1;
                if(array_key_exists($roomIndex,$hotelData['HotelRooms'])){
                    $room = $hotelData['HotelRooms'][$roomIndex];
                    $hotelData['HotelRooms'] = [];
                    $hotelData['HotelRooms'][] = $room;
                }
            }
        }

        return $hotelData;
    }

    private function updateHotelData($hotelData,$updateData,$sessionId)
    {
        $hotelData['Hotel']['hotelPolicies'] = $updateData->HotelPolicies;

        if($updateData->priceChanged){
            $hotelData['HotelRooms'] = [];
            $hotelData['HotelRooms'] = $updateData->rooms;
        }

        $hotelData['cancellationPolicies'] = $updateData->cancelPolicies;

        Cache::put($sessionId,$hotelData,1200);

    }

}
