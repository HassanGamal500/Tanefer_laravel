<?php

namespace App\Jobs;

use App\Models\AutocompleteTerm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SaveAutocompleteTerm implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $term;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($term)
    {
        $this->term = $term;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{
            AutocompleteTerm::create([
                'term' => $this->term
            ]);
        }catch (\Exception $e){

        }
    }
}
