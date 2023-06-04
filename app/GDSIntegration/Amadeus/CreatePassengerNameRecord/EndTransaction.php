<?php

namespace App\GDSIntegration\Amadeus\CreatePassengerNameRecord;

use Amadeus\Client;
use Amadeus\Client\RequestOptions\PnrAddMultiElementsOptions;
use Illuminate\Support\Facades\Storage;

class EndTransaction
{
    public function getResponse(Client $amadeusClient,$nowDate,$nowTime)
    {
        $addMultiElementsRequest = new PnrAddMultiElementsOptions([
            'actionCode' => PnrAddMultiElementsOptions::ACTION_END_TRANSACT_RETRIEVE,
            ]);

        $response = $amadeusClient->pnrAddMultiElements($addMultiElementsRequest,['endSession' => true]);

        Storage::put('/amadeusRequests/'.$nowDate.'/EndTransaction/'.$nowTime.'endTransactionRQ.xml',
            $amadeusClient->getLastRequest());
        Storage::put('/amadeusRequests/'.$nowDate.'/EndTransaction/'.$nowTime.'endTransactionRS.xml',
            $amadeusClient->getLastResponse());
        Storage::put('/amadeusRequests/'.$nowDate.'/EndTransaction/'.$nowTime.'endTransactionRS.json',
            json_encode($response));

        return $response;
    }
}
