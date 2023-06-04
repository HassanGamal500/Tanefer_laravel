<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\Debug\ExceptionHandler as SymfonyExceptionHandler;

class SendExceptionErrorEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    //Exception object
    protected $exception;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(\Exception $exception)
    {
        $this->exception = $exception;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $url = request()->url();
        //$html = $this->render(request(), $exception)->getContent();
        $e = FlattenException::create($this->exception);
        $handler = new SymfonyExceptionHandler();
        $html = $handler->getHtml($e);

        Mail::send('email_templates.exception_mail', [
            'html' => $html,
            'url'  => $url
        ], function ($message)
        {
            $errorNo = rand(10,1000);
            $message->from('info@fare33.com','fare33');

            $message->to('ahmed.salim@adamtravel.net');

            $message->subject('Error'.' '.$errorNo);
        });
    }
}
