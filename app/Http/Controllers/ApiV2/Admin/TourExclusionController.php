<?php

namespace App\Http\Controllers\ApiV2\Admin;

use Illuminate\Http\Request;
use App\Models\TourExclusion;
use App\Http\Controllers\Controller;
use App\Services\Tours\Admin\TourService;
use App\Http\Requests\Tours\StoreTourPolicyRequest;
use App\Http\Requests\Tours\UpdateTourPolicyRequest;

class TourExclusionController extends Controller
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
           return response()->json(['tourExclusion' => [],'message' => "tour_id is required","errors" => []], 422);
        }

        $tourPlaces = $this->tourService->allData($tour_id,'tourExclusions');
        return response()->json(['tourExclusion'=> $tourPlaces,'message' => "Tour Exclusion Fetched Successfully","errors" => []], 200); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTourPolicyRequest $request)
    {
        $tourExclusion = $this->tourService->addData($request->all(),'details','tourExclusions');
        return response()->json(['tourExclusion'=> $tourExclusion,'message' => "tour Exclusion is inserted Successfully","errors" => []], 201);
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
        $tourExclusion = $this->tourService->updateData($request->all(),$id,TourExclusion::class);
        return response()->json(['tourExclusion'=> $tourExclusion,'message' => "tour Exclusions is updated Successfully","errors" => []], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tourExclusion = $this->tourService->deleteData($id,TourExclusion::class);
        return response()->json(['tourExclusion'=> [],'message' => "Data is deleted Successfully","errors" => []], 200);

    }
}
