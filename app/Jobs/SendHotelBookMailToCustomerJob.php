<?php

namespace App\Jobs;

use App\Mail\SendHotelBookMailToCustomer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendHotelBookMailToCustomerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $contact_person;
    public $hotelData;
    public $email;
    public $bookingNumber;
    public $totalAmount;
    public $redeemPoints;
    public $mainClient;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($contact_person,$hotelData,$customerEmail,$bookingNumber,$totalAmount,$client)
    {
        $this->contact_person = $contact_person;
        $this->hotelData = $hotelData;
        $this->email = $customerEmail;
        $this->bookingNumber = $bookingNumber;
        $this->totalAmount = $totalAmount;
        $this->mainClient = $client->parentClient ?? $client;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sendHotelBookMailToCustomer = new SendHotelBookMailToCustomer($this->contact_person,$this->hotelData,$this->email,
        $this->bookingNumber,$this->totalAmount,$this->mainClient);

        Mail::send($sendHotelBookMailToCustomer);
    }
}
