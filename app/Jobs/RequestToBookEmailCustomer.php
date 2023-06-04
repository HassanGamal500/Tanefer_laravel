<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class RequestToBookEmailCustomer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $requestData;
    public $client;
    public $authUser;
    public $phoneNumber;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($requestData,$client,$authUser = [],$phoneNumber = 0)
    {
        $this->requestData = $requestData;
        $this->client = $client;
        $this->authUser = $authUser;
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('email_templates/request_to_book_trip_confirm_customer',[
            'requestData' => $this->requestData,
            'client' => $this->client,
            'authUser' => $this->authUser,
            'phoneNumber' => $this->phoneNumber
        ] , function ($message){
            $message->from($this->client->email);
            if(count($this->authUser) == 0){
                $message->to($this->requestData['email']);
            }else{
                $message->to($this->authUser['email']);
            }
            $message->Subject('Confirmation For request to book '.$this->requestData['tripTitle']);
        });
    }
}
