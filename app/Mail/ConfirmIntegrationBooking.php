<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmIntegrationBooking extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $username;
    protected $hotelName;
    protected $codeNumber;
    protected $startDate;
    protected $endDate;
    protected $adults;
    protected $children;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $hotelName, $codeNumber, $startDate, $endDate, $adults, $children)
    {
        $this->username = $username;
        $this->hotelName = $hotelName;
        $this->codeNumber = $codeNumber;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->adults = $adults;
        $this->children = $children;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email_templates.confirm_integration_booking', [
            'username' => $this->username,
            'hotelName' => $this->hotelName,
            'codeNumber' => $this->codeNumber,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'adults' => $this->adults,
            'children' => $this->children,
        ]);
    }
}
