<?php

namespace App\Jobs;

use App\Models\Pnr;
use App\Models\ProfitSetting;
use App\Models\Status;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StorePNR implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $pnrDetails;
    protected $requestInfo;
    protected $clientId;
    protected $cash;
    protected $mainClientId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($pnrDetails, $requestInfo, $clientId,$mainClientId,$cash = null)
    {
        $this->clientId = $clientId;
        $this->pnrDetails = $pnrDetails;
        $this->requestInfo = $requestInfo;
        $this->mainClientId = $mainClientId;
        $this->cash = $cash;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->pnrDetails['totalPrice'] == 0){
            $payment_type = 'Free';
        }elseif(is_null($this->cash)){
            $payment_type = 'Credit Card';
        }else{
            $payment_type = 'Cash';
        }

        if($this->pnrDetails['totalPrice'] == $this->pnrDetails['originalPrice']){
            $priceChangeFactor = null;
        }else{
            $priceChangeFactor = '+'.($this->pnrDetails['totalPrice'] - $this->pnrDetails['originalPrice']).$this->pnrDetails['priceCurrency'];
        }
        $pnr = Pnr::create([
            'pnr_id'         => $this->pnrDetails['PNR'],
            'price'          => $this->pnrDetails['originalPrice'],
            'currency'       => $this->pnrDetails['priceCurrency'],
            'contact_person' => $this->requestInfo['contact_person_name'],
            'contact_email'  => $this->requestInfo['contact_email'],
            'contact_phone'  => $this->requestInfo['contact_phone'],
            'status_id'      => Status::where('status','Initial')->first()->id,
            'user_id'        => $this->requestInfo['user_id'],
            'client_id'      => $this->mainClientId,
            'booked_from_id'    => $this->clientId,
            'paid_price'     => (float)$this->pnrDetails['totalPrice'],
            'price_change_factor' => $priceChangeFactor,
            'payment_type' => $payment_type
        ]);

        dispatch(new StoreFlightDetails($this->pnrDetails['flight_segments'],$pnr->id))->delay(now()->addSeconds(5));
        dispatch(new StorePassengerDetails($this->requestInfo['passengerDetails'], $pnr->id))->delay(now()->addSeconds(7));

    }
}
