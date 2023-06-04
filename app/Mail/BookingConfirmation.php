<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    protected $url;
    protected $username;
    protected $totalPrice;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url,$totalPrice,$contactName)
    {
        $this->url = $url;
        $this->username = $contactName;
        $this->totalPrice = $totalPrice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email_templates.booking_confirmation',[
            'url' => $this->url,
            'username' => $this->username,
            'totalPrice' => $this->totalPrice
        ]);
    }
}
