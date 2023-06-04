<?php

namespace App\Jobs;

use App\GDSIntegration\Sabre\GetReservation;
use App\GDSIntegration\Sabre\Sabre;
use App\Models\Client;
use App\Models\Pnr;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SetLastDateToPurchaseFlight implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string $pnrID
     * */
    public $pnrID;

    /**
     * @var Client $client
     * */
    public $client;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $pnrId,Client $client)
    {
        $this->pnrID = $pnrId;
        $this->client = $client;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $pnr = Pnr::where('pnr_id',$this->pnrID)->first();

        if(! is_null($pnr)){

            $client = Client::find($pnr->client_id);

            $sabre = new Sabre($client);
            $session = $sabre->getSoapSession();

            $getReservation = new GetReservation($client);
            $response = $getReservation->travelItineraryRead($this->pnrID,$session);
            $sabre->closeSoapSession($session);

            $getReservations = simplexml_load_string($response['xmlResponse'])
                ->children('http://schemas.xmlsoap.org/soap/envelope/')
                ->Body->children('http://webservices.sabre.com/pnrbuilder/v1_19')
                ->GetReservationRS;

            $genericSpecialRequests = $getReservations->Reservation->GenericSpecialRequests;

            foreach ($genericSpecialRequests as $genericSpecialRequest){
                if($genericSpecialRequest->Code == 'ADTK'){
                    $timeLimitObject = $genericSpecialRequest;
                }
            }
            if(isset($timeLimitObject)){
                $text = $timeLimitObject->FreeText;
                $substring = substr(stristr($text,'BY'),3,10);
                $date = explode(' ',$substring)[0];
                $time = explode(' ',$substring)[1];
                $date = Carbon::parse($date)->format('Y-m-d');
                $time = Carbon::parse($time)->format('H:i:s');
                $dateTimeFromSpecialRequest = Carbon::parse($date.' '.$time);
                $pnr->update(['lastDateToPurchase' => $dateTimeFromSpecialRequest->format('Y-m-d H:i:s')]);
            }

            $lastDateToPurchase = $getReservations->children('http://services.sabre.com/res/or/v1_14')->PriceQuote
                ->children('http://www.sabre.com/ns/Ticketing/pqs/1.0')->PriceQuoteInfo->Details->TransactionInfo->LastDateToPurchase;

            if($lastDateToPurchase != null && ! empty($lastDateToPurchase)){
                $dateTimeFromPriceQuote = Carbon::parse($lastDateToPurchase);
                $pnr->update(['lastDateToPurchase' => $dateTimeFromPriceQuote->format('Y-m-d H:i:s')]);
            }

            if(isset($dateTimeFromSpecialRequest) && isset($dateTimeFromPriceQuote)){
                if($dateTimeFromSpecialRequest->lt($dateTimeFromPriceQuote)){
                    $pnr->update(['lastDateToPurchase' => $dateTimeFromSpecialRequest->format('Y-m-d H:i:s')]);
                }else{
                    $pnr->update(['lastDateToPurchase' => $dateTimeFromPriceQuote->format('Y-m-d H:i:s')]);
                }
            }
        }

    }
}
