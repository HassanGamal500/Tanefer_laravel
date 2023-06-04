<?php

namespace App\Http\Controllers\ApiV2\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Tours\Admin\TourService;
use App\Http\Resources\Tour\TourImagesResource;
use App\Http\Requests\Tours\StoreTourImagesRequest;
use App\Http\Requests\Tours\UpdateTourImagesRequest;

class TourImagesController extends Controller
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
           return response()->json(['tourImages' => [],'message' => "tour_id is required","errors" => []], 422);
        }

        $tourImages = $this->tourService->allData($tour_id,'tourImages');
        return response()->json(['tourImages'=> TourImagesResource::collection($tourImages),'message' => "Tour images Fetched Successfully","errors" => []], 200); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTourImagesRequest $request)
    {
        $tourImages = $this->tourService->addTourImages($request);
        return response()->json(['tourImages'=> TourImagesResource::collection($tourImages),'message' => "tour images are inserted Successfully","errors" => []], 201);
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
    public function update(UpdateTourImagesRequest $request, $id)
    {
        $tourImages = $this->tourService->updateTourImage($request,$id);
        return response()->json(['tourImages'=> new TourImagesResource($tourImages),'message' => "tour image is updated Successfully","errors" => []], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tourImages = $this->tourService->deleteImage($id);
        return response()->json(['tourImages'=> [],'message' => "Data is deleted Successfully","errors" => []], 200);
    }
}
