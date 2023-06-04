<?php

namespace App\Console\Commands;

use App\Enum\SabreBookingStatus;
use App\GDSIntegration\Sabre\CancelItinerarySegments;
use App\GDSIntegration\Sabre\EndTransaction;
use App\GDSIntegration\Sabre\GetReservation;
use App\GDSIntegration\Sabre\Sabre;
use App\Libs\FireBase\PushNotification;
use App\Libs\FireBase\RealTimeNotification;
use App\Models\Client;
use App\Models\Pnr;
use App\Models\ThirdPartyAccount;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CancelExpiredFlightBooking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cancel:flightBooking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //$pnrs = Pnr::where('status_id',SabreBookingStatus::INITIAL)->get();

        $clientsPnrs = ThirdPartyAccount::where('additional_attr','1QWH')->first()->clients->map->pnrs;
        foreach ($clientsPnrs as $pnrs){
            $pnrs = $pnrs->where('status_id',SabreBookingStatus::INITIAL);
            foreach ($pnrs as $pnrObject){
                $client = Client::find($pnrObject->client_id);

                if(is_null($pnrObject->lastDateToPurchase)){
                    $createdFromHours = now()->diffInHours($pnrObject->created_at);
                    if($createdFromHours >= 2){
                        $this->cancelPNR($pnrObject,$client);
                    }
                }else{
                    $lastDateToPurchase = Carbon::parse($pnrObject->lastDateToPurchase)->subMinutes(15);
                    if($lastDateToPurchase->lte(now())){
                        $this->cancelPNR($pnrObject,$client);
                    }
                }
            }
        }
    }

    private function cancelPNR(Pnr $pnrObject, Client $client)
    {
        $pnr = $pnrObject->pnr_id;

        $sabre = new Sabre($client);
        try {
            $session = $sabre->getSoapSession();
        }catch (\Exception $e){
            sendErrorToMail($e);
        }
        $readReservation = new GetReservation($client);
        $readReservation->travelItineraryRead($pnr,$session);

        $cancelSegments = new CancelItinerarySegments($client);
        $cancelSegments->cancelSegments($session);

        $endTransaction = new EndTransaction($client);
        $endTransactionRS = $endTransaction->endTransaction($session);

        $sabre->closeSoapSession($session);

        try{
            $status = $endTransactionRS['soap-env:Envelope']['soap-env:Body']['EndTransactionRS']['stl:ApplicationResults']['attr']['status'];

            if($status == 'Complete'){
                $pnr = Pnr::where('pnr_id',$pnr)->first();
                $pnr->update(['status_id' => SabreBookingStatus::CANCELLED]);

                $updatedPnr = Pnr::where('pnr_id',$pnr->pnr_id)->first();

                if(! is_null($updatedPnr->user_id)){
                    $realTimeNotification = new RealTimeNotification();
                    $realTimeNotification->setNotification($updatedPnr->pnr_id,'Your preBooking cancelled','',$updatedPnr->user_id);

                    if(! is_null($updatedPnr->user->device_token)){
                        $pushNotification = new PushNotification();
                        $pushNotification->notificationToDevice($updatedPnr->user->device_token,'Your preBooking cancelled',''
                            ,['pnr' => $updatedPnr->pnr_id]);
                    }

                }

            }else{
               return;
            }
        }catch (\Exception $exception){
            sendErrorToMail($exception);
            return;
        }
    }
}
