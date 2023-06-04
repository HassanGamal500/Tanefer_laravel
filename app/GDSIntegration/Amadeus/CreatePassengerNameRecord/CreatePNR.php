<?php

namespace App\GDSIntegration\Amadeus\CreatePassengerNameRecord;

use Amadeus\Client\RequestOptions\PnrAddMultiElementsOptions;
use App\GDSIntegration\Amadeus\Amadeus;
use App\Services\Flights\SearchResponse\Flight;
use App\Services\Flights\SearchResponse\PNRResponse;
use Carbon\Carbon;

class CreatePNR extends Amadeus
{
    public function __construct($client = null)
    {
        parent::__construct($client);
    }

    public function createPnr($request,$contactInfo,Flight $flight,$currency)
    {
        foreach ($flight->flightSegments as $flightSegment){
            foreach ($flightSegment->Segments as $segment){
                $flightAirlinesCodes[] = $segment->MarketingAirlineCode;
            }
        }
        $airlinesCodes = array_unique($flightAirlinesCodes);

        $airlineCode = $flight->flightSegments[0]->Segments[0]->MarketingAirlineCode;
        $statefulClient = $this->statefulClient();
        $airSellFromRecommendation = new AirSellFromRecommendation();
        $airSellResult = $airSellFromRecommendation->getResponse($statefulClient,$request->passengerDetails,$flight,$this->nowDate,$this->nowTime);

        $farePricePnrWithBookingClass = new FarePricePNRWithBookingClass();
        $priceWithBookingClass = $farePricePnrWithBookingClass->getResponse($statefulClient,$flight->pricingInfo->fare_type,$currency,$this->nowDate,$this->nowTime);

        if($priceWithBookingClass->status == 'ERR'){
            return 'Cannot book';
        }

        $fareList = convertObjectToArray($priceWithBookingClass->response->fareList);
        $ticketCreateTSTFromPricing = new TicketCreateTSTFromPricing();
        $createTSTFromPricing = $ticketCreateTSTFromPricing->getResponse($fareList,$statefulClient,$this->nowDate,$this->nowTime);

        $fopCreateFormOfPayment = new FOPCreateFormOfPayment();
        $fopResponse = $fopCreateFormOfPayment->getResponse($statefulClient,$request,$airlineCode,$this->nowDate,$this->nowTime);

        $pnrAddMultiElement = new PNRAddMultiElements();
        $addMultiElementResult = $pnrAddMultiElement->getResponse($statefulClient,$this->nowDate,$this->nowTime,
        $request->passengerDetails,[],$contactInfo,$airlinesCodes);

        $endTransaction = new EndTransaction();
        $endTransactionResponse = $endTransaction->getResponse($statefulClient,$this->nowDate,$this->nowTime);

        if($endTransactionResponse->status == 'ERR'){
            return 'Cannot create Booking';
        }

        return $this->responsePNR($endTransactionResponse,$flight);
    }


    public function responsePNR($responseData, Flight $flight)
    {
        $totalPrice = ($flight->pricingInfo->newFare == 0) ? $flight->pricingInfo->TotalFare : $flight->pricingInfo->newFare;

        $pnr = $responseData->response->pnrHeader->reservationInfo->reservation->controlNumber;
        $totalPrice =  $flight->pricingInfo->redeemedFare == 1 ? 0 : $totalPrice;
        $originalPrice = $flight->pricingInfo->originalFare;

        $priceCurrency = $flight->pricingInfo->TotalFare_CurrencyCode;
        $createdDate = Carbon::now()->format('m/d/Y h:i a');
        //$flight_segments = $response['CreatePassengerNameRecordRS']['AirBook']['OriginDestinationOption']['FlightSegment'];

        return new PNRResponse($pnr,$totalPrice,$originalPrice,$priceCurrency,$createdDate,$flight->flightSegments);
    }
}
