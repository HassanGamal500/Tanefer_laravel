<?php


namespace App\GDSIntegration\Tbo\AvailabilityAndPricing;

use App\GDSIntegration\Tbo\AvailableHotelRooms\CancelPolicy;
use App\GDSIntegration\Tbo\AvailableHotelRooms\DayRate;
use App\GDSIntegration\Tbo\AvailableHotelRooms\RoomRate;
use App\GDSIntegration\Tbo\ResponseStatus;
use App\GDSIntegration\Tbo\TBOIntegration;
use Illuminate\Support\Facades\Storage;

class AvailabilityAndPricing extends TBOIntegration
{
    public function __construct()
    {
        $actionHeader = new \SoapHeader('http://www.w3.org/2005/08/addressing','Action',
            'http://TekTravel/HotelBookingApi/AvailabilityAndPricing');
        parent::__construct($actionHeader);
    }

    public function availability($request)
    {
        $RoomCombination[] =  new RoomCombination($request->roomIndex);

        $bookingOptions = new BookingOptions($RoomCombination);

        $availabilityAndPricingRequest = new AvailabilityAndPricingRequest($request->hotelIndex,$request->hotelCode,
        $request->sessionId,$bookingOptions);


        try {
            $response = $this->AvailabilityAndPricing($availabilityAndPricingRequest);
            $xmlRequest = $this->__getLastRequest();
            $xmlResponse = $this->__getLastResponse();
            Storage::put('tboRequests/'.$this->nowDate.'/AvailabilityAndPricing/'.$this->nowTime.'availabilityRQ.xml',$xmlRequest);
            Storage::put('tboRequests/'.$this->nowDate.'/AvailabilityAndPricing/'.$this->nowTime.'availabilityRS.xml',$xmlResponse);
            Storage::put('tboRequests/'.$this->nowDate.'/AvailabilityAndPricing/'.$this->nowTime.'availabilityRS.json',json_encode($response));
        }catch (\Exception $exception){
            if(app()->environment('local')){
                throw $exception;
            }
            sendErrorToMail($exception);
            return 'SomeThing Went Wrong, please try again in few minutes';
        }

        $status = new ResponseStatus($response->Status->StatusCode,$response->Status->Description,$response->Status->Category ?? null);

        if($status->StatusCode != 1){
            $descArray = explode(':',$status->Description);
            unset($descArray[0]);

            return implode(' ',$descArray);
        }
        if(is_array($response->HotelCancellationPolicies->CancelPolicies->CancelPolicy)){
            $cancelPolicies = $response->HotelCancellationPolicies->CancelPolicies->CancelPolicy;
            foreach ($cancelPolicies as $policy){
                $policies[] = new CancelPolicy($policy->RoomTypeName??'',$policy->RoomIndex??'',$policy->FromDate??'',
                $policy->ToDate??'',$policy->ChargeType??'',$policy->CancellationCharge??'',$policy->Currency??'');
            }
        }else{
            $cancelPolicies = $response->HotelCancellationPolicies->CancelPolicies->CancelPolicy;
            $policies[] = new CancelPolicy($cancelPolicies->RoomTypeName??'',$cancelPolicies->RoomIndex??'',$cancelPolicies->FromDate??'',
                $cancelPolicies->ToDate??'',$cancelPolicies->ChargeType??'',$cancelPolicies->CancellationCharge??'',$cancelPolicies->Currency??'');
        }
        if(isset($response->HotelCancellationPolicies->CancelPolicies->NoShowPolicy)){
            if(is_array($response->HotelCancellationPolicies->CancelPolicies->NoShowPolicy)){
                foreach ($response->HotelCancellationPolicies->CancelPolicies->NoShowPolicy as $policy){
                    $policies[] = new CancelPolicy($policy->RoomTypeName??'',$policy->RoomIndex??'',
                        $policy->FromDate??'',$policy->ToDate??'',$policy->ChargeType??'',$policy->CancellationCharge??'',
                        $policy->Currency??'');
                }
            }else{
                $policy = $response->HotelCancellationPolicies->CancelPolicies->NoShowPolicy;
                $policies[] = new CancelPolicy($policy->RoomTypeName??'',$policy->RoomIndex??'',
                    $policy->FromDate??'',$policy->ToDate??'',$policy->ChargeType??'',$policy->CancellationCharge??'',
                    $policy->Currency??'');
            }
        }

        if($response->PriceVerification->PriceChanged){
           if(is_array($response->HotelRooms)){
               foreach ($response->HotelRooms as $room){
                   $roomRate = $room->RoomRate;
                   $rateSummary = new RoomRate($roomRate->ExtraGuestCharges??'',
                       $roomRate->ChildCharges??'',$roomRate->Discount??'',$roomRate->OtherCharges??'',
                       $roomRate->ServiceTax??'',$roomRate->IsPackageRate??'',$roomRate->IsInstantConfirmed??'',
                       $roomRate->AgentMarkUp??'',$roomRate->Currency??'',$roomRate->RoomFare??0,
                       $roomRate->RoomTax??0,$roomRate->TotalFare??0);
                   if(is_array($room->RoomRate->DayRates->DayRate)){
                       foreach ($room->RoomRate->DayRates->DayRate as $rate){
                           $daysRate[] = new DayRate($rate->Date,$rate->BaseFare);
                       }
                   }else{
                       $rate = $room->RoomRate->DayRates->DayRate;
                       $daysRate[] = new DayRate($rate->Date,$rate->BaseFare);
                   }
                   $hotelRooms[] = new Hotel_Room($room->RoomIndex,$room->RoomTypeName,$room->Inclusion,$room->RoomTypeCode,$room->RatePlanCode,
                   $rateSummary,$room->RoomAdditionalInfo?$room->RoomAdditionalInfo->Description:'',$daysRate,$room->Amenities,
                   $room->MealType);
               }
           }else{
                $room = $response->HotelRooms;
               $roomRate = $room->RoomRate;
               $rateSummary = new RoomRate($roomRate->ExtraGuestCharges??'',
                   $roomRate->ChildCharges??'',$roomRate->Discount??'',$roomRate->OtherCharges??'',
                   $roomRate->ServiceTax??'',$roomRate->IsPackageRate??'',$roomRate->IsInstantConfirmed??'',
                   $roomRate->AgentMarkUp??'',$roomRate->Currency??'',$roomRate->RoomFare??0,
                   $roomRate->RoomTax??0,$roomRate->TotalFare??0);
               if(is_array($room->RoomRate->DayRates->DayRate)){
                   foreach ($room->RoomRate->DayRates->DayRate as $rate){
                       $daysRate[] = new DayRate($rate->Date,$rate->BaseFare);
                   }
               }else{
                   $rate = $room->RoomRate->DayRates->DayRate;
                   $daysRate[] = new DayRate($rate->Date,$rate->BaseFare);
               }
               $hotelRooms[] = new Hotel_Room($room->RoomIndex,$room->RoomTypeName,$room->Inclusion,$room->RoomTypeCode,$room->RatePlanCode,
                   $rateSummary,$room->RoomAdditionalInfo?$room->RoomAdditionalInfo->Description:'',$daysRate,$room->Amenities,
                   $room->MealType);
           }
        }else{
            $hotelRooms = [];
        }

        $availabilityAndPricingResponse = new AvailabilityAndPricingResponse($response->AvailableForBook,$response->AvailableForConfirmBook,
        $response->CancellationPoliciesAvailable,$policies,$response->PriceVerification->Status??'',$response->PriceVerification->PriceChanged,
        $response->HotelCancellationPolicies->CancelPolicies->LastCancellationDeadline,
            $response->HotelCancellationPolicies->HotelNorms->string??[],
        $response->IsFlightDetailsMandatory,$hotelRooms,
            $response->HotelCancellationPolicies->CancelPolicies->DefaultPolicy,
        $response->HotelCancellationPolicies->CancelPolicies->AutoCancellationText);


        return $availabilityAndPricingResponse;
    }
}
