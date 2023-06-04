<?php

namespace App\Console\Commands;

use App\Models\Client;
use Illuminate\Console\Command;

class GetLowestFare extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:lowestFare';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'call sabre API (Flights To) to get lowest fares for specific destinations from database';

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
   //     $promotionsOrder = \Carbon\Carbon::now()->weekOfYear % 3;
      //  $promotions = \App\Models\FlightsPromotion::where('week_number',$promotionsOrder)->get();
        $promotions = \App\Models\FlightsPromotion::all();

        foreach ($promotions as $promotion){

            $client = $promotion->client;

            $flightsTo = new \App\GDSIntegration\Sabre\FlightsTo($client);
            $fares = $flightsTo->flightsToResponse($promotion->destination_code);
            foreach ($fares as $fare){
                if(in_array($promotion->origin_code,$fare)){
                    $exactFare = $fare;
                }
                else{
                    continue;
                }
            }
            if(isset($exactFare)){
                $promotion->update([
                    'departure_date' => \Carbon\Carbon::parse($exactFare['DepartureDateTime'])->format('Y-m-d'),
                    'return_date'    => \Carbon\Carbon::parse($exactFare['ReturnDateTime'])->format('Y-m-d'),
                    'lowest_fare'    => $exactFare['LowestFare']['Fare']
                ]);
                $exactFare = null;
            }else{
                $promotion->update([
                    'departure_date' => null,
                    'return_date'    => null,
                    'lowest_fare'    => null
                ]);
            }
        }
    }
}
