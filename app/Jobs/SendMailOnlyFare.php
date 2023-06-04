<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailOnlyFare implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $requestData;
    protected $flight;
    protected $client;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request,$flight,$client)
    {
        $this->requestData = $request;
        $this->flight = $flight;
        $this->client = $client;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('email_templates.mail_only_fares' , [
            'request' => $this->requestData,
            'flight'  => $this->flight,
            'appName' => $this->client->name,
            'appUrl'  => $this->client->url,
        ], function ($message){
            $message->from($this->client->email);

            if(app()->environment('production')){
                if($this->client->name == 'Fare33'){
                    $message->to('sales@fare33.com');
                }else{
                    $message->to($this->client->emailSetting->to);
                }

            }else{
                $message->to('dev-sales@fare33.com');
            }
            $message->bcc('ahmed.salim@adamtravel.net');
            $message->Subject('Request To book Special Offer Flight');
        });
    }
}
