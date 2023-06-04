<?php


namespace App\GDSIntegration\Amadeus;


use Amadeus\Client\RequestOptions\Fare\InformativePricing\Passenger;
use Amadeus\Client\RequestOptions\Fare\InformativePricing\PricingOptions;
use Amadeus\Client\RequestOptions\Fare\InformativePricing\Segment;
use Amadeus\Client\RequestOptions\FareInformativeBestPricingWithoutPnrOptions;
use Amadeus\Client\Result;
use App\Services\Flights\SearchResponse\BreakDown;
use App\Services\Flights\SearchResponse\Flight;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class FareInformativeBestPricingWithoutPNR extends Amadeus
{
    public function flight($flight,$profitSettings,$currencyCode)
    {
        $passengers = $this->passengers($flight->passengerQuantity);

        $segments = $this->segments($flight->flightSegments);
        $fareInformativeBestPricingWithoutPnrOptions = new FareInformativeBestPricingWithoutPnrOptions([
            'passengers' => $passengers,
            'segments'   => $segments,
            'pricingOptions' => new PricingOptions([
                'overrideOptions' => [
                    PricingOptions::OVERRIDE_FARETYPE_PUB,
                    PricingOptions::OVERRIDE_FARETYPE_UNI,
                    PricingOptions::OVERRIDE_RETURN_LOWEST_AVAILABLE
                ],
                //'validatingCarrier' => 'QR', //TODO get from paxFareDetail/codeShareDetails/company in flight search response
                'currencyOverride' => $currencyCode,
            ])
        ]);

        $client = $this->statelessClient();
        $response = $client->fareInformativeBestPricingWithoutPnr($fareInformativeBestPricingWithoutPnrOptions);

        Storage::put('/amadeusRequests/'.$this->nowDate.'/availability/'.$this->nowTime.'availabilityRQ.xml',
            $client->getLastRequest());
        Storage::put('/amadeusRequests/'.$this->nowDate.'/availability/'.$this->nowTime.'availabilityRS.xml',
            $client->getLastResponse());
        Storage::put('/amadeusRequests/'.$this->nowDate.'/availability/'.$this->nowTime.'availabilityRS.json',
            json_encode($response));

        if($response->status == Result::STATUS_OK){
            $result = $this->reformatResponse($response->response,$flight,$profitSettings);
        }else{
            $result = 'Not Valid';
        }

        return $result;
    }

    private function passengers($passengerQuantities)
    {
        $i = 1;

        foreach ($passengerQuantities as $passengerQuantity){

            if($passengerQuantity->Code == 'INF'){
                for ($inf = 1; $inf <= $passengerQuantity->Quantity; $inf++){
                    $passengerTattoos[] = $inf;
                }
            }else{
                for ($k = 1; $k <= $passengerQuantity->Quantity; $k++){
                    $passengerTattoos[] = $i++;
                }
            }

            $passengers[] = new Passenger([
                'tattoos' => $passengerTattoos,
                'type'    => $passengerQuantity->Code
            ]);
            $passengerTattoos = [];
        }

        return $passengers;
    }

    private function segments($flightSegments)
    {
        $flightSegmentIterator = 1;
        $segmentIterator = 1;
        foreach ($flightSegments as $flightSegment){

            foreach ($flightSegment->Segments as $segment){
                $segments[] = new Segment([
                    'departureDate' => \DateTime::createFromFormat('Y-m-d H:i', $segment->DepartureDate.' '.$segment->DepartureTime),
                    'arrivalDate' => \DateTime::createFromFormat('Y-m-d H:i', $segment->ArrivalDate.' '.$segment->ArrivalTime),
                    'from' => $segment->OriginLocationCode,
                    'to' => $segment->DestinationLocationCode,
                    'marketingCompany' => $segment->MarketingAirlineCode,
                    'operatingCompany' => $segment->OperatingAirlineCode,
                    'flightNumber' => $segment->FlightNumber,
                    'bookingClass' =>$segment->BookingClass,
                    'segmentTattoo' => $segmentIterator,
                    'groupNumber' => $flightSegmentIterator
                ]);
                $segmentIterator++;
            }
            $flightSegmentIterator++;
        }

        return $segments;
    }

    /****************************** Response Functions **********************************/

    private function reformatResponse($responseData, $flight, $profitSettings)
    {
        $groupLevels = convertObjectToArray($responseData->mainGroup->pricingGroupLevelGroup);

        if(isset($groupLevels[0]->fareInfoGroup->negoFareGroup)){
            $fareType = 'Net';
        }else{
            $fareType = 'Publish';
        }

        $numberOfPassengers = 0;
        $totalOriginalBaseFares = 0;
        $totalOriginalEquivalentFares = 0;
        $totalTaxes = 0;
        $totalOriginalTotalFares = 0;
        $totalBaseFare = 0;
        $totalTotalFares = 0;

        foreach ($groupLevels as $groupLevel){
            $numberOfPassengers += $groupLevel->numberOfPax->segmentControlDetails->numberOfUnits;
            $numberOfPassengersOfSameType = $groupLevel->numberOfPax->segmentControlDetails->numberOfUnits;
            $passengerFares = $this->passengerFares($groupLevel->fareInfoGroup);
            $breakDown = $this->breakDown($groupLevel->fareInfoGroup,$passengerFares,$fareType,$numberOfPassengersOfSameType,$profitSettings);
            $totalBaseFare += ($breakDown->baseFare * $numberOfPassengersOfSameType);
            $totalOriginalBaseFares += $passengerFares['baseFare'] * $numberOfPassengersOfSameType;
            $totalOriginalEquivalentFares += $passengerFares['equivalentFare'] * $numberOfPassengersOfSameType;
            $totalTaxes += $passengerFares['taxes'] * $numberOfPassengersOfSameType;
            $totalOriginalTotalFares += $passengerFares['totalFare'] * $numberOfPassengersOfSameType;
            $totalTotalFares += ($breakDown->totalFare * $numberOfPassengersOfSameType);
            $passengersBreakDowns[] = $breakDown;
        }

        $j = 0;
        foreach ($flight->flightSegments as $flightSegment){
            foreach ($flightSegment->Segments as $segment){
                $segmentLevelGroup = convertObjectToArray($groupLevels[0]->fareInfoGroup->segmentLevelGroup);
                $segment->setBookingClass($segmentLevelGroup[$j]->segmentInformation->flightIdentification->bookingClass);
                $j++;
            }
        }

        if($totalOriginalEquivalentFares == 0){
            $totalOriginalFares = $totalOriginalBaseFares;
        }else{
            $totalOriginalFares = $totalOriginalEquivalentFares;
        }

        $flight->pricingInfo->setBreakDowns($passengersBreakDowns);
        $flight->pricingInfo->setOriginalFare($totalOriginalTotalFares);
        $flight->pricingInfo->setTotalFareCurrency($passengerFares['currency']);
        $flight->pricingInfo->setTaxes($totalTaxes);
        $flight->pricingInfo->setOriginalBaseFare($totalOriginalFares);
        $flight->pricingInfo->setBaseFare($totalBaseFare,false,$profitSettings,true);
        $flight->pricingInfo->setTotalFare($totalTotalFares,true);
        $flight->pricingInfo->setDiscountAmount(null,$numberOfPassengers);
        $flight->pricingInfo->setNewFare(null,$numberOfPassengers,true);
        $flight->pricingInfo->setFareType($fareType);
        $flight->pricingInfo->setPromotionApplied();

        $updatedFlight = $flight;
        return $updatedFlight;
    }

    private function breakDown($fareInfoGroup,$passengerFares,$fareType,$numberOfPassengersType,$profitSettings)
    {
        $segmentLevelGroup = convertObjectToArray($fareInfoGroup->segmentLevelGroup);
        $passengerType = $segmentLevelGroup[0]->ptcSegment->quantityDetails->unitQualifier;
        $passengerQuantity = $numberOfPassengersType;


        $breakdown = new BreakDown($passengerFares['currency']);
        $breakdown->setPassengerType($passengerType);
        $breakdown->setPassengerQuantity($passengerQuantity);
        if($passengerFares['equivalentFare'] != 0){
            $breakdown->setOriginalBaseFare($passengerFares['equivalentFare']);
            $originalBaseFare = $passengerFares['equivalentFare'];
        }else{
            $breakdown->setOriginalBaseFare($passengerFares['baseFare']);
            $originalBaseFare = $passengerFares['baseFare'];
        }
        $breakdown->setBaseFarePerPassenger($originalBaseFare,false,$profitSettings,$fareType);
        $breakdown->setTaxes($passengerFares['taxes']);
        $breakdown->setOriginalTotalFare($passengerFares['totalFare']);
        $breakdown->setTotalFare();

        return $breakdown;
    }

    private function passengerFares($fareInfoGroup)
    {
        $monetaryDetailsArray = convertObjectToArray($fareInfoGroup->fareAmount->monetaryDetails);
        $baseFare = array_values(Arr::where($monetaryDetailsArray,function($value){
            return $value->typeQualifier == 'B'; //Means BaseFare
        }));
        if(! empty($baseFare)){
            $baseFareAmount = $baseFare[0]->amount;
        }
        $otherMonetaryDetailsArray = convertObjectToArray($fareInfoGroup->fareAmount->otherMonetaryDetails);
        $equivalentFare = array_values(Arr::where($otherMonetaryDetailsArray,function($value){
            return $value->typeQualifier == 'E';
        }));
        if(! empty($equivalentFare)){
            $equivalentFareAmount = $equivalentFare[0]->amount;
        }

        $totalFare = array_values(Arr::where($otherMonetaryDetailsArray,function($value){
            return $value->typeQualifier == '712';
        }));
        $totalFareAmount = $totalFare[0]->amount;
        $totalFareCurrency = $totalFare[0]->currency;

        $taxes = 0;
        foreach ($fareInfoGroup->surchargesGroup->taxesAmount->taxDetails as $tax){
            $taxes += $tax->rate;
        }

        return ['baseFare' => $baseFareAmount ?? 0, 'equivalentFare' => $equivalentFareAmount ?? 0,
            'taxes' => round($taxes,2),
            'totalFare' => $totalFareAmount,
        'currency' => $totalFareCurrency];
    }

}
