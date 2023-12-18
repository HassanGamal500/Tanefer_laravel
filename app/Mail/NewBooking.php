<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewBooking extends Mailable
{
    use Queueable, SerializesModels;

    protected $url;
    protected $username;
    protected $totalPrice;
    protected $combinedList;
    protected $booking;
    protected $package_name;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url,$totalPrice,$contactName,$combinedList, $booking, $package_name)
    {
        $this->url = $url;
        $this->username = $contactName;
        $this->totalPrice = $totalPrice;
        $this->combinedList = $combinedList;
        $this->booking = $booking;
        $this->package_name = $package_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email_templates.new_booking_confirmation',[
            'url' => $this->url,
            'username' => $this->username,
            'totalPrice' => $this->totalPrice,
            'combinedList' => $this->combinedList,
            'booking' => $this->booking,
            'package_name' => $this->package_name,
        ]);
    }
}
