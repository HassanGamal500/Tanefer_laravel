<?php

namespace App\Http\Controllers\ApiV2\Admin;

use App\Http\Resources\AirportResource;
use App\Models\Airport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Tours\Admin\CityService;
use App\Http\Requests\Tours\StoreCityRequest;
use App\Http\Requests\Tours\UpdateCityRequest;

class TourCityController extends Controller
{
    private $cityService;

    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = $this->cityService->all();
        return response()->json(['cities' => $cities,'message' => 'cities Fetched Successfully',"errors" => []] ,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCityRequest $request)
    {
        $city = $this->cityService->create($request->all());

        return response()->json(['city'=> $city,'message' => "City is inserted Successfully","errors" => []], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = $this->cityService->find($id);
        if(empty($city)){
            return response()->json(['city'=> [],'message' => "city not found","errors" => []] ,404);
        }else{
            return response()->json(['city'=> $city,'message' => "city Fetched Successfully","errors" => []] ,200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCityRequest $request, $id)
    {
        $city = $this->cityService->update($request->all(),$id);

        if(!$city){
            return response()->json(['city'=> [],'message' => "city not found","errors" => []] ,404);
        }else{
            $city = $this->cityService->find($id);
            return response()->json(['city'=> $city,'message' => "City is updated Successfully","errors" => []], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = $this->cityService->delete($id);
        if(!$city){
            return response()->json(['city'=> [],'message' => "city not found","errors" => []] ,404);
        }else{

            return response()->json(['city'=> [],'message' => "City is deleted Successfully","errors" => []], 200);
        }
    }

    public function tourCityAirportAutocomplete(Request $request)
    {
        $term = $request->term;
        if(is_null($term)){
            return response()->json([]);
        }

        $airports = Airport::where('name','LIKE','%'.$term.'%')
            ->take(10)->get();

        return response()->json(AirportResource::collection($airports));
    }
}
