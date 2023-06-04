<?php


namespace App\GDSIntegration\Tbo\HotelSearch;

use App\GDSIntegration\Tbo\HotelSearch\HotelSearchRequest\Filters;
use App\GDSIntegration\Tbo\HotelSearch\HotelSearchRequest\HotelRatingInput;
use App\GDSIntegration\Tbo\HotelSearch\HotelSearchRequest\HotelSearchRequest;
use App\GDSIntegration\Tbo\HotelSearch\HotelSearchRequest\OrderByFilter;
use App\GDSIntegration\Tbo\HotelSearch\HotelSearchRequest\RoomGuest;
use App\GDSIntegration\Tbo\HotelSearch\HotelSearchResponse\Hotel_Result;
use App\GDSIntegration\Tbo\HotelSearch\HotelSearchResponse\HotelOnMap;
use App\GDSIntegration\Tbo\HotelSearch\HotelSearchResponse\HotelSearchResponse;
use App\GDSIntegration\Tbo\HotelSearch\HotelSearchResponse\PricingInfo;
use App\GDSIntegration\Tbo\HotelSearch\HotelSearchResponse\RoomGuestResponse;
use App\GDSIntegration\Tbo\ResponseStatus;
use App\GDSIntegration\Tbo\TBOIntegration;
use Illuminate\Support\Facades\Storage;

class HotelSearch extends TBOIntegration
{
    public function __construct()
    {
        $actionHeader = new \SoapHeader('http://www.w3.org/2005/08/addressing','Action','http://TekTravel/HotelBookingApi/HotelSearch');
        parent::__construct($actionHeader);
    }


    public function searchResponse($request)
    {
        $filter = $this->filters($request);

        foreach ($request['roomGuests'] as $roomGuest){
            $roomGuests[] = new RoomGuest($roomGuest['childAge']??[],$roomGuest['adults'],$roomGuest['children']??0);
        }

        $requestData = new HotelSearchRequest($request['checkIn'],$request['checkOut'],
            $request['countryName'],$request['cityName'] ?? '',array_key_exists('cityName',$request)?$request['code']:'',
        false,$request['numberOfRooms'],$request['guestNationality'],$roomGuests,'USD',0,$filter,false,
        null,$this->session_time);

        Storage::put('tboRequests/'.$this->nowDate.'/HotelSearch/'.$this->nowTime.'hotelSearchRQ.json',json_encode($requestData));
        try{
            $response = $this->HotelSearch($requestData);
            $xmlRequest = $this->__getLastRequest();
            $xmlResponse = $this->__getLastResponse();
            Storage::put('tboRequests/'.$this->nowDate.'/HotelSearch/'.$this->nowTime.'hotelSearchRQ.xml',$xmlRequest);
            Storage::put('tboRequests/'.$this->nowDate.'/HotelSearch/'.$this->nowTime.'hotelSearchRS.xml',$xmlResponse);
        }catch (\Exception $e){
            if(app()->environment('local')){
                throw $e;
            }
            sendErrorToMail($e);
            return 'No Hotels Found';
        }

        $status = new ResponseStatus($response->Status->StatusCode,$response->Status->Description,$response->Status->Category ?? null);

        if($status->StatusCode != 1){
            $descArray = explode(':',$status->Description);
            unset($descArray[0]);

            return implode(' ',$descArray);
        }

        if(is_array($response->HotelResultList->HotelResult)){
            foreach ($response->HotelResultList->HotelResult as $hotel){
                $HotelOnMap = new HotelOnMap($hotel->HotelInfo->Latitude??0,$hotel->HotelInfo->Longitude??0);

                $pricingInfo = new PricingInfo($hotel->MinHotelPrice->Currency??'',$hotel->MinHotelPrice->TotalPrice??0);

                $hotel_results[] = new Hotel_Result($hotel->ResultIndex,$hotel->HotelInfo->HotelCode??'',$hotel->HotelInfo->HotelName??'',
                $hotel->HotelInfo->HotelPicture??'',$hotel->HotelInfo->HotelDescription??'',$hotel->HotelInfo->HotelDescription??'',
                $HotelOnMap,$hotel->HotelInfo->Rating??0,$pricingInfo,$hotel->IsHalal??false,$hotel->HotelInfo->TripAdvisorRating??0,
                $hotel->HotelInfo->TripAdvisorReviewURL??'');
            }
        }else{
            $hotel = $response->HotelResultList->HotelResult;
            $HotelOnMap = new HotelOnMap($hotel->HotelInfo->Latitude??0,$hotel->HotelInfo->Longitude??0);

            $pricingInfo = new PricingInfo($hotel->MinHotelPrice->Currency??'',$hotel->MinHotelPrice->TotalPrice??0);

            $hotel_results[] = new Hotel_Result($hotel->ResultIndex,$hotel->HotelInfo->HotelCode??'',$hotel->HotelInfo->HotelName??'',
            $hotel->HotelInfo->HotelPicture??'',$hotel->HotelInfo->HotelDescription??'',$hotel->HotelInfo->HotelDescription??'',
            $HotelOnMap,$hotel->HotelInfo->Rating??0,$pricingInfo,$hotel->IsHalal??false,$hotel->HotelInfo->TripAdvisorRating??0,
            $hotel->HotelInfo->TripAdvisorReviewURL??'');
        }


        if(is_array($response->RoomGuests->RoomGuest)){
            $adults = 0;
            $children = 0;
            foreach ($response->RoomGuests->RoomGuest as $roomGuest){
                $adults +=  $roomGuest->AdultCount??0;
                $children += $roomGuest->ChildCount??0;
            }
            $roomGuestResponse = new RoomGuestResponse($adults,$children);
        }else{
            $roomGuestResponse = new RoomGuestResponse($response->RoomGuests->RoomGuest->AdultCount??0,
                $response->RoomGuests->RoomGuest->ChildCount??0);
        }

        $hotelSearchResponse =  new HotelSearchResponse($status,$response->ResponseTime,$response->SessionId,$response->NoOfRoomsRequested,
            count($hotel_results),$response->CityId,
        $response->CheckInDate,$response->CheckOutDate,$roomGuestResponse,$hotel_results);

       return $hotelSearchResponse;
    }


    private function filters($requestData)
    {
        if((bool)$requestData['isHotel']){
            $filter = new Filters(null,$requestData['starRating'],OrderByFilter::PriceAsc,$requestData['code']);
        }else{
            $filter = new Filters(null,$requestData['starRating'],OrderByFilter::PriceAsc,null);
        }

        return $filter;
    }


}
