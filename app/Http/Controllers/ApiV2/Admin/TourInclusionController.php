<?php

namespace App\Http\Controllers\ApiV2\Admin;

use Illuminate\Http\Request;
use App\Models\TourInclusion;
use App\Http\Controllers\Controller;
use App\Services\Tours\Admin\TourService;
use App\Http\Requests\Tours\StoreTourPolicyRequest;
use App\Http\Requests\Tours\UpdateTourPolicyRequest;

class TourInclusionController extends Controller
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
           return response()->json(['tourInclusions' => [],'message' => "tour_id is required","errors" => []], 422);
        }

        $tourPlaces = $this->tourService->allData($tour_id,'tourInclusions');
        return response()->json(['tourInclusions'=> $tourPlaces,'message' => "Tour inclusion Fetched Successfully","errors" => []], 200); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTourPolicyRequest $request)
    {
        $tourInclusion = $this->tourService->addData($request->all(),'details','tourInclusions');
        return response()->json(['tourInclusion'=> $tourInclusion,'message' => "tour inclusion is inserted Successfully","errors" => []], 201);
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
    public function update(UpdateTourPolicyRequest $request, $id)
    {
        $tourInclusion = $this->tourService->updateData($request->all(),$id,TourInclusion::class);
        return response()->json(['tourInclusion'=> $tourInclusion,'message' => "tour Inclusion is updated Successfully","errors" => []], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tourInclusion = $this->tourService->deleteData($id,TourInclusion::class);
        return response()->json(['tourInclusion'=> [],'message' => "Data is deleted Successfully","errors" => []], 200);
    }
}
