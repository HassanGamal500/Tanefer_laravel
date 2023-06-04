<?php

namespace App\Console\Commands;

use App\GDSIntegration\Tbo\CountryList;
use App\GDSIntegration\Tbo\DestinationCityList;
use App\GDSIntegration\Tbo\HotelCodeList\TBOHotelCodeList;
use App\Models\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class SaveDestinationCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:tbo-cities';

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
        ini_set('max_execution_time', 3000000);
        ini_set('memory_limit', '1G');
        set_time_limit(3000000);

        try{
            $client = Client::where('name','fare33')->first();


            $countryList = new CountryList($client);
            $countries = $countryList->countries();

            Schema::disableForeignKeyConstraints();
            \App\Models\DestinationCity::truncate();

            foreach ($countries->CountryList->Country as $country){
                $countryCode = $country->CountryCode;
                $countryName = $country->CountryName;
                $destinationCity = new DestinationCityList($client);
                try{
                    $cities = $destinationCity->getCities($countryCode)->CityList->City;
                }catch(\Exception $e){
                    continue;
                }
                if(is_array($cities)){
                    $countryCities = $cities;
                }else{
                    $countryCities[] = $cities;
                }

                $j = 1;
                foreach ($countryCities as $city){
                    ini_set('memory_limit', '1G');
                    ini_set('max_execution_time', 3000000);
                    set_time_limit(3000000);
                    $cityCode = $city->CityCode;
                    $cityName = $city->CityName;
                    try{
                       \App\Models\DestinationCity::create([
                            'code' => $cityCode,
                            'cityName' => $cityName,
                            'countryName' => $countryName,
                            'countryCode' => $countryCode
                        ]);
                    }catch (\Exception $e){
                        continue;
                    }
                    $j++;
                }
            }

            Artisan::call('save:tbo-hotels');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
