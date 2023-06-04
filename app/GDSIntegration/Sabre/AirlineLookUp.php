<?php


namespace  App\GDSIntegration\Sabre;


use App\Models\Airline;
use App\GDSIntegration\HttpClient\HttpClient;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class AirlineLookUp extends Sabre
{
    public function getResponse($airline_code)
    {

        $http_client = new HttpClient();
        $request =[
            "airlinecode"   => $airline_code,
        ];

        //log airlineLookup request
        Storage::put('sabreRequests/'.$this->nowDate.'/airlineLookup/'.$this->nowTime.'airlineLookupRQ.json',json_encode($request));

        $result = $http_client
            ->executeGetCall($this->rest_url,'/v1/lists/utilities/airlines',$request,$this->getAccessToken());

        //log airlineLookup response
        Storage::put('sabreRequests/'.$this->nowDate.'/airlineLookup/'.$this->nowTime.'airlineLookupRS.json',$result);

        try{
            $data = json_decode($result,true)['AirlineInfo'];
        }catch (\Exception $e) {
            sendErrorToMail($e);
            $data = [];
        }

        $this->DbStore($data);

        return $this->convertToCollection($data)->take(10);
    }

    public function DbStore($data)
    {
        foreach ($data as $item){
            try {
                Airline::create([
                    'airline_name' => $item['AirlineName'],
                    'airline_code' => $item['AirlineCode']
                ]);
            }catch (\Exception $e){

            }

        }
    }

    public function convertToCollection($data)
    {
        $collection = new Collection();
        foreach ($data as $item){
            $collection->push((object)$item);
        }

        return $collection;
    }
}
