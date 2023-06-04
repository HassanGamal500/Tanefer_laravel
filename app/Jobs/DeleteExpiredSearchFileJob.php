<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class DeleteExpiredSearchFileJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $search_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($search_id)
    {
        $this->search_id = $search_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if(file_exists(storage_path('app/public/searchResults/'.$this->search_id.'.json'))){
            Storage::delete('searchResults/'.$this->search_id.'.json');
        }
    }
}
