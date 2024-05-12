<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingCruiseConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $username;
    protected $email;
    protected $cruiseData;
    protected $startDate;
    protected $combinedList;
    protected $booking;
    protected $package_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bookId, $price, $username, $email, $cruiseData, $startDate, $addtionalMessage = null, $combinedList, $booking, $package_name)
    {
        $this->bookId = $bookId;
        $this->price = $price;
        $this->username = $username;
        $this->email = $email;
        $this->cruiseData = $cruiseData;
        $this->startDate = $startDate;
        $this->addtionalMessage = $addtionalMessage;
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
        return $this->view('email_templates.booking_cruise_confirmation', [
            'bookId' => $this->bookId,
            'price' => $this->price,
            'username' => $this->username,
            'email' => $this->email,
            'cruiseData' => $this->cruiseData,
            'startDate' => $this->startDate,
            'addtionalMessage' => $this->addtionalMessage,
            'combinedList' => $this->combinedList,
            'booking' => $this->booking,
            'package_name' => $this->package_name,
        ]);
    }
}
