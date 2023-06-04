<?php


namespace App\GDSIntegration\Sabre;


use App\Models\Airport;
use App\GDSIntegration\HttpClient\HttpClient;
use App\Http\Resources\AirportResource;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class GeoAutoComplete extends Sabre
{
    public function getResponse($term)
    {
        $http_client = new HttpClient();
        $request =[
            "query"   => $term,
            "category"=> "AIR",
            "limit"   => 5
        ];
        //log autocomplete request data
        Storage::put('sabreRequests/'.$this->nowDate.'/autocomplete/'.$this->nowTime.'autocompleteRQ.json',json_encode($request));

        $result = $http_client
            ->executeGetCall($this->rest_url,'/v1/lists/utilities/geoservices/autocomplete',
                $request,$this->getAccessToken());

        //log autocomplete response data
        Storage::put('sabreRequests/'.$this->nowDate.'/autocomplete/'.$this->nowTime.'autocompleteRS.json',$result);

        try {
            $data = (json_decode($result,true)['Response']['grouped']['category:AIR']['doclist']['docs']);

        }catch (\Exception $exception){
            //sendErrorToMail($exception);
            $data = [];
        }


      $this->DbStore($data);

        return $this->convertToCollection($data);
    }

    public function convertToCollection($data)
    {
        $collection = new Collection();
        foreach ($data as $item){
            $collection->push((object)$item);

        }

        $sorted = $collection->sortBy('name');
        return $sorted;
    }

    protected function DbStore($data)
    {
        foreach ($data as $item){
            $airport = Airport::where('code',$item['id'])->first();
            if(is_null($airport)){
                if(array_key_exists('name',$item)){
                    Airport::create([
                        'code' => $item['id'],
                        'name' => $item['name'],
                        'city' => $item['city'] ?? '',
                        'countryName' => isset($item['countryName'])?$item['countryName']:null,
                        'country' => $item['country'],
                        'location_type' => "A",
                        'city_code' => $item['iataCityCode']
                    ]);
                }
            }else{
                if($airport->city_code == null){
                    $airport->update(['city_code' => $item['iataCityCode'] ]);
                }
            }

            $city = Airport::where('code',$item['iataCityCode'])->first();

            if(is_null($city)){
                Airport::create([
                    'code' => $item['iataCityCode'],
                    'name' => $item['city'],
                    'city' => $item['city'],
                    'countryName' => isset($item['countryName'])?$item['countryName']:null,
                    'country' => $item['country'],
                    'location_type' => "C"
                ]);
            }
        }
    }
}
