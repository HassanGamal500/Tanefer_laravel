<?php

namespace App\Console\Commands;

use App\GDSIntegration\Tbo\HotelCodeList\TBOHotelCodeList;
use App\Models\Client;
use App\Models\DestinationCity;
use Illuminate\Console\Command;

class SaveTBOHotelList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:tbo-hotels';

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
        $client = Client::where('name','fare33')->first();
        $cities = DestinationCity::all();

        ini_set('max_execution_time', 30000000);
        ini_set('memory_limit', '1G');
        set_time_limit(30000000);
        foreach ($cities as $city){
            $tboHotelCodeList = new TBOHotelCodeList($client);
            try {
                $hotels = $tboHotelCodeList->hotelCodes($city->code)->Hotels->Hotel;
            }catch (\Exception $exception){
                continue;
            }

            if(is_array($hotels)){
                $allHotels = $hotels;
            }else{
                $allHotels[] = $hotels;
            }

            foreach ($allHotels as $hotel){
                ini_set('max_execution_time', 30000000);
                ini_set('memory_limit', '1G');
                set_time_limit(30000000);
                try {
                    \App\Models\DestinationCity::create([
                        'code' => $hotel->HotelCode,
                        'hotel_name'=> $hotel->HotelName,
                        'hotel_address' => $hotel->HotelAddress,
                        'hotel_latitude' => $hotel->Latitude,
                        'hotel_longitude' => $hotel->Longitude,
                        'hotel_star_rating' => $tboHotelCodeList->convertHotelStarsToInt($hotel->StarRating),
                        'countryName' => $hotel->CountryName,
                        'cityName' => $hotel->CityName,
                        'countryCode' => $hotel->CountryCode,
                        'city_codeIndex' => $city->code
                    ]);
                }catch (\Exception $exception){
                    continue;
                }
            }
        }

    }
}
