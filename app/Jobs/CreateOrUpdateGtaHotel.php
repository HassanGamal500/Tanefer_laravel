<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\GtaZone;
use App\Models\GtaHotelCatalogue;
use App\Models\GtaHotelPortfolio;
use App\Models\GtaCity;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class CreateOrUpdateGtaHotel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $tries = 2;
    public $timeout = 6000000;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $page = 1;
        
        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        
        $client = new Client();
        $response = $client->get('http://api.tanefer.com/api/v2/packages/get-hotel?page=' . $page, ['stream_context' => $arrContextOptions]);
        $result = json_decode($response->getBody(), true);
        
        $getHotelPortfolio = $result['HotelPortfolioRS']['HotelPortfolio'];
        $totalPages = $getHotelPortfolio['TotalPages'] > 0 ? $getHotelPortfolio['TotalPages'] : 0;
        // $totalPages = 15; // 1
        $listFirstPage = $getHotelPortfolio['Hotel'];
        
        foreach ($listFirstPage as $item) {
            if(isset($item['Zone'])) {
                $zone = GtaZone::where('Jpd_code', $item['Zone']['JPDCode'])->where('code', $item['Zone']['Code'])->first();
            }
            $hotel_catalogue = GtaHotelCatalogue::where(function ($q) use ($item) {
                $q->where('name', $item['HotelCategory']['_']);
                if(isset($item['HotelCategory']['Type']) && $item['HotelCategory']['Type']){
                    $q->where('type', $item['HotelCategory']['Type']);
                }
            })->first();
            
            if(isset($item['City'])) {
                $city = GtaCity::where('Jpd_code', $item['City']['JPDCode'])->where('code', $item['City']['Id'])->first();
            }

            GtaHotelPortfolio::updateOrCreate(['Jpd_code' => isset($item['JPCode']) && $item['JPCode'] ? $item['JPCode'] : null,],
            [
                'name' => isset($item['Name']) && $item['Name'] ? $item['Name'] : null,
                // 'Jpd_code' => isset($item['JPCode']) && $item['JPCode'] ? $item['JPCode'] : null,
                'has_synonyms' => isset($item['HasSynonyms']) && $item['HasSynonyms'] ? $item['HasSynonyms'] : null,
                'address' => isset($item['Address']) && $item['Address'] ? $item['Address'] : null,
                'zip_code' => isset($item['ZipCode']) && $item['ZipCode'] ? $item['ZipCode'] : null,
                'latitude' =>  isset($item['Latitude']) && $item['Latitude'] ? $item['Latitude'] : null,
                'longitude' => isset($item['Longitude']) && $item['Longitude'] ? $item['Longitude'] : null,
                'zone_id' => isset($zone) && $zone ? $zone->id : null,
                'hotel_category_id' => isset($hotel_catalogue) && $hotel_catalogue ? $hotel_catalogue->id : null,
                'city_id' => isset($city) && $city ? $city->id : null,

            ]);
        }
        
        Log::info('page 1');
        // $this->info('page 1');
        $page++;

        if($totalPages > 0) {
            for(; $page <= $totalPages; $page++) {
                $client = new Client();
                $response = $client->get('http://api.tanefer.com/api/v2/packages/get-hotel?page=' . $page, ['stream_context' => $arrContextOptions]);
                $result = json_decode($response->getBody(), true);
                
                $getHotelPortfolio = $result['HotelPortfolioRS']['HotelPortfolio'];
                $totalPages = $getHotelPortfolio['TotalPages'] > 0 ? $getHotelPortfolio['TotalPages'] : 0;
                $list = $getHotelPortfolio['Hotel'];

                foreach ($list as $item) {
                    if(isset($item['Zone'])) {
                        $zone = GtaZone::where('Jpd_code', $item['Zone']['JPDCode'])->where('code', $item['Zone']['Code'])->first();
                    }
                    $hotel_catalogue = GtaHotelCatalogue::where(function ($q) use ($item) {
                        $q->where('name', $item['HotelCategory']['_']);
                        if(isset($item['HotelCategory']['Type']) && $item['HotelCategory']['Type']){
                            $q->where('type', $item['HotelCategory']['Type']);
                        }
                    })->first();
                    if(isset($item['City'])) {
                        $city = GtaCity::where('Jpd_code', $item['City']['JPDCode'])->where('code', $item['City']['Id'])->first();
                    }
                    GtaHotelPortfolio::updateOrCreate(['Jpd_code' => isset($item['JPCode']) && $item['JPCode'] ? $item['JPCode'] : null,],
                    [
                        'name' => isset($item['Name']) && $item['Name'] ? $item['Name'] : null,
                        // 'Jpd_code' => isset($item['JPCode']) && $item['JPCode'] ? $item['JPCode'] : null,
                        'has_synonyms' => isset($item['HasSynonyms']) && $item['HasSynonyms'] ? $item['HasSynonyms'] : null,
                        'address' => isset($item['Address']) && $item['Address'] ? $item['Address'] : null,
                        'zip_code' => isset($item['ZipCode']) && $item['ZipCode'] ? $item['ZipCode'] : null,
                        'latitude' =>  isset($item['Latitude']) && $item['Latitude'] ? $item['Latitude'] : null,
                        'longitude' => isset($item['Longitude']) && $item['Longitude'] ? $item['Longitude'] : null,
                        'zone_id' => isset($zone) && $zone ? $zone->id : null,
                        'hotel_category_id' => isset($hotel_catalogue) && $hotel_catalogue ? $hotel_catalogue->id : null,
                        'city_id' => isset($city) && $city ? $city->id : null,
                    ]);
                }
            }
            Log::info('page ' . $page);
            // $this->info('page ' . $page);
        }
        Log::info('Saved Successfully.');
        // $this->info('Saved Successfully.');
    }
}
