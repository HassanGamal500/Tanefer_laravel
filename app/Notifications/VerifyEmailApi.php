<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class VerifyEmailApi extends Notification
{
    use Queueable;

    public $code;
    public $from;
    public $senderName;
    public $appUrl;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($code,$from, $senderName, $appUrl)
    {
        $this->code = $code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $appUrl = 'https://tanefer.com';
        $appName = 'TaNefer';
        return (new MailMessage)
            ->markdown('notifications::email',compact('appUrl','appName'))
                    ->subject('Verify Email Address')
                    ->line('Use this code to verify your email')
                    ->action($this->code, '')
                    ->line('If you did not create an account, no further action is required.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
