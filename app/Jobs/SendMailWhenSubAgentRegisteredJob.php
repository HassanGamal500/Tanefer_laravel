<?php

namespace App\Jobs;

use App\Models\EmailSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailWhenSubAgentRegisteredJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $client;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($registeredUser,$client)
    {
        $this->user = $registeredUser;
        $this->client = $client;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = EmailSetting::where('client_id',$this->client['id'])->first();

        $to = $email->to;

        Mail::send('email_templates/send_email_when_subAgent_registered', [
            'user' => $this->user,
            'client' => $this->client
        ] , function($message) use ($to){
            $message->from($this->client['email']);
            $message->subject('New SubAgent Registered on '.$this->client['name']);
            $message->to($to);
        });
    }
}
