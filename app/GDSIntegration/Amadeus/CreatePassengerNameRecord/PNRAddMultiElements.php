<?php

namespace App\GDSIntegration\Amadeus\CreatePassengerNameRecord;

use Amadeus\Client;
use Amadeus\Client\RequestOptions\Pnr\Element\Ticketing;
use Amadeus\Client\RequestOptions\Pnr\Reference;
use Amadeus\Client\RequestOptions\PnrCreatePnrOptions;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Amadeus\Client\RequestOptions\PnrAddMultiElementsOptions;
use Amadeus\Client\RequestOptions\Pnr\Traveller;
use Amadeus\Client\RequestOptions\Pnr\Element\Contact;
use Amadeus\Client\RequestOptions\Pnr\Element\AccountingInfo;
use Amadeus\Client\RequestOptions\Pnr\Element\ServiceRequest;

class PNRAddMultiElements
{
    public function getResponse(Client $amadeusClient,$nowDate,$nowTime,
                                $passengerDetails = [], $remarks = [], $contactInfo = [],$airlinesCodes = [])
    {
        $travellers = $this->travellers($passengerDetails);
        //$remarkInfo = $this->remarks($remarks);

        $customerInformation = $this->customerInfo($contactInfo);
        $passportInfo = $this->passportInfo($passengerDetails,$airlinesCodes);
        $contactInfoToAirlines = $this->contactInfoToAirlines($contactInfo,$airlinesCodes);
        $addMultiElementsRequest = $this->addMultiElementsRequest($travellers,$customerInformation,$passportInfo,$contactInfoToAirlines,[]);

        $responseData = $amadeusClient->pnrCreatePnr($addMultiElementsRequest);

        Storage::put('/amadeusRequests/'.$nowDate.'/PNRAddMultiElements/'.$nowTime.'PNRAddMultiElementsRQ.xml',
            $amadeusClient->getLastRequest());
        Storage::put('/amadeusRequests/'.$nowDate.'/PNRAddMultiElements/'.$nowTime.'PNRAddMultiElementsRS.xml',
            $amadeusClient->getLastResponse());
        Storage::put('/amadeusRequests/'.$nowDate.'/PNRAddMultiElements/'.$nowTime.'PNRAddMultiElementsRS.json',
            json_encode($responseData));

        return $responseData;
    }

    private function addMultiElementsRequest($travellers,$contactInfoElement,$passportInfo,$contactInfoToAirlines,$remarks)
    {
        $ticketing = [
            new Ticketing([
                'ticketMode' => Ticketing::TICKETMODE_OK
            ])
        ];
        $elements = array_merge($contactInfoToAirlines,$ticketing,$passportInfo,$contactInfoElement, [
            new AccountingInfo([
                'accountNumber' => 'THEACCOUNT'
            ])
        ]);

        return new PnrCreatePnrOptions([
            'autoAddReceivedFrom' => false,
            'actionCode' => PnrCreatePnrOptions::ACTION_NO_PROCESSING,
            'travellers' => $travellers,
            'elements' => $elements
        ]);
    }

    private function travellers($passengerDetails)
    {
        $infants = array_values(Arr::where($passengerDetails,function ($value){
            return $value['passengerType'] == 'INF';
        }));


        foreach ($infants as $infant){
            $infant[] = new Traveller([
                'firstName' => $infant['passengerFirstName'],
                'lastName' => $infant['passengerLastName'],
                'dateOfBirth' => \DateTime::createFromFormat('Y-m-d', $infant['date_of_birth']),
                'travellerType' =>Traveller::TRAV_TYPE_INFANT
            ]);
        }

        $i = 1;
        foreach ($passengerDetails as $passengerDetail){
            if($passengerDetail['passengerType'] == 'INF'){continue;}
            $passengerData = [
                'number' => $i,
                'firstName' => $passengerDetail['passengerFirstName'],
                'lastName' => $passengerDetail['passengerLastName'],
                'dateOfBirth' => \DateTime::createFromFormat('Y-m-d', $passengerDetail['date_of_birth']),
                'travellerType' => $passengerDetail['passengerType'],
            ];
            if($passengerDetail['passengerType'] == 'ADT' && isset($infant)){
                $passengerData = array_merge($passengerData,[
                    'withInfant' => true,
                    'infant' => $infant[$i - 1]
                ]);
            }
            $i++;

            $travellers[] = new Traveller($passengerData);
        }

        return $travellers;
    }

    private function customerInfo($contactInfo)
    {
        $phoneContact = str_replace('+','00',$contactInfo['contact_phone']);
        return [
            new Contact([
                'type' => Contact::TYPE_EMAIL,
                'value' => $contactInfo['contact_email']
            ]),
            new Contact([
                'type' => Contact::TYPE_PHONE_GENERAL,
                'value' =>  $phoneContact
            ])
        ];
    }

    private function passportInfo($passengerDetails,$airlinesCodes)
    {
        $i = 1;
        $j = 1;
        foreach ($passengerDetails as $passengerDetail){
            $birthDate = \DateTime::createFromFormat('Y-m-d', $passengerDetail['date_of_birth']);
            $expirationDate = \DateTime::createFromFormat('Y-m-d', $passengerDetail['passport_expire_date']);

            $gender = array_key_exists('passengerGender',$passengerDetail) ? $passengerDetail['passengerGender'] : '';

            if($passengerDetail['passengerType'] == 'INF'){
                $passengerId = $j;
                $j++;
            }else{
                $passengerId = $i;
            }

            foreach ($airlinesCodes as $airlineCode) {
                $serviceRequest[] = new ServiceRequest([
                    'type' => 'DOCS',
                    'status' => ServiceRequest::STATUS_HOLD_CONFIRMED,
                    'company' => $airlineCode,
                    'quantity' => 1,
                    'freeText' => [
                        'P-'.$passengerDetail['passport_issue_country'].'-'.
                        $passengerDetail['passport_number'].'-'.$passengerDetail['passport_issue_country'].
                        '-'.$birthDate->format('dMy').'-'.$gender.'-'.
                        $expirationDate->format('dMy').'-'.$passengerDetail['passengerLastName'].'-'.$passengerDetail['passengerFirstName']
                    ],
                    'references' => [
                        new Reference([
                            'type' => Reference::TYPE_PASSENGER_REQUEST,
                            'id' => $passengerId
                        ])
                    ]
                ]);
            }

            $i++;
        }

        return $serviceRequest;
    }

    private function contactInfoToAirlines($contactInfo,$airlinesCodes)
    {
        $contactEmail = str_replace('@','//',$contactInfo['contact_email']);
        $contactEmail = str_replace('_','--',$contactEmail);

        $phoneContact = str_replace('+','00',$contactInfo['contact_phone']);

        foreach ($airlinesCodes as $airlinesCode){
          $services[] =  new ServiceRequest([
              'type' => 'CTCE',
              'status' => ServiceRequest::STATUS_HOLD_CONFIRMED,
              'company' => $airlinesCode,
              'quantity' => 1,
              'freeText' => [
                 $contactEmail
              ],
              'references' => [
                  new Reference([
                      'type' => Reference::TYPE_PASSENGER_REQUEST,
                      'id' => 1
                  ])
              ]
          ]);

          $services[] =  new ServiceRequest([
              'type' => 'CTCM',
              'status' => ServiceRequest::STATUS_HOLD_CONFIRMED,
              'company' => $airlinesCode,
              'quantity' => 1,
              'freeText' => [
                  $phoneContact
              ],
              'references' => [
                  new Reference([
                      'type' => Reference::TYPE_PASSENGER_REQUEST,
                      'id' => 1
                  ])
              ]
          ]);
        }

        return $services;
    }
}
