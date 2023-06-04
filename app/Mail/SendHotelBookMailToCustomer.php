<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendHotelBookMailToCustomer extends Mailable
{
    use Queueable, SerializesModels;

    public $contact_person;
    public $hotelData;
    public $email;
    public $bookingNumber;
    public $totalAmount;
    public $mainClient;

    /**
     * Create a new message instance.
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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $bookingId = \App\Models\HotelBooking::where('booking_number',$this->bookingNumber)->first()->id;

        $redeem = \App\Models\RedeemPoint::where('model_id',$bookingId)->first();

        if(! is_null($redeem)){
            $redeemPoints = $redeem->points;
        }

        $hotelName = $this->hotelData['Hotel']['HotelName'];

        return $this->from($this->mainClient->email)
            ->to($this->email)
            ->bcc('ahmed.salim@adamtravel.net')
            ->subject('Your booking is confirmed at '.$hotelName)->view('email_templates.bookHotel_to_customer')
            ->with([
                'redeemPoints' => isset($redeemPoints) ? $redeemPoints : null
            ]);
    }
}
