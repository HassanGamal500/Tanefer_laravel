<?php


namespace App\GDSIntegration\Tbo\AvailableHotelRooms;


use App\GDSIntegration\Tbo\ResponseStatus;
use App\GDSIntegration\Tbo\TBOIntegration;
use Illuminate\Support\Facades\Storage;

class AvailableHotelRooms extends TBOIntegration
{
    public function __construct()
    {
        $actionHeader = new \SoapHeader('http://www.w3.org/2005/08/addressing','Action',
            'http://TekTravel/HotelBookingApi/AvailableHotelRooms');
        parent::__construct($actionHeader);
    }

    public function roomsResponse($request)
    {
        $hotelRoomRequest = new HotelRoomAvailabilityRequest($request->sessionId,$request->hotelIndex,
        $request->hotelCode,$this->session_time,true);

        try {
            $response = $this->AvailableHotelRooms($hotelRoomRequest);
            $xmlRequest = $this->__getLastRequest();
            $xmlResponse = $this->__getLastResponse();
            Storage::put('tboRequests/'.$this->nowDate.'/AvailableHotelRooms/'.$this->nowTime.'availableRoomsRQ.xml',$xmlRequest);
            Storage::put('tboRequests/'.$this->nowDate.'/AvailableHotelRooms/'.$this->nowTime.'availableRoomsRS.json',json_encode($response));
            Storage::put('tboRequests/'.$this->nowDate.'/AvailableHotelRooms/'.$this->nowTime.'availableRoomsRS.xml',$xmlResponse);
        }catch (\Exception $exception){
            if(app()->environment('local')){
                throw $exception;
            }
            sendErrorToMail($exception);
            return 'No Rooms Available, please Search Again';
        }


        $status = new ResponseStatus($response->Status->StatusCode,$response->Status->Description,$response->Status->Category ?? null);

        if($status->StatusCode != 1){
            $descArray = explode(':',$status->Description);
            unset($descArray[0]);

            return implode(' ',$descArray);
        }

        if(isset($response->HotelRooms->HotelRoom)){
            if(is_array($response->HotelRooms->HotelRoom)){
                $hotelRooms = $response->HotelRooms->HotelRoom ?? [];
            }else{
                $hotelRooms[] = $response->HotelRooms->HotelRoom ?? [];
            }
            foreach ($hotelRooms as $hotelRoom){
                if(is_array($hotelRoom->RoomRate->DayRates->DayRate)){
                    foreach ($hotelRoom->RoomRate->DayRates->DayRate as $rate){
                        $daysRate[] = new DayRate($rate->Date,$rate->BaseFare);
                    }
                }else{
                    $rate = $hotelRoom->RoomRate->DayRates->DayRate;
                    $daysRate[] = new DayRate($rate->Date,$rate->BaseFare);
                }

                $roomRate = $hotelRoom->RoomRate;
                $rateSummary = new RoomRate($roomRate->ExtraGuestCharges??'',
                    $roomRate->ChildCharges??'',$roomRate->Discount??'',$roomRate->OtherCharges??'',
                $roomRate->ServiceTax??'',$roomRate->IsPackageRate??'',$roomRate->IsInstantConfirmed??'',
                $roomRate->AgentMarkUp??'',$roomRate->Currency??'',$roomRate->RoomFare??0,
                $roomRate->RoomTax??0,$roomRate->TotalFare??0);
                if(isset($hotelRoom->Supplements)){
                    if(is_array($hotelRoom->Supplements->Supplement)){
                        foreach ($hotelRoom->Supplements->Supplement as $supplement){
                            $supplements[] = new Supplement($supplement->Type??'',$supplement->SuppID??'',
                            $supplement->SuppName??'',$supplement->SuppIsMandatory??false,
                            $supplement->SuppChargeType??'',$supplement->Price??0,$supplement->CurrencyCode??'');
                        }
                    }else{
                        $supplement = $hotelRoom->Supplements->Supplement;
                        $supplements[] = new Supplement($supplement->Type??'',$supplement->SuppID??'',
                            $supplement->SuppName??'',$supplement->SuppIsMandatory??false,
                            $supplement->SuppChargeType??'',$supplement->Price??0,$supplement->CurrencyCode??'');
                    }
                }else{
                    $supplements = [];
                }

                if(isset($hotelRoom->CancelPolicies)){
                    if(is_array($hotelRoom->CancelPolicies->CancelPolicy)){
                        foreach ($hotelRoom->CancelPolicies->CancelPolicy as $policy){
                            $policies[] = new CancelPolicy($policy->RoomTypeName,$policy->RoomIndex??'',
                            $policy->FromDate,$policy->ToDate,$policy->ChargeType,$policy->CancellationCharge,
                            $policy->Currency);
                        }
                    }else{
                        $policy = $hotelRoom->CancelPolicies->CancelPolicy;
                        $policies[] = new CancelPolicy($policy->RoomTypeName,$policy->RoomIndex??'',
                            $policy->FromDate,$policy->ToDate,$policy->ChargeType,$policy->CancellationCharge,
                            $policy->Currency);
                    }
                    if(isset($hotelRoom->CancelPolicies->NoShowPolicy)){
                        if(is_array($hotelRoom->CancelPolicies->NoShowPolicy)){
                            foreach ($hotelRoom->CancelPolicies->NoShowPolicy as $policy){
                                $policies[] = new CancelPolicy($policy->RoomTypeName,$policy->RoomIndex??'',
                                    $policy->FromDate,$policy->ToDate,$policy->ChargeType,$policy->CancellationCharge,
                                    $policy->Currency);
                            }
                        }else{
                            $policy = $hotelRoom->CancelPolicies->NoShowPolicy;
                            $policies[] = new CancelPolicy($policy->RoomTypeName,$policy->RoomIndex??'',
                                $policy->FromDate,$policy->ToDate,$policy->ChargeType,$policy->CancellationCharge,
                                $policy->Currency);
                        }
                    }

                    $cancelPolicies = new CancelPolicies($policies,$hotelRoom->CancelPolicies->TextPolicy??'',
                    $hotelRoom->CancelPolicies->DefaultPolicy??'',$hotelRoom->CancelPolicies->AutoCancellationText??'',
                    $hotelRoom->CancelPolicies->LastCancellationDeadline);
                }else{
                    $cancelPolicies = new \stdClass();
                }
                $policies = [];

                if(isset($hotelRoom->RoomAdditionalInfo)){
                    $desc = $hotelRoom->RoomAdditionalInfo->Description;
                    $images = $hotelRoom->RoomAdditionalInfo->ImageURLs->URL;
                    if(isset($images[0])){
                        $imagesUrl = $images;
                    }else{
                        $imagesUrl[] = $images;
                    }
                }else{
                    $desc = '';
                    $imagesUrl = [];
                }

                $hotelRoomResult[] = new HotelRoomAvailabilityResponse($hotelRoom->RoomIndex,
                $hotelRoom->RoomTypeName,$hotelRoom->Inclusion,$hotelRoom->RoomTypeCode,$hotelRoom->RatePlanCode
                ,$daysRate,$rateSummary,$hotelRoom->RoomPromtion,$supplements,$desc,$cancelPolicies,$hotelRoom->Amenities,
                $hotelRoom->MealType,$imagesUrl,$response->OptionsForBooking->RoomCombination);

                $supplements = [];
                $daysRate = [];
            }
        }else{
            return 'No Rooms Available, Please select another hotel';
        }


        return ['rooms' => $hotelRoomResult,'OptionsForBooking' => $response->OptionsForBooking];
    }


    public function roomsData($response)
    {

        $roomsData = $response['HotelRooms']['HotelRoom'];
        //return $roomsData;
        $roomCombinationsData = $response['OptionsForBooking']['RoomCombination'];
        if(isset($roomCombinationsData[0])){
            $roomCombinations = $roomCombinationsData;
        }else{
            $roomCombinations[0] = $roomCombinationsData;
        }

        if(isset($roomsData[0])){
            $rooms = $roomsData;
        }else{
            $rooms[0] = $roomsData;
        }

        for ($r=0; $r < count($rooms); $r++){
            $roomsDetails[$r]['roomIndex'] = $roomIndex = $rooms[$r]['RoomIndex']['value'];
            $roomsDetails[$r]['roomCode']  = $rooms[$r]['RoomTypeCode']['value'];
            $roomsDetails[$r]['ratePlanCode'] = $rooms[$r]['RatePlanCode']['value'];
            $roomsDetails[$r]['roomName'] = $rooms[$r]['RoomTypeName']['value'];
            foreach ($roomCombinations as $roomCombination){
                $roomsIndex = $roomCombination['RoomIndex'];
                if(in_array($roomIndex,array_column($roomCombination['RoomIndex'],'value'))){
                    foreach ($roomsIndex as $index){
                        if($index['value'] != $roomIndex){
                            $roomsDetails[$r]['roomCombination'][] = $index['value'];
                        }
                    }
                }
            }
//            if(isset($combinations)){
//                $roomsDetails[$r]['roomCombination'] = array_unique($combinations);
//            }

            if(array_key_exists('value',$rooms[$r]['Inclusion'])){
                $roomsDetails[$r]['inclusion']= $rooms[$r]['Inclusion']['value'];
            }else{
                $roomsDetails[$r]['inclusion'] = '';
            }
            if(array_key_exists('RoomAdditionalInfo',$rooms[$r])){
                $roomsDetails[$r]['description'] = $rooms[$r]['RoomAdditionalInfo']['Description']['value'];
                $roomsDetails[$r]['image']       = $rooms[$r]['RoomAdditionalInfo']['ImageURLs']['URL'];
            }
            if(array_key_exists('Amenities',$rooms[$r])){
                if(array_key_exists('value',$rooms[$r]['Amenities'])){
                    $roomsDetails[$r]['amenities'] = $rooms[$r]['Amenities']['value'];
                }
            }else{
                $roomsDetails[$r]['amenities'] = '';
            }
            $roomsDetails[$r]['meal']     = $rooms[$r]['MealType']['value'];
            if(count($rooms[$r]['RoomPromtion']) != 0 ){
                $roomsDetails[$r]['promotion'] = $rooms[$r]['RoomPromtion']['value'];
            }
            $roomsDetails[$r]['rateSummary']['currency'] = $rooms[$r]['RoomRate']['attr']['Currency'];
            $roomsDetails[$r]['rateSummary']['baseFare']     = round($rooms[$r]['RoomRate']['attr']['RoomFare'],2);
            $roomsDetails[$r]['rateSummary']['tax']      = round($rooms[$r]['RoomRate']['attr']['RoomTax'],2);
            $originalTotalRate = round($rooms[$r]['RoomRate']['attr']['TotalFare'],2);
            $roomsDetails[$r]['rateSummary']['totalFare'] =  round(($originalTotalRate) + $originalTotalRate,2);
            $roomsDetails[$r]['rateSummary']['originalTotalRate'] = $originalTotalRate;
            $policies = $rooms[$r]['CancelPolicies']['CancelPolicy'];
            if(isset($policies[0])){
                $roomPolicies = $policies;
            }else{
                $roomPolicies[0] = $policies;
            }

            if(array_key_exists('NoShowPolicy',$rooms[$r]['CancelPolicies'])){
                array_push($roomPolicies,$rooms[$r]['CancelPolicies']['NoShowPolicy']);
            }

            $policies = $roomPolicies;
            $roomPolicies = [];

            for ($p=0; $p < count($policies); $p++){
                $policy = $policies[$p];
                $roomsDetails[$r]['cancelPolicies']['policies'][$p]['fromDate'] = $policy['attr']['FromDate'];
                $roomsDetails[$r]['cancelPolicies']['policies'][$p]['toDate'] = $policy['attr']['ToDate'];
                $roomsDetails[$r]['cancelPolicies']['policies'][$p]['chargeType'] = $policy['attr']['ChargeType'];
                $roomsDetails[$r]['cancelPolicies']['policies'][$p]['cancellationCharge'] = $policy['attr']['CancellationCharge'];
                $roomsDetails[$r]['cancelPolicies']['policies'][$p]['currency'] = $policy['attr']['Currency'];
            }

            $roomsDetails[$r]['cancelPolicies']['lastCancellationDeadLine'] = explode('T',$rooms[$r]['CancelPolicies']['LastCancellationDeadline']['value'])[0];
            $roomsDetails[$r]['cancelPolicies']['defaultPolicy'] = $rooms[$r]['CancelPolicies']['DefaultPolicy']['value'];

            $roomRate = $rooms[$r]['RoomRate']['DayRates']['DayRate'];
            if(isset($roomRate[0])){
                $roomRates = $roomRate;
            }else{
                $roomRates[0] = $roomRate;
            }
            for($d=0; $d < count($roomRates); $d++){
                $dayRate = $roomRates[$d];
                $roomsDetails[$r]['daysRate'][$d]['date'] = explode('T',$dayRate['attr']['Date'])[0];
                $roomsDetails[$r]['daysRate'][$d]['baseFare'] = (float)number_format((float)$dayRate['attr']['BaseFare'],2,'.','');
            }

            $s = 0;
            if(array_key_exists('Supplements',$rooms[$r]) && count($rooms[$r]['Supplements']) != 0){
                if(array_keys($rooms[$r]['Supplements']['Supplement']) === range(0,count($rooms[$r]['Supplements']['Supplement']) -1)){
                    foreach ($rooms[$r]['Supplements']['Supplement'] as $supplement) {
                        $roomsDetails[$r]['supplements'][$s]['type'] = $supplement['attr']['Type'];
                        $roomsDetails[$r]['supplements'][$s]['id']   = $supplement['attr']['SuppID'];
                        $roomsDetails[$r]['supplements'][$s]['name'] = $supplement['attr']['SuppName'];
                        $roomsDetails[$r]['supplements'][$s]['isMandatory'] = $supplement['attr']['SuppIsMandatory'];
                        $roomsDetails[$r]['supplements'][$s]['chargeType']  = $supplement['attr']['SuppChargeType'];
                        $roomsDetails[$r]['supplements'][$s]['price'] = $supplement['attr']['Price'];
                        $roomsDetails[$r]['supplements'][$s]['currencyCode'] = $supplement['attr']['CurrencyCode'];
                        $s++;
                    }
                }else{
                    foreach ($rooms[$r]['Supplements']['Supplement'] as $supplement) {
                        $roomsDetails[$r]['supplements'][$s]['type'] = $supplement['Type'];
                        $roomsDetails[$r]['supplements'][$s]['id']   = $supplement['SuppID'];
                        $roomsDetails[$r]['supplements'][$s]['name'] = $supplement['SuppName'];
                        $roomsDetails[$r]['supplements'][$s]['isMandatory'] = $supplement['SuppIsMandatory'];
                        $roomsDetails[$r]['supplements'][$s]['chargeType']  = $supplement['SuppChargeType'];
                        $roomsDetails[$r]['supplements'][$s]['price'] = $supplement['Price'];
                        $roomsDetails[$r]['supplements'][$s]['currencyCode'] = $supplement['CurrencyCode'];
                    }
                }

            }
        }
        return $roomsDetails;
    }

}
