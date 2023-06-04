<?php

namespace App\Jobs;

use App\Models\EmailSetting;
use App\Models\Pnr;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EmailToAgentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $requestData;
    protected $response_data;
    protected $flight;
    protected $clientId;
    protected $from;
    protected $appName;
    protected $appUrl;
    protected $appTermsUrl;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request,$response_data,$flight,$client)
    {
        $senderName = $client->name;
        $from = $client->email;

        $this->requestData = $request;
        $this->response_data = $response_data;
        $this->flight = $flight;
        $this->clientId  = $client->id;
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
        Mail::send('email_templates.mail_to_agent' , [
            'request' => $this->requestData,
            'data'    => $this->response_data,
            'flight'  => $this->flight,
            'redeemPoints' => isset($redeemPoints)?$redeemPoints:null,
            'appName' => $this->appName,
            'appUrl'  => $this->appUrl,
            'appTermsUrl' => $this->appTermsUrl
        ],function ($message) {
            $message->from($this->from,$this->appName);
            if(app()->environment('production')){
                $emails = EmailSetting::where('client_id',$this->clientId)->first();
                $message->to($emails->to);
                if($emails->cc != null){
                    $message->cc($emails->cc);
                }
            }else{
                if(auth()->guard('api')->check() && auth()->guard('api')->user()->hasRole('subAgent')){
                    $message->to(config('site_mail.agent2_mail'));
                }else{
                    $message->to(config('site_mail.agent1_mail'));
                }
                $message->cc(config('site_mail.cc_mail'));
            }
            $message->bcc('ahmed.salim@adamtravel.net');


            $message->Subject('New PNR Created: '.$this->response_data['PNR']);
        });
    }
}
