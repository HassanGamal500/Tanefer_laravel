<?php

namespace App\GDSIntegration\Amadeus\CreatePassengerNameRecord;

use Amadeus\Client;
use Amadeus\Client\RequestOptions\AirSellFromRecommendationOptions;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Amadeus\Client\RequestOptions\Air\SellFromRecommendation\Itinerary;
use Amadeus\Client\RequestOptions\Air\SellFromRecommendation\Segment;

class AirSellFromRecommendation
{
    public function getResponse(Client $statefulClient,$passengerDetails,$flight,$nowDate,$nowTime)
    {
        $passengersWithoutInfant = Arr::where($passengerDetails,function ($value){
            return $value['passengerType'] != 'INF';
        });
        $numberOfPassengersExceptInfant = count($passengersWithoutInfant);

        $itineraries = $this->itineraries($numberOfPassengersExceptInfant,$flight->flightSegments);

        $airSellFromRecommendationOptions = new AirSellFromRecommendationOptions([
            'itinerary' => $itineraries
        ]);

        $responseData = $statefulClient->airSellFromRecommendation($airSellFromRecommendationOptions);

        Storage::put('/amadeusRequests/'.$nowDate.'/airSellRecommendation/'.$nowTime.'sellRQ.xml',
            $statefulClient->getLastRequest());
        Storage::put('/amadeusRequests/'.$nowDate.'/airSellRecommendation/'.$nowTime.'sellRS.xml',
            $statefulClient->getLastResponse());
        Storage::put('/amadeusRequests/'.$nowDate.'/airSellRecommendation/'.$nowTime.'sellRS.json',
            json_encode($responseData));

        return $responseData;
    }

    private function itineraries($numberOfPassenger, $flightSegments)
    {
        foreach ($flightSegments as $flightSegment){
            $itineraries[] = new Itinerary([
                'from' => $flightSegment->leg->departureLocationCode,
                'to'   => $flightSegment->leg->arrivalLocationCode,
                'segments' => $this->segments($flightSegment->Segments,$numberOfPassenger)
            ]);
        }
        return $itineraries;
    }

    private function segments($segments,$numberOfPassengers)
    {
        foreach ($segments as $segment){
            $amadeusSegments[] = new Segment([
                'departureDate' => new \DateTime($segment->DepartureDate),
                'arrivalDate'   => new \DateTime($segment->ArrivalDate),
                'from'          => $segment->OriginLocationCode,
                'to'            => $segment->DestinationLocationCode,
                'companyCode'   => $segment->MarketingAirlineCode,
                'flightNumber'  => $segment->FlightNumber,
                'bookingClass'  => $segment->BookingClass,
                'nrOfPassengers'=> $numberOfPassengers,
                'statusCode'    => Segment::STATUS_SELL_SEGMENT,
                'flightTypeDetails' => Segment::INDICATOR_LOCAL_AVAILABILITY
            ]);
        }

        return $amadeusSegments;
    }
}
