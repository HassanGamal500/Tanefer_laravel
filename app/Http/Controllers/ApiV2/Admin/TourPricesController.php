<?php

namespace App\Http\Controllers\ApiV2\Admin;

use App\Models\TourPrice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Tours\Admin\TourService;
use App\Http\Requests\Tours\StoreTourpricesRequest;
use App\Http\Requests\Tours\UpdateTourpricesRequest;

class TourPricesController extends Controller
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
           return response()->json(['tourPrices' => [],'message' => "tour_id is required","errors" => []], 422);
        }

        $tourPlaces = $this->tourService->allData($tour_id,'tourPrices');
        return response()->json(['tourPrices'=> $tourPlaces,'message' => "Tour prices Fetched Successfully","errors" => []], 200); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTourpricesRequest $request)
    {
        $tourPrices = $this->tourService->addPrices($request->all());
        return response()->json(['tourPrices'=> $tourPrices,'message' => "tour prices is inserted Successfully","errors" => []], 201);
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
    public function update(UpdateTourpricesRequest $request, $id)
    {
        $tourPrices = $this->tourService->updateData($request->all(),$id,TourPrice::class);
        return response()->json(['tourPrices'=> $tourPrices,'message' => "tour prices is updated Successfully","errors" => []], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tourPrices = $this->tourService->deleteData($id,TourPrice::class);
        return response()->json(['tourPrices'=> [],'message' => "Data is deleted Successfully","errors" => []], 200);
    }
}
