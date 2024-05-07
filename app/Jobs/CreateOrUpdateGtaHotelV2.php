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

class CreateOrUpdateGtaHotelV2 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $tries =3;
    public $timeout = 6000000;
    public $hotelList;
    public $page;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($hotelList, $page)
    {
        $this->hotelList = $hotelList;
        $this->page = $page;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->hotelList as $item) {
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
        
        Log::info('page ' . $this->page);
    }
}
