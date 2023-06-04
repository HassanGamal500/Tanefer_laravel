<?php

namespace App\Http\Controllers\ApiV2\Admin;

use App\Models\TourPlace;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Tours\Admin\TourService;
use App\Http\Requests\Tours\StoreTourPlacesRequest;
use App\Http\Requests\Tours\UpdateTourPlacesRequest;

class TourPlacesController extends Controller
{
    private $tourService;

    public function __construct(TourService $tourService)
    {
        $this->tourService = $tourService;
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tour_id = $request->tour_id;
        if(is_null($tour_id)){
           return response()->json(['tourPlaces' => [],'message' => "tour_id is required","errors" => []], 422);
        }

        $tourPlaces = $this->tourService->allData($tour_id,'tourPlaces');
        return response()->json(['tourPlaces'=> $tourPlaces,'message' => "Tour places Fetched Successfully","errors" => []], 200); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTourPlacesRequest $request)
    {
        $tourPlaces = $this->tourService->addData($request->all(),'place','tourPlaces');
        return response()->json(['tourPlaces'=> $tourPlaces,'message' => "tour places are inserted Successfully","errors" => []], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTourPlacesRequest $request, $id)
    {
        $tourPlaces = $this->tourService->updateData($request->all(),$id,TourPlace::class);
        return response()->json(['tourPlaces'=> $tourPlaces,'message' => "tour places is updated Successfully","errors" => []], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tourPlaces = $this->tourService->deleteData($id,TourPlace::class);
        return response()->json(['tourPlaces'=> [],'message' => "Data is deleted Successfully","errors" => []], 200);
    }
}
