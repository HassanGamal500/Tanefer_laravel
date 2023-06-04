<?php


namespace App\GDSIntegration\Tbo\HotelDetails;


use App\GDSIntegration\Tbo\HotelSearch\HotelSearchResponse\HotelOnMap;
use App\GDSIntegration\Tbo\ResponseStatus;
use App\GDSIntegration\Tbo\TBOIntegration;
use App\HotelDetail;
use App\HotelImage;
use Illuminate\Support\Facades\Storage;

class HotelDetails extends TBOIntegration
{

    public function __construct()
    {
        $actionHeader = new \SoapHeader('http://www.w3.org/2005/08/addressing','Action','http://TekTravel/HotelBookingApi/HotelDetails');
        parent::__construct($actionHeader);
    }

    public function hotelResponse($request)
    {
        $hotelDetails = new HotelDetailsRequest($request->hotelIndex,$request->sessionId,$request->hotelCode);

        try{
            $response = $this->HotelDetails($hotelDetails);
            $xmlRequest = $this->__getLastRequest();
            $xmlResponse = $this->__getLastResponse();
            Storage::put('tboRequests/'.$this->nowDate.'/HotelDetails/'.$this->nowTime.'hotelDetailsRQ.xml',$xmlRequest);
            Storage::put('tboRequests/'.$this->nowDate.'/HotelDetails/'.$this->nowTime.'hotelDetailsRS.xml',$xmlResponse);
            Storage::put('tboRequests/'.$this->nowDate.'/HotelDetails/'.$this->nowTime.'hotelDetailsRS.json',json_encode($response));
        }catch (\Exception $exception){
            if(app()->environment('local')){
                throw $exception;
            }
            sendErrorToMail($exception);
            return 'No Hotel Found';
        }

        $status = new ResponseStatus($response->Status->StatusCode,$response->Status->Description,null);

        if($status->StatusCode != 1){
            $descArray = explode(':',$status->Description);
            unset($descArray[0]);

            return implode(' ',$descArray);
        }

        if(isset($response->HotelDetails->Map)){
            $mapArray = explode('|',$response->HotelDetails->Map);
            $map = new HotelOnMap($mapArray[0],$mapArray[1]);
        }

        $hotel = new APIHotelDetails($response->HotelDetails->Address,$map??[],
            $response->HotelDetails->Attractions->Attraction??'',$response->HotelDetails->CountryName,
        '',$response->HotelDetails->Description,'',$response->HotelDetails->FaxNumber ?? '',
        $response->HotelDetails->HotelFacilities->HotelFacility??[],'',
        '',$this->hotelImages($response->HotelDetails->ImageUrls ?? []),$response->HotelDetails->PhoneNumber??'',
        $response->HotelDetails->PinCode??'',$response->HotelDetails->TripAdvisorRating??'',
        $response->HotelDetails->CityName??'',$response->HotelDetails->HotelCode??'',
        $response->HotelDetails->HotelName??'',$response->HotelDetails->HotelRating??'');

        $this->storeHotelDetails($hotel);

        return $hotel;
    }

    public function hotelImages($imagesObject)
    {
        if(isset($imagesObject->ImageUrl)){
            if(is_array($imagesObject->ImageUrl)){
                $images = array_column($imagesObject->ImageUrl,'_');
            }else{
                $images[] = $imagesObject->ImageUrl->_;
            }

        }else{
            $images = [];
        }

        return $images;
    }


    public function storeHotelDetails($hotelDetails)
    {
        if(isset($hotelDetails->HotelFacilities)){
            if(isset($hotelDetails->HotelFacilities->HotelFacility)){
                if(is_array($hotelDetails->HotelFacilities->HotelFacility)){
                    $facilities = implode(',',$hotelDetails->HotelFacilities->HotelFacility);
                }else{
                    $facilities = $hotelDetails->HotelFacilities->HotelFacility;
                }
            }else{
                if(is_array($hotelDetails->HotelFacilities)){
                    $facilities = implode(',',$hotelDetails->HotelFacilities);
                }else{
                    $facilities = $hotelDetails->HotelFacilities;
                }
            }
        }else{
            $facilities = '';
        }

        try{
            $hotelDetail = HotelDetail::create([
                'code' => $hotelDetails->HotelCode,
                'name' => $hotelDetails->HotelName,
                'star' => $hotelDetails->HotelStars,
                'address' => $hotelDetails->HotelAddress,
                'country' => $hotelDetails->HotelCountry,
                'city'    => $hotelDetails->HotelCity,
                'phone'   => $hotelDetails->HotelPhone,
                'fax'     => $hotelDetails->HotelFax ?? null,
                'pinCode' => $hotelDetails->HotelPinCode ?? null,
                'map_latitude' => $hotelDetails->map->Latitude ?? 0,
                'map_longitude' => $hotelDetails->map->Longitude ?? 0,
                'facilities'    => $facilities,
                'description'   => $hotelDetails->HotelDescription ?? '',
                'near_by_places' => $hotelDetails->nearByPlaces ?? '',
                'tripAdivsorRating' => $hotelDetails->TripAdvisorRating ?? null
            ]);

            foreach ($hotelDetails->images as $image){
                HotelImage::create([
                    'image_url' => $image,
                    'hotel_id'  => $hotelDetail->id
                ]);
            }
        }catch (\Exception $exception){
            if(app()->environment('local')){
                throw $exception;
            }else{
                sendErrorToMail($exception);
            }
        }

    }
}
