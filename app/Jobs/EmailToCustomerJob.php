<?php

namespace App\Jobs;

use App\Models\Pnr;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EmailToCustomerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $requestData;
    protected $response_data;
    protected $flight;
    protected $from;
    protected $appName;
    protected $appUrl;
    protected $appTermsUrl;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request,$response_data,$flight, $client)
    {
        $senderName = $client->name;
        $from = $client->email;

        $this->requestData = $request;
        $this->response_data = $response_data;
        $this->flight = $flight;
        $this->from = $from;
        $this->appName = $senderName;
        $this->appUrl = explode(',',$client->url)[0];
        $this->appTermsUrl = $client->terms_url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $bookingId = Pnr::where('pnr_id',$this->response_data['PNR'])->first()->id;
        $redeem = \App\Models\RedeemPoint::where('model_id',$bookingId)->first();
        if(! is_null($redeem)){
            $redeemPoints = $redeem->points;
        }
        Mail::send('email_templates.mail_to_customer' , [
            'request' => $this->requestData,
            'data'    => $this->response_data,
            'flight'  => $this->flight,
            'redeemPoints' => isset($redeemPoints)?$redeemPoints:null,
            'appName' => $this->appName,
            'appUrl'  => $this->appUrl,
            'appTermsUrl' => $this->appTermsUrl
        ],function ($message) {
            $message->from($this->from,$this->appName);
            if(auth()->guard('api')->check()){
                $message->to(auth()->guard('api')->user()->email);
            }else{
                $message->to($this->requestData['contact_email']);
            }
            $message->Subject('Your Travel booking . '.$this->response_data['PNR'].' confirmation');
        });
    }

    public function failed(\Exception $exception)
    {

    }
}
