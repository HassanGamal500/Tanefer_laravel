<?php

namespace App\GDSIntegration\Amadeus\CreatePassengerNameRecord;

use Amadeus\Client;
use Amadeus\Client\RequestOptions\Ticket\Pricing;
use Amadeus\Client\RequestOptions\TicketCreateTstFromPricingOptions;
use Illuminate\Support\Facades\Storage;

class TicketCreateTSTFromPricing
{
    public function getResponse($fareList, Client $amadeusClient,$nowDate,$nowTime)
    {
        foreach ($fareList as $item){
            $pricing[] = new Pricing(['tstNumber' => $item->fareReference->uniqueReference]);
        }

        $ticketCreateTstFromPricingOptions = new TicketCreateTstFromPricingOptions([
            'pricings' => $pricing
        ]);

        $responseData = $amadeusClient->ticketCreateTSTFromPricing($ticketCreateTstFromPricingOptions);

        Storage::put('/amadeusRequests/'.$nowDate.'/TicketCreateTSTFromPricing/'.$nowTime.'createTSTFormPricingRQ.xml',
            $amadeusClient->getLastRequest());
        Storage::put('/amadeusRequests/'.$nowDate.'/TicketCreateTSTFromPricing/'.$nowTime.'createTSTFormPricingRS.xml',
            $amadeusClient->getLastResponse());
        Storage::put('/amadeusRequests/'.$nowDate.'/TicketCreateTSTFromPricing/'.$nowTime.'createTSTFormPricingRS.json',
            json_encode($responseData));

        return $responseData;
    }
}
