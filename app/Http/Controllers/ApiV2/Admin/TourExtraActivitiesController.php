<?php

namespace App\Http\Controllers\ApiV2\Admin;

use Illuminate\Http\Request;
use App\Models\TourExtraActivity;
use App\Http\Controllers\Controller;
use App\Services\Tours\Admin\TourService;
use App\Http\Requests\Tours\StoreTourOptionalRequest;
use App\Http\Requests\Tours\UpdateTourOptionalRequest;

class TourExtraActivitiesController extends Controller
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
           return response()->json(['tourExtraActivities' => [],'message' => "tour_id is required","errors" => []], 422);
        }

        $tourPlaces = $this->tourService->allData($tour_id,'tourExtraActivities');
        return response()->json(['tourExtraActivities'=> $tourPlaces,'message' => "Tour Extra Activities Fetched Successfully","errors" => []], 200); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTourOptionalRequest $request)
    {
        $tourOptional = $this->tourService->addOptional($request);
        return response()->json(['tourOptional'=> $tourOptional,'message' => "tour Optionals are inserted Successfully","errors" => []], 201);
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
    public function update(UpdateTourOptionalRequest $request, $id)
    {
        $tourEtrxActivities = $this->tourService->updateData($request->all(),$id,TourExtraActivity::class);
        return response()->json(['tourEtrxActivities'=> $tourEtrxActivities,'message' => "tour Extra Activities is updated Successfully","errors" => []], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tourEtrxActivities = $this->tourService->deleteData($id,TourExtraActivity::class);
        return response()->json(['tourEtrxActivities'=> [],'message' => "Data is deleted Successfully","errors" => []], 200);
    }
}
