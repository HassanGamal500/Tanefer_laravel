<?php

namespace App\Jobs;

use App\Libs\FireBase\RealTimeNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RemoveFlightsFromFireBase implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $searchId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($searchId)
    {
        $this->searchId = $searchId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $realTimeDatabase = new RealTimeNotification();
        $realTimeDatabase->removeFlights($this->searchId);
    }
}
