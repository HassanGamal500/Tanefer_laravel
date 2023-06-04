<?php

namespace App\GDSIntegration\Amadeus\CreatePassengerNameRecord;

use Amadeus\Client;
use Amadeus\Client\RequestOptions\Fop\CreditCardInfo;
use Amadeus\Client\RequestOptions\Fop\FraudScreeningOptions;
use Amadeus\Client\RequestOptions\Fop\Group;
use Amadeus\Client\RequestOptions\Fop\MopInfo;
use Amadeus\Client\RequestOptions\Fop\PaxRef;
use Amadeus\Client\RequestOptions\FopCreateFopOptions;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class FOPCreateFormOfPayment
{
    public function getResponse(Client $amadeusClient, $request,$airlineCode, $nowDate, $nowTime)
    {
        /*
        $adultDetails = $request->passengerDetails[0];

        $i = 1;
        foreach ($request->passengerDetails as $passengerDetail) {
            if ($passengerDetail['passengerType'] == 'INF') {
                continue;
            }
            $paxRef[] = new PaxRef([
                'type' => PaxRef::TYPE_ADULT,
                'value' => $i
            ]);
            $i++;
        }

        $creditCardInfo = new CreditCardInfo([
            'vendorCode' => $request->creditCardType,
            'cardNumber' => $request->creditCardNumber,
            'expiryDate' => \DateTime::createFromFormat('Y-m',$request->creditCardExpireDate)->format('my'),
            'name'       =>  $request->cardHolderName
        ]);

        $fraudScreening = new FraudScreeningOptions([
            'ipAddress' => $request->ip(),
            'firstName' => $adultDetails['passengerFirstName'],
            'lastName'  => $adultDetails['passengerLastName'],
            'dateOfBirth' => \DateTime::createFromFormat('dmY',$adultDetails['date_of_birth']),
            'idDocumentNr' => $adultDetails['passport_number'],
            'idDocumentType' => FraudScreeningOptions::ID_DOC_PASSEPORT_NUMBER,
            'phone'          => $request->contact_phone,
            'email'          => $request->contact_email
        ]);

        $fopCreateOptions = new FopCreateFopOptions([
            'fopGroup' => [
                new Group([
                  //  'paxRef' => $paxRef,
                    'mopInfo' => [
                        new MopInfo([
                            'sequenceNr' => 1,
                            'fopCode'    => 'VI',
                            'fopType'    => MopInfo::FOPTYPE_FP_ELEMENT,
                            'payMerchant' => $airlineCode,
                            'mopPaymentType' => MopInfo::MOP_PAY_TYPE_CREDIT_CARD,
                            'creditCardInfo' => $creditCardInfo,
                            'fraudScreening' => $fraudScreening
                        ])
                    ]
                ])
            ]
        ]);
*/
        $fopCreateOptions = new FopCreateFopOptions([
            'fopGroup' => [
                new Group([
                    'mopInfo' => [
                        new MopInfo([
                            'sequenceNr' => 1,
                            'fopCode' => 'CASH'
                        ])
                    ]
                ])
            ]
        ]);
        $responseData = $amadeusClient->fopCreateFormOfPayment($fopCreateOptions);

        Storage::put('/amadeusRequests/'.$nowDate.'/FOPCreateFormOfPayment/'.$nowTime.'createFormOfPaymentRQ.xml',
            $amadeusClient->getLastRequest());
        Storage::put('/amadeusRequests/'.$nowDate.'/FOPCreateFormOfPayment/'.$nowTime.'createFormOfPaymentRS.xml',
            $amadeusClient->getLastResponse());
        Storage::put('/amadeusRequests/'.$nowDate.'/FOPCreateFormOfPayment/'.$nowTime.'createFormOfPaymentRS.json',
            json_encode($responseData));

        return $responseData;

    }
}
