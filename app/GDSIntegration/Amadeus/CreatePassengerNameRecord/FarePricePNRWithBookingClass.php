<?php

namespace App\GDSIntegration\Amadeus\CreatePassengerNameRecord;

use Amadeus\Client;
use Amadeus\Client\RequestOptions\FarePricePnrWithBookingClassOptions;
use Illuminate\Support\Facades\Storage;

class FarePricePNRWithBookingClass
{
    public function getResponse(Client $amadeusClient,$fareType,$currency,$nowDate,$nowTime)
    {
        if($fareType == 'Net'){
            $overrideOption = FarePricePnrWithBookingClassOptions::OVERRIDE_FARETYPE_UNI;
        }else{
            $overrideOption = FarePricePnrWithBookingClassOptions::OVERRIDE_FARETYPE_PUB;
        }

        $farePricePnrWithBookingClassOption = new FarePricePnrWithBookingClassOptions([
            'overrideOptions' => [$overrideOption],
            'currencyOverride' => $currency
        ]);

        $responseData = $amadeusClient->farePricePnrWithBookingClass($farePricePnrWithBookingClassOption);

        Storage::put('/amadeusRequests/'.$nowDate.'/FarePricePNRWithBookingClass/'.$nowTime.'pricePnrWithBookingClassRQ.xml',
            $amadeusClient->getLastRequest());
        Storage::put('/amadeusRequests/'.$nowDate.'/FarePricePNRWithBookingClass/'.$nowTime.'pricePnrWithBookingClassRS.xml',
            $amadeusClient->getLastResponse());
        Storage::put('/amadeusRequests/'.$nowDate.'/FarePricePNRWithBookingClass/'.$nowTime.'pricePnrWithBookingClassRS.json',
            json_encode($responseData));

        return $responseData;
    }
}
