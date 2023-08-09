<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCustomPackage extends Mailable
{
    use Queueable, SerializesModels;

    protected $url = '';
    protected $customerEmail = '';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customerEmail,$url)
    {
        $this->url = $url;
        $this->customerEmail = $customerEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email_templates.send_custom_package',[
            'url' => $this->url
        ]);
    }
}

