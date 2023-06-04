<?php

namespace App\Http\Controllers\ApiV2\Front;

use App\Http\Resources\TourCityResource;
use App\Models\PackageActivity;
use App\Models\Tour;
use App\Models\TourCity;
use Illuminate\Http\Request;
use App\Services\Tours\TourService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Tour\TourResource;
use App\Http\Requests\Tours\TourTotalPrice;
use App\Http\Requests\Tours\StoreTourBooking;
use App\Http\Resources\Tour\TourSearchResource;
use App\Http\Resources\Tour\TourDetailsResource;

class TourController extends Controller
{
    private $TourService;

    public function __construct(TourService $TourService)
    {

        $this->TourService = $TourService;
    }

    public function allCityies()
    {
        if(request()->type == 'cruise'){
            $cities = PackageActivity::where('activity_type','cruise')->get()->map->tourCity->flatten()->unique();
        }else{
            $cities = TourCity::all();
        }
        return response()->json([
            'cities' => TourCityResource::collection($cities),'message' => 'cities Fetched Successfully',"errors" => []
        ]);

    }

    public function autocomplete(Request $request)
    {
        $term = $request->term;
        if(is_null($term)){
           return response()->json(['cities' => [],'message' => "term is required","errors" => []], 422);
        }

        $cities = $this->TourService->getCities($term);
        return response()->json([
            'cities' => TourCityResource::collection($cities),'message' => 'cities Fetched Successfully',"errors" => []
        ]);

    }

    public function toursSearch(Request $request){
        $city_name = $request->city_name;
        if(is_null($city_name)){
            return response()->json(['tours'=> [],'message' => "city is required","errors" => []], 422);
        }

        $tours = $this->TourService->getTours($city_name);
        return response()->json(['data' => new TourSearchResource($tours), 'message'=> "Tours Fetched Successfully", "errors" => []] ,200);
    }

    public function tourdetails(Request $request){
        $tour_id = $request->tour_id;
        if(is_null($tour_id)){
            return response()->json(['tour'=> [],'message' => "tour id is required","errors" => []], 422);
        }
         $tour = Tour::find($tour_id);
        if(empty($tour)){
            return response()->json(['tour'=> [],'message' => "Tour not found", "errors" => []] ,404);
        }

         return response()->json(['tour'=> new TourDetailsResource($tour), 'message'=> "Tour Fetched Successfully", "errors" => []] ,200);
    }

    public function tourBooking(Request $request){

        $tour_id = $request->tour_id;
        if(is_null($tour_id)){
            return response()->json(['tour'=> [],'message' => "tour id is required","errors" => []], 422);
        }
        $tour = Tour::find($tour_id);
        if(empty($tour)){
            return response()->json(['tour'=> [],'message' => "Tour not found","errors" => []] ,404);
        }
        $tourDetails = $this->TourService->getTour($tour_id);
        //check if empty
        return response()->json(['tour'=> new TourResource($tourDetails),'message' => "Tour Fetched Successfully","errors" => []], 200);

    }

    public function storeBooking(StoreTourBooking $request){
        $validated = $request->validated();

        $bookData = $this->TourService->insertTourBooking($request->all());

        return response()->json(['bookData'=> $bookData,'message' => "Tour is Booked Successfully","errors" => []], 201);

    }

    public function calTotalPrice(TourTotalPrice $request){
        $validated = $request->validated();

        $result = $this->TourService->getTotalPrice($request->all());

        return response()->json(['totalPrice'=> $result['totalPrice'],'message' =>  $result['message'],"errors" => []], $result['status']);
    }
}
