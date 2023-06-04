<?php

namespace App\Console\Commands;

use App\GDSIntegration\Sabre\GeoAutoComplete;
use App\Models\AutocompleteTerm;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateAirportsFromSabre extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:airports';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $autocompleteTerms = AutocompleteTerm::all();

        foreach ($autocompleteTerms as $autocompleteTerm){
            $geoAutocomplete = new GeoAutoComplete();
            $geoAutocomplete->getResponse($autocompleteTerm->term);
        }

        DB::table('autocomplete_terms')->delete();
    }
}
