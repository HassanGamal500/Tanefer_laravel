<?php


namespace App\Services\Cars;


use App\GDSIntegration\Sabre\Cars\GetVehAvail;
use Illuminate\Support\Facades\Cache;

class Car
{
    public function search($request)
    {
        $getVehAvail = new GetVehAvail();
        $response = $getVehAvail->requestVeh($request);

        if(! is_array($response)){
            return ['data' => [],'message' => $response, 'status' => 500];
        }

        $cars = $response['cars'];
        $cache_key = time().rand(1,10);
        Cache::put($cache_key,$cars,1200);
        $response['search_id'] = $cache_key;

        return ['data' => $response,'message' => 'Fetch cars successfully','status' => 200];
    }

    public function show($request)
    {
        if(Cache::has($request->search_id)){
            $cars = Cache::get($request->search_id);
        }else{
            return ['data' => new \stdClass(),'message' => 'search session expired, please retry your search','status' => 410];
        }

        if(! array_key_exists($request->car_id,$cars)){
            return ['data' => new \stdClass(),'message' => 'This Car not found, please search again','status' => 404];
        }

        $car = $cars[$request->car_id];

        $car['search_id'] = $request->search_id;

        return ['data' => $car,'message' => 'car added to cart','status' => 200];
    }

}
