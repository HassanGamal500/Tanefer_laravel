<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\GtaZone;
use App\Models\GtaHotelCatalogue;
use App\Models\GtaHotelPortfolio;
use App\Models\GtaCity;
// use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Jobs\CreateOrUpdateGtaHotel as CreateOrUpdateGtaHotelJob;
use App\Jobs\CreateOrUpdateGtaHotelV2;

class CreateOrUpdateGtaHotel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create_update:gta_hotel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating Or Updating The List of Portfolios of Hotel Integration eJuniper Every 15 Days';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        ini_set('memory_limit', '-1');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $page = 2042;
        
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
        
        dispatch(new CreateOrUpdateGtaHotelV2($listFirstPage, $page));
        $this->info('Queue Job is Running on Page ' . $page);
        
        // foreach ($listFirstPage as $item) {
        //     if(isset($item['Zone'])) {
        //         $zone = GtaZone::where('Jpd_code', $item['Zone']['JPDCode'])->where('code', $item['Zone']['Code'])->first();
        //     }
        //     $hotel_catalogue = GtaHotelCatalogue::where(function ($q) use ($item) {
        //         $q->where('name', $item['HotelCategory']['_']);
        //         if(isset($item['HotelCategory']['Type']) && $item['HotelCategory']['Type']){
        //             $q->where('type', $item['HotelCategory']['Type']);
        //         }
        //     })->first();
        //     if(isset($item['City'])) {
        //         $city = GtaCity::where('Jpd_code', $item['City']['JPDCode'])->where('code', $item['City']['Id'])->first();
        //     }

        //     GtaHotelPortfolio::updateOrCreate(['Jpd_code' => isset($item['JPCode']) && $item['JPCode'] ? $item['JPCode'] : null,],
        //     [
        //         'name' => isset($item['Name']) && $item['Name'] ? $item['Name'] : null,
        //         // 'Jpd_code' => isset($item['JPCode']) && $item['JPCode'] ? $item['JPCode'] : null,
        //         'has_synonyms' => isset($item['HasSynonyms']) && $item['HasSynonyms'] ? $item['HasSynonyms'] : null,
        //         'address' => isset($item['Address']) && $item['Address'] ? $item['Address'] : null,
        //         'zip_code' => isset($item['ZipCode']) && $item['ZipCode'] ? $item['ZipCode'] : null,
        //         'latitude' =>  isset($item['Latitude']) && $item['Latitude'] ? $item['Latitude'] : null,
        //         'longitude' => isset($item['Longitude']) && $item['Longitude'] ? $item['Longitude'] : null,
        //         'zone_id' => isset($zone) && $zone ? $zone->id : null,
        //         'hotel_category_id' => isset($hotel_catalogue) && $hotel_catalogue ? $hotel_catalogue->id : null,
        //         'city_id' => isset($city) && $city ? $city->id : null,

        //     ]);
        // }
        
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
                
                dispatch(new CreateOrUpdateGtaHotelV2($list, $page));
                $this->info('Queue Job is Running on Page ' . $page);

                // foreach ($list as $item) {
                //     if(isset($item['Zone'])) {
                //         $zone = GtaZone::where('Jpd_code', $item['Zone']['JPDCode'])->where('code', $item['Zone']['Code'])->first();
                //     }
                //     $hotel_catalogue = GtaHotelCatalogue::where(function ($q) use ($item) {
                //         $q->where('name', $item['HotelCategory']['_']);
                //         if(isset($item['HotelCategory']['Type']) && $item['HotelCategory']['Type']){
                //             $q->where('type', $item['HotelCategory']['Type']);
                //         }
                //     })->first();
                //     if(isset($item['City'])) {
                //         $city = GtaCity::where('Jpd_code', $item['City']['JPDCode'])->where('code', $item['City']['Id'])->first();
                //     }
                //     GtaHotelPortfolio::updateOrCreate(['Jpd_code' => isset($item['JPCode']) && $item['JPCode'] ? $item['JPCode'] : null,],
                //     [
                //         'name' => isset($item['Name']) && $item['Name'] ? $item['Name'] : null,
                //         // 'Jpd_code' => isset($item['JPCode']) && $item['JPCode'] ? $item['JPCode'] : null,
                //         'has_synonyms' => isset($item['HasSynonyms']) && $item['HasSynonyms'] ? $item['HasSynonyms'] : null,
                //         'address' => isset($item['Address']) && $item['Address'] ? $item['Address'] : null,
                //         'zip_code' => isset($item['ZipCode']) && $item['ZipCode'] ? $item['ZipCode'] : null,
                //         'latitude' =>  isset($item['Latitude']) && $item['Latitude'] ? $item['Latitude'] : null,
                //         'longitude' => isset($item['Longitude']) && $item['Longitude'] ? $item['Longitude'] : null,
                //         'zone_id' => isset($zone) && $zone ? $zone->id : null,
                //         'hotel_category_id' => isset($hotel_catalogue) && $hotel_catalogue ? $hotel_catalogue->id : null,
                //         'city_id' => isset($city) && $city ? $city->id : null,
                //     ]);
                // }
            }
            // $this->info('page ' . $page);
        }
        
        $this->info('Saved Successfully.');
        
        // dispatch(new CreateOrUpdateGtaHotelJob());
        // $this->info('Queue Job is Running.');
    }
}
