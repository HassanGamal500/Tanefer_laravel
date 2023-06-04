<?php

namespace App\Jobs;

use App\Models\PassengerDetail;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StorePassengerDetails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $passengerDetails;
    protected $pnrId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($passengerDetails, $pnrId)
    {
        $this->passengerDetails = $passengerDetails;
        $this->pnrId = $pnrId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->passengerDetails as $detail){
            PassengerDetail::create([
                'passenger_name'         => $detail['passengerTitle'].' '.$detail['passengerFirstName'].' '.$detail['passengerLastName'],
                'passport_number'        => array_key_exists('passport_number',$detail)?$detail['passport_number']:null,
                'passport_expire_date'   => array_key_exists('passport_expire_date',$detail)?
                    Carbon::createFromFormat('Y-m-d',$detail['passport_expire_date']):null,
                'passport_issue_country' => array_key_exists('passport_issue_country',$detail)?$detail['passport_issue_country']:null,
                'date_of_birth'          => Carbon::createFromFormat('Y-m-d',$detail['date_of_birth']),
                'pnr_id'                 => $this->pnrId
            ]);
        }
    }
}
